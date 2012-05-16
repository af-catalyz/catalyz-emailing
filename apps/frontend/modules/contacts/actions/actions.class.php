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
		$User = $this->getUser();
		$usersViews = CatalyzSettings::instance()->get(CatalyzSettings::COLUMN_CONFIGURATION_KEY);
		$this->menu = empty($usersViews[$User->getProfile()->getid()])?$this->getDefaultColumns():$usersViews[$User->getProfile()->getid()];

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
		$message = sprintf('<h4 class="alert-heading">Campagne supprimée</h4><p>Le contact "%s" a été supprimé.</p>',$contact->getFullName());
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
		$criteria->add(CampaignContactPeer::ID, $request->getParameter('id'));
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $request->getParameter('campaignId'));
		$this->CampaignContacts =/*(CampaignContact)*/ CampaignContactPeer::doSelectOne($criteria);

		$crit = new Criteria();
		$crit->addDescendingOrderByColumn(CampaignClickPeer::CREATED_AT);
		$this->clicks = $this->CampaignContacts->getCampaignClicks($crit);

		$this->setLayout('public');
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
		for ($i = 1; $i <= sfConfig::get('app_fields_count'); $i++) {
			$fields['custom' . $i] = $fieldIndex++;
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

	protected function getDefaultColumns()
	{
		$default = array();
		$default['STATUS'] = true;
		$default['FULL_NAME'] = true;
		$default['COMPANY'] = true;
		$default['CREATED_AT'] = true;
		$default['GROUPS'] = true;

		$customFields = CatalyzEmailing::getCustomFields();
		foreach ($customFields as $key => $value) {
			$default[mb_strtoupper($key)] = false;
		}
		return $default;
	}
}
