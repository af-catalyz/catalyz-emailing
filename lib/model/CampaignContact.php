<?php

/**
 * Skeleton subclass for representing a row from the 'campaign_contact' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * jeu. 03 mai 2012 11:26:44 CEST
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package lib.model
 */
class CampaignContact extends BaseCampaignContact {
    /**
     * Initializes internal state of CampaignContact object.
     *
     * @see parent::__construct()
     */
    public function __construct()
    {
        // Make sure that parent constructor is always invoked, since that
        // is where any default values for this object are set.
        parent::__construct();
    }

    public function getBounces()
    {
        $criteria = new Criteria();
        $criteria->add(CampaignContactBouncePeer::CAMPAIGN_CONTACT_ID, $this->getId());
        return CampaignContactBouncePeer::doSelect($criteria);
    }

    public function getBounceLabel()
    {
        switch ($this->getBounceTypeFmt()) {
            case 'HARD':
                return '<span class="badge badge-error">HARD</span>';;
                break;
            case 'SOFT':
                return '<span class="badge badge-warning">SOFT</span>';;;
                break;
            default:
                return '-';
        } // switch
    }

    public function getBounceTypeFmt()
    {
        return catalyzemailingHandlebouncesTask::getBounceTypeFmt($this->getBounceType());
    }

    public function getLandingActionArray()
    {
        $actions = $this->getLandingActions();
        if ($actions) {
            $actions = unserialize($actions);
        } else {
            $actions = array();
        }
        return $actions;
    }
    public function getLandingActionCount()
    {
        return count($this->getLandingActionArray());
    }
    public function getLandingActionLabel()
    {
        $count = $this->getLandingActionCount();
        if ($count > 0) {
            return sprintf('<span class="badge">%d</span>', $count);
        }
        return '-';
    }

    public function addLandingAction($template, $actionType, $datas)
    {
        $actions = $this->getLandingActionArray();
        $actions[] = array(
            'when' => time(),
            'template' => $template,
            'type' => $actionType,
            'content' => $datas);
        $this->setLandingActions(serialize($actions));
    }

    function getLandingActionsForRendering()
    {
        $datas = $this->getLandingActionArray();
    	$result = array();
    	foreach($datas as $dataIndex => $data){
    		$class = sprintf('%sLandingForm', $data['template']);
    		if(!class_exists($class)){
    			$result[$dataIndex] = $data;
    		}else{
    			$result[$dataIndex]['when'] = $data['when'];
    			$result[$dataIndex]['type'] = $class::translateActionFormName($data['type']);
    			$result[$dataIndex]['content'] = array();
    			foreach($data['content'] as $key => $value){
    				$result[$dataIndex]['content'][$class::translateActionFormFieldName($data['type'], $key)] = $value;
    			}
    		}

    	}
    	return $result;
    }
} // CampaignContact