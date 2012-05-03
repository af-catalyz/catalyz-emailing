<?php

/**
 * CampaignContactGroup form base class.
 *
 * @method CampaignContactGroup getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCampaignContactGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'campaign_id'      => new sfWidgetFormInputHidden(),
      'contact_group_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'campaign_id'      => new sfValidatorPropelChoice(array('model' => 'Campaign', 'column' => 'id', 'required' => false)),
      'contact_group_id' => new sfValidatorPropelChoice(array('model' => 'ContactGroup', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('campaign_contact_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignContactGroup';
  }


}
