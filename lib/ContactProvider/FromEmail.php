<?php

class ContactProvider_FromEmail extends ContactProvider {
    public function getCaption()
    {
        return 'Certaines adresses email';
    }
    public function getCaptionHint()
    {
        return false;
        // return 'Vous permet de sélectionner certains groupes de contacts que vous avez déjà préparés.';
    }
    public function getDescription($campaign)
    {
        return false;
    }
    public function isNull($campaign)
    {
        return true;
    }
    public function renderAdminInterface(Campaign $campaign, sfWebRequest $sfRequest)
    {
        $defaultValues = '';
        $errors = array();
        if (sfRequest::POST == $sfRequest->getMethod()) {
            // $tokens = explode(',', $values['from_emails']);
            $tokens = preg_split('/[^a-zA-Z0-9_.\-@]+/', $sfRequest->getParameter('emails'));
            foreach ($tokens as $k => $email) {
                if (empty($email)) {
                    unset($tokens[$k]);
                }
                if (!CatalyzEmailing::ValidateEmail($email)) {
                    $errors[] = $email;
                }
            }
            if (!empty($this->errors)) {
                $defaultValues = $sfRequest->getParameter('emails');
            }
            $count = 0;
            foreach ($tokens as $email) {
                $contactCriteria = new Criteria();
                $contactCriteria->add(ContactPeer::EMAIL, $email);
                $contact = ContactPeer::doSelectOne($contactCriteria);
                if (!$contact) {
                    $contact = new Contact();
                    $contact->setEmail($email);
                    $contact->save();
                }
                $count += CampaignContactElementPeer::createCompaignContactIfNotExist($campaign->getId(), $contact->getId());
            }
            $sfContext = sfContext::getInstance();
            $sfUser = $sfContext->getUser();
            if (1 == $count) {
            	$message = sprintf('<h4 class="alert-heading">Critères d\'envois modifiés</h4><p>1 contact a été ajouté.</p>', $count);
            } else {
            	$message = sprintf('<h4 class="alert-heading">Critères d\'envois modifiés</h4><p>%d contacts ont étés ajoutés.</p>', $count);
            }

        		$sfContext->getUser()->setFlash('notice_success', $message);
            $sfContext->getController()->redirect('@campaign_edit_targets?slug=' . $campaign->getSlug());
            return false;
            // $this->campaign->setTargetType(Campaign::TARGET_GROUPS);
            // $this->campaign->save();
        }
        include_component('ContactProvider', $this->getProviderName(), array(
                'campaign' => $campaign,
                'providerName' => $this->getProviderName(),
                'errors' => $errors,
                'defaultValues' => $defaultValues));
    }

	public function getContactIds($campaign){
		return array(); // ne renvoie jamais rien, ils sont ajoutés à la liste des emails de la base de données
	}
}

?>