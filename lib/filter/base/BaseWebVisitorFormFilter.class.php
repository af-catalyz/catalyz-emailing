<?php

/**
 * WebVisitor filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseWebVisitorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'contact_id' => new sfWidgetFormPropelChoice(array('model' => 'Contact', 'add_empty' => true)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'contact_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Contact', 'column' => 'id')),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('web_visitor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebVisitor';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'contact_id' => 'ForeignKey',
      'created_at' => 'Date',
    );
  }
}
