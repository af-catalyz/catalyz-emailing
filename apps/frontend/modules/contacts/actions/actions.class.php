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
		$limit = empty($usersLimits[$User->getProfile()->getid()])?sfConfig::get('app_settings_default_limit'):$usersLimits[$User->getProfile()->getid()];

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
		$pager = new sfPropelPager('Contact', $limit);
		$pager->setCriteria($c);
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;

		return sfView::SUCCESS;
	}

	public function executeShow(sfWebRequest $request)
	{
		$this->forward404Unless($this->contact = ContactPeer::retrieveBySlug($request->getParameter('slug')));

		return sfView::SUCCESS;
	}

	public function executeAdd(sfWebRequest $request)
	{
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

			$this->redirect('contact/index');
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
