<?php

class ContactProvider_CampaignOpen extends ContactProvider {
    public function getCaption()
    {
        return 'Les contacts ayant ouvert une campagne';
    }
    public function getCaptionHint()
    {
        return false;
        // return 'Vous permet de sélectionner certains groupes de contacts que vous avez déjà préparés.';
    }
    public function getDescription($campaign)
    {
        $items = array();
        foreach($this->getSelectedCampaigns($campaign) as $selectedCampaign) {
            $items[] = sprintf('<span class="tag">%s</span>', $selectedCampaign->getName());
        }
        switch (count($items)) {
            case 0:
                return false;
            case 1:
                return 'Les contacts ayant ouvert la campagne ' . array_shift($items);
            default:
                return 'Les contacts ayant ouvert au moins une des campagnes suivantes: ' . implode(', ', $items);
        } // switch
    }

    public function getSelectableCampaigns($campaign)
    {
        $current = $campaign->getProviderSettings($this->getProviderName());
        if (!is_array($current)) {
            $current = array();
        }
        $current[] = $campaign->getId();

        $c = new Criteria();
        $c->add(CampaignPeer::ID, $current, Criteria::NOT_IN);

				// on peut choisir que les campagnes envoyées
        $c->add(CampaignPeer::STATUS, Campaign::STATUS_COMPLETED, Criteria::EQUAL);
        $c->addDescendingOrderByColumn(CampaignPeer::SCHEDULED_AT);
        $campaigns = CampaignPeer::doSelect($c);

        $return = array();
        $active = array();
        $archived = array();

        foreach ($campaigns as/*(Campaign)*/ $campaign) {
            if (!$campaign->getIsArchived()) {
                $active[strtotime($campaign->getCreatedAt())] = $campaign;
            }else {
                $archived[date('Y-m', strtotime($campaign->getCreatedAt()))][] = $campaign;
            }
        }

        krsort($archived);
        krsort($active);

        return array('active' => $active, 'archived' => $archived);
    }
    public function getSelectedCampaigns($campaign)
    {
        $c = new Criteria();
        $c->add(CampaignPeer::ID, $campaign->getProviderSettings($this->getProviderName()), Criteria::IN);
        $c->addDescendingOrderByColumn(CampaignPeer::SCHEDULED_AT);
        return CampaignPeer::doSelect($c);
    }
    private $_isAvailable = array();
    public function isAvailable($campaign)
    {
        if (!isset($this->_isAvailable[$campaign->getId()])) {
            $this->_isAvailable[$campaign->getId()] = count($this->getSelectableCampaigns($campaign)) > 0;
        }
        return $this->_isAvailable[$campaign->getId()];
    }

    public function getContactIds($campaign)
    {
        $result = array();
        $c = new Criteria();
        $c->add(CampaignContactPeer::CAMPAIGN_ID, $campaign->getProviderSettings($this->getProviderName()), Criteria::IN);
        $c->add(CampaignContactPeer::VIEW_AT, null, Criteria::ISNOTNULL);
        foreach(CampaignContactPeer::doselect($c) as/*(CampaignContact)*/ $CampaignContact) {
            $result[] = $CampaignContact->getContactId();
        }

        return $result;
    }

    public function isNull($campaign)
    {
        $items = $campaign->getProviderSettings($this->getProviderName());
        return !is_array($items) || (0 == count($items));
    }
    public function renderAdminInterface(Campaign $campaign, sfWebRequest $sfRequest)
    {
        $sfContext = sfContext::getInstance();
        if (sfRequest::POST == $sfRequest->getMethod() && $target_campaigns = $sfRequest->getParameter('campaigns')) {
            $campaign->setProviderSettings('CampaignOpen', $target_campaigns);
            $campaign->save();

        	$message = sprintf('<h4 class="alert-heading">Critères d\'envois modifiés</h4><p>La règle a été enregistrée</p>');
        	$sfContext->getUser()->setFlash('notice_success', $message);


            $sfContext->getController()->redirect('@campaign_edit_targets?slug=' . $campaign->getSlug());
            return false;
        }

        $provider = CatalyzEmailing::getProviderInstance('CampaignOpen');
        $selectedCampaigns = $provider->getSelectedCampaigns($campaign);
        $campaigns = $provider->getSelectableCampaigns($campaign);
        if (0 == count($campaigns)) {

        	$message = sprintf('<h4 class="alert-heading">Critères d\'envois non modifiés</h4><p>Aucune autre campagne n\'a été envoyée et ne peut être sélectionnée.</p>');
        	$sfContext->getUser()->setFlash('notice_error', $message);
            $sfContext->getController()->redirect('@campaign_edit_targets?slug=' . $campaign->getSlug());
            return false;
        }
        include_component('ContactProvider', $this->getProviderName(), array(
                'campaign' => $campaign,
                'providerName' => $this->getProviderName(),
                'campaigns' => $campaigns,
                'selectedCampaigns' => $selectedCampaigns,
                ));
    }
}

?>