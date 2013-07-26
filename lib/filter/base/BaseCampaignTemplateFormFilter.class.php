<?php

/**
 * CampaignTemplate filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCampaignTemplateFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'slug'             => new sfWidgetFormFilterInput(),
      'name'             => new sfWidgetFormFilterInput(),
      'preview_filename' => new sfWidgetFormFilterInput(),
      'class_name'       => new sfWidgetFormFilterInput(),
      'template'         => new sfWidgetFormFilterInput(),
      'external_id'      => new sfWidgetFormFilterInput(),
      'initializer'      => new sfWidgetFormFilterInput(),
      'is_archived'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'slug'             => new sfValidatorPass(array('required' => false)),
      'name'             => new sfValidatorPass(array('required' => false)),
      'preview_filename' => new sfValidatorPass(array('required' => false)),
      'class_name'       => new sfValidatorPass(array('required' => false)),
      'template'         => new sfValidatorPass(array('required' => false)),
      'external_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'initializer'      => new sfValidatorPass(array('required' => false)),
      'is_archived'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('campaign_template_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignTemplate';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'slug'             => 'Text',
      'name'             => 'Text',
      'preview_filename' => 'Text',
      'class_name'       => 'Text',
      'template'         => 'Text',
      'external_id'      => 'Number',
      'initializer'      => 'Text',
      'is_archived'      => 'Boolean',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
