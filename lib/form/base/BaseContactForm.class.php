<?php

/**
 * Contact form base class.
 *
 * @method Contact getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseContactForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'first_name'                    => new sfWidgetFormInputText(),
      'last_name'                     => new sfWidgetFormInputText(),
      'company'                       => new sfWidgetFormInputText(),
      'email'                         => new sfWidgetFormInputText(),
      'status'                        => new sfWidgetFormInputText(),
      'external_reference'            => new sfWidgetFormInputText(),
      'custom1'                       => new sfWidgetFormInputText(),
      'custom2'                       => new sfWidgetFormInputText(),
      'custom3'                       => new sfWidgetFormInputText(),
      'custom4'                       => new sfWidgetFormInputText(),
      'custom5'                       => new sfWidgetFormInputText(),
      'custom6'                       => new sfWidgetFormInputText(),
      'custom7'                       => new sfWidgetFormInputText(),
      'custom8'                       => new sfWidgetFormInputText(),
      'custom9'                       => new sfWidgetFormInputText(),
      'custom10'                      => new sfWidgetFormInputText(),
      'created_at'                    => new sfWidgetFormDateTime(),
      'updated_at'                    => new sfWidgetFormDateTime(),
      'campaign_contact_element_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Campaign')),
      'campaign_contact_list'         => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Campaign')),
      'contact_contact_group_list'    => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'ContactGroup')),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'first_name'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_name'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'company'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                         => new sfValidatorString(array('max_length' => 255)),
      'status'                        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'external_reference'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'custom1'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'custom2'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'custom3'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'custom4'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'custom5'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'custom6'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'custom7'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'custom8'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'custom9'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'custom10'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                    => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                    => new sfValidatorDateTime(array('required' => false)),
      'campaign_contact_element_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Campaign', 'required' => false)),
      'campaign_contact_list'         => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Campaign', 'required' => false)),
      'contact_contact_group_list'    => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'ContactGroup', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Contact', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contact';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['campaign_contact_element_list']))
    {
      $values = array();
      foreach ($this->object->getCampaignContactElements() as $obj)
      {
        $values[] = $obj->getCampaignId();
      }

      $this->setDefault('campaign_contact_element_list', $values);
    }

    if (isset($this->widgetSchema['campaign_contact_list']))
    {
      $values = array();
      foreach ($this->object->getCampaignContacts() as $obj)
      {
        $values[] = $obj->getCampaignId();
      }

      $this->setDefault('campaign_contact_list', $values);
    }

    if (isset($this->widgetSchema['contact_contact_group_list']))
    {
      $values = array();
      foreach ($this->object->getContactContactGroups() as $obj)
      {
        $values[] = $obj->getContactGroupId();
      }

      $this->setDefault('contact_contact_group_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCampaignContactElementList($con);
    $this->saveCampaignContactList($con);
    $this->saveContactContactGroupList($con);
  }

  public function saveCampaignContactElementList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['campaign_contact_element_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CampaignContactElementPeer::CONTACT_ID, $this->object->getPrimaryKey());
    CampaignContactElementPeer::doDelete($c, $con);

    $values = $this->getValue('campaign_contact_element_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CampaignContactElement();
        $obj->setContactId($this->object->getPrimaryKey());
        $obj->setCampaignId($value);
        $obj->save();
      }
    }
  }

  public function saveCampaignContactList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['campaign_contact_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CampaignContactPeer::CONTACT_ID, $this->object->getPrimaryKey());
    CampaignContactPeer::doDelete($c, $con);

    $values = $this->getValue('campaign_contact_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CampaignContact();
        $obj->setContactId($this->object->getPrimaryKey());
        $obj->setCampaignId($value);
        $obj->save();
      }
    }
  }

  public function saveContactContactGroupList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['contact_contact_group_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(ContactContactGroupPeer::CONTACT_ID, $this->object->getPrimaryKey());
    ContactContactGroupPeer::doDelete($c, $con);

    $values = $this->getValue('contact_contact_group_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new ContactContactGroup();
        $obj->setContactId($this->object->getPrimaryKey());
        $obj->setContactGroupId($value);
        $obj->save();
      }
    }
  }

}
