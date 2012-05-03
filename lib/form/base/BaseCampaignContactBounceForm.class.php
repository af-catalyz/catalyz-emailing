<?php

/**
 * CampaignContactBounce form base class.
 *
 * @method CampaignContactBounce getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCampaignContactBounceForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'campaign_contact_id' => new sfWidgetFormPropelChoice(array('model' => 'CampaignContact', 'add_empty' => true)),
      'error_code'          => new sfWidgetFormInputText(),
      'address'             => new sfWidgetFormInputText(),
      'bounce_type'         => new sfWidgetFormInputText(),
      'arrived_at'          => new sfWidgetFormDateTime(),
      'message'             => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'campaign_contact_id' => new sfValidatorPropelChoice(array('model' => 'CampaignContact', 'column' => 'id', 'required' => false)),
      'error_code'          => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'address'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'bounce_type'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'arrived_at'          => new sfValidatorDateTime(array('required' => false)),
      'message'             => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('campaign_contact_bounce[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignContactBounce';
  }


}
