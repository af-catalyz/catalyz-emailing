<?php

class CampaignHeaderForm extends BaseCampaignForm {

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
//			$this['commentaire'],
//			$this['name'],
			$this['slug'],
			$this['litmus_test_id'],
			$this['subject'],
			$this['from_name'],
			$this['from_email'],
			$this['created_by']
		);

		$this->widgetSchema['name'] =  new sfWidgetFormInput(array('label' => 'Nom de la campagne'),array('class'=> 'span5'));
		$this->widgetSchema['commentaire'] =  new sfWidgetFormTextarea(array('label' => 'Description'),array('class'=> 'span5 no_resize'));

		$this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => '<span class="help-block">Vous devez donner un nom à votre campagne</span>'));
		$this->validatorSchema['commentaire'] = new sfValidatorString(array('required' => FALSE));

		$campaign =/*(Campaign)*/ $this->getObject();

	}
}