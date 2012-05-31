<?php

class campaignsActions extends sfActions
{
	public function preExecute()
	{
		parent::preExecute();
		sfContext::getInstance()->getConfiguration()->loadHelpers( 'Url' );
	}

	public function executeIndex(sfWebRequest $request)
	{
		$this->selectedTab = $request->getParameter('type', 1);
		return sfView::SUCCESS;
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->dispatcher->notify(new sfEvent($this, 'czEmailing.before_create'));

		$this->form = new CampaignForm();
		if ($request->hasParameter('slug')) {
			$this->forward404Unless($template = /*(ContactGroup)*/CampaignTemplatePeer::retrieveBySlug($request->getParameter('slug')));
			$this->form->setDefault('template_id', $template->getId());
		}

		$title = sprintf('Campagnes / Création  %s', sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeHandleCreate($request)
	{
		$this->forward404Unless($request->isMethod('post'));

		$this->form = new CampaignForm($campaign = CampaignPeer::retrieveBySlug($request->getParameter('id')));

		$this->form->bind($request->getParameter('campaign'), $request->getFiles('campaign'));
		if ($this->form->isValid()) {
			$values = $request->getParameter('campaign');
			$files = $request->getFiles('campaign');

			if ($values['template_id'] == 'archive') {
				$this->executeCreateZip($this->form);
			} elseif ($values['template_id'] == 'url') {
				$this->executeCreateUrl($this->form);
			} else {
				$campaign = $this->form->save();
				sfContext::getInstance()->getUser()->setFlash('info', 'La campagne a été créée, vous pouvez désormais la configurer.');
				$this->redirect('@campaign_index?slug='.$campaign->getSlug());
				exit;
			}
		}

		$this->setTemplate('create');
		if ($campaign) {
			$title = sprintf('%s - Campagnes / Modification  %s', $campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		} else {
			$title = sprintf('Campagnes / Modification  %s', sfConfig::get('app_settings_default_suffix'));
		}

		$this->getResponse()->setTitle($title);
	}

	public function executeTemplates()
	{

		$criteria = new Criteria();
		$criteria->addAscendingOrderByColumn(CampaignTemplatePeer::NAME);
		$this->templates = CampaignTemplatePeer::doSelect($criteria);

		$title = sprintf('Campagnes / Gestion des modèles de campagnes  %s', sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeTemplateArchive($request) {
		$this->forward404Unless($template = /*(ContactGroup)*/CampaignTemplatePeer::retrieveBySlug($request->getParameter('slug')));

		$message = sprintf('<h4 class="alert-heading">Groupe archivé</h4><p>Le modèle "%s" a été archivé. <a href="%s" class="btn btn-mini">annuler</a></p>'
			,$template->getName(), url_for('@template_do_unarchive?slug='.$template->getSlug()));
		$this->getUser()->setFlash('notice_success', $message);
		$template->setIsArchived(TRUE);
		$template->save();

		$this->redirect('@campaigns_templates');
	}

	public function executeTemplateUnarchive($request) {
		$this->forward404Unless($template = /*(ContactGroup)*/CampaignTemplatePeer::retrieveBySlug($request->getParameter('slug')));

		$message = sprintf('<h4 class="alert-heading">Groupe restauré</h4><p>Le modèle "%s" a été restauré. <a href="%s" class="btn btn-mini">annuler</a></p>'
			,$template->getName(), url_for('@template_do_archive?slug='.$template->getSlug()));
		$this->getUser()->setFlash('notice_success', $message);
		$template->setIsArchived(FALSE);
		$template->save();

		$this->redirect('@campaigns_templates');
	}
}