<?php


/**
 * Skeleton subclass for performing query and update operations on the 'landing' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * sam. 16 févr. 2013 10:16:05 CET
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class LandingPeer extends BaseLandingPeer {
	public static function retrieveBySlug($slug)
	{
		$criteria = new Criteria(self::DATABASE_NAME);
		$criteria->add(self::SLUG, $slug);

		$v = self::doSelectOne($criteria);

		return $v;
	}
} // LandingPeer
