<?php
class ContactProvider_ContactGroup extends ContactProvider {
    private $_isAvailble = array();
    public function isAvailable($campaign)
    {
        if (!isset($this->_isAvailable[$campaign->getId()])) {
            if (!$groupCount = ContactGroupPeer::doCount(new Criteria())) {
                $this->_isAvailable[$campaign->getId()] = false;
            } else {
                $this->_isAvailable[$campaign->getId()] = ($groupCount - count($campaign->getSelectedGroups())) > 0;
            }
        }
        return $this->_isAvailable[$campaign->getId()];
    }
    public function getCaption()
    {
        return 'Les contacts de certains groupes';
    }
    public function getCaptionHint()
    {
        return false;
        // return 'Vous permet de sélectionner certains groupes de contacts que vous avez déjà préparés.';
    }
    public function getDescription($campaign)
    {
        $selected = $campaign->getSelectedGroups();
        if (0 == count($selected)) {
            return false;
        }

        if (1 == count($selected)) {
            $group = array_shift($selected);
            $result = sprintf('Les contacts du groupe <span class="tag">%s&nbsp;', $group->getColoredName());
            $result .= link_to('<i class="icon-remove-sign"></i>', '@campaign-group-delete?campaignId=' . $campaign->getId() . '&id=' . $group->getId());
            $result .= '</span>';
            return $result;
        }
        $group = array_pop($selected);
        // $selected = array_reverse($selected);
        $result = sprintf(' et <span class="tag">%s</span>&nbsp;', $group->getColoredName()
             . link_to('<i class="icon-remove-sign"></i>', '@campaign-group-delete?campaignId=' . $campaign->getId() . '&id=' . $group->getId()));

        foreach($selected as /*ContactGroup*/$group) {
            $items[] = sprintf('<span class="tag">%s&nbsp;', $group->getColoredName())
             . link_to('<i class="icon-remove-sign"></i>', '@campaign-group-delete?campaignId=' . $campaign->getId() . '&id=' . $group->getId())
             . '</span>';
        }
        $result = 'Les contacts appartenant aux groupes ' . implode(', ', $items) . $result;
        return $result;
    }

    public function cleanup($campaign)
    {
        parent::cleanup($campaign);
        $campaign->deleteSelectedGroups();
    }

    public function getContactIds($campaign)
    {
        $result = array();
        foreach($campaign->getSelectedGroups() as/*(ContactGroup)*/ $ContactGroup) {
						$items = $ContactGroup->getActiveContactIds();
            if (is_array($items)) {
                $result = array_merge($result, $items);
            }
        }

        return $result;
    }

    private $_isNull = array();
    public function isNull($campaign)
    {
        if (!isset($this->_isNull[$campaign->getId()])) {
            $this->_isNull[$campaign->getId()] = (0 == count($campaign->getSelectedGroups()));
        }
        return $this->_isNull[$campaign->getId()];
    }

    public function renderAdminInterface(Campaign $campaign, sfWebRequest $sfRequest)
    {
        $sfContext = sfContext::getInstance();
        $sfUser = $sfContext->getUser();
        if (sfRequest::POST == $sfRequest->getMethod()) {
            $campaign->deleteSelectedGroups();
            $groups = $sfRequest->getParameter('groups');
            foreach($groups as $groupId) {
                $campaignGroup = new CampaignContactGroup();
                $campaignGroup->setCampaign($campaign);
                $campaignGroup->setContactGroupId($groupId);
                $campaignGroup->save();
            }
            // $this->campaign->setTargetType(Campaign::TARGET_GROUPS);
            $campaign->save();

            if (1 == count($groups)) {
            	$message = sprintf('<h4 class="alert-heading">Critères d\'envois modifiés</h4><p>Le groupe a été ajouté à la liste des critères.</p>');
            } else {
            	$message = sprintf('<h4 class="alert-heading">Critères d\'envois modifiés</h4><p>Les groupes ont étés ajoutés à la liste des critères.</p>');
            }


	        	$sfContext->getUser()->setFlash('notice_success', $message);
            $sfContext->getController()->redirect('@campaign_edit_targets?slug=' . $campaign->getSlug());
            return false;
        }

        $selectedGroupIds = array();
        $alreadySelectedGroups = $campaign->getSelectedGroups();
        foreach($alreadySelectedGroups as $group) {
            $selectedGroupIds[] = $group->getId();
        }

        $c = new Criteria();
        if (count($selectedGroupIds) > 0) {
            $c->add(ContactGroupPeer::ID, $selectedGroupIds, Criteria::NOT_IN);
        }
    		$c->add(ContactGroupPeer::IS_ARCHIVED, false);

        $c->addAscendingOrderByColumn(ContactGroupPeer::NAME);
        $groups = ContactGroupPeer::doSelect($c);

        if (0 == count($groups)) {
        	$message = sprintf('<h4 class="alert-heading">Critères d\'envois non modifiés</h4><p>Aucun groupe n\'est sélectionnable.</p>');
        	$sfContext->getUser()->setFlash('notice_error', $message);

            $sfContext->getController()->redirect('@campaign_edit_targets?slug=' . $campaign->getSlug());
            return false;
        }
        include_component('ContactProvider', $this->getProviderName(), array(
                'campaign' => $campaign,
                'providerName' => $this->getProviderName(),
                'groups' => $groups,
                'alreadySelectedGroups' => $alreadySelectedGroups,
                ));
    }
}

?>
