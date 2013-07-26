<?php

/**
 * CampaignContactBounce filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCampaignContactBounceFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'campaign_contact_id' => new sfWidgetFormPropelChoice(array('model' => 'CampaignContact', 'add_empty' => true)),
      'error_code'          => new sfWidgetFormFilterInput(),
      'address'             => new sfWidgetFormFilterInput(),
      'bounce_type'         => new sfWidgetFormFilterInput(),
      'arrived_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'message'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'campaign_contact_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CampaignContact', 'column' => 'id')),
      'error_code'          => new sfValidatorPass(array('required' => false)),
      'address'             => new sfValidatorPass(array('required' => false)),
      'bounce_type'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'arrived_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'message'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('campaign_contact_bounce_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignContactBounce';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'campaign_contact_id' => 'ForeignKey',
      'error_code'          => 'Text',
      'address'             => 'Text',
      'bounce_type'         => 'Number',
      'arrived_at'          => 'Date',
      'message'             => 'Text',
    );
  }
}
