<?php

/**
 * campaign actions.
 *
 * @package    catalyz_emailing
 * @subpackage campaign
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class campaignActions extends sfActions
{
	public function preExecute()
	{
		parent::preExecute();
		sfContext::getInstance()->getConfiguration()->loadHelpers( 'Url');
	}

  public function executeIndex(sfWebRequest $request)
  {
  	$this->forward404Unless($this->campaign = CampaignPeer::retrieveBySlug($request->getParameter('slug')));
  	$this->form = new CampaignEnveloppeForm($this->campaign);

  	$sendErrorMessage = sprintf('<h4 class="alert-heading">Campagne deja envoyée</h4><p>La configuration de la campagne "%s" ne peut plus être modifiée.</p>', $this->campaign->getName() );

  	if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
  		$this->getUser()->setFlash('notice_error', $sendErrorMessage, FALSE);
  	}

  	if ($request->isMethod('post')) {
  		$this->form->bind($request->getParameter('campaign'));
  		if ($this->form->isValid()) {

				$this->form->save();

  			$message = sprintf('<h4 class="alert-heading">Campagne sauvegardée</h4><p>La configuration de la campagne a été sauvegardée.</p>');
  			$this->getUser()->setFlash('notice_success', $message);
  		}
  	}

    return sfView::SUCCESS;
  }

	public function executeArchive($request)
	{
		$this->forward404Unless($this->campaign = /*(Campaign)*/CampaignPeer::retrieveBySlug($request->getParameter('slug')));
		$this->campaign->setIsArchived(true);
		$this->campaign->save();

		$message = sprintf('<h4 class="alert-heading">Campagne archivée</h4><p>La campagne "<a href="%s">%s</a>" a été archivée. <a href="%s" class="btn btn-mini">annuler</a></p>',
			$this->campaign->getCatalyzUrl(),
			$this->campaign->getName(),
			url_for('@campaign_do_unarchive?slug='.$this->campaign->getSlug())
			);

		$this->getUser()->setFlash('notice_success', $message);
		$this->redirect('@campaigns');
	}

	public function executeUnarchive($request)
	{
		$this->forward404Unless($this->campaign = CampaignPeer::retrieveBySlug($request->getParameter('slug')));
		$this->campaign->setIsArchived(false);
		$this->campaign->save();

		$message = sprintf('<h4 class="alert-heading">Campagne réstaurée</h4><p>La campagne "<a href="%s">%s</a>" a été restaurée. <a href="%s" class="btn btn-mini">annuler</a></p>',
			$this->campaign->getCatalyzUrl(),
			$this->campaign->getName(),
			url_for('@campaign_do_archive?slug='.$this->campaign->getSlug())
			);

		$this->getUser()->setFlash('notice_success', $message);
		$this->redirect('@campaigns');
	}

	public function executeDelete($request)
	{
		$this->forward404Unless($campaign = CampaignPeer::retrieveBySlug($request->getParameter('slug')));
		$message = sprintf('<h4 class="alert-heading">Campagne supprimée</h4><p>La campagne "%s" a été supprimée.</p>',$campaign->getName());
		$this->getUser()->setFlash('notice_success', $message);
		$campaign->delete();

		$this->redirect('@campaigns');
	}

  public function executeCopy($request)
  {
    $this->forward404Unless($originalCampaign = CampaignPeer::retrieveBySlug($request->getParameter('slug')));
    $this->form = new CampaignCopyForm($originalCampaign);
    return sfView::SUCCESS;
  }

	public function executeHandleCopy($request)
	{
		$this->forward404Unless($request->isMethod('post'));

		$formValues = $request->getParameter('campaign_copy', array());
		$originalCampaign = CampaignPeer::retrieveBySlug($formValues['copy_from']);
		$this->forward404Unless($originalCampaign);

		$this->form = new CampaignCopyForm($originalCampaign);

		$this->form->bind($request->getParameter('campaign_copy'));
		if ($this->form->isValid()) {
			$newCampaign =/*(Campaign)*/ $originalCampaign->copy();
			$newCampaign->setName($this->form->getValue('name'));
			$newCampaign->setScheduleType(Campaign::SCHEDULING_NONE);
			$newCampaign->setScheduledAt(null);
			$newCampaign->setStatus(Campaign::STATUS_DRAFT);
			$newCampaign->setCreatedAt(time());
			$newCampaign->setUpdatedAt(time());
			$newCampaign->setCreatedBy($this->getUser()->getGuardUser()->getProfile()->getId());
			$newCampaign->setIsArchived(false);
			$newCampaign->save();

			$message = sprintf('<h4 class="alert-heading">Campagne dupliquée</h4><p>La campagne a été créée en reprenant toutes les informations de la campagne "%s", vous pouvez désormais la configurer.</p>',
				$originalCampaign->getName()
			);

			$this->getUser()->setFlash('notice_success', $message);
			$this->redirect('@campaign_index?slug='.$newCampaign->getSlug());
			exit;
		}

		$this->setTemplate('copy');
	}

	public function executeEdit($request)
	{
		$this->forward404Unless($this->campaign = CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$sendErrorMessage = sprintf('<h4 class="alert-heading">Campagne deja envoyée</h4><p>La configuration de la campagne "%s" ne peut plus être modifiée.</p>', $this->campaign->getName() );

		if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
			$this->getUser()->setFlash('notice_error', $sendErrorMessage, FALSE);
		}

		$this->form = new CampaignContentForm($this->campaign);

		if ($request->isMethod('post')) {

			$this->form->bind($request->getParameter('campaign'));
			$this->campaign->fromArray($this->form->getValues(), BasePeer::TYPE_FIELDNAME);

			if (!$this->form->isValid()) {
				$this->campaign->setStatus(Campaign::STATUS_ERROR);
			} else {
				$this->campaign->updateStatus();
				$this->campaign->getCampaignDeliveryManager()->prepareCampaignDelivery();
			}

            $this->campaign->save();

			if ($this->campaign->getStatus() == Campaign::STATUS_ERROR) {
				$message = "La configuration de la campagne a été sauvegardée, mais des erreurs sont présentes.\nLa campagne ne pourra commencer qu\'une fois ces erreurs corrigées.\nVous pouvez consulter les erreurs dans chacune des sections ci-dessous.";
				$this->getUser()->setFlash('notice_error', $message, FALSE);
			} else {
				$message = sprintf('<h4 class="alert-heading">Campagne sauvegardée</h4><p>La configuration de la campagne a été sauvegardée.</p>');
				$this->getUser()->setFlash('notice_success', $message);

				try {
					if (!$this->campaign->canConnectToMailbox()) {
						$this->getUser()->setFlash('notice_error', 'Les "Informations de connexion à la boite aux lettres" ne permettent pas de se connecter. Merci vérifier qu\'elles sont correctes pour vous permettre de bénéficier des statistiques d\'emails invalides.', FALSE);
					}
				}
				catch(Exception $e) {
					$this->getUser()->setFlash('notice_error', $e->getMessage(), FALSE);
				}
			}
		}

	}

	public function executeResend(sfWebRequest $request)
	{
		$criteria = new Criteria();
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID);
		$criteria->add(CampaignContactPeer::ID, $request->getParameter('id'));
		$CampaignContact =/*($CampaignContact)*/ CampaignContactPeer::doSelectOne($criteria);
		$this->forward404Unless($CampaignContact);

		$Campaign =/*(Campaign)*/ $CampaignContact->getCampaign();
		$this->forward404Unless($Campaign);

		$CampaignDeliveryManager = new CampaignDeliveryManager($Campaign);
		if ($CampaignDeliveryManager->sendToCampaignContact($CampaignContact)) {
			$message = sprintf('<h4 class="alert-heading">Campagne renvoyée</h4><p>La campagne a été renvoyée à %s</p>',$CampaignContact->getContact()->getFullName());
			$this->getUser()->setFlash('notice_success', $message);
		} else {
			$message = sprintf('<h4 class="alert-heading">Erreur lors de l\'envoi de la campagne</h4><p>Une erreur est survenue lors de la tentative d\'envoi de la campagne à %s</p>',$CampaignContact->getContact()->getFullName());
			$this->getUser()->setFlash('notice_error', $message);
		}

		$this->redirect('@contact_show?slug=' . $CampaignContact->getContact()->getSlug());
	}

	public function executeView($request)
	{
		sfConfig::set('sf_web_debug', false);

		list($email, $campaignId) = Campaign::extractKeyInformation($request->getParameter('key'));
		$campaign =/*(Campaign)*/ CampaignPeer::retrieveByPK($campaignId);
		$this->forward404Unless($campaign);

		Campaign::LogView($campaignId, $email, $request->getHttpHeader('User-Agent'));

		$criteria = new Criteria();
		$criteria->add(ContactPeer::EMAIL, $email);
		$contact =/*(Contact)*/ ContactPeer::doSelectOne($criteria);

		if (!$contact) {
			// create a temporary user
			$contact = new Contact();
			$contact->setEmail($email);
		}

		$CampaignDeliveryManager = $campaign->getCampaignDeliveryManager();
		$macros = $CampaignDeliveryManager->getMacrosForContact($contact);

		$this->getResponse()->setContent($CampaignDeliveryManager->prepareContentForEmail($email, $macros, true));
		$this->setLayout(false);
		return sfView::NONE;
	}

	public function executeGoogleAnalytics($request){
		$this->forward404Unless($this->campaign = CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$sendErrorMessage = sprintf('<h4 class="alert-heading">Campagne deja envoyée</h4><p>La configuration de la campagne "%s" ne peut plus être modifiée.</p>', $this->campaign->getName() );

		if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
			$this->getUser()->setFlash('notice_error', $sendErrorMessage, FALSE);
		}

		$this->form = new CampaignAnalyticsForm($this->campaign);

		$defaults = array();
		foreach (array('id' => 'getId','google_analytics_enabled' => 'getGoogleAnalyticsEnabled','google_analytics_source' => 'getGoogleAnalyticsSource','google_analytics_medium' => 'getGoogleAnalyticsMedium','google_analytics_campaign_type' => 'getGoogleAnalyticsCampaignType') as $caption => $field){
			if ($this->campaign->$field != null) {
				$defaults[$caption] = $this->campaign->$field;
			}
		}

		if (!empty($defaults)) {
			$this->form->setDefaults($defaults);
		}

		if ($request->isMethod('post')) {
			if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
				$this->getUser()->setFlash('notice_error', $sendErrorMessage);
			} else {
				$this->form->bind($request->getParameter('campaign'));
				if ($this->form->isValid()) {
					$values = $request->getParameter('campaign');

					$values['google_analytics_enabled'] = (bool)isset($values['google_analytics_enabled']);
					$this->campaign->fromArray($values, BasePeer::TYPE_FIELDNAME);
					$this->campaign->save();


					$message = sprintf('<h4 class="alert-heading">Campagne sauvegardée</h4><p>La configuration de la campagne a été sauvegardée.</p>');
					$this->getUser()->setFlash('notice_success', $message);
				}
			}
		}

		$title = sprintf('%s - Intégration Google Analytics %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
		return sfView::SUCCESS;
	}

	public function executeLinks($request){
		$this->forward404Unless($this->campaign = CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$sendErrorMessage = sprintf('<h4 class="alert-heading">Campagne deja envoyée</h4><p>La configuration de la campagne "%s" ne peut plus être modifiée.</p>', $this->campaign->getName() );

		if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
			$this->getUser()->setFlash('notice_error', $sendErrorMessage, FALSE);
		}

		if ($request->isMethod('post')) {
			if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
				$this->getUser()->setFlash('notice_error', $sendErrorMessage);
			} else {

					//region links
					$links = $request->getParameter('link');
					foreach ($links as $id => $value) {
						$conn = Propel::getConnection(CampaignLinkPeer::DATABASE_NAME);
						$selectCriteria = new Criteria();
						$selectCriteria->add(CampaignLinkPeer::ID, $id);
						$updateCriteria = new Criteria();
						$updateCriteria->add(CampaignLinkPeer::GOOGLE_ANALYTICS_TERM, $value);

						BasePeer::doUpdate($selectCriteria, $updateCriteria, $conn);
					}
					//endregion links


					$message = sprintf('<h4 class="alert-heading">Campagne sauvegardée</h4><p>La configuration de la campagne a été sauvegardée.</p>');
					$this->getUser()->setFlash('notice_success', $message);

			}
		}

		$title = sprintf('%s - Intégration Google Analytics %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
		return sfView::SUCCESS;
	}

	public function executeReturnErrors(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign = CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$sendErrorMessage = sprintf('<h4 class="alert-heading">Campagne deja envoyée</h4><p>La configuration de la campagne "%s" ne peut plus être modifiée.</p>', $this->campaign->getName() );

		if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
			$this->getUser()->setFlash('notice_error', $sendErrorMessage, FALSE);
		}

		$this->form = new CampaignReturnErrorsForm($this->campaign);

		if ($request->isMethod('post')) {
			if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
				$this->getUser()->setFlash('notice_error', $sendErrorMessage);
			} else {
				$this->form->bind($request->getParameter('campaign'));
				if ($this->form->isValid()) {
					$values = $request->getParameter('campaign');
					$this->form->save();

					$message = sprintf('<h4 class="alert-heading">Campagne sauvegardée</h4><p>La configuration de la campagne a été sauvegardée.</p>');
					$this->getUser()->setFlash('notice_success', $message);
				}
			}
		}

		$title = sprintf('%s - Gestion de la configuration %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
		return sfView::SUCCESS;
	}

	public function executeScheduling(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign = CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$sendErrorMessage = sprintf('<h4 class="alert-heading">Campagne deja envoyée</h4><p>La configuration de la campagne "%s" ne peut plus être modifiée.</p>', $this->campaign->getName() );

		if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
			$this->getUser()->setFlash('notice_error', $sendErrorMessage, FALSE);
		}

		$this->form = new CampaignEnvoiForm($this->campaign);

		if ($request->isMethod('post')) {
			if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
				$this->getUser()->setFlash('notice_error', $sendErrorMessage);
			} else {
				$this->form->bind($request->getParameter('campaign'));
				if ($this->form->isValid()) {
					//$values = $request->getParameter('campaign');

					$this->campaign->updateStatus();
					$this->form->save();

					$message = sprintf('<h4 class="alert-heading">Campagne sauvegardée</h4><p>La configuration de la campagne a été sauvegardée.</p>');
					$this->getUser()->setFlash('notice_success', $message);
				}
			}
		}

		$title = sprintf('%s - Gestion Gestion de l\'envoi %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
		return sfView::SUCCESS;
	}

	public function executeEditHeader(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign = CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$sendErrorMessage = sprintf('<h4 class="alert-heading">Campagne deja envoyée</h4><p>La configuration de la campagne "%s" ne peut plus être modifiée.</p>', $this->campaign->getName() );

		if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
			$this->getUser()->setFlash('notice_error', $sendErrorMessage, FALSE);
		}

		$this->form = new CampaignHeaderForm($this->campaign);

		if ($request->isMethod('post')) {
			if ($this->campaign->getStatus() >= Campaign::STATUS_SENDING) {
				$this->getUser()->setFlash('notice_error', $sendErrorMessage);
			} else {
				$this->form->bind($request->getParameter('campaign'));
				if ($this->form->isValid()) {
					$values = $request->getParameter('campaign');
					$this->form->save();

					$message = sprintf('<h4 class="alert-heading">Campagne sauvegardée</h4><p>La configuration de la campagne a été sauvegardée.</p>');
					$this->getUser()->setFlash('notice_success', $message);
				}else{
					$message = sprintf('<h4 class="alert-heading">Campagne non sauvegardée</h4><p>La configuration de la campagne n\'a pas été sauvegardée.</p>');
					$this->getUser()->setFlash('notice_error', $message);
				}

				$this->redirect('@campaign_index?slug='.$this->campaign->getSlug());
			}
		}



	}

	public function executeTargets(sfWebRequest $request)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url', 'Asset', 'Tag'));

		$this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug'));

		$targetCount = $this->campaign->getTargetContactItems();
		$count = count($targetCount['items']);
		if (1 == $count) {
			$this->targetCountStr = sprintf('1 contact', $count);
		} else {
			$this->targetCountStr = sprintf('%d contacts', $count);
		}
		if (1 == $targetCount['duplicates']) {
			$this->targetCountStr .= sprintf(' (1 redondant)');
		} elseif ($targetCount['duplicates'] > 0) {
			$this->targetCountStr .= sprintf(' (%d redondants)', $targetCount['duplicates']);
		}
		// $this->targetCountStr = print_r($this->campaign->getCountTarget(), true);
		$providerStrings = array();
		foreach(CatalyzEmailing::getContactProviders() as $providerName => $provider) {
			if ($s = $provider->getDescription($this->campaign)) {
				$providerStrings[$s] = $providerName;
			}
		}
		ksort($providerStrings);
		$this->providerStrings = $providerStrings;
	}

	public function executeTargetAdd(sfWebRequest $request)
	{
		$this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug'));

		$this->providers = array();
		foreach(CatalyzEmailing::getContactProviders() as $k =>/*(ContactProvider)*/ $provider) {
			// var_dump($provider->getCaption());
			// var_dump($provider->isAvailable($this->campaign));
			if ($provider->isAvailable($this->campaign)) {
				$this->providers[$provider->getCaption()] = $provider;
			}
		}

		ksort($this->providers);

		return sfView::SUCCESS;
	}

	public function executeTargetAddProvider(sfWebRequest $request)
	{
		$this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug'));
		$providerName = $request->getParameter('provider');
		$this->provider = CatalyzEmailing::getProviderInstance($providerName);
		// $this->providerName = $providerName;
		return sfView::SUCCESS;
	}

	public function executeTargetCleanupProvider(sfWebRequest $request)
	{
		$this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug'));
		$provider = CatalyzEmailing::getProviderInstance($request->getParameter('provider'));
		$provider->cleanup($this->campaign);
		$this->campaign->save();

		$message = sprintf('<h4 class="alert-heading">Restriction modifié</h4><p>Le critère a été supprimé.</p>');
		$this->getUser()->setFlash('notice_success', $message);
		$this->redirect('@campaign_edit_targets?slug=' . $this->campaign->getSlug());
	}//

	public function executeTargetCleanup(sfWebRequest $request)
	{
		$this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug'));
		foreach(CatalyzEmailing::getContactProviders() as $provider) {
			$provider->cleanup($this->campaign);
		}
		$this->campaign->save();

		$message = sprintf('<h4 class="alert-heading">Restriction modifié</h4><p>Toutes les restrictions d\'envoi de votre campagne ont étés supprimées.</p>');
		$this->getUser()->setFlash('notice_success', $message);
		$this->redirect('@campaign_edit_targets?slug=' . $this->campaign->getSlug());
	}

	public function executeContactDelete(sfWebRequest $request)
	{
		$this->forward404Unless($campaign = /*(Campaign)*/CampaignPeer::retrieveByPK($request->getParameter('campaignId')));

		$c = new Criteria();
		$c->add(CampaignContactElementPeer::CAMPAIGN_ID, $campaign->getId());
		$c->add(CampaignContactElementPeer::CONTACT_ID, $request->getParameter('id'));
		$Contact = CampaignContactElementPeer::doSelectOne($c);
		$Contact->delete();

		$message = sprintf('<h4 class="alert-heading">Contact retiré</h4><p>Le contact a été retiré de la liste des destinataires de cette campagne</p>');
		$this->getUser()->setFlash('notice_success', $message);
		$this->redirect('@campaign_edit_targets?slug=' . $campaign->getSlug());
	}

	public function executeGroupDelete(sfWebRequest $request)
	{

		$this->forward404Unless($campaign = /*(Campaign)*/CampaignPeer::retrieveByPK($request->getParameter('campaignId')));

		$c = new Criteria();
		$c->add(CampaignContactGroupPeer::CAMPAIGN_ID, $request->getParameter('campaignId'));
		$c->add(CampaignContactGroupPeer::CONTACT_GROUP_ID, $request->getParameter('id'));
		$Contact = CampaignContactGroupPeer::doSelectOne($c);
		$Contact->delete();

		$CampaignGroup = ContactGroupPeer::retrieveByPK($request->getParameter('id'));

		$message = sprintf('<h4 class="alert-heading">Groupe retiré</h4><p>Les contacts du groupe <b>%s</b> ont été supprimés de la liste des destinataires de la campagne <b>%s</b></p>',
		$CampaignGroup->getName(), $campaign->getName());
		$this->getUser()->setFlash('notice_success', $message);



		$this->redirect('@campaign_edit_targets?slug=' . $campaign->getSlug());
	}

	public function executeTest($request)
	{
		sfConfig::set('sf_web_debug', false);


		$POST_campaign = $request->getPostParameter('campaign');
		$campaign =/*(Campaign)*/ CampaignPeer::retrieveByPK($POST_campaign['id']);

		if (!empty($POST_campaign['content'])) {
			if (is_array($POST_campaign['content'])) {
				$campaign->setContent(czWidgetFormWizard::asXml($POST_campaign['content']));
			}else{
				$campaign->setContent($POST_campaign['content']);
			}
		}

		if (!empty($POST_campaign['subject'])) {
			$campaign->setSubject($POST_campaign['subject']);
		}

		if (!empty($POST_campaign['from_email'])) {
			$campaign->setFromEmail($POST_campaign['from_email']);
		}
		if (!empty($POST_campaign['from_name'])) {
			$campaign->setFromName($POST_campaign['from_name']);
		}

		switch ($POST_campaign['test_type']) {
			case Campaign::OPTION_TEST_USER:
				$email = $this->getUser()->getProfile()->getEmail();
				$campaign->sendTo($email);
				$responseContent = 'La campagne vous a été envoyée à l\'adresse ' . $email;
				break;
			case Campaign::OPTION_TEST_LIST:
				$result = $campaign->sendTo($POST_campaign['test_user_list']);
				$responseContent = $this->getTestSendMessage($result);
				break;
			case Campaign::OPTION_TEST_GROUP:
				$result = $campaign->sendToTestGroups();
				$responseContent = $this->getTestSendMessage($result);
				break;
			default:
				throw new Exception('Unkown test_type: ' . $POST_campaign['test_type']);
		} // switch
		$this->setLayout(false);
		$this->getResponse()->setContent(date('H:i:s') . ' ' . $responseContent);
		return sfView::NONE;
	}

	protected function getTestSendMessage($result)
	{
		switch (count($result['success'])) {
			case 0:
				$responseContent = 'Aucune adresse n\'a été trouvé dans la liste fournie, aucun email n\'a été envoyé';
				break;
			case 1:
				$responseContent = 'La campagne a été envoyée à l\'adresse ' . $result['success'][0];
				break;
			default:
				$responseContent = sprintf('La campagne a été envoyée aux %d adresses fournies (%s) ', count($result['success']), implode(', ', $result['success']));
		} // switch
		return $responseContent;
	}

	public function executeUnsubscribe($request)
	{
		$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
		$configuration = $czSettings->get(CatalyzSettings::CUSTOM_UNSUBSCRIBED_CONFIGURATION, array());

		if (empty($configuration)) {
			list($email, $campaignId) = Campaign::extractKeyInformation($request->getParameter('key'));
			$this->executeUnsubscribeProcess($request, $email, $campaignId);
		}else{
			$this->executeUnsubscribeStep($request);
		}
	}

	public function executeUnsubscribeProcess($request, $email, $campaignId, $formValues = array())
	{
		sfConfig::set('sf_web_debug', false);

		$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
		$configuration = $czSettings->get(CatalyzSettings::CUSTOM_UNSUBSCRIBED_CONFIGURATION, array());

		$cantFindUser = '<p>Impossible de vous désinscrire de la lettre d\'informations parce que vous ne faites pas partie des destinataires de cette dernière. Merci de contacter son auteur pour corriger le problème.</p>';

		$raison = NULL;
		if (!empty($formValues['raison'])) {
			$raison = $formValues['raison'];
		}

		$listes = array();
		if (!empty($configuration['qualif_list_enabled'])) {
			$listes = unserialize($configuration['qualif_list_publication']);
		}

		$selectedList = FALSE;
		$changeContactStatus = TRUE;

		$log = NULL;

		if (isset($formValues['qualif_list_publication'])) {
			$selectedList = $formValues['qualif_list_publication'];
			if (count($selectedList) != count($listes)) {
				$changeContactStatus = FALSE;
			}

			foreach ($selectedList as $list){
				$log[$list]= $listes[$list]['title'];
			}
			$log = serialize($log);
		}
		$CampaignContact = Campaign::LogView($campaignId, $email, $request->getHttpHeader('User-Agent'), false, true, $raison, $changeContactStatus, $log);

		//supprimer le lien entre le contact et les groupes de chaque liste
		if ($CampaignContact && $selectedList) {
			foreach ($selectedList as $listId){
				foreach ($listes[$listId]['groups'] as $groupId => $bool){
					$cCg = BaseContactContactGroupPeer::retrieveByPK($CampaignContact->getContactId(), $groupId);
					if ($cCg) {
						$cCg->delete();
					}
				}
			}
		}

		//region envoi du mail si necessaire
		if (!empty($configuration['notif_enabled']) && $configuration['notif_enabled']) {
			$this->sendWebmasterMail($configuration['notif_recipient'], $configuration['notif_subject'], $email, $campaignId, $formValues, $listes);
		}
		//endregion

		if (empty($configuration)) {
			if (!$CampaignContact) {
				$this->message = $cantFindUser;
			} else {
				$this->message = '<p>Vous avez été désinscrit de la lettre d\'information.</p>';
			}
		}else{
			if ($configuration['conf_type'] == 2) {
				header('Location: ' . $configuration['conf_url']);
				exit();
			}else{
				if (!$CampaignContact) {
					$this->message = $cantFindUser;
				} else {
					$this->message = $configuration['conf_content'];
				}
			}
		}

		$this->setTemplate('unsubscribe');
		$this->setLayout('public');
		return sfView::SUCCESS;
	}

	public function executeUnsubscribeStep($request)
	{
		$this->setTemplate('unsubscribeStep');
		$this->setLayout('public');
		$this->form = new UnsubscribedClientForm();
		$defaults = $this->form->getDefaults();

		$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
		$configuration = $czSettings->get(CatalyzSettings::CUSTOM_UNSUBSCRIBED_CONFIGURATION, array());

		if (empty($configuration['qualif_enabled']) ) { // on affiche direct le message dans le layout Success
			list($email, $campaignId) = Campaign::extractKeyInformation($request->getParameter('key'));
			$this->executeUnsubscribeProcess($request, $email, $campaignId);
		}else{

			if ($request->hasParameter('key')) {
				list($email, $campaignId) = Campaign::extractKeyInformation($request->getParameter('key'));
				$defaults['email'] = $email;
				$defaults['campaignId'] = $campaignId;
			}

			$this->form->setDefaults($defaults);


			if ($request->isMethod("post")) {
				$this->form->bind($request->getParameter('unsubscribed'));
				if ($this->form->isValid()) {
					$values = $this->form->getValues();
					$email =  $values['email'];
					$campaignId =  $values['campaignId'];

					$this->executeUnsubscribeProcess($request, $email, $campaignId, $values);
				}
			}
			$this->configuration = $configuration;
		}


		return sfView::SUCCESS;
	}

	private function sendWebmasterMail($recipient, $subject, $contactEmail, $campaignId, $values = array(), $listes_disponibles= array())
	{

		$recipientList = czValidatorEmailList::getEmails($recipient);

		$campaign = CampaignPeer::retrieveByPK($campaignId);

		$criteria = new Criteria();
		$criteria->add(ContactPeer::EMAIL, $contactEmail);
		$Contact =/*(Contact)*/ ContactPeer::doSelectOne($criteria);

		$macroList = array();
		$macroList['#FIRSTNAME#'] = $Contact->getFirstName();
		$macroList['#LASTNAME#'] = $Contact->getLastName();
		$macroList['#EMAIL#'] = $Contact->getEmail();
		$macroList['#SUBJECT#'] = $campaign->getName();
		$macroList['#REASON#'] = !empty($values['raison'])?$values['raison']:'non prÃ©cisÃ©';

		$macroKeys = array_keys($macroList);
		$macroVals = array_values($macroList);

		$subject = str_ireplace($macroKeys, $macroVals, $subject);

		sfLoader::loadHelpers('Partial');
		$messageContent =  get_partial('campaign/unsubscribeEmail', array('formValues' => $values ,'Contact' => $Contact, 'campaign' => $campaign, 'listes_disponibles' => $listes_disponibles));

		$mailer = new Swift(new Swift_Connection_SMTP(sfConfig::get('app_mail_server', 'localhost'), sfConfig::get('app_mail_port', 25)), false, Swift::ENABLE_LOGGING);
		$from = new Swift_Address('no-reply@catalyz-emailing.com', 'Catalyz Emailing');
		$messageObject = new Swift_Message($subject);
		$messageObject->attach(new Swift_Message_Part($messageContent, 'text/html', '8bit', 'UTF-8'));

		$recipients = new Swift_RecipientList();
		foreach ($recipientList as $recipient){
			$recipients->addTo($recipient);
		}

		$sent = $mailer->send($messageObject, $recipients, $from);
		$mailer->disconnect();
		return TRUE;
	}

	public function executeCreateRelance($request)
	{
		$this->forward404Unless($originalCampaign = /*(Campaign)*/CampaignPeer::retrieveBySlug($request->getParameter('slug')));
		$this->forward404Unless($request->isMethod('post'));

		$newCampaign = /*(Campaign)*/ $originalCampaign->copy(true);
		$newCampaign->setName(sprintf('%s (Relance)', $originalCampaign->getName()));
		$newCampaign->setScheduleType(Campaign::SCHEDULING_NONE);
		$newCampaign->setScheduledAt(null);
		$newCampaign->setStatus(Campaign::STATUS_DRAFT);
		$newCampaign->setCreatedAt(time());
		$newCampaign->setUpdatedAt(time());
		$newCampaign->setCreatedBy($this->getUser()->getGuardUser()->getProfile()->getId());
		$newCampaign->setIsArchived(false);
		$newCampaign->save();

		//region delete old targets
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $newCampaign->getId());
		CampaignContactPeer::doDelete($criteria);

		foreach(CatalyzEmailing::getContactProviders() as $provider) {
			$provider->cleanup($newCampaign);
		}
		//endregion

		if ($request->getParameter('type', campaign::RELANCE_NO_OPEN) == campaign::RELANCE_NO_OPEN) {
			$newCampaign->setProviderSettings('CampaignNotOpen', $originalCampaign->getId());
		}else{
			$newCampaign->setProviderSettings('CampaignOpen', $originalCampaign->getId());
		}
		$newCampaign->save();

		$message = sprintf('<h4 class="alert-heading">Campagne dupliquée</h4><p>La campagne a été créée en reprenant toutes les informations de la campagne "%s", vous pouvez désormais la configurer.</p>',
				$originalCampaign->getName()
			);

		$this->getUser()->setFlash('notice_success', $message);
		$this->redirect('@campaign_index?slug='.$newCampaign->getSlug());


		return sfView::SUCCESS;
	}
}
