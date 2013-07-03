<?php

/**
 * WebPage form base class.
 *
 * @method WebPage getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWebPageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'url'        => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url'        => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('web_page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebPage';
  }


}
