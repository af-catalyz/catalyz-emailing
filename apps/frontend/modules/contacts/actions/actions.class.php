<?php

/**
 * contacts actions.
 *
 * @package    catalyz_emailing
 * @subpackage contacts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactsActions extends sfActions
{
	public function preExecute()
	{
		parent::preExecute();
		sfContext::getInstance()->getConfiguration()->loadHelpers( 'Url' );
	}

	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->ContactsGroupListOverview = ContactPeer::getContactsGroupList();

		$User = $this->getUser();
		//		$User->getAttributeHolder()->remove('criteria');
		$usersViews = CatalyzSettings::instance()->get(CatalyzSettings::COLUMN_CONFIGURATION_KEY);
		$this->menu = empty($usersViews[$User->getProfile()->getid()])?CatalyzEmailing::getContactListDefaultColumns():$usersViews[$User->getProfile()->getid()];

		$usersLimits = CatalyzSettings::instance()->get(CatalyzSettings::CUSTOM_LIMIT);
		$this->limit = empty($usersLimits[$User->getProfile()->getid()])?sfConfig::get('app_settings_default_limit'):$usersLimits[$User->getProfile()->getid()];

		$c = new Criteria();
		$c->addJoin(ContactPeer::ID, ContactContactGroupPeer::CONTACT_ID, Criteria::LEFT_JOIN);
		$c->addJoin(ContactPeer::ID, CampaignContactPeer::CONTACT_ID, Criteria::LEFT_JOIN);
		if ($request->isMethod('post')) {
			$values = $request->getPostParameters();
			foreach (array('Keywords' => 'searchInput', 'Groups' => 'groupCheckbox', 'Statuts' => 'statutCheckbox') as $type => $filterElement) {
				if (array_key_exists($filterElement, $values)) {
					$function = 'addSearchWith' . $type;
					$c = ContactPeer::$function($c, $values[$filterElement]);
				} else {
					$User->getAttributeHolder()->remove($type);
				}
			}

			$User->setAttribute('criteria', $c);

			//si on ne cherche que sur le champs recherche et qu'il s'agit d'une adresse email valide
			if (!empty($values['searchInput']) && empty($values['groupCheckbox']) && $values['statutCheckbox']['campaignId'] == '') {
				$query = $values['searchInput'];

				if (preg_match('/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i', $query)) {
					$contact = ContactPeer::retreiveByEmail($query);
					if ($contact) {
						$this->cleanSession();
						$this->redirect('contact/show?id='.$contact->getId());
					}
				}
			}
		} else {
			if ($this->getRequestParameter('clean')) {
				$this->cleanSession();
			}
			if ($User->hasAttribute('criteria')) {
				$c = $User->getAttribute('criteria');
			}
			if ($this->getRequestParameter('group')) {
				$c = ContactPeer::addSearchWithGroups($c, array($this->getRequestParameter('group')));
			}
			if ($User->hasAttribute('Statuts')) {
				$c = ContactPeer::addSearchWithStatuts($c, $User->getAttribute('Statuts'));
			}
		}

		$this->sort = $this->getRequestParameter('sort', 'De');
		$this->column = $this->getRequestParameter('column', 'CREATED_AT');
		if ($this->sort) {
			foreach ($c->getOrderByColumns() as $orderBy) {
				$c->clearOrderByColumns($orderBy);
			}


			$method = 'add' . $this->sort . 'scendingOrderByColumn';
			if ($this->column == 'FULL_NAME') {
				$c->$method(ContactPeer::LAST_NAME);
				$c->$method(ContactPeer::FIRST_NAME);
			}else{
				$c->$method(ContactPeer::$this->column);
			}


			$User->setAttribute('criteria', $c);
		} else {
			$c->addAscendingOrderByColumn(ContactPeer::LAST_NAME);
		}
		$c->setDistinct();
		$pager = new sfPropelPager('Contact', $this->limit);
		$pager->setCriteria($c);
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;

		return sfView::SUCCESS;
	}

	public function executeShow(sfWebRequest $request)
	{

		$this->contact = ContactPeer::retrieveBySlug($request->getParameter('slug'));
		$this->forward404Unless($this->contact);

		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CONTACT_ID, $this->contact->getId());
		$criteria->addJoin(CampaignContactPeer::CAMPAIGN_ID, CampaignPeer::ID);
		$criteria->addJoin(CampaignContactPeer::CAMPAIGN_ID, CampaignPeer::ID);
		$criteria->addDescendingOrderByColumn(CampaignContactPeer::SENT_AT);
		$this->CampaignContacts = CampaignContactPeer::doSelect($criteria);



		return sfView::SUCCESS;
	}

	public function executeAdd(sfWebRequest $request)
	{
		$this->form = new ContactForm();
		return sfView::SUCCESS;
	}

	public function executeEdit($request)
	{
		$this->forward404Unless($contact = ContactPeer::retrieveBySlug($request->getParameter('slug')));

		$this->form = new ContactForm($contact);

		$title = sprintf('%s - Contacts / Modification %s', $contact->getFullName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeUpdate($request)
	{
		$this->forward404Unless($request->isMethod('post'));

		$this->form = new ContactForm($contact = ContactPeer::retrieveBySlug($request->getParameter('slug')));

		$this->form->bind($request->getParameter('contact'));
		if ($this->form->isValid()) {
			$contact =/*(Contact)*/ $this->form->getObject();

			if ($contact->getId() != null) {
				if ($contact->getEmail() != $this->form->getValue('email')) {
					$contact->setStatus(Contact::STATUS_NEW);
				}
			}
			$contact = $this->form->save();

			if ($request->hasParameter('slug')) {
				$message = sprintf('<h4 class="alert-heading">Contact modifié</h4><p>Le contact "<a href="%s">%s</a>" a été modifié.</p>',url_for('@contact_show?slug='.$contact->getSlug()),$contact->getFullName());
			}else{
				$message = sprintf('<h4 class="alert-heading">Contact créé</h4><p>Le contact "<a href="%s">%s</a>" a été créé.</p>',url_for('@contact_show?slug='.$contact->getSlug()),$contact->getFullName());
			}

			$this->getUser()->setFlash('notice_success', $message);

			$this->redirect('@contacts');
			return false;
		}

		if ($contact) {
			$title = sprintf('%s - Contacts / Modification %s', $contact->getFullName(), sfConfig::get('app_settings_default_suffix'));
		} else {
			$title = sprintf('Contacts / Modification %s', sfConfig::get('app_settings_default_suffix'));
		}

		$this->getResponse()->setTitle($title);

		$this->setTemplate('edit');
	}

	public function executeDelete($request)
	{
		$this->forward404Unless($contact = ContactPeer::retrieveBySlug($request->getParameter('slug')));
		$message = sprintf('<h4 class="alert-heading">Contact supprimé</h4><p>Le contact "%s" a été supprimé.</p>',$contact->getFullName());
		$this->getUser()->setFlash('notice_success', $message);
		$contact->delete();

		$this->redirect('@contacts');
	}

	public function executeReintroduce($request)
	{
		$this->forward404Unless($contact = ContactPeer::retrieveBySlug($request->getParameter('slug')));

		$contact->setStatus(Contact::STATUS_NEW);
		$contact->save();

		$message = sprintf('<h4 class="alert-heading">Contact réactivé</h4><p>Le contact a été réactivé.</p>');
		$this->getUser()->setFlash('notice_success', $message);

		$this->redirect('@contact_show?slug=' . $contact->getSlug());
	}

	public function executeDisplayClicks($request)
	{
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CONTACT_ID, $request->getParameter('id'));
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $request->getParameter('campaignId'));
		$CampaignContact =/*(CampaignContact)*/ CampaignContactPeer::doSelectOne($criteria);

		$crit = new Criteria();
		$crit->addDescendingOrderByColumn(CampaignClickPeer::CREATED_AT);
		$clicks = $CampaignContact->getCampaignClicks($crit);

		return $this->renderPartial('contacts/modalClicks', array('clicks' => $clicks, 'CampaignContact' => $CampaignContact));
	}

	public function executeUnsubscribe($request)
	{
		$contact = ContactPeer::retrieveByPK($request->getParameter('id'));
		$this->forward404Unless($contact);

		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CONTACT_ID, $request->getParameter('id'));
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $request->getParameter('campaignId'));
		$CampaignContact =/*(CampaignContact)*/ CampaignContactPeer::doSelectOne($criteria);

		$this->forward404Unless($CampaignContact);

		$CampaignContact->setUnsubscribedAt(time());
		$CampaignContact->save();

		$contact->setStatus(Contact::STATUS_UNSUBSCRIBED);
		$contact->save();

		$message = sprintf('<h4 class="alert-heading">Contact désinscrit</h4><p>Le contact "%s" a été désinscrit.</p>',$contact->getFullName());
		$this->getUser()->setFlash('notice_success', $message);

		$this->redirect('@contact_show?slug=' . $contact->getSlug());
	}

	public function executeExport($request)
	{
		$fieldIndex = 0;
		$fields = array();
		$fields['FirstName'] = $fieldIndex++;
		$fields['LastName'] = $fieldIndex++;
		$fields['Company'] = $fieldIndex++;
		$fields['Email'] = $fieldIndex++;
		$fields['StatusString'] = $fieldIndex++;

		$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
		foreach($czSettings->get(CatalyzSettings::CUSTOM_FIELDS) as $fieldKey => $label){
			$fields[$fieldKey] = $fieldIndex++;
		}

		$exporter =/*(ContactExporter)*/ new ContactExporter($fields);
		$exporter->start();
		$User = sfContext::getInstance()->getUser();
		$c =/*(Criteria)*/ new Criteria();
		$c->addJoin(ContactPeer::ID, ContactContactGroupPeer::CONTACT_ID, Criteria::LEFT_JOIN);
		$c->addJoin(ContactPeer::ID, CampaignContactPeer::CONTACT_ID, Criteria::LEFT_JOIN);

		if ($User->hasAttribute('criteria')) {
			$c = $User->getAttribute('criteria');
		}

		$c->setLimit(null);
		$c->setOffset(0);

		$c->setDistinct();
		foreach(ContactPeer::doSelect($c) as $contact) {
			$exporter->addContact($contact);
		}


		$tempFilename = tempnam(sfConfig::get('sf_app_cache_dir'), 'export');
		$exporter->saveAsExcel2007($tempFilename);

		$response = $this->getResponse();
		$response->setContentType('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		$response->setHttpHeader('Content-Disposition', 'attachment; filename=contacts.xlsx');
		$response->setHttpHeader('Content-Length', filesize($tempFilename));
		$response->sendHttpHeaders();
		readfile($tempFilename);
		unlink($tempFilename);
		return sfView::NONE;
	}

	public function executeExportSampleFile($request)
	{
		$fieldIndex = 0;
		$fields = array();
		$fields['FIRST_NAME'] = $fieldIndex;
		$fields['LAST_NAME'] = $fieldIndex++;
		$fields['COMPANY'] = $fieldIndex++;
		$fields['EMAIL'] = $fieldIndex++;

		$customFields = CatalyzEmailing::getCustomFields();

		$sheetTitle = sprintf('Exemple de fichier d\'import');

		$this->spreadsheet = new sfPhpExcel();
		$this->spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

		$this->spreadsheet->setActiveSheetIndex(0);
		$this->activeSheet = $this->spreadsheet->getActiveSheet();
		$this->activeSheet->setTitle($sheetTitle);

		$letter = 'A';
		foreach ($fields as $fieldName => $caption){
			$this->activeSheet->setCellValueExplicit($letter.'1', ContactPeer::getFieldLabel($fieldName));
			$letter =  chr(ord($letter)+1);
		}

		foreach ($customFields as $fieldName => $caption){
			$this->activeSheet->setCellValueExplicit($letter.'1', ContactPeer::getfieldLabel($fieldName).' (optionnel)');
			$letter =  chr(ord($letter)+1);
		}

		$objWriter = new PHPExcel_Writer_Excel5($this->spreadsheet);

		$tempFilename = tempnam(sfConfig::get('sf_app_cache_dir'), 'export');
		$objWriter->save($tempFilename);

		$response = $this->getResponse();
		$response->setContentType('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		$response->setHttpHeader('Content-Disposition', sprintf('attachment; filename=%s',sprintf('%s_%s.xls', CatalyzEmailing::slug($sheetTitle), date('Ymd'))));
		$response->setHttpHeader('Content-Length', filesize($tempFilename));
		$response->sendHttpHeaders();
		readfile($tempFilename);
		unlink($tempFilename);
		return sfView::NONE;
	}

	public function executeAjax(sfWebRequest $request)
	{
		$this->campaignId = $request->getParameter('id');
		$this->authors = ContactPeer::retrieveForSelect($request->getParameter('q'), $request->getParameter('id'), $request->getParameter('selected'));
	}

	public function executeAjaxSortContactList(sfWebRequest $request){
		$User = $this->getUser();
		$usersViews = CatalyzSettings::instance()->get(CatalyzSettings::COLUMN_CONFIGURATION_KEY);
		$menu = empty($usersViews[$User->getProfile()->getid()])?CatalyzEmailing::getContactListDefaultColumns():$usersViews[$User->getProfile()->getid()];

		$usersLimits = CatalyzSettings::instance()->get(CatalyzSettings::CUSTOM_LIMIT);
		$limit = empty($usersLimits[$User->getProfile()->getid()])?sfConfig::get('app_settings_default_limit'):$usersLimits[$User->getProfile()->getid()];

		$c = /*(Criteria)*/new Criteria();
		$c->addJoin(ContactPeer::ID, ContactContactGroupPeer::CONTACT_ID, Criteria::LEFT_JOIN);
		$c->addJoin(ContactPeer::ID, CampaignContactPeer::CONTACT_ID, Criteria::LEFT_JOIN);
		if ($request->isMethod('post')) {
			$values = $request->getPostParameters();
			foreach (array('Keywords' => 'searchInput', 'Groups' => 'groupCheckbox', 'Statuts' => 'statutCheckbox') as $type => $filterElement) {
				if (array_key_exists($filterElement, $values) && $values[$filterElement] != '') {
					$function = 'addSearchWith' . $type;
					$c = ContactPeer::$function($c, $values[$filterElement]);
				} else {
					$User->getAttributeHolder()->remove($type);
				}
			}

			$User->setAttribute('criteria', $c);

			//si on ne cherche que sur le champs recherche et qu'il s'agit d'une adresse email valide
			if (!empty($values['searchInput']) && empty($values['groupCheckbox']) && $values['statutCheckbox']['campaignId'] == '') {
				$query = $values['searchInput'];

				if (preg_match('/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i', $query)) {
					$contact = ContactPeer::retreiveByEmail($query);
					if ($contact) {
						$this->cleanSession();
						$this->redirect('contact/show?id='.$contact->getId());
					}
				}
			}
		}

		$this->sort = $this->getRequestParameter('sort', 'De');
		$this->column = $this->getRequestParameter('column', 'CREATED_AT');
		if ($this->sort) {
			foreach ($c->getOrderByColumns() as $orderBy) {
				$c->clearOrderByColumns($orderBy);
			}


			$method = 'add' . $this->sort . 'scendingOrderByColumn';
			if ($this->column == 'FULL_NAME') {
				$c->$method(ContactPeer::LAST_NAME);
				$c->$method(ContactPeer::FIRST_NAME);
			}else{
				$c->$method(ContactPeer::$this->column);
			}


			$User->setAttribute('criteria', $c);
		} else {
			$c->addAscendingOrderByColumn(ContactPeer::LAST_NAME);
		}
		$c->setDistinct();


		$contacts = ContactPeer::doSelect($c);

		$pager = new sfPropelPager('Contact', $limit);
		$pager->setCriteria($c);
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();

		return $this->renderPartial('contacts/contactList', array(
					'menu' => $menu,
					'pager' => $pager,
					'ContactsGroupListOverview' => ContactPeer::getContactsGroupList(),
					'limit' => $limit,
					'sort' => $this->sort,
					'column' => $this->column
					));
	}

	static public function cleanSession()
	{
		$User = sfContext::getInstance()->getUser();
		$User->getAttributeHolder()->remove('criteria');

		foreach (array('Keywords', 'Groups', 'Statuts', 'CampaignId') as $attributeName) {
			if ($User->hasAttribute($attributeName)) {
				$User->getAttributeHolder()->remove($attributeName);
			}
		}
	}

	public function executeImport(sfWebRequest $request)
	{
		$this->form = new ContactImportForm();
		return sfView::SUCCESS;
	}

	public function executeContactInDb($request)
	{
		$this->setTemplate('import');
		$this->error = '';
		$this->forward404Unless($request->isMethod('post'));
		$this->form = new ContactImportForm();
		$this->form->bind($request->getParameter('contact_import'), $request->getFiles('contact_import'));

		if ($this->form->isValid()) {
			$importer = ContactImporter::instance();
			$importer->createDefaultConfiguration();
			$this->form->initializeContactImporter($importer);

			$excel =/*(sfValidatedFileContactImport)*/ $this->form->getValue('file');

			sfContext::getInstance()->getUser()->setAttribute('importerGroups', $importer->getGroups());
			sfContext::getInstance()->getUser()->setAttribute('file', $excel);

			for($rowIndex = 0; $rowIndex < $excel->numRows; $rowIndex++) {
				try {
					$importer->ContactsInDb($excel->datas[$rowIndex]);
				}
				catch(Exception $e) {
					$errors[] = $rowIndex + 2;
					var_dump($e->getMessage());
				}
			}

			$this->count = $importer->getInDbCount();

			if (($this->count > 0) && ($this->form->getValue('operation') != ContactImportForm::OPTION_GROUP_NONE)) {
				$this->setTemplate('importStep');
			} else {
				$this->executeImportProcess($request);
			}
		} else {
			$this->setTemplate('import');
		}

		$title = sprintf('Contacts / Import %s', sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeImportProcess($request)
	{
		$this->forward404Unless($request->isMethod('post'));
		$type = $request->getParameter('type', ContactImporter::IMPORT_ALL);

		$user = sfContext::getInstance()->getUser();
		$excel =/*(sfValidatedFileContactImport)*/ $user->getAttribute('file');
		$importer = ContactImporter::instance();

		$fields = $importer->getFields();
		if (empty($fields)) {
			$importer->createDefaultConfiguration();
			$importer->setGroups(sfContext::getInstance()->getUser()->getAttribute('importerGroups', array()));
		}

		$this->form =/*(ContactImportForm)*/ new ContactImportForm();

		$this->errors = array();
		$this->errorRows = array();
		for($rowIndex = 0; $rowIndex < $excel->numRows; $rowIndex++) {
			if ($excel->datas[$rowIndex] != null) {
				try {
					$contact = $importer->processContact($excel->datas[$rowIndex], $type);
				}
				catch(Exception $e) {
					$this->errorRows[] = $excel->datas[$rowIndex];
					$this->errors[] = $rowIndex + 2;
				}
			}
		}

		$this->ko_message = FALSE;
		$this->ok_message = FALSE;

		$importer->commit();

		if (count($this->errors) == 0) {

			$message = sprintf('<h4 class="alert-heading">Importation terminée.</h4><p>%s</p><a class="btn" href="%s">Importer un autre fichier</a>',$importer->getStatusMessage(), url_for('@contact_import'));
			$this->getUser()->setFlash('notice_success', $message);

			$user->getAttributeHolder()->remove('file');
			$user->getAttributeHolder()->remove('importerGroups');
			$this->redirect('@contacts');
		} else {
			if ($importer->getImportedCount() == 0 && $importer->getUpdatedCount() == 0) {
				$this->ko_message = sprintf('<h4 class="alert-heading">Importation non réalisée.</h4><p>Aucun des contacts présent dans votre fichier n\'est valide, vous devez les corriger avant de réimporter votre liste.</p>');
			} else {
				$this->filePath = CatalyzEmailing::createContactImportErrorLogExcel($this->errorRows);
				$this->ok_message = sprintf('<h4 class="alert-heading">Importation terminée.</h4><p>%1$s</p>',$importer->getStatusMessage());
			}



			//$importer->rollback();
		}

		$this->setTemplate('importErrors');

		$title = sprintf('Contacts / Import %s', sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}
}