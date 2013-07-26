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
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'web_visitor_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WebVisitor', 'column' => 'id')),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
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
      'created_at'     => 'Date',
    );
  }
}
