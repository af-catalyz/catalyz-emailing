<?php


/**
 * Skeleton subclass for representing a row from the 'campaign_template' table.
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
 * @package    lib.model
 */
class CampaignTemplate extends BaseCampaignTemplate {

	/**
	 * Initializes internal state of CampaignTemplate object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

	public function getStatusBadge($floatRight = true){
		$badge = '';

		if ($this->getClassName()) {
			$badge = sprintf('<span class="label label-success%s">%s</span>', $floatRight?' pull-right':'',sfContext::getInstance()->getI18N()->__('Mode Assisté'));
		}

		return $badge;
	}

	public function createEditWidget(Campaign $campaign)
	{
		$result = array();

		if ('' == $this->getClassName() || !class_exists($this->getClassName())) {
			$className = 'CampaignTemplateHandler';
		} else {
			$className = $this->getClassName();
		}

		$object = new $className($campaign);
		$result = $object->createEditWidget();

		return $result;
	}

} // CampaignTemplate


$columns_map = array('from'   => CampaignTemplatePeer::NAME,'to'     => CampaignTemplatePeer::SLUG);
sfPropelBehavior::add('CampaignTemplate', array('sfPropelActAsSluggableBehavior' => array('columns' => $columns_map)));