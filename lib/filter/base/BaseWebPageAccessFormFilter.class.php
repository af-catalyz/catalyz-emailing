<?php

/**
 * WebPageAccess filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseWebPageAccessFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'web_session_id' => new sfWidgetFormPropelChoice(array('model' => 'WebSession', 'add_empty' => true)),
      'web_page_id'    => new sfWidgetFormPropelChoice(array('model' => 'WebPage', 'add_empty' => true)),
      'ip'             => new sfWidgetFormFilterInput(),
      'user_agent'     => new sfWidgetFormFilterInput(),
      'query'          => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'web_session_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WebSession', 'column' => 'id')),
      'web_page_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WebPage', 'column' => 'id')),
      'ip'             => new sfValidatorPass(array('required' => false)),
      'user_agent'     => new sfValidatorPass(array('required' => false)),
      'query'          => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('web_page_access_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebPageAccess';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'web_session_id' => 'ForeignKey',
      'web_page_id'    => 'ForeignKey',
      'ip'             => 'Text',
      'user_agent'     => 'Text',
      'query'          => 'Text',
      'created_at'     => 'Date',
    );
  }
}
