<?php

/**
 * CampaignClick filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCampaignClickFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'campaign_link_id'    => new sfWidgetFormPropelChoice(array('model' => 'CampaignLink', 'add_empty' => true)),
      'campaign_contact_id' => new sfWidgetFormPropelChoice(array('model' => 'CampaignContact', 'add_empty' => true)),
      'position'            => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'campaign_link_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CampaignLink', 'column' => 'id')),
      'campaign_contact_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CampaignContact', 'column' => 'id')),
      'position'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('campaign_click_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignClick';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'campaign_link_id'    => 'ForeignKey',
      'campaign_contact_id' => 'ForeignKey',
      'position'            => 'Number',
      'created_at'          => 'Date',
    );
  }
}
