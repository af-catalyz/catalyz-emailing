<?php

/**
 * WebSession filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseWebSessionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'web_visitor_id' => new sfWidgetFormPropelChoice(array('model' => 'WebVisitor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'web_visitor_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WebVisitor', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('web_session_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebSession';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'web_visitor_id' => 'ForeignKey',
    );
  }
}
