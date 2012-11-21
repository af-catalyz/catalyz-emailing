<?php

class lightContactForm extends BaseContactForm
{
public function configure()
{
	parent::configure();

	unset(
		$this['created_at'],
		$this['updated_at'],
		$this['campaign_contact_element_list'],
		$this['campaign_contact_list'],
		$this['contact_contact_group_list']
	);

	foreach (array('first_name','last_name','email') as $field){
		$this->widgetSchema[$field] =  new sfWidgetFormInput(array(),array('class'=> 'input-xlarge'));
	}

	$this->widgetSchema['slug'] =  new sfWidgetFormInputHidden();
	$this->widgetSchema['status'] =  new sfWidgetFormInputHidden();
	$this->widgetSchema['external_reference'] =  new sfWidgetFormInputHidden();
	$this->widgetSchema['company'] =  new sfWidgetFormInputHidden();

	//region $customFields
	//first create hidden fields
	for ($i=1;$i<= sfConfig::get('app_fields_count', 10);$i++){
		$field = 'custom'.$i;
		$this->widgetSchema[$field] =  new sfWidgetFormInputHidden();
	}

	//then display enabled
	$customFields = CatalyzEmailing::getCustomFields();
	foreach ($customFields as $key => $caption) {
		$this->widgetSchema[$key] =  new sfWidgetFormInput(array(),array('class'=> 'input-xlarge'));
	}
	//endregion

	foreach ($customFields as $key => $caption) {
		$this->validatorSchema[$key] = new sfValidatorString(array('max_length' => 255, 'required' => false));
	}

	$choices = array();
	$choices['Cadre'] = 'Cadre';
	$choices['Technicien'] = 'Technicien';
	$choices['Administratif'] = 'Administratif';
	$choices['Agent de Fabrication'] = 'Agent de Fabrication';

	$years = range(1900, date('Y'));
	$years = array_combine($years, $years);

	$this->widgetSchema['custom1'] =  new sfWidgetFormInputHidden();
	$this->validatorSchema['custom1'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

	$this->widgetSchema['custom2'] =  new czWidgetFormJqueryDate(array('years' => $years, 'display_month_name' => false), array('class' => 'small_select'));
	$this->validatorSchema['custom2'] =  new sfValidatorDate(array('required' => false), array('invalid' => 'cette date est invalide'));

	$this->widgetSchema['custom4'] =  new sfWidgetFormChoice(array('choices' => $choices, 'expanded' => false));
	$this->validatorSchema['custom4'] =  new sfValidatorChoice(array('choices' => $choices, 'choices' => array_keys($choices)));

	$this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true), array(
      'required' => 'L\'adresse email est requise',
      'invalid' => 'L\'adresse email n\'est pas valide')
	);

	$labels = array(
	'first_name' => 'Prénom',
	'last_name' => 'Nom',
	'company' => 'Société',
	'email' => 'Email',
	'contact_contact_group_list' => 'Groupes',
);

	foreach ($customFields as $key => $caption) {
		$labels[$key] = $caption;
	}

	$this->widgetSchema->setLabels($labels);

	$this->widgetSchema->setNameFormat('contact[%s]');
}
}
