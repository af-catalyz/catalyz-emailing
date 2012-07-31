<?php

class catalyzemailingSendTask extends sfPropelBaseTask {
    protected function configure()
    {
        $this->namespace = 'catalyz-emailing';
        $this->name = 'send';
        $this->briefDescription = 'Send all emails for active campaigns';
        $this->detailedDescription = <<<EOF
The [catalyz-emailing:send|INFO] task does things.
Call it with:

  [php symfony catalyz-emailing:send|INFO]
EOF;
    	$this->addArgument('application', sfCommandArgument::OPTIONAL, 'The application name', 'frontend');
    	// add other arguments here
    	$this->addOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'af');
    	$this->addOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel');
    }

    protected function execute($arguments = array(), $options = array())
    {
        // Database initialization
	    	$databaseManager = new sfDatabaseManager($this->configuration);
	    	$connection = $databaseManager->getDatabase($options['connection'])->getConnection();
    	  sfContext::createInstance($this->configuration->getApplicationConfiguration($arguments['application'], $options['env'], true));
        // add code here
        $criteria = new Criteria();
        $criteria->add(CampaignPeer::STATUS, Campaign::STATUS_SENDING);

        $campaigns = CampaignPeer::doSelect($criteria);
    		$this->log(sprintf('Found %d campaigns...', count($campaigns)));
        foreach($campaigns as/*(Campaign)*/ $campaign) {
            $this->logSection($campaign->getName(), '-- Starting to send emails');

            $criteria = new Criteria();
            $criteria->add(CampaignContactPeer::CAMPAIGN_ID, $campaign->getId());
            $criteria->add(CampaignContactPeer::SENT_AT, null);
            $criteria->add(CampaignContactPeer::FAILED_SENT_AT, null);
            $criteria->setLimit(10);

            $campaignDeliveryManager = $campaign->getCampaignDeliveryManager();
            do {
            	unset($targets);
            	$targets = CampaignContactPeer::doSelectJoinContact($criteria);
                foreach($targets as $target) {
                    $result = $campaignDeliveryManager->sendToCampaignContact($target);
                	$contact =/*(Contact)*/ $target->getContact();
                	unset($target);
                	if (!$result) {
                    	$contact->setStatus(Contact::STATUS_BOUNCED);
                        $contact->save();
                    }
                    $this->logSection($campaign->getName(), sprintf('%s #%06d: %s', $result?'Success':'Failed', $contact->getId(), $contact->getEmail()));
                	unset($contact);
                }
            	sleep(1);
            } while (count($targets) > 0);
            $campaign->setStatus(Campaign::STATUS_COMPLETED);
            $campaign->save();
            $this->logSection($campaign->getName(), '-- Finished');
        }
    }
}