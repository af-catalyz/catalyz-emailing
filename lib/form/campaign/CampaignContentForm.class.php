<?php

class CampaignContentForm extends BaseCampaignForm {

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
			$this['subject'],
			$this['from_name'],
			$this['from_email'],
			$this['created_by']
		);

		$campaign =/*(Campaign)*/ $this->getObject();
		$values = $campaign->createEditWidget();


		$this->widgetSchema['content'] =  $values['widget'];
		$this->widgetSchema['text_content'] =  new sfWidgetFormInputHidden();

		$this->validatorSchema['content'] = $values['validator'];
		$this->validatorSchema['text_content'] = new sfValidatorPass();

		$CampaignTemplateHandler = new CampaignTemplateHandler($campaign);

		var_dump($CampaignTemplateHandler->compute());
		die();


		if ($CampaignTemplateHandler->displayTextTab()) { // mode normal
			$this->widgetSchema['text_content'] = new sfWidgetFormTextarea(array(), array('cols' => 40 ,'style' => 'width: 100%; height: 720px;'));;
			$this->validatorSchema['text_content'] = new sfValidatorString(array('required' => false));
		}

		$this->setOption('displayTextTab', $CampaignTemplateHandler->displayTextTab());

		$this->getWidgetSchema()->setDefaults(array('content' => $values['default']));
	}
}