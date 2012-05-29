<?php

class CampaignEnvoiForm extends BaseCampaignForm {

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
	//		$this['schedule_type'],
	//		$this['scheduled_at'],
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

		//region scheduled_at
		$this->widgetSchema['scheduled_at'] =  new czWidgetFormDateInput(array(), array('size' => 14 ,'onclick'=>'document.getElementById(\'campaign_schedule_type_2\').checked = true;'));
		$this->validatorSchema['scheduled_at'] =  new sfValidatorDate(array('required' => TRUE,
                'date_format' => '@(?P<day>\d{2})/(?P<month>\d{2})/(?P<year>\d{2,4}).(?P<hour>\d{2}):(?P<minute>\d{2})@',
                'with_time'=>true,
				'min' => time(),
				'datetime_output'=>'Y-m-d H:i',
                'date_output' => 'd/m/Y H:i'
                ), array(
                'required' => '<span class="help-block">La date est requise</span>',
                'min' => '<span class="help-block">La date doit être après %min%</span>',
               'bad_format' => '<span class="help-block">"%value%" n\'est pas un format de date valide (jj/mm/yyyy).</span>',
                ));
		$this->getWidgetSchema()->setDefaults(array('scheduled_at' => $campaign->getScheduledAt('d/m/Y h:i')));
		//endregion

		//region schedule_type
		$schedulingOptions = array();
		$schedulingOptions[Campaign::SCHEDULING_NONE] = 'Je ne sais pas encore';
		$schedulingOptions[Campaign::SCHEDULING_NOW] = 'Dès que possible';
		$schedulingOptions[Campaign::SCHEDULING_AT] = 'A partir du';

		$this->widgetSchema['schedule_type'] =  new sfWidgetFormSelectRadio(array('choices' => $schedulingOptions, 'formatter' => array($this, 'formatScheduling')));
		$this->validatorSchema['schedule_type'] = new sfValidatorChoice(array('choices' => array_keys($schedulingOptions)), array('required' => 'Vous devez préciser à partir de quand la campagne doit être envoyée'));
		$this->getWidgetSchema()->setDefaults(array('schedule_type' => Campaign::SCHEDULING_NONE));
		//endregion
	}

	public function formatScheduling($widget, $choices)
	{
		return get_partial('campaign/editScheduling', array('form' => $this, 'widget' => $widget, 'choices' => $choices));
	}

	public function bind(array $taintedValues = null, array $taintedFiles = null)
	{
		if (!empty($taintedValues)) {
			switch ($taintedValues["schedule_type"]) {
				case Campaign::SCHEDULING_NONE:
				case Campaign::SCHEDULING_NOW:
					$this->validatorSchema["scheduled_at"] = new sfValidatorPass();;
					//$this->validatorSchema["scheduled_at"]->setOption('required', false);
					break;
				case Campaign::SCHEDULING_AT:
					$this->validatorSchema["scheduled_at"]->setOption('required', true);
					break;
			} // switch
		}

		return parent::bind($taintedValues, $taintedFiles);
	}
}