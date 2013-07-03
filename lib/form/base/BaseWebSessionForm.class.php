<?php

/**
 * WebSession form base class.
 *
 * @method WebSession getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWebSessionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'web_visitor_id' => new sfWidgetFormPropelChoice(array('model' => 'WebVisitor', 'add_empty' => true)),
      'created_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'web_visitor_id' => new sfValidatorPropelChoice(array('model' => 'WebVisitor', 'column' => 'id', 'required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('web_session[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebSession';
  }


}
