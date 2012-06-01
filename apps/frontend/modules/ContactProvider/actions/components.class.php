<?php

class ContactProviderComponents extends sfComponents {
    public function executeCampaignOpen()
    {
        return sfView::SUCCESS;
    }

    public function executeCampaignNotOpen()
    {
        return sfView::SUCCESS;
    }

    public function executeFromDatabase()
    {
        return sfView::SUCCESS;
    }

    public function executeFromEmail()
    {
        return sfView::SUCCESS;
    }

    public function executeContactGroup()
    {
        return sfView::SUCCESS;
    }
}

?>