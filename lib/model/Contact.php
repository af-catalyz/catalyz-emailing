<?php


/**
 * Skeleton subclass for representing a row from the 'contact' table.
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
class Contact extends BaseContact {
	const STATUS_NEW = 1;
	const STATUS_UNSUBSCRIBED = 2;
	const STATUS_BOUNCED = 3;

	function __construct()
	{
		$this->setStatus(self::STATUS_NEW);
	}

	public function getFullName()
	{
		if ($this->getFirstName() != '' || $this->getLastName() != '') {
			return $this->getFirstName() . ' ' . strtoupper($this->getLastName());
		}
		if ($this->getCompany() != '') {
			return $this->getCompany();
		}
		return $this->getEmail();
	}

	function getStatusIcon()
	{
		switch ($this->getStatus()) {
			case self::STATUS_NEW:
				return '<i class="icon-ok"></i>';
				return image_tag('icons/tick',array('title'=>'Contact actif'));
			case self::STATUS_UNSUBSCRIBED:
				return '<i class="icon-remove"></i>';
				return image_tag('icons/user_cross',array('title'=>'Contact inactif (suite à une désinscription)'));
			case self::STATUS_BOUNCED:
				return '<i class="icon-off"></i>';
				return image_tag('icons/cross',array('title'=>'Contact inactif (suite à une erreur d\'envoi)'));
			default:
				throw new Exception('Unknown contact status: ' . $this->getStatus());
		} // switch
	}

	function getStatusString()
	{
		switch ($this->getStatus()) {
			case self::STATUS_NEW:
				return 'Inscrit';
			case self::STATUS_UNSUBSCRIBED:
				return 'Désinscrit';
			case self::STATUS_BOUNCED:
				return 'Erreur';
			default:
				return 'Inconnu';
		} // switch
	}

	public function getGroups()
	{
		$criteria = new Criteria();
		$criteria->addJoin(ContactContactGroupPeer::CONTACT_GROUP_ID, ContactGroupPeer::ID);
		$criteria->add(ContactContactGroupPeer::CONTACT_ID, $this->getId());
		return ContactGroupPeer::doSelect($criteria);
	}

	public function getGroupsName()
	{
		$criteria = new Criteria();
		$criteria->addSelectColumn(ContactGroupPeer::NAME);
		$criteria->addSelectColumn(ContactGroupPeer::ID);
		$criteria->addJoin(ContactContactGroupPeer::CONTACT_GROUP_ID, ContactGroupPeer::ID);
		$criteria->add(ContactContactGroupPeer::CONTACT_ID, $this->getId());

		$groups = ContactGroupPeer::doSelectRS($criteria);

		$result = array();
		foreach($groups as $groupArray) {
			$result[$groupArray[1]] = $groupArray[0];
		}

		return $result;
	}

	public function getLatestClicks($id){
		$criteria = new Criteria();
		$criteria->add(CampaignClickPeer::CAMPAIGN_LINK_ID,$id);
		$criteria->add(CampaignContactPeer::CONTACT_ID,$this->getId());
		$criteria->addJoin(CampaignClickPeer::CAMPAIGN_CONTACT_ID,CampaignContactPeer::ID,Criteria::LEFT_JOIN);
		$criteria->addDescendingOrderByColumn(CampaignClickPeer::CREATED_AT);
		$return = CampaignClickPeer::doSelectOne($criteria);

		return CatalyzDate::formatShortWithTime(strtotime($return->getCreatedAt()));
	}

	public function getFieldValue($field, $groupTab = array()){
		switch($field){
			case 'FULL_NAME':
				$retun = sprintf('<a href="mailto:%s"><i class="icon-envelope"></i></a>&nbsp;<a href="%s">%s</a>',
					$this->getEmail(),
					url_for('@contact_show?slug='.$this->getSlug()),
					$this->getFullName()
					);
				return $retun;
				break;
			case 'FIRST_NAME':
				return $this->getFirstName();
				break;
			case 'LAST_NAME':
				return $this->getLastName();
				break;
			case 'COMPANY':
				return $this->getCompany();
				break;
			case 'EMAIL':
				return $this->getEmail();
				break;
			case 'CREATED_AT':
				return CatalyzDate::formatShort(strtotime($this->getCreatedAt()));
				break;
			case 'STATUS':
				return $this->getStatusIcon();
				break;
			case 'GROUPS':
				if (!empty($groupTab[$this->getId()])) {
					$temp=array();
					$Contactgroups = $groupTab[$this->getId()];
					foreach ($Contactgroups as $groupId=>$groupName){
						$temp[]=sprintf('<a href="%1$s" title="Afficher uniquement les contacts du groupe">%2$s</a>',url_for('contact/list?group='.$groupId), html_entity_decode($groupName));
					}
					return implode('', $temp);
				}else {
					return '-';
				}
				break;
			default:
				if(preg_match('/^CUSTOM([1-9][0-9]?)$/', $field, $tokens)){
					$tokens[1] = (int)$tokens[1];
					if(($tokens[1] >= 1) && ($tokens[1] <= sfConfig::get('app_fields_count'))){
						$method = 'getCustom'.$tokens[1];
						return $this->$method();
					}
				}
				return $field;
		} // switch
	}
} // Contact

$columns_map = array('from'   => ContactPeer::LAST_NAME,'to'     => ContactPeer::SLUG);
sfPropelBehavior::add('Contact', array('sfPropelActAsSluggableBehavior' => array('columns' => $columns_map)));