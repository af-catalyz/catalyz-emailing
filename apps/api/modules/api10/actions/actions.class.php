<?php

class api10Actions extends sfActions {
    protected $outputFormat = null;
    protected $outputSerializer = null;

		const STATUS_SAVE = 'save';
		const STATUS_SCHEDULE = 'schedule';
		const STATUS_SENDING = 'sending';
		const STATUS_SENT = 'sent';

    public function executeIndex($request)
    {
        try {
            $this->checkOutputFormat($request->getParameter('output'));
            $this->checkApiKey($request->getParameter('apikey'));
            //region check Method
            $method = $request->getParameter('method');
            if (empty($method)) {
                throw new Exception('Missing method parameter');
            }
            if (!method_exists($this, $method)) {
                throw new Exception(sprintf('Unable to find requested method: %s', $method));
            }
            $availableMethods = array();
            $availableMethods[] = 'lists';
            $availableMethods[] = 'listSubscribe';
            $availableMethods[] = 'listAdd';
            $availableMethods[] = 'campaigns';
            if (!in_array($method, $availableMethods)) {
                throw new Exception(sprintf('Unknown method: %s', $method));
            }
            //endregion

            $this->renderResult($this->$method($request), 200);
        }
        catch(Exception $e) {
            $this->renderResult($e->getMessage(), 500);
        }
        return sfView::NONE;
    }

    protected function logCall($message)
    {
        $this->logMessage($message, 'debug');
    }

    protected function checkOutputFormat($outputFormat)
    {
        if (null == $outputFormat) {
            $outputFormat = 'php';
        }
        $outputFormat = strtolower($outputFormat);

        $supportedFormat = array('php' => 'serialize');
        if (!isset($supportedFormat[$outputFormat])) {
            throw new Exception(sprintf('Unsupported output type: %s. Supported format: %s', $output, implode(', ', $supportedFormat)));
        }
        $this->outputSerializer = $supportedFormat[$outputFormat];
        return true;
    }

    protected function renderResult($result, $statusCode)
    {
        $this->getResponse()->setStatusCode($statusCode);

        sfConfig::set('sf_web_debug', false);
        if (null == $this->outputSerializer) {
            // $this->result = $result;
            $this->renderText($result);
            return true;
        }
        if (is_string($this->outputSerializer) || is_array($this->outputSerializer)) {
            // $this->result = call_user_func($this->outputSerializer, $result);
            $this->renderText(call_user_func($this->outputSerializer, $result));
            return true;
        }
        throw new Exception(sprintf('Unknown output serializer: %s', serialize($this->outputSerializer)));
    }

    /**
     * Retrieve all of the lists
     *
     * @return array
     * @see http://www.mailchimp.com/api/1.2/lists.func.php
     */
    protected function lists($request)
    {
        $this->logCall('lists()');

        $criteria = new Criteria();
        $criteria->addAscendingOrderByColumn(ContactGroupPeer::NAME);

        $result = array();
        foreach(ContactGroupPeer::doSelect($criteria) as /*(ContactGroup)*/$group) {
            $item = array();
            $item['id'] = $group->getId();
            $item['name'] = $group->getName();
            $result[] = $item;
        }

        return $result;
    }

    protected function arrayToString($array)
    {
        $result = array();
        foreach($array as $key => $value) {
            $result[] = sprintf('%s => %s', $key, is_array($value)?$this->arrayToString($value):$value);
        }
        return 'array(' . implode(', ', $result) . ')';
    }

    /**
     * Subscribe the provided email to a list. By default this sends a confirmation email - you will not see new members until the link contained in it is clicked!
     *
     * @return boolean true on success, false on failure
     * @see http://www.mailchimp.com/api/1.2/listsubscribe.func.php
     */
    protected function listSubscribe($request)
    {
        //region arguments
        $id = $request->getParameter('id');
        $email_address = $request->getParameter('email_address');
        $attributes = $request->getParameter('attributes', array());
        //endregion

        if (!empty($attributes)) {
            $customFieldsDispo = CatalyzEmailing::getCustomFields();
            foreach ($attributes as $fieldKey => $value) {
                if (preg_match('/^custom([1-9][0-9]?)$/', $fieldKey, $tokens) && empty($customFieldsDispo[$fieldKey])) {
                    throw new Exception(sprintf('Custom Field are invalid: %s', $fieldKey));
                }
            }
        }

        $this->logCall(sprintf('listSubscribe(%d, %s, %s)', $id, $email_address, $this->arrayToString($attributes)));

        $group = ContactGroupPeer::retrieveByPK($id);
        if (null == $group) {
            throw new Exception(sprintf('Unknown list (%d)', $id));
        }

        if (!CatalyzEmailing::ValidateEmail($email_address)) {
            throw new Exception(sprintf('Email adress is invalid: %s', $email_address));
        }

        $connection = Propel::getConnection();
        $connection->begin();
        try {
            $contact = ContactPeer::retreiveByEmail($email_address);
            if (null == $contact) {
                $contact = new Contact();
            }
            foreach($attributes as $attrKey => $attrValue) {
                $methodName = 'set' . ucfirst($attrKey);
                $contact->$methodName($attrValue);
            }
            $contact->setEmail($email_address);
            $contact->save();
            $ContactContactGroup = new ContactContactGroup();
            $ContactContactGroup->setContactGroup($group);
            $ContactContactGroup->setContact($contact);
            $ContactContactGroup->save();
            $connection->commit();
        }
        catch(PropelException $e) {
            $connection->rollback();
            return false;
        }
        return true;
    }

    public function checkApiKey($apikey)
    {
        if (empty($apikey)) {
            throw new Exception('apikey parameter is missing');
        }
        if ($apikey != sfConfig::get('app_api_key')) {
            throw new Exception(sprintf('Invalid API key: %s', $apikey));
        }
        return true;
    }

    protected function listAdd($request)
    {
        //region arguments
        $group_name = $request->getParameter('group_name');
        //endregion

        $this->logCall(sprintf('listAdd(%s)', $name));

        $list = $this->lists($request);
        $groups = array();
        foreach ($list as $groupDetail) {
            $groups[$groupDetail['name']] = $groupDetail['id'];
        }
        // qui regarde si un groupe avec le même nom existe déjà
        // si oui: exception
        if (isset($groups[$group_name])) {
            throw new Exception(sprintf('Group (%s) already exist', $group_name));
        } else { // si non, on le crée et un renvoie son ID
            $new_group = new ContactGroup();
            $new_group->setName($group_name);
            $new_group->save();
        }

        return $new_group->getId();
    }

    /**
     * Retrieve all campaigns
     *
     * @return array
     * @see http://apidocs.mailchimp.com/api/1.2/campaigns.func.php
     */
    protected function campaigns($request)
    {
        $this->logCall('campaigns()');

	    	//region arguments
	    	$start = $request->getParameter('start', 0);
	    	$filters = $request->getParameter('filters', array());
	    	$limit = $request->getParameter('limit', false);
	    	//endregion

        $criteria = new Criteria();
        $criteria->addSelectColumn(CampaignPeer::ID);
        $criteria->addSelectColumn(CampaignPeer::NAME);
    		$criteria->addSelectColumn(CampaignPeer::STATUS);
    		$criteria->addJoin( CampaignContactPeer::CAMPAIGN_ID, CampaignPeer::ID, criteria::RIGHT_JOIN);
    		$criteria->addSelectColumn(CampaignContactPeer::SENT_AT);
        $criteria->addDescendingOrderByColumn(CampaignContactPeer::SENT_AT);
				$criteria->addGroupByColumn(CampaignPeer::ID);
    		$criteria->setOffset($start);

    		if (!empty($filters['status'])) {
    			$status = array();
    			foreach ($filters['status'] as $statusId){
    				switch($statusId){
    					case self::STATUS_SAVE:
    						$status[]= Campaign::STATUS_DRAFT;
    						break;
    					case self::STATUS_SCHEDULE:
    						$status[]= Campaign::STATUS_SCHEDULED;
    						break;
    					case self::STATUS_SENDING:
    						$status[]= Campaign::STATUS_SENDING;
    						break;
    					case self::STATUS_SENT:
    						$status[]= Campaign::STATUS_COMPLETED;
    						break;
    				} // switch
    			}

    			if (!empty($status)) {
    				$criteria->add(CampaignPeer::STATUS, $status, Criteria::IN);
    			}
    		}

    		if ($limit) {
    			$criteria->setLimit($limit);
    		}

        $result = array();
        foreach(CampaignPeer::doSelectRS($criteria) as $id => $campaign) {
						$item = array();
            $item['id'] = $campaign[0];
            $item['name'] = $campaign[1];
            $item['status'] = $campaign[2];
            $item['sent_at'] = $campaign[3];
            $item['view_url'] = sprintf('/campaign/view/%s',  $campaign[0]);
            $result[$item['id']] = $item;
        }
        return $result;
    }
}