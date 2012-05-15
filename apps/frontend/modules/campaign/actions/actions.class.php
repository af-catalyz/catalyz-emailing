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
  	$this->forward404Unless($this->campaign = CampaignPeer::retrieveByPk($request->getParameter('slug')));

    return sfView::SUCCESS;
  }

	public function executeArchive($request)
	{
		$this->forward404Unless($this->campaign = CampaignPeer::retrieveByPk($request->getParameter('slug')));
		$this->campaign->setIsArchived(true);
		$this->campaign->save();

		$message = sprintf('<h4 class="alert-heading">Campagne archivée</h4><p>La campagne "<a href="javascript://">%s</a>" a été archivée. <a href="%s" class="btn btn-mini">annuler</a></p>',
			$this->campaign->getName(),
			url_for('@campaign_do_unarchive?slug='.$this->campaign->getId())
			);

		$this->getUser()->setFlash('notice_success', $message);
		$this->redirect('@campaigns');
	}

	public function executeUnarchive($request)
	{
		$this->forward404Unless($this->campaign = CampaignPeer::retrieveByPk($request->getParameter('slug')));
		$this->campaign->setIsArchived(false);
		$this->campaign->save();

		$message = sprintf('<h4 class="alert-heading">Campagne réstaurée</h4><p>La campagne "<a href="javascript://">%s</a>" a été restaurée. <a href="%s" class="btn btn-mini">annuler</a></p>',
			$this->campaign->getName(),
			url_for('@campaign_do_archive?slug='.$this->campaign->getId())
			);

		$this->getUser()->setFlash('notice_success', $message);
		$this->redirect('@campaigns');
	}

	public function executeDelete($request)
	{
		$this->forward404Unless($campaign = CampaignPeer::retrieveByPk($request->getParameter('slug')));
		$message = sprintf('<h4 class="alert-heading">Campagne supprimée</h4><p>La campagne "%s" a été supprimée.</p>',$campaign->getName());
		$this->getUser()->setFlash('notice_success', $message);
		$campaign->delete();

		$this->redirect('@campaigns');
	}

  public function executeCopy($request)
  {
    $this->forward404Unless($originalCampaign = CampaignPeer::retrieveByPK($request->getParameter('slug')));
    $this->form = new CampaignCopyForm($originalCampaign);
    return sfView::SUCCESS;
  }

	public function executeHandleCopy($request)
	{
		$this->forward404Unless($request->isMethod('post'));

		$formValues = $request->getParameter('campaign_copy', array());
		$originalCampaign = CampaignPeer::retrieveByPK($formValues['copy_from']);
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
			$this->redirect('@campaign_index?slug='.$newCampaign->getId());
			exit;
		}

		$this->setTemplate('copy');
	}

	public function executeEdit($request)
	{
		$this->forward404Unless($this->campaign = CampaignPeer::retrieveByPk($request->getParameter('slug')));

	}
}
