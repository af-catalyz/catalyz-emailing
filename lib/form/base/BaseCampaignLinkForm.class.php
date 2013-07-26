<?php

/**
 * CampaignLink form base class.
 *
 * @method CampaignLink getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCampaignLinkForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'campaign_id'           => new sfWidgetFormPropelChoice(array('model' => 'Campaign', 'add_empty' => true)),
      'url'                   => new sfWidgetFormTextarea(),
      'google_analytics_term' => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'campaign_id'           => new sfValidatorPropelChoice(array('model' => 'Campaign', 'column' => 'id', 'required' => false)),
      'url'                   => new sfValidatorString(array('required' => false)),
      'google_analytics_term' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('campaign_link[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignLink';
  }


}
