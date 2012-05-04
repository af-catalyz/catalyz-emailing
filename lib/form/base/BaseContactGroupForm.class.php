<?php

/**
 * ContactGroup form base class.
 *
 * @method ContactGroup getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseContactGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'slug'                        => new sfWidgetFormInputText(),
      'name'                        => new sfWidgetFormInputText(),
      'is_test_group'               => new sfWidgetFormInputCheckbox(),
      'legend'                      => new sfWidgetFormTextarea(),
      'is_archived'                 => new sfWidgetFormInputCheckbox(),
      'color'                       => new sfWidgetFormInputText(),
      'created_at'                  => new sfWidgetFormDateTime(),
      'updated_at'                  => new sfWidgetFormDateTime(),
      'campaign_contact_group_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Campaign')),
      'contact_contact_group_list'  => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Contact')),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'slug'                        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'                        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_test_group'               => new sfValidatorBoolean(array('required' => false)),
      'legend'                      => new sfValidatorString(array('required' => false)),
      'is_archived'                 => new sfValidatorBoolean(array('required' => false)),
      'color'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                  => new sfValidatorDateTime(array('required' => false)),
      'campaign_contact_group_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Campaign', 'required' => false)),
      'contact_contact_group_list'  => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Contact', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactGroup';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['campaign_contact_group_list']))
    {
      $values = array();
      foreach ($this->object->getCampaignContactGroups() as $obj)
      {
        $values[] = $obj->getCampaignId();
      }

      $this->setDefault('campaign_contact_group_list', $values);
    }

    if (isset($this->widgetSchema['contact_contact_group_list']))
    {
      $values = array();
      foreach ($this->object->getContactContactGroups() as $obj)
      {
        $values[] = $obj->getContactId();
      }

      $this->setDefault('contact_contact_group_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCampaignContactGroupList($con);
    $this->saveContactContactGroupList($con);
  }

  public function saveCampaignContactGroupList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['campaign_contact_group_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CampaignContactGroupPeer::CONTACT_GROUP_ID, $this->object->getPrimaryKey());
    CampaignContactGroupPeer::doDelete($c, $con);

    $values = $this->getValue('campaign_contact_group_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CampaignContactGroup();
        $obj->setContactGroupId($this->object->getPrimaryKey());
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
    $c->add(ContactContactGroupPeer::CONTACT_GROUP_ID, $this->object->getPrimaryKey());
    ContactContactGroupPeer::doDelete($c, $con);

    $values = $this->getValue('contact_contact_group_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new ContactContactGroup();
        $obj->setContactGroupId($this->object->getPrimaryKey());
        $obj->setContactId($value);
        $obj->save();
      }
    }
  }

}
