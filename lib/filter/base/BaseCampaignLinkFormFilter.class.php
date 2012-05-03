<?php

/**
 * CampaignLink filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCampaignLinkFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'campaign_id'           => new sfWidgetFormPropelChoice(array('model' => 'Campaign', 'add_empty' => true)),
      'url'                   => new sfWidgetFormFilterInput(),
      'google_analytics_term' => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'campaign_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Campaign', 'column' => 'id')),
      'url'                   => new sfValidatorPass(array('required' => false)),
      'google_analytics_term' => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('campaign_link_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignLink';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'campaign_id'           => 'ForeignKey',
      'url'                   => 'Text',
      'google_analytics_term' => 'Text',
      'created_at'            => 'Date',
    );
  }
}
