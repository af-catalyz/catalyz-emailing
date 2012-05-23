<?php

class ContactProvider_FromDatabase extends ContactProvider {
    public function getCaption()
    {
        return 'Certains contacts de votre base de données';
    }
    public function getCaptionHint()
    {
        return false;
        // return 'Vous permet de sélectionner certains groupes de contacts que vous avez déjà préparés.';
    }
    public function getDescription($campaign)
    {
        $selected = $campaign->getSelectedContacts();
        if (0 == count($selected)) {
            return false;
        }

        if (1 == count($selected)) {
            $contact =/*(Contact)*/ array_shift($selected);
            $result = sprintf('<span class="tag">%s', $contact->getFullName());
            $result .= link_to(image_tag('icons/bullet_cross.png'), '@campaign-contact-delete?campaignId=' . $campaign->getId() . '&id=' . $contact->getId());
            $result .= '</span>';
            return $result;
        }
        $contact = array_pop($selected);
        // $selected = array_reverse($selected);
        $result = sprintf(' et <span class="tag">%s</span>', $contact->getFullName()
             . link_to(image_tag('icons/bullet_cross.png'), '@campaign-contact-delete?campaignId=' . $campaign->getId() . '&id=' . $contact->getId()));

        foreach($selected as $contact) {
            $items[] = sprintf('<span class="tag">%s', $contact->getFullName())
             . link_to(image_tag('icons/bullet_cross.png'), '@campaign-contact-delete?campaignId=' . $campaign->getId() . '&id=' . $contact->getId())
             . '</span>';
        }
        $result = sprintf('Les %d contacts suivants: ', count($items) + 1) . implode(', ', $items) . $result;
        return $result;
    }

    public function cleanup($campaign)
    {
        parent::cleanup($campaign);

        $c = new Criteria();
        $c->add(CampaignContactElementPeer::CAMPAIGN_ID, $campaign->getId());
        return CampaignContactElementPeer::doDelete($c);
    }

    public function getContactIds($campaign)
    {
        $result = array();
        $c = new Criteria();
        $c->add(CampaignContactElementPeer::CAMPAIGN_ID, $campaign->getId());
        foreach(CampaignContactElementPeer::doSelect($c) as/*(CampaignContactElement)*/ $CampaignContactElement) {
            $result[] = $CampaignContactElement->getContactId();
        }

        return $result;
    }
    public function isNull($campaign)
    {
        return (0 == count($this->getContactIds($campaign)));
    }
    public function renderAdminInterface(Campaign $campaign, sfWebRequest $sfRequest)
    {
        if (sfRequest::POST == $sfRequest->getMethod()) {
            $count = 0;
            foreach ($sfRequest->getParameter('contacts') as $contactId) {
                $count += CampaignContactElementPeer::createCompaignContactIfNotExist($campaign->getId(), $contactId);
            }

            $sfContext = sfContext::getInstance();
            if (1 == $count) {
                $sfContext->getUser()->setFlash('info', '1 contact a été ajouté.');
            } else {
                $sfContext->getUser()->setFlash('info', sprintf('%d contacts ont étés ajoutés.', $count));
            }

            $sfContext->getController()->redirect('@campaign-target?id=' . $campaign->getId());
            return false;
        }
        include_component('ContactProvider', $this->getProviderName(), array(
                'campaign' => $campaign,
                'providerName' => $this->getProviderName()));
    }
}

?>