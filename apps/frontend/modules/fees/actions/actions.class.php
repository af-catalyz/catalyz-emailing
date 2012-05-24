<?php

/**
 * fees actions.
 *
 * @package    catalyz_emailing
 * @subpackage fees
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class feesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$this->MonthLabels = array(1 => "Jan.", 2 => "Fév.", 3 => "Mars", 4 => "Avr.", 5 => "Mai", 6 => "Juin", 7 => "Jui.", 8 => "Août", 9 => "Sep.", 10 => "Oct.", 11 => "Nov.", 12 => "Déc.");
  	$this->datas = array();
  	$this->dates = array();
  	// faire un tableau $datas[annee][campagne][mois]=count;
  	//region $campaigns
  	$campaigns = CampaignPeer::doSelect(new Criteria());
  	$temp = array();
  	foreach ($campaigns as $campaign) {
  		$temp[$campaign->getId()] = array('Name' => $campaign->getName(), 'Id' => $campaign->getId(),'Slug' => $campaign->getSlug());
  	}

  	$campaigns = $temp;
  	//endregion

  	//region $datas
  	$criteria = new Criteria();
  	$criteria->add(CampaignContactPeer::SENT_AT, null, Criteria::NOT_EQUAL);
  	$criteria->addJoin(CampaignContactPeer::CAMPAIGN_ID, CampaignPeer::ID, Criteria::LEFT_JOIN);
  	$elements = CampaignContactPeer::doSelect($criteria);

  	if (!empty($elements)) {
  		$return = array();
  		$dates = array();
  		foreach ($elements as/*(CampaignContact)*/ $CampaignContact) {

  			if (empty($return[date('Y', strtotime($CampaignContact->getSentAt()))])) {
  				$return[date('Y', strtotime($CampaignContact->getSentAt()))] = array();
  			}

  			$dates[date('Y', strtotime($CampaignContact->getSentAt()))] = date('Y', strtotime($CampaignContact->getSentAt()));

  			if (empty($return[date('Y', strtotime($CampaignContact->getSentAt()))][serialize($campaigns[$CampaignContact->getCampaignId()])])) {
  				$return[date('Y', strtotime($CampaignContact->getSentAt()))][serialize($campaigns[$CampaignContact->getCampaignId()])] = array();
  			}

  			if (empty($return[date('Y', strtotime($CampaignContact->getSentAt()))][serialize($campaigns[$CampaignContact->getCampaignId()])])) {
  				$return[date('Y', strtotime($CampaignContact->getSentAt()))][serialize($campaigns[$CampaignContact->getCampaignId()])] = array_fill(1, 12, 0);
  			}

  			$return[date('Y', strtotime($CampaignContact->getSentAt()))][serialize($campaigns[$CampaignContact->getCampaignId()])][date('n', strtotime($CampaignContact->getSentAt()))]++;
  		}

  		krsort($return);
  		$this->datas = $return;

  		krsort($dates);
  		$this->dates = $dates;
  	}
  	//endregion

  	$title = sprintf('Routage %s', sfConfig::get('app_settings_default_suffix'));
  	$this->getResponse()->setTitle($title);
  }
}
