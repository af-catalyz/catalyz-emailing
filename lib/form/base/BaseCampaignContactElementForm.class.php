<?php

/**
 * CampaignContactElement form base class.
 *
 * @method CampaignContactElement getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCampaignContactElementForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'campaign_id' => new sfWidgetFormInputHidden(),
      'contact_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'campaign_id' => new sfValidatorPropelChoice(array('model' => 'Campaign', 'column' => 'id', 'required' => false)),
      'contact_id'  => new sfValidatorPropelChoice(array('model' => 'Contact', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('campaign_contact_element[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignContactElement';
  }


}
