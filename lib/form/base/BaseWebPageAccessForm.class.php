<?php

/**
 * WebPageAccess form base class.
 *
 * @method WebPageAccess getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWebPageAccessForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'web_session_id' => new sfWidgetFormPropelChoice(array('model' => 'WebSession', 'add_empty' => true)),
      'ip'             => new sfWidgetFormInputText(),
      'user_agent'     => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'web_session_id' => new sfValidatorPropelChoice(array('model' => 'WebSession', 'column' => 'id', 'required' => false)),
      'ip'             => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'user_agent'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('web_page_access[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebPageAccess';
  }


}
