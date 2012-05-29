<?php

class CampaignEnveloppeForm extends BaseCampaignForm {

	public function setup()
	{
		parent::setup();

		unset(
			$this['template_id'],
			$this['campaign_contact_element_list'],
			$this['campaign_contact_group_list'],
			$this['campaign_contact_list'],
			$this['updated_at'],
			$this['created_at'],
			$this['google_analytics_content'],
			$this['google_analytics_campaign_content'],
			$this['google_analytics_campaign_type'],
			$this['google_analytics_medium'],
			$this['google_analytics_source'],
			$this['google_analytics_enabled'],
			$this['is_archived'],
			$this['return_path_password'],
			$this['return_path_login'],
			$this['return_path_server'],
			$this['return_path_email'],
			$this['reply_to_email'],
			$this['target'],
			$this['test_user_list'],
			$this['test_type'],
			$this['schedule_type'],
			$this['scheduled_at'],
			$this['status'],
			$this['prepared_text_content'],
			$this['text_content'],
			$this['prepared_content'],
			$this['content'],
			$this['commentaire'],
			$this['name'],
			$this['slug'],
			$this['litmus_test_id'],
			$this['created_by']
		);

		$this->widgetSchema['subject'] =  new sfWidgetFormInput(array('label' => FALSE),array('class'=> 'span6'));
		$this->widgetSchema['from_name'] =  new sfWidgetFormInput(array('label' => 'Nom'),array('class'=> 'input-xlarge'));
		$this->widgetSchema['from_email'] =  new sfWidgetFormInput(array('label' => 'Email'),array('class'=> 'input-xlarge'));

		$campaign =/*(Campaign)*/ $this->getObject();

	}

	public function getLastCampaigns($limit = 3){
		$c = new Criteria();
		$c->add(CampaignContactPeer::SENT_AT, null, Criteria::ISNOTNULL);
		$c->addDescendingOrderByColumn(CampaignContactPeer::SENT_AT);
		$c->addGroupByColumn(CampaignContactPeer::CAMPAIGN_ID);
		$results = CampaignContactPeer::doSelectJoinCampaign($c);

		$titles = array();
		$expediteurs = array();

		foreach ($results as /*(CampaignContact)*/$result){
			$campaign = /*(Campaign)*/$result->getCampaign();
			$titles[$campaign->getSubject()]= $campaign->getSubject();
			$expediteurs[sprintf("%s &lt;%s&gt;", $campaign->getFromName(), $campaign->getFromEmail())]=array('name' => $campaign->getFromName(),'email' => $campaign->getFromEmail());
		}


		$titles = array_slice($titles, 0, $limit, TRUE);
		$expediteurs = array_slice($expediteurs, 0, $limit, TRUE);


		return array('titles' => $titles, 'expediteurs' => $expediteurs);
	}
}