<?php

abstract class ContactProvider {
    function getProviderName()
    {
        return str_replace('ContactProvider_', '', get_class($this));
    }

    abstract public function getCaption();
    abstract public function getCaptionHint();
    abstract public function getDescription($campaign);
	abstract public function getContactIds($campaign);

    public function cleanup($campaign)
    {
        $campaign->setProviderSettings($this->getProviderName(), null);
    }

    public function isAvailable($campaign)
    {
        return true;
    }



    abstract function isNull($campaign);

    public function renderAdminInterface(Campaign $campaign, sfWebRequest $sfRequest)
    {
        include_component('ContactProvider', $this->getProviderName(), array(
                'campaign' => $campaign,
                'providerName' => $this->getProviderName()));
    }
}

?>