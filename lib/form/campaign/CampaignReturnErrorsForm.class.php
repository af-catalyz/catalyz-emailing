<?php

class CampaignReturnErrorsForm extends BaseCampaignForm {

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
//			$this['return_path_password'],
//			$this['return_path_login'],
//			$this['return_path_server'],
//			$this['return_path_email'],
//			$this['reply_to_email'],
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

		$this->widgetSchema['return_path_password'] =  new sfWidgetFormInputHidden();
		$this->widgetSchema['return_path_login'] =  new sfWidgetFormInputHidden();
		$this->widgetSchema['return_path_server'] =  new sfWidgetFormInputHidden();

		$this->validatorSchema['return_path_server'] = new sfValidatorPass();
		$this->validatorSchema['return_path_login'] = new sfValidatorPass();
		$this->validatorSchema['return_path_password'] = new sfValidatorPass();

		if (sfConfig::get('app_settings_display_campaign_parameters', true)) {
			$this->widgetSchema['return_path_password'] =  new sfWidgetFormInput(array('label' => 'Mot de passe'),array('class'=> 'input-xlarge'));
			$this->widgetSchema['return_path_login'] =  new sfWidgetFormInput(array('label' => 'Identifiant'),array('class'=> 'input-xlarge'));
			$this->widgetSchema['return_path_server'] =  new sfWidgetFormInput(array('label' => 'Serveur'),array('class'=> 'input-xlarge'));

			$this->validatorSchema['return_path_server'] = new sfValidatorString(array('min_length' => 4, 'required' => false),array('required' =>
			'<span class="help-block">Vous devez préciser le serveur POP du compte</span>', 'min_length' =>
			'<span class="help-block">Le serveur POP doit comporter plus de 4 caractères</span>'));
			$this->validatorSchema['return_path_login'] = new sfValidatorString(array('min_length' => 4, 'required' => false),array('required' =>
			'<span class="help-block">Vous devez préciser le nom d\'utilisateur du compte</span>', 'min_length' =>
			'<span class="help-block">Le nom d\'utilisateur du compte doit comporter plus de 4 caractères</span>'));
			$this->validatorSchema['return_path_password'] = new sfValidatorString(array('min_length' => 4, 'required' => false),array('required' =>
			'<span class="help-block">Vous devez préciser le mot de passe du compte</span>', 'min_length' =>
			'<span class="help-block">Le mot de passe du compte doit comporter plus de 4 caractères</span>'));
		}

		$this->widgetSchema['return_path_email'] =  new sfWidgetFormInput(array('label' => 'Email retours en erreur'),array('class'=> 'input-xlarge'));
		$this->widgetSchema['reply_to_email'] =  new sfWidgetFormInput(array('label' => 'Email de réponse'),array('class'=> 'input-xlarge'));

		$this->validatorSchema['reply_to_email'] = new sfValidatorEmail(array('required' => false),	array('required' =>
		'<span class="help-block">Vous devez préciser l\'adresse email à utiliser</span>', 'invalid' =>
		'<span class="help-block">Vous devez préciser une adresse email valide</span>'));
		$this->validatorSchema['return_path_email'] = new sfValidatorEmail(array('required' => false),	array('required' =>
		'<span class="help-block">Vous devez préciser l\'adresse email à utiliser</span>', 'invalid' =>
		'<span class="help-block">Vous devez préciser une adresse email valide</span>'));


		$this->getWidgetSchema()->setHelps(array(
			'return_path_server' => '<span class="help-block hint">Exemple: pop.catalyz.fr</span>',
			'return_path_login' => '<span class="help-block hint">Exemple: noreply@catalyz.fr</span>',
			'return_path_password' => '<span class="help-block hint">Exemple: s3s4me</span>',
			'reply_to_email' => '<span class="help-block hint">Exemple: bdurant@catalyz.fr</span>',
			'reply_to_email' => '<span class="help-block hint">Exemple: bdurant@catalyz.fr</span>'
		));


		$campaign =/*(Campaign)*/ $this->getObject();

	}
}