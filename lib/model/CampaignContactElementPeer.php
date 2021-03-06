<?php


/**
 * Skeleton subclass for performing query and update operations on the 'campaign_contact_element' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * jeu. 03 mai 2012 11:26:44 CEST
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class CampaignContactElementPeer extends BaseCampaignContactElementPeer {
	public static function createCompaignContactIfNotExist($campaignId,$contactId){
		$result=FALSE;
		$campaignContactCriteria= new Criteria();
		$campaignContactCriteria->add(CampaignContactElementPeer::CAMPAIGN_ID,$campaignId);
		$campaignContactCriteria->add(CampaignContactElementPeer::CONTACT_ID,$contactId);
		$campaignContact=CampaignContactElementPeer::doSelectOne($campaignContactCriteria);

		if (!$campaignContact) {
			$compaignContact = new CampaignContactElement();
			$compaignContact->setCampaignId($campaignId);
			$compaignContact->setContactId($contactId);
			$result = $compaignContact->save();
		}
		return $result;
	}
} // CampaignContactElementPeer
