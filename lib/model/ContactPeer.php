<?php


/**
 * Skeleton subclass for performing query and update operations on the 'contact' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * jeu. 03 mai 2012 11:26:43 CEST
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class ContactPeer extends BaseContactPeer {
	static public function getFieldLabel($field)
	{
		$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
		$customFields = $czSettings->get('contact.customsField', array());

		switch ($field) {
			case 'FULL_NAME':
				return 'Nom complet';
			case 'FIRST_NAME':
				return 'Prénom';
			case 'LAST_NAME':
				return 'Nom';
			case 'COMPANY':
				return 'Société';
			case 'EMAIL':
				return 'Email';
			case 'CREATED_AT':
				return 'Ajouté le';
			case 'UPDATED_AT':
				return 'Modifié le';
			case 'STATUS':
				return 'Statut';
			case 'GROUPS':
				return 'Groupes';
			default:
				if (preg_match('/^CUSTOM([1-9][0-9]?)$/', $field, $tokens)) {
					$tokens[1] = (int)$tokens[1];
					if ($tokens[1] > 0 && $tokens[1] <= sfConfig::get('app_fields_count')) {
						if (!empty($customFields['custom' . $tokens[1]])) {
							return $customFields['custom' . $tokens[1]];
						} else {
							return sfConfig::get('app_fields_custom' . $tokens[1], 'Champ personnalisé n°' . $tokens[1]);
						}
					}
				}

				return $field;
		} // switch
	}

	public static function retrieveBySlug($slug)
	{
		$criteria = new Criteria(ContactPeer::DATABASE_NAME);
		$criteria->add(ContactPeer::SLUG, $slug);

		$v = ContactPeer::doSelectOne($criteria);

		return $v;
	}

	static function getContactsGroupList()
	{
		$return =array();
		$criteria = new Criteria();
		$criteria->addJoin(ContactGroupPeer::ID, ContactContactGroupPeer::CONTACT_GROUP_ID);
		$criteria->add(ContactGroupPeer::IS_ARCHIVED, false);
		$elements = ContactContactGroupPeer::doSelectJoinContactGroup($criteria);

		foreach ($elements as  /*(ContactContactGroup)*/ $ContactContactGroup){
			$group = /*(ContactGroup)*/$ContactContactGroup->getContactGroup();
			$return[$ContactContactGroup->getContactId()][$group->getId()]= html_entity_decode($group->getColoredName(true));
		}

		ksort($return);
		return $return;
	}

	static public function retrieveForSelect($q, $CampaignId , $selected = null)
	{
		$authors = array();
		if ($q != '') {
			$c = new Criteria();
			$c->add(CampaignContactPeer::CAMPAIGN_ID, $CampaignId);
			$contacts = CampaignContactPeer::doSelect($c);

			$notInTab = array();

			foreach ($contacts as $contact) {
				$notInTab[] = $contact->getId();
			}

			if ($selected) {
				foreach (explode(',', $selected) as $element) {
					if ((int)$element > 0) {
						$notInTab[] = (int)$element;
					}
				}
			}

			$criteria = new Criteria();

			$criterion = $criteria->getNewCriterion(ContactPeer::LAST_NAME, '%' . $q . '%', Criteria::LIKE);
			$criterion->addOr($criteria->getNewCriterion(ContactPeer::EMAIL, '%' . $q . '%', Criteria::LIKE));
			$criteria->add($criterion);

			$criterion->addOr($criteria->getNewCriterion(ContactPeer::FIRST_NAME, '%' . $q . '%', Criteria::LIKE));
			$criteria->add($criterion);

			//            $criterion->addOr($criteria->getNewCriterion(ContactPeer::EXTERNAL_REFERENCE, '%' . $q . '%', Criteria::LIKE));
			$criteria->add($criterion);

			for ($i = 1; $i <= sfConfig::get('app_fields_count'); $i++) {
				$criterion->addOr($criteria->getNewCriterion(constant('ContactPeer::CUSTOM' . $i), '%' . $q . '%', Criteria::LIKE));
				$criteria->add($criterion);
			}

			$criteria->add(ContactPeer::ID, $notInTab, Criteria::NOT_IN);
			$criteria->addAscendingOrderByColumn(ContactPeer::LAST_NAME);
			$criteria->setLimit(15);

			foreach (ContactPeer::doSelect($criteria) as $author) {
				$authors[$author->getId()] = sprintf('%s (%s)', (string) $author->getLastName(), (string) $author->getEmail()) ;
			}
		}
		return $authors;
	}

	static function getFiltersData(){
		$groups = ContactGroupPeer::getGroups();

		$criteria = new Criteria();
		$criteria->addDescendingOrderByColumn(CampaignPeer::UPDATED_AT);
		$criteria->add(CampaignTemplatePeer::IS_ARCHIVED, FALSE);
//		$criteria->add(CampaignPeer::IS_ARCHIVED, 0);
		$criteria->add(CampaignPeer::STATUS, Campaign::STATUS_SENDING, Criteria::GREATER_EQUAL);
		$a_campaigns = CampaignPeer::doSelect($criteria);

		$campaigns = array();
		foreach ($a_campaigns as /*(Campaign)*/$campaign){
			$campaigns[$campaign->getId()] = $campaign->getName();
		}

		return array('groups' => $groups ,'campaigns' => $campaigns);

	}

	static public function addSearchWithKeywords($criteria, $word)
	{
		if ($word != '') {
			$criterion = $criteria->getNewCriterion(ContactPeer::LAST_NAME, '%' . $word . '%', Criteria::LIKE);
			$criterion->addOr($criteria->getNewCriterion(ContactPeer::FIRST_NAME, '%' . $word . '%', Criteria::LIKE));
			$criterion->addOr($criteria->getNewCriterion(ContactPeer::EMAIL, '%' . $word . '%', Criteria::LIKE));
			$criterion->addOr($criteria->getNewCriterion(ContactPeer::COMPANY, '%' . $word . '%', Criteria::LIKE));

			for ($i = 1; $i <= sfConfig::get('app_fields_count'); $i++) {
				$criterion->addOr($criteria->getNewCriterion(constant('ContactPeer::CUSTOM' . $i), '%' . $word . '%', Criteria::LIKE));
			}

			$criteria->add($criterion);

			sfContext::getInstance()->getUser()->setAttribute('Keywords', $word);
		}
		return $criteria;
	}

	static public function addSearchWithGroups($criteria, $groups)
	{
		if (array_sum($groups) == 0) { //aucun groupe choisi
			$criteria->add(ContactContactGroupPeer::CONTACT_GROUP_ID, null, Criteria::ISNULL);
		}else{
			$criteria->addJoin(ContactPeer::ID, ContactContactGroupPeer::CONTACT_ID);
			$criteria->add(ContactContactGroupPeer::CONTACT_GROUP_ID, $groups, Criteria::IN);
		}

		sfContext::getInstance()->getUser()->setAttribute('Groups', $groups);
		return $criteria;
	}

	public static function addSearchWithStatuts(Criteria $criteria, $status)
	{
		$User = /*(sfUser)*/sfContext::getInstance()->getUser();

		$campaignIdBounced = null;
		$campaignIdUnsubscribed = null;

		if (isset($status['campaignIdBounced'])) {
			if ($status['campaignIdBounced'] != 'null') {
				$campaignIdBounced = $status['campaignIdBounced'];
			}
			unset($status['campaignIdBounced']);
		} elseif ($User->hasAttribute('campaignIdBounced')) {
			$campaignIdBounced = $User->getAttribute('campaignIdBounced');
		}

		if (isset($status['campaignIdUnsubscribed'])) {
			if ($status['campaignIdUnsubscribed'] != 'null') {
				$campaignIdUnsubscribed = $status['campaignIdUnsubscribed'];
			}
			unset($status['campaignIdUnsubscribed']);
		} elseif ($User->hasAttribute('campaignIdUnsubscribed')) {
			$campaignIdUnsubscribed = $User->getAttribute('campaignIdUnsubscribed');
		}

		sfContext::getInstance()->getUser()->setAttribute('Statuts', $status);

		if (empty($status)) {
			$criteria->add(ContactPeer::STATUS, 0, Criteria::EQUAL);
		}
		elseif(count($status) == 1){ // UN SEUL CHOIX
			$statusId = array_shift($status);
			$criteria->add(ContactPeer::STATUS, $statusId, Criteria::IN);
			switch($statusId){
				case Contact::STATUS_BOUNCED:
					if ($campaignIdBounced != null) {
						$criteria->addAnd(CampaignContactPeer::CAMPAIGN_ID, $campaignIdBounced, Criteria::EQUAL);
					}
					break;
				case Contact::STATUS_UNSUBSCRIBED:
					if ($campaignIdUnsubscribed != null) {
						$criteria->addAnd(CampaignContactPeer::CAMPAIGN_ID, $campaignIdUnsubscribed, Criteria::EQUAL);
					}
					break;

			} // switch
		}else{ // PLUSIEURS CHOIX
			$c0 = $criteria->getNewCriterion(ContactPeer::STATUS, 0, Criteria::GREATER_THAN); //obligatoire pour realiser les AND/OR

			if (!empty($status[Contact::STATUS_NEW])) {
				$crit = 'criterion' . Contact::STATUS_NEW;
				$$crit = $criteria->getNewCriterion(ContactPeer::STATUS, Contact::STATUS_NEW, Criteria::EQUAL);
			}

			if (!empty($status[Contact::STATUS_BOUNCED])) {
				$crit = 'criterion' . Contact::STATUS_BOUNCED;
				$$crit = $criteria->getNewCriterion(CampaignContactPeer::BOUNCE_TYPE, catalyzemailingHandlebouncesTask::BOUNCE_SOFT, Criteria::GREATER_EQUAL);
				if ($campaignIdBounced != null) {
					$c99 = $criteria->getNewCriterion(CampaignContactPeer::CAMPAIGN_ID, $campaignIdBounced, Criteria::EQUAL);
					$$crit->addand($c99);
				}
			}

			if (!empty($status[Contact::STATUS_UNSUBSCRIBED])) {
				$crit = 'criterion' . Contact::STATUS_UNSUBSCRIBED;
				$$crit = $criteria->getNewCriterion(CampaignContactPeer::UNSUBSCRIBED_AT, null, Criteria::ISNOTNULL);
				if ($campaignIdUnsubscribed != null) {
					$c98 = $criteria->getNewCriterion(CampaignContactPeer::CAMPAIGN_ID, $campaignIdUnsubscribed, Criteria::EQUAL);
					$$crit->addand($c98);
				}
			}


			$first = true;
			foreach ($status as $key => $statut) {
				$crit = 'criterion' . $key;
				if ($first) {
					$criterion0 = $$crit;
					$first = false;
				}else{
					$criterion0->addOr($$crit);
				}
			}
			$c0->addand($criterion0);
			$criteria->add($c0);

		}





		if ($campaignIdBounced == null) {
			$User->getAttributeHolder()->remove('campaignIdBounced');
		}else{
			sfContext::getInstance()->getUser()->setAttribute('campaignIdBounced', $campaignIdBounced);
		}

		if ($campaignIdUnsubscribed == null) {
			$User->getAttributeHolder()->remove('$campaignIdUnsubscribed');
		}else{
			sfContext::getInstance()->getUser()->setAttribute('campaignIdUnsubscribed', $campaignIdUnsubscribed);
		}



		return $criteria;
	}

	public static function retreiveByEmail($email_address)
	{
		$criteria = new Criteria();
		$criteria->add(ContactPeer::EMAIL, $email_address);
		return ContactPeer::doSelectOne($criteria);
	}
} // ContactPeer
