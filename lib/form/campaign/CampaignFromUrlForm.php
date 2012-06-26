<?php

class CampaignFromUrlForm extends BaseCampaignForm {

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

		$this->widgetSchema['name'] = new sfWidgetFormInput(array(), array('class' => 'input-xlarge'));
		$this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Vous devez donner un nom à votre campagne'));
		$this->getWidgetSchema()->setDefaults(array('name' => 'Ma campagne'));

		$this->widgetSchema['commentaire'] = new sfWidgetFormTextarea(array(), array('class' => 'input-xlarge no_resize'));
		$this->validatorSchema['commentaire'] = new sfValidatorString(array('required' => FALSE));

		$this->widgetSchema['url'] = new sfWidgetFormInput(array(), array('class' => 'input-xlarge'));
		$this->validatorSchema['url'] = new sfValidatorUrl(array('required' => true), array('required' => 'Vous devez fournir une adresse valide','invalid' => 'Vous devez fournir une adresse valide, verifier que l\'adresse est bien formée comme l\'exemple.'));
	}

	public function updateObject($values = null)
	{
		$object =/*(Campaign)*/ parent::updateObject($values);
		if ($this->object->isNew()) {
			$object->setSubject($object->getName());

			$object->setFromName(sfConfig::get('app_mail_from_name'));
			$object->setFromEmail(sfConfig::get('app_mail_from_email'));

			$object->setReplyToEmail(sfConfig::get('app_mail_reply_email'));

			$object->setReturnPathEmail(sfConfig::get('app_mail_reply_email'));
			$object->setReturnPathServer(sfConfig::get('app_mail_reply_server'));
			$object->setReturnPathLogin(sfConfig::get('app_mail_reply_login'));
			$object->setReturnPathPassword(sfConfig::get('app_mail_reply_password'));

			$template = $object->getCampaignTemplate();
			$initializerClassName = '';
			if ($template->getInitializer()) {
				if(!class_exists($template->getInitializer())){
					throw new Exception('Unable to find initializer: '.$template->getInitializer());
				}

				$initializerClassName = $template->getInitializer();
			} else {
				$initializerClassName = 'CampaignTemplateInitializer';
			}
			$object->save();
			$initializer = new $initializerClassName();
			$initializer->execute($object, $template);
			//var_dump($object);exit;
		}
		return $object;
	}

	public function updateTemplateValue($id)
	{
		$this->values['template_id']=$id;
		return TRUE;
	}
}