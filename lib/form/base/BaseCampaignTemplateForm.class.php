<?php

/**
 * CampaignTemplate form base class.
 *
 * @method CampaignTemplate getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCampaignTemplateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'preview_filename' => new sfWidgetFormInputText(),
      'class_name'       => new sfWidgetFormInputText(),
      'template'         => new sfWidgetFormTextarea(),
      'external_id'      => new sfWidgetFormInputText(),
      'initializer'      => new sfWidgetFormInputText(),
      'is_archived'      => new sfWidgetFormInputCheckbox(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'preview_filename' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'class_name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'template'         => new sfValidatorString(array('required' => false)),
      'external_id'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'initializer'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_archived'      => new sfValidatorBoolean(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('campaign_template[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignTemplate';
  }


}
