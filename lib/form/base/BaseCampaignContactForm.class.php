<?php

/**
 * CampaignContact form base class.
 *
 * @method CampaignContact getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCampaignContactForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'campaign_id'        => new sfWidgetFormInputHidden(),
      'contact_id'         => new sfWidgetFormInputHidden(),
      'sent_at'            => new sfWidgetFormDateTime(),
      'failed_sent_at'     => new sfWidgetFormDateTime(),
      'view_at'            => new sfWidgetFormDateTime(),
      'view_user_agent'    => new sfWidgetFormInputText(),
      'clicked_at'         => new sfWidgetFormDateTime(),
      'unsubscribed_at'    => new sfWidgetFormDateTime(),
      'raison'             => new sfWidgetFormTextarea(),
      'unsubscribed_lists' => new sfWidgetFormTextarea(),
      'bounce_type'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'campaign_id'        => new sfValidatorPropelChoice(array('model' => 'Campaign', 'column' => 'id', 'required' => false)),
      'contact_id'         => new sfValidatorPropelChoice(array('model' => 'Contact', 'column' => 'id', 'required' => false)),
      'sent_at'            => new sfValidatorDateTime(array('required' => false)),
      'failed_sent_at'     => new sfValidatorDateTime(array('required' => false)),
      'view_at'            => new sfValidatorDateTime(array('required' => false)),
      'view_user_agent'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'clicked_at'         => new sfValidatorDateTime(array('required' => false)),
      'unsubscribed_at'    => new sfValidatorDateTime(array('required' => false)),
      'raison'             => new sfValidatorString(array('required' => false)),
      'unsubscribed_lists' => new sfValidatorString(array('required' => false)),
      'bounce_type'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('campaign_contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignContact';
  }


}
