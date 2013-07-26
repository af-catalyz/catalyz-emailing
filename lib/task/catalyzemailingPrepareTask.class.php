<?php

class catalyzemailingPrepareTask extends sfPropelBaseTask {
    protected function configure()
    {
        $this->namespace = 'catalyz-emailing';
        $this->name = 'prepare';
        $this->briefDescription = 'Prepare all campaigns for sending';
        $this->detailedDescription = <<<EOF
The [catalyz-emailing:prepare|INFO] task does things.
Call it with:

  [php symfony catalyz-emailing:prepare|INFO]
EOF;
        $this->addArgument('application', sfCommandArgument::OPTIONAL, 'The application name', 'frontend');
        // add other arguments here
        $this->addOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev');
        $this->addOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel');
        // add other options here
    }

    protected function execute($arguments = array(), $options = array())
    {
        // Database initialization
	    	$databaseManager = new sfDatabaseManager($this->configuration);
	    	$connection = $databaseManager->getDatabase($options['connection'])->getConnection();

        // add code here
        $criteria = new Criteria();
        $criteria->add(CampaignPeer::STATUS, Campaign::STATUS_SCHEDULED);
        $criterion = $criteria->getNewCriterion(CampaignPeer::SCHEDULE_TYPE, Campaign::SCHEDULING_NOW);
        $criterion->addOr($criteria->getNewCriterion(CampaignPeer::SCHEDULED_AT, time(), Criteria::LESS_EQUAL));
        $criteria->add($criterion);

        $campaigns = CampaignPeer::doSelect($criteria);

        foreach($campaigns as/*(Campaign)*/ $campaign) {
            $this->logSection($campaign->getName(), '-- Starting to prepare campaign');
            $campaign->setStatus(Campaign::STATUS_PREPARING_SEND);
            $campaign->save();

            $this->cleanupCampaign($campaign);

            foreach($campaign->getTargetContactIds() as $contactId) {
                $target = new CampaignContact();
                $target->setContactId($contactId);
                $target->setCampaign($campaign);
                // $target->setSentAt(null);
                // $target->setUnsubscribedAt(null);
                // $target->setViewAt(null);
                // $target->setBounceType(null);
                $target->save();
                unset($target);
                $this->logSection($campaign->getName(), sprintf('Adding contact #%06d', $contactId));
            }
            $campaign->setStatus(Campaign::STATUS_SENDING);
            $campaign->save();
            $this->logSection($campaign->getName(), '-- Campaign is now ready to be sent');
        	unset($campaign);
        }
    }

    public function cleanupCampaign(Campaign $campaign)
    {
        $this->logSection($campaign->getName(), '-- Cleaning');
        $criteria = new Criteria();
        $criteria->add(CampaignContactPeer::CAMPAIGN_ID, $campaign->getId());
        CampaignContactPeer::doDelete($criteria);
    }
}