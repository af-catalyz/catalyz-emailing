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
		sfContext::getInstance()->getConfiguration()->loadHelpers( 'Url' );
	}

  public function executeIndex(sfWebRequest $request)
  {
  	$this->forward404Unless($this->campaign = CampaignPeer::retrieveBySlug($request->getParameter('slug')));
  	$this->form = new CampaignEnveloppeForm($this->campaign);

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
			$this->getUser()->setFlash('notice_error', $sendErrorMessage);
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
			$this->getUser()->setFlash('notice_error', $sendErrorMessage);
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
			$this->getUser()->setFlash('notice_error', $sendErrorMessage);
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
}
