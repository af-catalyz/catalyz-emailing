<?php

class groupsActions extends sfActions
{
	public function preExecute()
	{
		parent::preExecute();
		sfContext::getInstance()->getConfiguration()->loadHelpers( 'Url' );
	}

	public function executeIndex(sfWebRequest $request)
	{
		$criteria = new Criteria();
		$criteria->addAscendingOrderByColumn(ContactGroupPeer::NAME);
//		$criteria->add(ContactGroupPeer::IS_ARCHIVED,0);
		$this->contact_groupList = ContactGroupPeer::doSelect($criteria);

		$title = sprintf('Groupes de contacts %s', sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);

		$this->groupsContactsDetails = ContactGroupPeer::getContactsDetails();

		return sfView::SUCCESS;
	}

	public function executeCreate() {
		$this->form = new ContactGroupForm();

		$this->setTemplate('edit');

		$title = sprintf('Groupes de contacts / Création %s', sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeEdit($request) {
		$ContactGroup =/*(ContactGroup)*/ ContactGroupPeer::retrieveBySlug($request->getParameter('slug'));
		$this->form = new ContactGroupForm($ContactGroup);

		$title = sprintf('%s - Groupes de contacts / Modification %s', $ContactGroup->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeUpdate($request) {
		$this->forward404Unless($request->isMethod('post'));
		$contact_group = ContactGroupPeer::retrieveByPk($request->getParameter('id'));
		$this->form = new ContactGroupForm($contact_group);

		$this->form->bind($request->getParameter('contact_group'));
		if ($this->form->isValid()) {
			$contact_group = $this->form->save();

			if ($request->hasParameter('id')) {
				$message = sprintf('<h4 class="alert-heading">Groupe modifié</h4><p>Le groupe "%s" a été modifié.</p>',$contact_group->getName());
			}else{
				$message = sprintf('<h4 class="alert-heading">Groupe créé</h4><p>Le groupe "%s" a été créé.</p>',$contact_group->getName());
			}

			$this->getUser()->setFlash('notice_success', $message);
			$this->redirect('@groups');
		}

		$title = sprintf('%s - Groupes de contacts / Modification %s', $ContactGroup->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);

		$this->setTemplate('edit');
	}

	public function executeDelete($request) {
		$this->forward404Unless($contact_group = /*(ContactGroup)*/ContactGroupPeer::retrieveBySlug($request->getParameter('slug')));

		$message = sprintf('<h4 class="alert-heading">Groupe supprimé</h4><p>Le groupe "%s" a été supprimé.</p>',$contact_group->getName());
		$this->getUser()->setFlash('notice_success', $message);
		$contact_group->delete();

		$this->redirect('@groups');
	}

	public function executeExportGroup($request) {
		$this->forward404Unless($ContactGroup = /*(ContactGroup)*/ContactGroupPeer::retrieveBySlug($request->getParameter('slug')));

		$exporter = new ContactExporter(array('FirstName' => 0, 'LastName' => 1, 'Company' => 2, 'Email' => 3, 'StatusString' => 4));
		$exporter->start();
		$criteria = new Criteria();
		$criteria->addJoin(ContactPeer::ID, ContactContactGroupPeer::CONTACT_ID, Criteria::LEFT_JOIN);
		$criteria->addJoin(ContactContactGroupPeer::CONTACT_GROUP_ID, ContactGroupPeer::ID, Criteria::LEFT_JOIN);
		$criteria->add(ContactGroupPeer::SLUG, $request->getParameter('slug'));
		$contacts = ContactPeer::doSelect($criteria);

		foreach($contacts as $contact) {
			$exporter->addContact($contact);
		}

		$tempFilename = tempnam(sfConfig::get('sf_app_cache_dir'), 'export');
		$exporter->saveAsExcel2007($tempFilename);


		$response = $this->getResponse();
		$response->setContentType('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		$response->setHttpHeader('Content-Disposition', sprintf('attachment; filename=%s',
			sprintf('%s_%s.xlsx', CatalyzEmailing::slug($ContactGroup->getName()), date('Ymd'))));
		$response->setHttpHeader('Content-Length', filesize($tempFilename));
		$response->sendHttpHeaders();
		readfile($tempFilename);
		unlink($tempFilename);
		return sfView::NONE;
	}

	public function executeView($request) {
		$this->forward404Unless($this->ContactGroup =/*(ContactGroup)*/ ContactGroupPeer::retrieveBySlug($request->getParameter('slug')));

		$this->datas = $this->ContactGroup->getOverviewAcrossTimeDatas();

		$title = sprintf('%s - Groupes de contacts / Evolution du nombre de contact associé au groupe %s', $this->ContactGroup->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeArchive($request) {
		$this->forward404Unless($contact_group = /*(ContactGroup)*/ContactGroupPeer::retrieveBySlug($request->getParameter('slug')));

		$message = sprintf('<h4 class="alert-heading">Groupe archivé</h4><p>Le groupe "%s" a été archivé. <a href="%s" class="btn btn-mini">annuler</a></p>'
			,$contact_group->getName(), url_for('@group_do_unarchive?slug='.$contact_group->getSlug()));
		$this->getUser()->setFlash('notice_success', $message);
		$contact_group->setIsArchived(TRUE);
		$contact_group->save();

		$this->redirect('@groups');
	}

	public function executeUnArchive($request) {
		$this->forward404Unless($contact_group = /*(ContactGroup)*/ContactGroupPeer::retrieveBySlug($request->getParameter('slug')));

		$message = sprintf('<h4 class="alert-heading">Groupe réstauré</h4><p>Le groupe "%s" a été réstauré. <a href="%s" class="btn btn-mini">annuler</a></p>'
			,$contact_group->getName(), url_for('@group_do_archive?slug='.$contact_group->getSlug()));
		$this->getUser()->setFlash('notice_success', $message);
		$contact_group->setIsArchived(FALSE);
		$contact_group->save();

		$this->redirect('@groups');
	}
}
