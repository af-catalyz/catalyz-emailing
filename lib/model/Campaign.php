<?php


/**
 * Skeleton subclass for representing a row from the 'campaign' table.
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
class Campaign extends BaseCampaign {

	const STATUS_DRAFT = 1;
	const STATUS_ERROR = 2;
	const STATUS_SCHEDULED = 3;
	const STATUS_PREPARING_SEND = 4;
	const STATUS_SENDING = 5;
	const STATUS_COMPLETED = 6;
	const STATUS_CANCELLED = 7;

	const SCHEDULING_NONE = 0;
	const SCHEDULING_NOW = 1;
	const SCHEDULING_AT = 2;

	const OPTION_TEST_USER = 0;
	const OPTION_TEST_GROUP = 1;
	const OPTION_TEST_LIST = 2;

	const ANALYTICS_CAMPAIGN_NAME = 0;
	const ANALYTICS_CAMPAIGN_SUBJECT = 1;
	const ANALYTICS_CAMPAIGN_CUSTOM = 2;

	const TARGET_ALL = 0;
	const TARGET_GROUPS = 1;

	const RELANCE_OPEN = 1;
	const RELANCE_NO_OPEN = 2;

	protected $providerSettings = null;

	public function getCatalyzUrl(){
		if ($this->getStatus() >= self::STATUS_SENDING) {
			return url_for('@campaign_statistics_summary?slug='.$this->getSlug());
		}

		return url_for('@campaign_index?slug='.$this->getSlug());
	}

	public function getStatusBadge(){
		$badge = '';

		switch($this->status){
			case self::STATUS_ERROR:
				$badge = sprintf('<span class="label label-important pull-right">%s</span>', __('Paramétrage incorrect'));
				break;
			case self::STATUS_SENDING:
				$badge = sprintf('<span class="label label-warning pull-right">%s</span>', __('Envoi en cours'));
				break;
			case self::STATUS_COMPLETED:
				$badge = sprintf('<span class="label label-success pull-right">%s</span>', __('Envoyée'));
				break;
		} // switch

		return $badge;
	}

	public function getCommentPopup(){
		if (trim($this->getcommentaire()) != '') {
			return sprintf('<a rel="tooltip-campaign-comment" href="#" data-original-title="%s"><i class="icon-question-sign"></i></a>', str_ireplace('"', '&quot;', nl2br($this->getcommentaire())));
		}

		return FALSE;
	}

	public function __toString(){
		return $this->name;
	}

	function __construct()
	{
		$this->setStatus(self::STATUS_DRAFT);
		$this->setScheduleType(self::SCHEDULING_NONE);
		// $this->setTargetType(self::TARGET_ALL);
		$this->setTestType(self::OPTION_TEST_USER);
		$this->setWebTrackerEnabled(WebTracker::isModuleAvailable());
	}

	public function sendToTestGroups()
	{
		$results = array('success' => array(), 'failed' => array());
		foreach(ContactPeer::getActiveContactFromTestGroups() as $Contact) {
			$result = $this->getCampaignDeliveryManager()->sendToContact($Contact, true);
			$results['success'] = array_merge($results['success'], $result['success']);
			$results['failed'] = array_merge($results['failed'], $result['failed']);
		}
		return $results;
	}

	public function sendTo($emails)
	{
		return $this->getCampaignDeliveryManager()->sendToList($emails);
	}

	public function getCampaignDeliveryManager()
	{
		return new CampaignDeliveryManager($this);
	}

	public function getDefaultLink()
	{
		switch ($this->getStatus()) {
			case self::STATUS_DRAFT:
			case self::STATUS_ERROR:
			case self::STATUS_SCHEDULED:
			case self::STATUS_PREPARING_SEND:
				return url_for('campaign/edit?id=' . $this->getId());
			case self::STATUS_SENDING:
			case self::STATUS_COMPLETED:
			case self::STATUS_CANCELLED:
				return url_for('statistics/index?id=' . $this->getId());
		} // switch
	}

	public function getDefaultActions()
	{
		switch ($this->getStatus()) {
			case self::STATUS_DRAFT:
			case self::STATUS_ERROR:
			case self::STATUS_SCHEDULED:
			case self::STATUS_PREPARING_SEND:
				return array('caption' => 'Configurer', 'image' => image_tag('icons/cog'));
			case self::STATUS_SENDING:
			case self::STATUS_COMPLETED:
			case self::STATUS_CANCELLED:
				return array('caption' => 'Statistiques', 'image' => image_tag('icons/chart_curve'));
		} // switch
	}

	static function getStatusIconTag($status)
	{
		switch ($status) {
			case self::STATUS_DRAFT:
				return image_tag('icons/bullet_red');
			case self::STATUS_ERROR:
				return image_tag('icons/bullet_error');
			case self::STATUS_SCHEDULED:
				return image_tag('icons/bullet_yellow');
			case self::STATUS_PREPARING_SEND:
				return image_tag('icons/bullet_green');
			case self::STATUS_SENDING:
				return image_tag('icons/bullet_start');
			case self::STATUS_COMPLETED:
				return image_tag('icons/bullet_tick');
			case self::STATUS_CANCELLED:
				return image_tag('icons/bullet_cross');
		} // switch
	}

	public function updateStatus()
	{
		if (in_array($this->getStatus(), array(self::STATUS_DRAFT, self::STATUS_ERROR, self::STATUS_SCHEDULED))) {
			switch ($this->getScheduleType()) {
				case self::SCHEDULING_NONE:
					$this->setStatus(self::STATUS_DRAFT);
					break;
				case self::SCHEDULING_NOW:
					$this->setStatus(self::STATUS_SCHEDULED);
					break;
				case self::SCHEDULING_AT:
					$this->setStatus(self::STATUS_SCHEDULED);
					break;
				default:
					throw new Exception('unknown schedule type: ' . $this->getScheduleType());
			} // switch
		}
	}

	function getTargetContactItems()
	{
		$result = array();
		$isNull = true;
		foreach(CatalyzEmailing::getContactProviders() as $provider) {


			$isNull = $isNull && $provider->isNull($this);
			$items = $provider->getContactIds($this);
			if (null != $items) {
				$result = array_merge($result, $items);
			}
		}



		$count = count($result);
		if ((0 == $count) && $isNull) {
			$m_criteria = new Criteria();
			$m_criteria->clearSelectColumns();
			$m_criteria->addSelectColumn(ContactPeer::ID);
			$m_criteria->add(ContactPeer::STATUS, Contact::STATUS_NEW);
			$rs = BasePeer::doSelect($m_criteria);

			$rs->execute();

			while($row = $rs->fetch(PDO::FETCH_ASSOC)){
				$result[] = $row['ID'];
			}
		} else {
			$result = array_unique($result, SORT_NUMERIC);
		}

		return array('items' => $result, 'duplicates' => $count - count($result));
	}

	function getTargetCount()
	{
		$result = $this->getTargetContactItems();
		return count($result['items']);
	}

	function getTargetContactIds()
	{
		$result = $this->getTargetContactItems();
		return $result['items'];
	}

	public function getPreparedTargetCount()
	{
		$criteria = new Criteria();
		return $this->countCampaignContacts($criteria);
	}

	public function getSentCount()
	{
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$criteria->add(CampaignContactPeer::SENT_AT, null, Criteria::NOT_EQUAL);
		return $this->countCampaignContacts($criteria);
	}

	public static function extractKeyInformation($key)
	{
		if (preg_match('/^(.+)-([0-9]+)-([a-zA-Z0-9]+)$/', $key, $tokens)) {
			$testKey = md5($tokens[1] . sfConfig::get('app_seed'));
			if ($testKey != $tokens[3]) {
				throw new Exception(sprintf('Invalid key: %s / %s', $testKey, $tokens[3]));
			}
			return array($tokens[1], $tokens[2]);
		}
		throw new Exception(sprintf('Invalid key: [%s]', $key));
	}

	public function getOpenedCount()
	{
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$criteria->add(CampaignContactPeer::VIEW_AT, null, Criteria::NOT_EQUAL);
		return CampaignContactPeer::doCount($criteria);
	}

	public function getUnOpenedContactIds()
	{
		$criteria = new Criteria();
		$criteria->addSelectColumn(CampaignContactPeer::CONTACT_ID);
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$criteria->add(CampaignContactPeer::VIEW_AT, null, Criteria::EQUAL);

		$result = array();
		foreach(ContactGroupPeer::doSelectRS($criteria) as $item) {
			$result[] = $item[0];
		}
		return $result;
	}

	public function getOpenedHistory()
	{
		$sql = 'SELECT UNIX_TIMESTAMP(' . CampaignContactPeer::VIEW_AT . ') AS ts,
			DATE_FORMAT(' . CampaignContactPeer::VIEW_AT . ', "%d/%m") AS day,
			COUNT(' . CampaignContactPeer::ID . ') AS total
			FROM ' . CampaignContactPeer::TABLE_NAME . '
			WHERE UNIX_TIMESTAMP(' . CampaignContactPeer::VIEW_AT . ') <> 0
				AND ' . CampaignContactPeer::CAMPAIGN_ID . ' = ' . $this->getId() . '
			GROUP BY day';
		return $this->getHistory($sql);
	}

	protected function initDays($from = null)
	{
		if ($from == null) {
			$from = time();
		}
		$result = array();
		for($i = 0; $i < $this->getGraphHistoryLength(); $i++) {
			$result[date('d/m', $from)] = 0;
			$from = strtotime('+1 day', $from);
		}
		return $result;
	}

	public function getFailedSentCount()
	{
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$criteria->add(CampaignContactPeer::FAILED_SENT_AT, null, Criteria::NOT_EQUAL);
		return $this->countCampaignContacts($criteria);
	}

	public function getClickedCount()
	{
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$criteria->add(CampaignContactPeer::CLICKED_AT, null, Criteria::NOT_EQUAL);
		return $this->countCampaignContacts($criteria);
	}
	public function getLandingActionCount()
	{
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$criteria->add(CampaignContactPeer::LANDING_ACTIONS, '', Criteria::NOT_EQUAL);
		return $this->countCampaignContacts($criteria);
	}

	protected function getHistory($sql)
	{
		$start = $this->getSendStart();
		$result = $this->initDays($start);


		$before = 0;

		$values = array();
		$now = time();
		$connection = Propel::getConnection();
		$statement = $connection->prepare($sql);
		$statement->execute();

		while($rs = $statement->fetch(PDO::FETCH_NUM)){
			$key = $rs[1];
			if (isset($result[$key])) {
				$result[$key] = $rs[2];
			}
		}

		$sum = 0;
		foreach($result as $day => $dailyCount) {
			$sum += $dailyCount;
			$result[$day] = $sum;
		}
		return $result;
	}

	public function getClickedHistory()
	{
		$sql = 'SELECT UNIX_TIMESTAMP(' . CampaignContactPeer::CLICKED_AT . ') AS ts,
		DATE_FORMAT(' . CampaignContactPeer::CLICKED_AT . ', "%d/%m") AS day,
		COUNT(' . CampaignContactPeer::ID . ') AS total
		FROM ' . CampaignContactPeer::TABLE_NAME . '
		WHERE UNIX_TIMESTAMP(' . CampaignContactPeer::CLICKED_AT . ') <> 0
				AND ' . CampaignContactPeer::CAMPAIGN_ID . ' = ' . $this->getId() . '
		GROUP BY day';
		return $this->getHistory($sql);
	}

	public function getSendStart()
	{
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::SENT_AT, null, Criteria::ISNOTNULL);
		$criteria->addAscendingOrderByColumn(CampaignContactPeer::SENT_AT);
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$CampaignContact = CampaignContactPeer::doSelectOne($criteria);



		if ($CampaignContact) {
			return strtotime($CampaignContact->getFailedSentAt()) + strtotime($CampaignContact->getSentAt());
		}
		return null;
	}

	function getGraphHistoryLength()
	{
		return 15;
	}

	public function getClickStatistics($displayId = false)
	{
		$sql = 'SELECT ' . CampaignLinkPeer::URL . ' ,' . CampaignLinkPeer::GOOGLE_ANALYTICS_TERM . ', COUNT(DISTINCT(' . CampaignContactPeer::ID . ')) AS total,' . CampaignLinkPeer::ID . '
		FROM ' . CampaignLinkPeer::TABLE_NAME . '
			, ' . CampaignClickPeer::TABLE_NAME . '
			, ' . CampaignContactPeer::TABLE_NAME . '
		WHERE ' . CampaignLinkPeer::CAMPAIGN_ID . ' = ' . $this->getId() . '
			AND ' . CampaignLinkPeer::ID . ' = ' . CampaignClickPeer::CAMPAIGN_LINK_ID . '
			AND ' . CampaignContactPeer::ID . ' = ' . CampaignClickPeer::CAMPAIGN_CONTACT_ID . '
			AND ' . CampaignContactPeer::CLICKED_AT . ' IS NOT NULL
		GROUP BY ' . CampaignLinkPeer::URL;



		$connection = Propel::getConnection();
		$statement = $connection->prepare($sql);
		$statement->execute();
		$result = array();

		while($rs = $statement->fetch(PDO::FETCH_NUM)){
			if ($displayId) {
				$result[$rs[0]] = array('label' => $rs[1], 'count' => $rs[2], 'id' => $rs[3]);
			} else {
				$result[$rs[0]] = $rs[2];
			}
		}

		return $result;
	}

	public function getUrls()
	{
		$sql = 'SELECT ' . CampaignLinkPeer::URL . ', COUNT(DISTINCT(' . CampaignContactPeer::ID . ')) AS total
		FROM ' . CampaignLinkPeer::TABLE_NAME . '
		LEFT OUTER JOIN	' . CampaignClickPeer::TABLE_NAME . '
			ON ' . CampaignLinkPeer::ID . ' = ' . CampaignClickPeer::CAMPAIGN_LINK_ID . '
		LEFT OUTER JOIN ' . CampaignContactPeer::TABLE_NAME . '
			ON ' . CampaignContactPeer::ID . ' = ' . CampaignClickPeer::CAMPAIGN_CONTACT_ID . '
		WHERE ' . CampaignLinkPeer::CAMPAIGN_ID . ' = ' . $this->getId() . '
		GROUP BY ' . CampaignLinkPeer::URL;

		$result = array();
		$connection = Propel::getConnection();
		$statement = $connection->prepare($sql);
		$statement->execute();

		while($rs = $statement->fetch(PDO::FETCH_NUM)){
			$result[$rs[0]] = $rs[1];
		}
		return $result;
	}

	public function getClickedUrlsWithPos()
	{
		$sql = 'SELECT ' . CampaignLinkPeer::URL . ', ' . CampaignClickPeer::POSITION . ', ' . CampaignClickPeer::CAMPAIGN_CONTACT_ID . '
		FROM ' . CampaignClickPeer::TABLE_NAME . '
		LEFT OUTER JOIN	' . CampaignLinkPeer::TABLE_NAME . '
			ON ' . CampaignClickPeer::CAMPAIGN_LINK_ID . ' = ' . CampaignLinkPeer::ID . '
		LEFT OUTER JOIN ' . CampaignContactPeer::TABLE_NAME . '
			ON ' . CampaignContactPeer::ID . ' = ' . CampaignClickPeer::CAMPAIGN_CONTACT_ID . '
		WHERE ' . CampaignLinkPeer::CAMPAIGN_ID . ' = ' . $this->getId();

		$result = array();
		$connection = Propel::getConnection();
		$statement = $connection->prepare($sql);
		$statement->execute();

		$clicked = array();
		while($rs = $statement->fetch(PDO::FETCH_NUM)){
//			echo '<pre>';
//			var_dump($rs);
//			echo '</pre>';

			if (empty($clicked[$rs[2]][$rs[0]][$rs[1]])) { // seul 1 click par personne n'est comptabilisé

				if (empty($result[$rs[0]][$rs[1]])) {
					$result[$rs[0]][$rs[1]] = 1;
				} else {
					$result[$rs[0]][$rs[1]] ++;
				}

				$clicked[$rs[2]][$rs[0]][$rs[1]] = true;
			}
		}

		return $result;
	}

	public function extractCssUrls()
	{
		$result = array();
		if (preg_match_all('#<link\srel="stylesheet"\shref="([^"]+)"#', $this->getContent(), $tokens)) {
			$result = $tokens[1];
		}
		return $result;
	}

	function canConnectToMailbox()
	{
		if (!function_exists('imap_open')) {
			throw new Exception('L\'extension imap n\'est pas présente sur le serveur, le contrôle de validité de l\'accès à la boite aux lettres ne peut pas être effectué.');
		}
		$mailbox = imap_open("{" . $this->getReturnPathServer() . ":110/pop3}INBOX", $this->getReturnPathLogin(), $this->getReturnPathPassword());

		$result = ($mailbox != false);
		if ($result) {
			imap_close($mailbox, CL_EXPUNGE);
		}
		return $result;
	}

	public function getCountTarget()
	{
		$result = array('target' => 0, 'redondant' => 0);
		// $c = new Criteria();
		// $c->add(CampaignContactGroupPeer::CAMPAIGN_ID, $this->getId());
		// $c->addJoin(CampaignContactGroupPeer::CONTACT_GROUP_ID, ContactContactGroupPeer::CONTACT_GROUP_ID, Criteria::LEFT_JOIN);
		// $c->addJoin(ContactContactGroupPeer::CONTACT_ID, ContactPeer::ID, Criteria::LEFT_JOIN);
		// $c->add(ContactPeer::STATUS, Contact::STATUS_NEW);
		// $ContactFromGroups = ContactContactGroupPeer::doSelect($c);
		// $nonDouble = array();
		// foreach ($ContactFromGroups as/*(ContactContactGroup)*/ $contact) {
		// if (null != $contact->getContactId()) {
		// $nonDouble[$contact->getContactId()] = null;
		// $result['target']++;
		// }
		// }
		// $c = new Criteria();
		// $c->add(CampaignContactElementPeer::CAMPAIGN_ID, $this->getId());
		// $Contacts = CampaignContactElementPeer::doSelect($c);
		// foreach ($Contacts as/*(CampaignContactElement)*/ $contact) {
		// $nonDouble[$contact->getContactId()] = null;
		// $result['target']++;
		// }
		$result['redondant'] = $result['target'] - count($nonDouble);

		return $result;
	}

	public function getUrlPosition($url, $pos)
	{
		$newUrl = sprintf('<a href="%s"', $url);
		$count = substr_count($this->getContent(), $newUrl);
		if ($count == 1) {
			return 1;
		} else {
			$count = substr_count(substr($this->getContent(), 0 , $pos), $newUrl);
			return ++$count;
		}
	}

	public function getBouncedContacts()
	{
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$criteria->add(CampaignContactPeer::BOUNCE_TYPE, catalyzemailingHandlebouncesTask::BOUNCE_HARD);
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID, Criteria::LEFT_JOIN);
		return ContactPeer::doSelect($criteria);
	}

	public function getUnsubscribeCount()
	{
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$criteria->add(CampaignContactPeer::UNSUBSCRIBED_AT, null, Criteria::NOT_EQUAL);
		return $this->countCampaignContacts($criteria);
	}

	public function getUsersAgents()
	{
		$criteria = new Criteria();
		$criteria->setDistinct();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$criteria->add(CampaignContactPeer::VIEW_USER_AGENT, null, Criteria::ISNOTNULL);
		$criteria->addAnd(CampaignContactPeer::VIEW_USER_AGENT, '', Criteria::NOT_EQUAL);
		$CampaignContact = CampaignContactPeer::doSelect($criteria);

		$agents = array();
		foreach ($CampaignContact as/*(CampaignContact)*/ $element) {
			$agents[] = $element->getViewUserAgent();
		}




		$parents = array();
		$platforms = array();

		$cpt = 0;
		foreach ($agents as $userAgent) {
			$cpt++;
			$return = array();
			$return = get_browser($userAgent, true);


			if ($return['browser'] == 'Default Browser') {
				if (preg_match('/iPhone/', $userAgent)) {
					$return['parent'] = 'iPhone';
					$return['browser'] = 'iPhone';
					$return['platform'] = 'iPhone';
				}
				else{
//					printf('<pre style="color: red;">%s => %s</pre>', $cpt ,$userAgent);
				}
			}else{
//				printf('<pre >%s => %s</pre>', $cpt ,$userAgent);
			}

			$browser = $temp_parent = 'unknow';
			if (!empty($return['parent'])) {
				$temp_parent = $return['parent'];
			}
			if (!empty($return['browser'])) {
				$browser = $return['browser'];
			}

			if (empty($parents[$browser][$temp_parent])) {
				$parents[$browser][$temp_parent] = 1;
			} else {
				$parents[$browser][$temp_parent]++;
			}


			$familly['Win7'] = 'Windows';
			$familly['WinXP'] = 'Windows';
			$familly['Win2000'] = 'Windows';
			$familly['Win2003'] = 'Windows';
			$familly['WinVista'] = 'Windows';
			$familly['WinNT'] = 'Windows';
			$familly['Win98'] = 'Windows';
			$familly['WinME'] = 'Windows';

			$familly['Linux'] = 'Linux';
			$familly['Debian'] = 'Linux';
			$familly['FreeBSD'] = 'Linux'; //pas sur pour celui la
			$familly['SunOS'] = 'Linux'; //pas sur pour celui la
			$familly['MacOSX'] = 'Mac';

			$familly['iPhone'] = 'Mobile';
			$familly['iPhone OSX'] = 'Mobile';
			$familly['Android'] = 'Mobile';
			$familly['WinPhone7'] = 'Mobile';
			$familly['webOS'] = 'Mobile';
			$familly['SymbianOS'] = 'Mobile';
			$familly['BlackBerry OS'] = 'Mobile';

			$familly['unknown'] = 'Unknown';



			if (empty($familly[$return['platform']])) {
				$familly[$return['platform']] = 'Unknown';
			}

			if (isset($platforms[$familly[$return['platform']]][$return['platform']])) {
				$platforms[$familly[$return['platform']]][$return['platform']]++;
			} else {
				$platforms[$familly[$return['platform']]][$return['platform']] = 1;
			}
		}


//		var_dump($platforms);
//		die();

		$temp2 = $temp = array();
		$totalPlatforms = 0;
		foreach ($platforms as $key => $familly) {
			arsort($familly);
			$temp[$key] = array('count' => array_sum($familly), 'details' => $familly);
			$temp2[$key] = array_sum($familly);
			$totalPlatforms += array_sum($familly);
		}
		arsort($temp2);
		$platforms = array();
		foreach ($temp2 as $key => $value) {
			$platforms[$key] = $temp[$key];
		}

		$temp2 = $temp = array();
		$totalParents = 0;
		foreach ($parents as $key => $familly) {
			arsort($familly);
			$temp[$key] = array('count' => array_sum($familly), 'details' => $familly);
			$temp2[$key] = array_sum($familly);
			$totalParents += array_sum($familly);
		}
		arsort($temp2);
		$parents = array();
		foreach ($temp2 as $key => $value) {
			$parents[$key] = $temp[$key];
		}

		return array('parents' => array('total' => $totalParents, 'details' => $parents), 'platforms' => array('total' => $totalPlatforms, 'details' => $platforms));
	}

	public function jsEscapeName()
	{
		return str_ireplace("'", "&acute;", $this->getName());
	}

	public static function LogView($campaignId, $email, $UserAgent, $logClick = false, $logUnsubscribe = false, $raison = null, $changeContactStatus = TRUE, $listLog = null)
	{
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $campaignId);
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID);
		$criteria->add(ContactPeer::EMAIL, $email);

		$CampaignContact =/*(CampaignContact)*/ CampaignContactPeer::doSelectOne($criteria);
		if ($CampaignContact) {
			// Keep only first view
			if (0 == $CampaignContact->getViewAt('U')) {
				$CampaignContact->setViewAt(time());
				$CampaignContact->setViewUserAgent($UserAgent);
			}
			// Keep only first click
			if ($logClick && (0 == $CampaignContact->getClickedAt('U'))) {
				$CampaignContact->setClickedAt(time());
			}
			if ($logUnsubscribe) {

				if (0 == $CampaignContact->getUnsubscribedAt('U')) {
					$CampaignContact->setUnsubscribedAt(time());
				}
				$CampaignContact->setRaison($raison);

				if ($changeContactStatus) {
					$contact = $CampaignContact->getContact();
					$contact->setStatus(Contact::STATUS_UNSUBSCRIBED);
					$contact->save();
				}
			}

			if ($listLog != NULL) {
				$CampaignContact->setUnsubscribedLists($listLog);
			}
			$CampaignContact->save();
		}
		return $CampaignContact;
	}

	public function getSelectedGroups()
	{
		$c = new Criteria();
		$c->add(CampaignContactGroupPeer::CAMPAIGN_ID, $this->getId());
		$c->addJoin(CampaignContactGroupPeer::CONTACT_GROUP_ID, ContactGroupPeer::ID);
		$c->addAscendingOrderByColumn(ContactGroupPeer::NAME);
		return ContactGroupPeer::doSelect($c);
	}

	public function getSelectedContacts()
	{
		$c = new Criteria();
		$c->add(CampaignContactElementPeer::CAMPAIGN_ID, $this->getId());
		$c->addJoin(CampaignContactElementPeer::CONTACT_ID, ContactPeer::ID);
		$c->addAscendingOrderByColumn(ContactPeer::LAST_NAME);
		$c->addAscendingOrderByColumn(ContactPeer::FIRST_NAME);
		$c->addAscendingOrderByColumn(ContactPeer::COMPANY);
		$c->addAscendingOrderByColumn(ContactPeer::EMAIL);
		return ContactPeer::doSelect($c);
	}

	public function deleteSelectedGroups()
	{
		$c = new Criteria();
		$c->add(CampaignContactGroupPeer::CAMPAIGN_ID, $this->getId());
		CampaignContactGroupPeer::doDelete($c);
	}

	protected function loadProviderSettings()
	{
		if (null == $this->providerSettings) {
			$this->providerSettings = unserialize($this->target);
		}
	}

	public function setProviderSettings($providerName, $value)
	{
		$this->loadProviderSettings();
		$this->providerSettings[$providerName] = $value;
		$this->setTarget(serialize($this->providerSettings));
	}

	public function getProviderSettings($providerName)
	{
		$this->loadProviderSettings();
		// var_dump($this->providerSettings) ;
		return isset($this->providerSettings[$providerName])?$this->providerSettings[$providerName]:null;
	}

	public function createEditWidget()
	{
		return $this->getCampaignTemplate()->createEditWidget($this);
	}

	public function getCampaignTemplateHandler()
	{
		$className = $this->getCampaignTemplate()->getClassName();
		if (!empty($className) && class_exists($className)) {
			return new $className($this);
		}
		return false;
	}

	public function copy($deepCopy = false)
	{
		if (!$deepCopy) {
			$copyObj = parent::copy(false);
			foreach($this->getCampaignLinks() as $relObj) {
				$copyObj->addCampaignLink($relObj->copy($deepCopy));
			}
			return $copyObj;
		} else {
			return parent::copy(true);
		}
	}

	public function getStatisticsOverviewScript($graphId = 'graph'){

		//region campaign
			$openHistory = $this->getOpenedHistory();
			$categories = array_keys($openHistory);
			$clickedHistory = $this->getClickedHistory();


			$prev = 0;
			foreach ($clickedHistory as $date => $count) {
				$total = $count;
				$clickedHistory[$date] = $total - $prev;
				$prev = $count;
			}

			$prev = 0;
			foreach ($openHistory as $date => $count) {
				$total = $count;
				$openHistory[$date] = $total - $prev;
				$prev = $count;
			}
			//endregion campaign

		//region $labels
		$labels = array_keys($openHistory);

		foreach ($labels as $key => $label){
			$temp[]= sprintf('"J+%s"', $key);
		}
		$labels = implode(',', $temp);
		//endregion

		//region $opens
		$opens = array_values($openHistory);
		$opens = implode(',', $opens);
		//endregion

		//region $clicks
		$clicks = array_values($clickedHistory);
		$clicks = implode(',', $clicks);
		//endregion

		$script = sprintf('$(function () {
	var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
		chart: {
			renderTo: "%s",
			type: "column"
		},
		title: {
			text: "Performance de votre campagne au cours du temps"
		},
		xAxis: {
			categories: [%s]
		},
		yAxis: {
			title: {
				text: "Contacts"
			}
		},
		tooltip: {
			crosshairs: true,
			shared: true
		},
		plotOptions: {
			spline: {
				marker: {
					radius: 4,
					lineColor: "#666666",
					lineWidth: 1
				}
			}
		},
		series: [{
			name: "Ouvertures",
			data: [ %s]

		}, {
			name: "Clics",
			data: [ %s]
		}]
		});
	});

});', $graphId, $labels, $opens, $clicks);

		return $script;
	}

	public function getTabsIcon(){
		$icon_false = '<i class="icon-remove"></i>';
		$icon_true = '<i class="icon-ok"></i>';

		$tab = array();
		$tab['enveloppe'] = $icon_false;
		$tab['message'] = $icon_true;
		$tab['links'] = $icon_false;
		$tab['tracker'] = $icon_false;
		$tab['anti_spam'] = $icon_false;
		$tab['controle'] = $icon_false;
		$tab['destinataire'] = $icon_true;
		$tab['returnErrors'] = $icon_false;
		$tab['scheduling'] = $icon_false;

		//region returnErrors
		// todo -> utiliser un formulaire et verifier la validité du form avec les données de la campagne
	  if (sfConfig::get('app_settings_display_campaign_parameters', true)){
	  	if ($this->getReplyToEmail() != null	&& $this->getReturnPathEmail() != NULL && $this->getReturnPathLogin() != NULL && $this->getReturnPathPassword() != NULL && $this->getReturnPathServer() != NULL) {
	  		$tab['returnErrors'] = $icon_true;
	  	}
	  }else{
	  	if ($this->getReplyToEmail() != null	&& $this->getReturnPathEmail() != NULL) {
	  		$tab['returnErrors'] = $icon_true;
	  	}
	  }
		//endregion

		//region liens
		//on considere que c'est valide si au moins 1 liens de la campagne posséde un nom personalisé

		$count_total = count($this->getCampaignLinks());

		if ($count_total > 0) {

			$c = new Criteria();
			$c->add(CampaignLinkPeer::CAMPAIGN_ID, $this->getId());
			$c->add(CampaignLinkPeer::GOOGLE_ANALYTICS_TERM, null, Criteria::ISNOTNULL);
			$count = CampaignLinkPeer::doCount($c);

			if ($count > 0) {
				$tab['links'] = $icon_true;
			}
		}else{
			$tab['links'] = $icon_true;
		}
		//endregion

		//region tracker
		if ($this->getWebTrackerEnabled() || ($this->getGoogleAnalyticsEnabled()	&& $this->getGoogleAnalyticsSource() != NULL && $this->getGoogleAnalyticsMedium() != NULL )) {
			$tab['tracker'] = $icon_true;
		}
		//endregion

		//region enveloppe
		if ($this->getSubject() != null	&& $this->getFromName() != NULL && $this->getFromEmail() != NULL ) {
			$tab['enveloppe'] = $icon_true;
		}
		//endregion

		//region scheduling
		if ($this->getScheduleType() > Campaign::SCHEDULING_NONE) {
			$tab['scheduling'] = $icon_true;
		}
		//endregion


		return $tab;
	}

	public function getAllBouncesCount()
	{
		$total = 0;
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$criteria->add(CampaignContactPeer::FAILED_SENT_AT, null, Criteria::NOT_EQUAL);
		$total += $this->countCampaignContacts($criteria);

		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->getId());
		$criteria->add(CampaignContactPeer::BOUNCE_TYPE, array(catalyzemailingHandlebouncesTask::BOUNCE_HARD, catalyzemailingHandlebouncesTask::BOUNCE_SOFT), Criteria::IN);
		$total +=  $this->countCampaignContacts($criteria);

		return $total;
	}
	public function getReactivityRate($formatted = false){

		$view_count = $this->getOpenedCount();
		$click_count = $this->getClickedCount();
		$result = $view_count != 0?($click_count * 100) / $view_count:0;
		if($formatted){
			return sprintf('%0.2f%%', $result);
		}
		return $result;
	}
	public function getOpenRate($formatted = false){

		$view_count = $this->getOpenedCount();
		$target_count = $this->getPreparedTargetCount();
		$result = $target_count != 0?($view_count * 100) / $target_count:0;
		if($formatted){
			return sprintf('%0.2f%%', $result);
		}
		return $result;
	}

	public function getClickRate($formatted = false){

		$click_count = $this->getClickedCount();
		$target_count = $this->getPreparedTargetCount();
		$result = $target_count != 0?($click_count * 100) / $target_count:0;
		if($formatted){
			return sprintf('%0.2f%%', $result);
		}
		return $result;
	}


} // Campaign

$columns_map = array('from'   => CampaignPeer::NAME,'to'     => CampaignPeer::SLUG);
sfPropelBehavior::add('Campaign', array('sfPropelActAsSluggableBehavior' => array('columns' => $columns_map)));