<?php

/**
 * CampaignContact filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCampaignContactFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'sent_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'failed_sent_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'view_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'view_user_agent'    => new sfWidgetFormFilterInput(),
      'clicked_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'unsubscribed_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'raison'             => new sfWidgetFormFilterInput(),
      'unsubscribed_lists' => new sfWidgetFormFilterInput(),
      'bounce_type'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sent_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'failed_sent_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'view_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'view_user_agent'    => new sfValidatorPass(array('required' => false)),
      'clicked_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'unsubscribed_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'raison'             => new sfValidatorPass(array('required' => false)),
      'unsubscribed_lists' => new sfValidatorPass(array('required' => false)),
      'bounce_type'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('campaign_contact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignContact';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'campaign_id'        => 'ForeignKey',
      'contact_id'         => 'ForeignKey',
      'sent_at'            => 'Date',
      'failed_sent_at'     => 'Date',
      'view_at'            => 'Date',
      'view_user_agent'    => 'Text',
      'clicked_at'         => 'Date',
      'unsubscribed_at'    => 'Date',
      'raison'             => 'Text',
      'unsubscribed_lists' => 'Text',
      'bounce_type'        => 'Number',
    );
  }
}
