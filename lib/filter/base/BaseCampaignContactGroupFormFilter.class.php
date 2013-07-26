<?php

/**
 * CampaignContactGroup filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCampaignContactGroupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('campaign_contact_group_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignContactGroup';
  }

  public function getFields()
  {
    return array(
      'campaign_id'      => 'ForeignKey',
      'contact_group_id' => 'ForeignKey',
    );
  }
}
