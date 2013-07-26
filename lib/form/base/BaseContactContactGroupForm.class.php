<?php

/**
 * ContactContactGroup form base class.
 *
 * @method ContactContactGroup getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseContactContactGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'contact_id'       => new sfWidgetFormInputHidden(),
      'contact_group_id' => new sfWidgetFormInputHidden(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'contact_id'       => new sfValidatorPropelChoice(array('model' => 'Contact', 'column' => 'id', 'required' => false)),
      'contact_group_id' => new sfValidatorPropelChoice(array('model' => 'ContactGroup', 'column' => 'id', 'required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_contact_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactContactGroup';
  }


}
