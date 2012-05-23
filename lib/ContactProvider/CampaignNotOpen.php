<?php

class ContactProvider_CampaignNotOpen extends ContactProvider {
    public function getCaption()
    {
        return 'Les contacts n\'ayant pas ouvert une campagne';
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
                return 'Les contacts n\'ayant pas ouvert la campagne ' . array_shift($items);
            default:
                return 'Les contacts n\'ayant ouvert aucune des campagnes suivantes: ' . implode(', ', $items);
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
                $active[$campaign->getCreatedAt(null)] = $campaign;
            }else {
                $archived[$campaign->getCreatedAt('Y-m')][] = $campaign;
            }
        }

        $countPerGroup = $this->getNbContactPerGroup();

        krsort($archived);
        krsort($active);

        return array('active' => $active, 'archived' => $archived, 'countPerGroup' => $countPerGroup);
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
        $exclude = array();
        $c = new Criteria();
        $c->add(CampaignContactPeer::CAMPAIGN_ID, $campaign->getProviderSettings($this->getProviderName()), Criteria::IN);
        $c->add(CampaignContactPeer::VIEW_AT, null, Criteria::ISNOTNULL);
        foreach(CampaignContactPeer::doselect($c) as/*(CampaignContact)*/ $CampaignContact) {
            $exclude[] = $CampaignContact->getContactId();
        }

        $result = array();
        $c = new Criteria();
        $c->add(CampaignContactPeer::CAMPAIGN_ID, $campaign->getProviderSettings($this->getProviderName()), Criteria::IN);
        $c->add(CampaignContactPeer::CONTACT_ID, $exclude, Criteria::NOT_IN);
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
        if (sfRequest::POST == $sfRequest->getMethod() && $target_campaigns = $sfRequest->getParameter('campaigns')) {
            $campaign->setProviderSettings('CampaignNotOpen', $target_campaigns);
            $campaign->save();
            $sfContext = sfContext::getInstance();
            $sfContext->getUser()->setFlash('info', 'La règle a été enregistrée');
            $sfContext->getController()->redirect('@campaign-target?id=' . $campaign->getId());
            return false;
        }

        $provider = CatalyzEmailing::getProviderInstance('CampaignNotOpen');
        $selectedCampaigns = $provider->getSelectedCampaigns($campaign);
        $campaigns = $provider->getSelectableCampaigns($campaign);
        if (0 == count($campaigns)) {
            $sfContext->getUser()->setFlash('error', 'Aucune autre campagne n\'a été envoyée et ne peut être sélectionnée.');
            $sfContext->getController()->redirect('@campaign-target?id=' . $campaign->getId());
            return false;
        }

        include_component('ContactProvider', $this->getProviderName(), array(
                'campaign' => $campaign,
                'providerName' => $this->getProviderName(),
                'campaigns' => $campaigns,
                'selectedCampaigns' => $selectedCampaigns,
                ));
    }

    private function getNbContactPerGroup()
    {
    	$result = array();
    	$sql = 'SELECT ' . CampaignContactPeer::CAMPAIGN_ID . ' AS campaign_id,
			COUNT(' . CampaignContactPeer::CONTACT_ID . ') AS total
			FROM ' . CampaignContactPeer::TABLE_NAME . '
			WHERE ' . CampaignContactPeer::VIEW_AT . ' IS NULL
			GROUP BY ' . CampaignContactPeer::CAMPAIGN_ID;

    	$con = Propel::getConnection('propel');
    	$stmt = $con->createStatement();
    	$rs =/*(MySQLResultSet)*/ $stmt->executeQuery($sql);

    	while ($rs->next()) {
    		$result[$rs->getInt('campaign_id')] = $rs->getInt('total');
    	}


    	return $result;
    }
}

?>