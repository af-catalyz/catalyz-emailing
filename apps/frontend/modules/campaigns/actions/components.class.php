<?php
class campaignsComponents extends sfComponents
{
	public function executeArchivedCampaigns()
	{
    $this->filters = array();
    $this->campaigns = array();

    $criteria = new Criteria();
    $criteria->addDescendingOrderByColumn(CampaignPeer::UPDATED_AT);
    $criteria->add(CampaignTemplatePeer::IS_ARCHIVED,0);
    $criteria->add(CampaignPeer::IS_ARCHIVED, 1);

    foreach(CampaignPeer::doSelectJoinAll($criteria) as /*(Campaign)*/$campaign) {
      $this->filters['models'][$campaign->getTemplateId()] = $campaign->getCampaignTemplate()->getName();
      $this->filters['years'][$campaign->getCreatedAt('Y')] = $campaign->getCreatedAt('Y') ;
      $this->campaigns[] = $campaign;
    }
	}

	public function executeSendCampaigns()
	{
    $this->filters = array();
    $this->campaigns = array();

    $criteria = new Criteria();
    $criteria->addDescendingOrderByColumn(CampaignPeer::UPDATED_AT);
    $criteria->add(CampaignTemplatePeer::IS_ARCHIVED,0);
		$criteria->add(CampaignPeer::IS_ARCHIVED, 0);
    $criteria->add(CampaignPeer::STATUS, Campaign::STATUS_SENDING, Criteria::GREATER_EQUAL);

    foreach(CampaignPeer::doSelectJoinAll($criteria) as /*(Campaign)*/$campaign) {
      $this->filters['models'][$campaign->getTemplateId()] = $campaign->getCampaignTemplate()->getName();
      $this->filters['years'][$campaign->getCreatedAt('Y')] = $campaign->getCreatedAt('Y') ;
      $this->campaigns[] = $campaign;
    }
	}

	public function executePreparedCampaigns()
	{
    $this->campaigns = array();

    $criteria = new Criteria();
    $criteria->addDescendingOrderByColumn(CampaignPeer::UPDATED_AT);
    $criteria->add(CampaignTemplatePeer::IS_ARCHIVED,0);
    $criteria->add(CampaignPeer::STATUS, Campaign::STATUS_SENDING, Criteria::LESS_THAN);

    foreach(CampaignPeer::doSelectJoinAll($criteria) as /*(Campaign)*/$campaign) {
      $this->campaigns[] = $campaign;
    }
	}
}