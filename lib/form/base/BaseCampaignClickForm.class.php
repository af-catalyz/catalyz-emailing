<?php

/**
 * CampaignClick form base class.
 *
 * @method CampaignClick getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCampaignClickForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'campaign_link_id'    => new sfWidgetFormPropelChoice(array('model' => 'CampaignLink', 'add_empty' => true)),
      'campaign_contact_id' => new sfWidgetFormPropelChoice(array('model' => 'CampaignContact', 'add_empty' => true)),
      'position'            => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'campaign_link_id'    => new sfValidatorPropelChoice(array('model' => 'CampaignLink', 'column' => 'id', 'required' => false)),
      'campaign_contact_id' => new sfValidatorPropelChoice(array('model' => 'CampaignContact', 'column' => 'id', 'required' => false)),
      'position'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('campaign_click[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignClick';
  }


}
