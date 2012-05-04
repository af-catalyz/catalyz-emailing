<?php

/**
 * Campaign form base class.
 *
 * @method Campaign getObject() Returns the current form's model object
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCampaignForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                => new sfWidgetFormInputHidden(),
      'slug'                              => new sfWidgetFormInputText(),
      'name'                              => new sfWidgetFormInputText(),
      'commentaire'                       => new sfWidgetFormTextarea(),
      'subject'                           => new sfWidgetFormInputText(),
      'template_id'                       => new sfWidgetFormPropelChoice(array('model' => 'CampaignTemplate', 'add_empty' => true)),
      'content'                           => new sfWidgetFormTextarea(),
      'prepared_content'                  => new sfWidgetFormTextarea(),
      'text_content'                      => new sfWidgetFormTextarea(),
      'prepared_text_content'             => new sfWidgetFormTextarea(),
      'status'                            => new sfWidgetFormInputText(),
      'from_name'                         => new sfWidgetFormInputText(),
      'from_email'                        => new sfWidgetFormInputText(),
      'scheduled_at'                      => new sfWidgetFormDateTime(),
      'schedule_type'                     => new sfWidgetFormInputText(),
      'test_type'                         => new sfWidgetFormInputText(),
      'test_user_list'                    => new sfWidgetFormTextarea(),
      'target'                            => new sfWidgetFormTextarea(),
      'reply_to_email'                    => new sfWidgetFormInputText(),
      'return_path_email'                 => new sfWidgetFormInputText(),
      'return_path_server'                => new sfWidgetFormInputText(),
      'return_path_login'                 => new sfWidgetFormInputText(),
      'return_path_password'              => new sfWidgetFormInputText(),
      'is_archived'                       => new sfWidgetFormInputText(),
      'google_analytics_enabled'          => new sfWidgetFormInputCheckbox(),
      'google_analytics_source'           => new sfWidgetFormInputText(),
      'google_analytics_medium'           => new sfWidgetFormInputText(),
      'google_analytics_campaign_type'    => new sfWidgetFormInputText(),
      'google_analytics_campaign_content' => new sfWidgetFormInputText(),
      'google_analytics_content'          => new sfWidgetFormInputText(),
      'litmus_test_id'                    => new sfWidgetFormInputText(),
      'created_at'                        => new sfWidgetFormDateTime(),
      'created_by'                        => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUserProfile', 'add_empty' => true)),
      'updated_at'                        => new sfWidgetFormDateTime(),
      'campaign_contact_element_list'     => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Contact')),
      'campaign_contact_group_list'       => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'ContactGroup')),
      'campaign_contact_list'             => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Contact')),
    ));

    $this->setValidators(array(
      'id'                                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'slug'                              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'                              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'commentaire'                       => new sfValidatorString(array('required' => false)),
      'subject'                           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'template_id'                       => new sfValidatorPropelChoice(array('model' => 'CampaignTemplate', 'column' => 'id', 'required' => false)),
      'content'                           => new sfValidatorString(array('required' => false)),
      'prepared_content'                  => new sfValidatorString(array('required' => false)),
      'text_content'                      => new sfValidatorString(array('required' => false)),
      'prepared_text_content'             => new sfValidatorString(array('required' => false)),
      'status'                            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'from_name'                         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'from_email'                        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'scheduled_at'                      => new sfValidatorDateTime(array('required' => false)),
      'schedule_type'                     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'test_type'                         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'test_user_list'                    => new sfValidatorString(array('required' => false)),
      'target'                            => new sfValidatorString(array('required' => false)),
      'reply_to_email'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'return_path_email'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'return_path_server'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'return_path_login'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'return_path_password'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_archived'                       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'google_analytics_enabled'          => new sfValidatorBoolean(array('required' => false)),
      'google_analytics_source'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'google_analytics_medium'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'google_analytics_campaign_type'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'google_analytics_campaign_content' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'google_analytics_content'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'litmus_test_id'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                        => new sfValidatorDateTime(array('required' => false)),
      'created_by'                        => new sfValidatorPropelChoice(array('model' => 'sfGuardUserProfile', 'column' => 'id', 'required' => false)),
      'updated_at'                        => new sfValidatorDateTime(array('required' => false)),
      'campaign_contact_element_list'     => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Contact', 'required' => false)),
      'campaign_contact_group_list'       => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'ContactGroup', 'required' => false)),
      'campaign_contact_list'             => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Contact', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('campaign[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Campaign';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['campaign_contact_element_list']))
    {
      $values = array();
      foreach ($this->object->getCampaignContactElements() as $obj)
      {
        $values[] = $obj->getContactId();
      }

      $this->setDefault('campaign_contact_element_list', $values);
    }

    if (isset($this->widgetSchema['campaign_contact_group_list']))
    {
      $values = array();
      foreach ($this->object->getCampaignContactGroups() as $obj)
      {
        $values[] = $obj->getContactGroupId();
      }

      $this->setDefault('campaign_contact_group_list', $values);
    }

    if (isset($this->widgetSchema['campaign_contact_list']))
    {
      $values = array();
      foreach ($this->object->getCampaignContacts() as $obj)
      {
        $values[] = $obj->getContactId();
      }

      $this->setDefault('campaign_contact_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCampaignContactElementList($con);
    $this->saveCampaignContactGroupList($con);
    $this->saveCampaignContactList($con);
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
    $c->add(CampaignContactElementPeer::CAMPAIGN_ID, $this->object->getPrimaryKey());
    CampaignContactElementPeer::doDelete($c, $con);

    $values = $this->getValue('campaign_contact_element_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CampaignContactElement();
        $obj->setCampaignId($this->object->getPrimaryKey());
        $obj->setContactId($value);
        $obj->save();
      }
    }
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
    $c->add(CampaignContactGroupPeer::CAMPAIGN_ID, $this->object->getPrimaryKey());
    CampaignContactGroupPeer::doDelete($c, $con);

    $values = $this->getValue('campaign_contact_group_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CampaignContactGroup();
        $obj->setCampaignId($this->object->getPrimaryKey());
        $obj->setContactGroupId($value);
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
    $c->add(CampaignContactPeer::CAMPAIGN_ID, $this->object->getPrimaryKey());
    CampaignContactPeer::doDelete($c, $con);

    $values = $this->getValue('campaign_contact_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CampaignContact();
        $obj->setCampaignId($this->object->getPrimaryKey());
        $obj->setContactId($value);
        $obj->save();
      }
    }
  }

}
