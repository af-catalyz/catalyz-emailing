<?php

/**
 * WebPage filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseWebPageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'scheme'     => new sfWidgetFormFilterInput(),
      'host'       => new sfWidgetFormFilterInput(),
      'path'       => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'scheme'     => new sfValidatorPass(array('required' => false)),
      'host'       => new sfValidatorPass(array('required' => false)),
      'path'       => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('web_page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebPage';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'scheme'     => 'Text',
      'host'       => 'Text',
      'path'       => 'Text',
      'created_at' => 'Date',
    );
  }
}
