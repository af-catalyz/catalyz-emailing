<?php

/**
 * CampaignContactElement filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCampaignContactElementFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('campaign_contact_element_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignContactElement';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'campaign_id' => 'ForeignKey',
      'contact_id'  => 'ForeignKey',
    );
  }
}
