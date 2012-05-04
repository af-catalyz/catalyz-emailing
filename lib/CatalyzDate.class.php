<?php

class CatalyzDate {
	/**
	 * CatalyzDate::formatShort()
	 *
	 * @param int $timestamp
	 */
	public static function formatShort($timestamp)
	{
		if (!$timestamp) {
			return '-';
		}
		switch (sfContext::getInstance()->getI18N()->getCulture()) {
			case 'fr_FR':
			case 'fr':
				$return = date('d/m/Y', $timestamp);
				break;
			default:
				$return = date('m/d/Y', $timestamp);
		}
		return $return;
	}

	protected static function updateLocate(){
		$locale = sfContext::getInstance()->getI18N()->getCulture();
		sfContext::getInstance()->getUser()->setCulture($locale);
		sfContext::getInstance()->getI18N()->setCulture($locale);
		setlocale(LC_TIME, $locale);
	}

	public static function getFrenchMonth($monthNumber){
		switch($monthNumber){
			case 1:  return 'janvier';
			case 2:  return 'février';
			case 3:  return 'mars';
			case 4:  return 'avril';
			case 5:  return 'mai';
			case 6:  return 'juin';
			case 7:  return 'juillet';
			case 8:  return 'août';
			case 9:  return 'septembre';
			case 10:  return 'octobre';
			case 11:  return 'novembre';
			case 12:  return 'décembre';
		} // switch
		return '';
	}

	/**
	 * CatalyzDate::formatLong()
	 *
	 * @param int $timestamp
	 */
	public static function formatLong($timestamp)
	{
		if (!$timestamp) {
			return '-';
		}
		//self::updateLocate();
		switch (sfContext::getInstance()->getI18N()->getCulture()) {
			case 'fr_FR':
			case 'fr':
				$return = date('j', $timestamp).' ';
				$return .= self::getFrenchMonth(date('m', $timestamp));
				$return .= ' '.date('Y', $timestamp);
				break;
			default:
				$return = date('F jS Y', $timestamp);
		}
		return $return;
	}

	public static function formatLongWithTime($timestamp)
	{
		if (!$timestamp) {
			return '-';
		}
		switch (sfContext::getInstance()->getI18N()->getCulture()) {
			case 'fr_FR':
			case 'fr':
				$return = self::formatLong($timestamp).strftime(' à %H:%M', $timestamp);
				break;
			default:
				$return = date('F jS Y H:i', $timestamp);
		}
		return $return;
	}
	public static function frenchDateFormatToTimestamp($date_format)
	{
		if (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date_format)) {
			throw new Exception(sprintf('Le format de date suivant n\'est pas valide : "%s" (requis : JJ/MM/AAAA)', $date_format));
			return false;
		}
		list($d, $m, $y) = explode('/', $date_format);
		if (false === $timestamp = strtotime("$y-$m-$d")) {
			throw new Exception(sprintf('La date suivante n\'est pas valide : "%s"', $date_format));
			return false;
		}
		return $timestamp;
	}

	/**
	 * CatalyzDate::formatShortWithTime()
	 *
	 * @param mixed $CampaignContact
	 * @return
	 */
	public static function formatShortWithTime($timestamp)
	{
		if (!$timestamp) {
			return '-';
		}

		switch (sfContext::getInstance()->getI18N()->getCulture()) {
			case 'fr_FR':
			case 'fr':
				$return = date('d/m/Y H:i', $timestamp);
				break;
			default:
				$return = date('m/d/Y H:i', $timestamp);
		}
		return $return;
	}


	public static function getDateFromTab($tab){
		if (empty($tab['month']) || empty($tab['day']) || empty($tab['year'])) {
			return FALSE;
		}

		return date('d/m/Y', mktime(0, 0, 0, $tab['month'], $tab['day'], $tab['year']));
	}
}