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

			$campaign = $this->form->save();
			$message = sprintf('<h4 class="alert-heading">Campagne crée</h4><p>La campagne "%s" a été crée, vous pouvez désormais la configurer.</p>',$campaign->getName());
			sfContext::getInstance()->getUser()->setFlash('notice_success', $message);
			$this->redirect('@campaign_index?slug='.$campaign->getSlug());
			exit;
		}

		$this->setTemplate('create');
		if ($campaign) {
			$title = sprintf('%s - Campagnes / Modification  %s', $campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		} else {
			$title = sprintf('Campagnes / Modification  %s', sfConfig::get('app_settings_default_suffix'));
		}

		$this->getResponse()->setTitle($title);
	}

	public function executeCreateFromZip(sfWebRequest $request)
	{
		$this->form = new CampaignFromZipForm();


		if ($request->isMethod('post')) {

			$this->form->bind($request->getParameter('campaign'), $request->getFiles('campaign'));
			if ($this->form->isValid()) {
				$archive = $this->form->getValue('archive');
				$name = CatalyzEmailing::slug($this->form->getValue('name'));

				$path = sprintf('%s/createFromZip/%s_%s%s', sfConfig::get('sf_data_dir'), date('Y-m-d-His'),
		    $name, $archive->getOriginalExtension());

				$archive->save($path, 0777, true, 0777, true);

				$rapport = CatalyzEmailing::extractZip($archive->getSavedName());
				$validate = CatalyzEmailing::validateZip($rapport['zipLocation'], $path);

				if (!empty($validate['html'])) {
					$content = file_get_contents($validate['html']);
					$updatedValues = CatalyzEmailing::updateHtml($content);

					$ct = new CampaignTemplate();
					$ct->setName($updatedValues['title']);
					$ct->setTemplate($updatedValues['content']);
					$ct->setPreviewFilename($validate['image']?$validate['image']:'/images/default_image.jpg');
					$ct->setIsArchived(0);
					$ct->save();

					$newPath = sprintf('%s/campaign-templates/%s', sfConfig::get('sf_upload_dir'), $ct->getId());
					if (!empty($validate['image'])) {
						$thumbnailPath = sprintf('/uploads/campaign-templates/%s', $ct->getId()) . str_ireplace(str_ireplace('.zip', '', $path), '', $validate['image']);
						$ct->setPreviewFilename($thumbnailPath);
						$ct->save();
					}
					$bool = CatalyzEmailing::smartCopy(dirname($validate['html']), $newPath, array('folderPermission' => 0777, 'filePermission' => 0777));

					$ct->updateImageUrl(true);

					$this->form->updateTemplateValue($ct->getId());

					sfToolkit::clearDirectory($rapport['zipLocation']);
					$campaign = /*(Campaign)*/$this->form->save();

					$message = sprintf('<h4 class="alert-heading">Campagne crée</h4><p>La campagne "%s" a été crée, vous pouvez désormais la configurer.</p>',$campaign->getName());
					sfContext::getInstance()->getUser()->setFlash('notice_success', $message);

					$this->redirect('@campaign_index?slug='.$campaign->getSlug());
					exit;
				} else {
					$message = sprintf('<h4 class="alert-heading">Campagne non crée</h4><p>La campagne n\'a pas été crée, l\'archive semble ne pas avoir de fichier html.</p>');
					sfContext::getInstance()->getUser()->setFlash('notice_error', $message);

					sfToolkit::clearDirectory($rapport['zipLocation']);
					$this->redirect('@campaigns_create_from_zip');
					exit;
				}
			}
		}

		$title = sprintf('Campagnes / Création depuis une archive %s', sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeCreateFromUrl(sfWebRequest $request)
	{
		$this->form = new CampaignFromUrlForm();

		if ($request->isMethod('post')) {

			$this->form->bind($request->getParameter('campaign'), $request->getFiles('campaign'));
			if ($this->form->isValid()) {

				$url = $this->form->getValue('url');
				$name = $this->form->getValue('name');

				$ct = CatalyzEmailing::extractFromUrl($url);

				$this->form->updateTemplateValue($ct->getId());

				$campaign =/*(Campaign)*/ $this->form->save();

				$message = sprintf('<h4 class="alert-heading">Campagne crée</h4><p>La campagne "%s" a été crée, vous pouvez désormais la configurer.</p>',$campaign->getName());
				sfContext::getInstance()->getUser()->setFlash('notice_success', $message);

				$this->redirect('@campaign_index?slug='.$campaign->getSlug());
			}

		}

		$title = sprintf('Campagnes / Création depuis une url %s', sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeTemplates()
	{

		$criteria = new Criteria();
		$criteria->addAscendingOrderByColumn(CampaignTemplatePeer::NAME);
		$templates = CampaignTemplatePeer::doSelect($criteria);

		$temp = array();
		foreach ($templates as /*(CampaignTemplate)*/$template){
			if ($template->getIsArchived()) {
				$temp['archived'][] =$template;
			}else{
				$temp['active'][] =$template;
			}
		}

		ksort($temp);

		$this->templates = array();
		foreach ($temp as $style => $tab){
			foreach ($tab as $template){
				$this->templates[]=$template;
			}
		}


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