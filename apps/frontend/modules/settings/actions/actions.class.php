<?php

/**
 * settings actions.
 *
 * @package    catalyz_emailing
 * @subpackage settings
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class settingsActions extends sfActions
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
  	$this->userList = sfGuardUserProfilePeer::doSelectJoinsfGuardUser(new Criteria());

    return sfView::SUCCESS;
  }

	public function executeAdd($request)
	{
		$this->form =/*(sfForm)*/ new sfGuardUserProfileForm();

		if ($request->isMethod('post')) {
			$this->form->bind($request->getParameter('sf_guard_user_profile'));
			if ($this->form->isValid()) {
				$user = /*(sfGuardUserProfile)*/$this->form->save();

				$message = sprintf('<h4 class="alert-heading">Utilisateur ajouté</h4><p>L\'utilisateur "%s" a été ajouté.</p>',$user->getFullName());
				$this->getUser()->setFlash('notice_success', $message);

				$this->redirect('@settings');
			}
		}

		$title = sprintf('Utilisateurs / Ajouter un utilisateur %s', sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeEdit($request)
	{
		$critera = new Criteria();
		$critera->add(sfGuardUserProfilePeer::ID, $request->getParameter('id'));
		$this->user = sfGuardUserProfilePeer::doSelectOne($critera);

		$this->form =/*(sfForm)*/ new sfGuardUserProfileForm($this->user);

		if ($request->isMethod('post')) {
			$this->form->bind($request->getParameter('sf_guard_user_profile'));
			if ($this->form->isValid()) {
				$user = /*(sfGuardUserProfile)*/$this->form->save();

				$message = sprintf('<h4 class="alert-heading">Utilisateur modifié</h4><p>L\'utilisateur "%s" a été modifié.</p>',$user->getFullName());
				$this->getUser()->setFlash('notice_success', $message);

				$this->redirect('@settings');
			}
		}

		$title = sprintf('%s - Utilisateurs / Modification %s', $this->user->getFullName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeDelete($request)
	{
		$critera = new Criteria();
		$critera->add(sfGuardUserProfilePeer::ID, $request->getParameter('id'));
		$critera->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID, Criteria::LEFT_JOIN);
		$user = /*(sfGuardUser)*/sfGuardUserPeer::doSelectOne($critera);

		$this->forward404Unless($user); //l'utilisateur n'existe pas

		$message = sprintf('<h4 class="alert-heading">Utilisateur supprimé</h4><p>L\'utilisateur "%s" a été supprimé.</p>',$user->getProfile()->getFullname());
		$this->getUser()->setFlash('notice_success', $message);

		$user->delete();

		$this->redirect('@settings');
	}

	public function executeContactList(sfWebRequest $request)
	{
			$sf_user = $this->getUser();
			$default = CatalyzEmailing::getContactListDefaultColumns();

			$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
			$users = $czSettings->get(CatalyzSettings::COLUMN_CONFIGURATION_KEY);

			$user = empty($users[$sf_user->getProfile()->getId()])?$default:$users[$sf_user->getProfile()->getId()];

			$return = array();
			foreach ($user as $fieldName => $bool) {
				if (isset($default[$fieldName])) {
					$return[$fieldName] = $bool;
				}
				unset($default[$fieldName]);
			}

			foreach ($default as $fieldName => $bool) {
				$return[$fieldName] = $bool;
			}

			$this->fieldList = $return;

			if ($request->isMethod('post')) {
					$result = unserialize($request->getParameter('hidden'));
					$users[$sf_user->getProfile()->getId()] = $result;
					$czSettings->set(CatalyzSettings::COLUMN_CONFIGURATION_KEY, $users);

					$message = sprintf('<h4 class="alert-heading">Configuration modifée</h4><p>Les modifications ont été enregistrée.</p>');
					$this->getUser()->setFlash('notice_success', $message);

					$this->redirect('@settings_contact_list');
			}

			$title = sprintf('Modification des paramétres utilisateur %s', sfConfig::get('app_settings_default_suffix'));
			$this->getResponse()->setTitle($title);
			return sfView::SUCCESS;

	}

	public function executeCustomFields($request)
	{
		$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();

		if ($request->isMethod('post')) {
			$values = $request->getPostParameter('custom_contact', array());
			$cpt = 1;
			$return = array();
			foreach ($values as $label) {
				$return['custom' . $cpt++] = $label;
			}

			$czSettings->set(CatalyzSettings::CUSTOM_FIELDS, $return);


			$message = sprintf('<h4 class="alert-heading">Configuration modifée</h4><p>Les modifications ont été enregistrée.</p>');
			$this->getUser()->setFlash('notice_success', $message, FALSE);

		}

		$this->customFields = $czSettings->get(CatalyzSettings::CUSTOM_FIELDS, array());

		//region ancienne version
		if (empty($this->customFields)) {
			$oldVersion = $czSettings->get('contact.list.customsField', array());
			if (!empty($oldVersion)) {
				// on prend le premier l'admin a plus souvent l'id le plus petit;
				ksort($oldVersion);
				$datas = array_shift($oldVersion);
				foreach ($datas as $element) {
					if ($element != null) {
						$this->customFields[] = $element;
					}
				}
				// delete de l'element pour ne plus avoir les anciennes versions
				// $czSettings->set('contact.list.customsField', array());
			}
		}
		//endregion

		$title = sprintf('Gestion des champs personnalisés %s', sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeUnsubscribe(sfWebRequest $request)
	{
		$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
		$this->form = new UnsubscribedConfigurationForm();

		$groupCriteria = new Criteria();
		$groupCriteria->addAscendingOrderByColumn(ContactGroupPeer::NAME);
		$groupCriteria->add(ContactGroupPeer::IS_ARCHIVED, false);
		$groups = ContactGroupPeer::doSelect($groupCriteria);

		$temp = array();
		foreach ($groups as /*(ContactGroup)*/$group){
			$temp[$group->getColor()][$group->getId()] = $group;
		}

		krsort($temp);


		$this->groups = array();
		foreach ($temp as $color => $details){
			foreach ($details as $groupId =>$group){
				$this->groups[$groupId] = $group;
			}
		}

		if ($request->isMethod('post')) {

			$this->form->bind($request->getParameter('unsubscribed'));
			if ($this->form->isValid()) {
				$values = $this->form->getValues();

				$listes = $request->getParameter('unsubscrib', FALSE);
				if (!empty($listes['qualif_list_publication'])) {
					$listDetails = array();
					foreach ($listes['qualif_list_publication'] as $list){
						$listDetails[] = array('title' => $list['title'] , 'groups' => !empty($list['ids'])?$list['ids']:array());

					}

					$values['qualif_list_publication'] = serialize($listDetails);
				}

				$czSettings->set(CatalyzSettings::CUSTOM_UNSUBSCRIBED_CONFIGURATION, $values);

				$message = sprintf('<h4 class="alert-heading">Configuration modifée</h4><p>La configuration a été sauvegardée.</p>');
				$this->getUser()->setFlash('notice_success', $message);

			}else{

				$message = sprintf('<h4 class="alert-heading">La configuration comporte des erreurs.</h4><p>Veuillez vérifier les données saisies.</p>');
				$this->getUser()->setFlash('notice_error', $message);
			}
		}

		$this->defaults = $czSettings->get(CatalyzSettings::CUSTOM_UNSUBSCRIBED_CONFIGURATION, array());
		if (!empty($this->defaults)) {
			$this->form->setDefaults($this->defaults);
		}

		$title = sprintf('Gestion des désabonnement %s', sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);
	}

	public function executeChangeContactListLimit($request)
	{

		$czSettings = /*(CatalyzSettings)*/CatalyzSettings::instance();

		$usersLimits = $czSettings->get(CatalyzSettings::CUSTOM_LIMIT);
		$usersLimits[$this->getUser()->getProfile()->getid()] =  $request->getParameter('list_limit', 15);
		$czSettings->set(CatalyzSettings::CUSTOM_LIMIT, $usersLimits);

		$this->redirect('@contacts');
		exit();
	}
}
