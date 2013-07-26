<?php

class CampaignTestForm extends sfForm {

	public function setup()
	{
		$this->setWidgets(array(
		  'test_type'                       => new sfWidgetFormChoice(array('choices'=>array('choix1','choix2','choix3'), "expanded" =>true, 'multiple' => false)),
		  'test_user_list'                  => new sfWidgetFormTextarea(array(),array('class' => 'span5 no_resize'))
		));

		$this->setValidators(array(
		  'test_type'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
		  'test_user_list'                  => new sfValidatorString(array('required' => false))
		));

		$this->widgetSchema->setNameFormat('campaign[%s]');

		$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

		parent::setup();
	}
}