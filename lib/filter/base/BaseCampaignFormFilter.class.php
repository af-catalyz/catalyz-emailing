<?php

/**
 * Campaign filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCampaignFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'slug'                              => new sfWidgetFormFilterInput(),
      'name'                              => new sfWidgetFormFilterInput(),
      'commentaire'                       => new sfWidgetFormFilterInput(),
      'subject'                           => new sfWidgetFormFilterInput(),
      'template_id'                       => new sfWidgetFormPropelChoice(array('model' => 'CampaignTemplate', 'add_empty' => true)),
      'content'                           => new sfWidgetFormFilterInput(),
      'prepared_content'                  => new sfWidgetFormFilterInput(),
      'text_content'                      => new sfWidgetFormFilterInput(),
      'prepared_text_content'             => new sfWidgetFormFilterInput(),
      'status'                            => new sfWidgetFormFilterInput(),
      'from_name'                         => new sfWidgetFormFilterInput(),
      'from_email'                        => new sfWidgetFormFilterInput(),
      'scheduled_at'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'schedule_type'                     => new sfWidgetFormFilterInput(),
      'test_type'                         => new sfWidgetFormFilterInput(),
      'test_user_list'                    => new sfWidgetFormFilterInput(),
      'target'                            => new sfWidgetFormFilterInput(),
      'reply_to_email'                    => new sfWidgetFormFilterInput(),
      'return_path_email'                 => new sfWidgetFormFilterInput(),
      'return_path_server'                => new sfWidgetFormFilterInput(),
      'return_path_login'                 => new sfWidgetFormFilterInput(),
      'return_path_password'              => new sfWidgetFormFilterInput(),
      'is_archived'                       => new sfWidgetFormFilterInput(),
      'google_analytics_enabled'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'google_analytics_source'           => new sfWidgetFormFilterInput(),
      'google_analytics_medium'           => new sfWidgetFormFilterInput(),
      'google_analytics_campaign_type'    => new sfWidgetFormFilterInput(),
      'google_analytics_campaign_content' => new sfWidgetFormFilterInput(),
      'google_analytics_content'          => new sfWidgetFormFilterInput(),
      'litmus_test_id'                    => new sfWidgetFormFilterInput(),
      'created_at'                        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'                        => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUserProfile', 'add_empty' => true)),
      'updated_at'                        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'campaign_contact_element_list'     => new sfWidgetFormPropelChoice(array('model' => 'Contact', 'add_empty' => true)),
      'campaign_contact_group_list'       => new sfWidgetFormPropelChoice(array('model' => 'ContactGroup', 'add_empty' => true)),
      'campaign_contact_list'             => new sfWidgetFormPropelChoice(array('model' => 'Contact', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'slug'                              => new sfValidatorPass(array('required' => false)),
      'name'                              => new sfValidatorPass(array('required' => false)),
      'commentaire'                       => new sfValidatorPass(array('required' => false)),
      'subject'                           => new sfValidatorPass(array('required' => false)),
      'template_id'                       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CampaignTemplate', 'column' => 'id')),
      'content'                           => new sfValidatorPass(array('required' => false)),
      'prepared_content'                  => new sfValidatorPass(array('required' => false)),
      'text_content'                      => new sfValidatorPass(array('required' => false)),
      'prepared_text_content'             => new sfValidatorPass(array('required' => false)),
      'status'                            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'from_name'                         => new sfValidatorPass(array('required' => false)),
      'from_email'                        => new sfValidatorPass(array('required' => false)),
      'scheduled_at'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'schedule_type'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'test_type'                         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'test_user_list'                    => new sfValidatorPass(array('required' => false)),
      'target'                            => new sfValidatorPass(array('required' => false)),
      'reply_to_email'                    => new sfValidatorPass(array('required' => false)),
      'return_path_email'                 => new sfValidatorPass(array('required' => false)),
      'return_path_server'                => new sfValidatorPass(array('required' => false)),
      'return_path_login'                 => new sfValidatorPass(array('required' => false)),
      'return_path_password'              => new sfValidatorPass(array('required' => false)),
      'is_archived'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'google_analytics_enabled'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'google_analytics_source'           => new sfValidatorPass(array('required' => false)),
      'google_analytics_medium'           => new sfValidatorPass(array('required' => false)),
      'google_analytics_campaign_type'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'google_analytics_campaign_content' => new sfValidatorPass(array('required' => false)),
      'google_analytics_content'          => new sfValidatorPass(array('required' => false)),
      'litmus_test_id'                    => new sfValidatorPass(array('required' => false)),
      'created_at'                        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'                        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUserProfile', 'column' => 'id')),
      'updated_at'                        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'campaign_contact_element_list'     => new sfValidatorPropelChoice(array('model' => 'Contact', 'required' => false)),
      'campaign_contact_group_list'       => new sfValidatorPropelChoice(array('model' => 'ContactGroup', 'required' => false)),
      'campaign_contact_list'             => new sfValidatorPropelChoice(array('model' => 'Contact', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('campaign_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addCampaignContactElementListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(CampaignContactElementPeer::CAMPAIGN_ID, CampaignPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CampaignContactElementPeer::CONTACT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CampaignContactElementPeer::CONTACT_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addCampaignContactGroupListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(CampaignContactGroupPeer::CAMPAIGN_ID, CampaignPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CampaignContactGroupPeer::CONTACT_GROUP_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CampaignContactGroupPeer::CONTACT_GROUP_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addCampaignContactListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(CampaignContactPeer::CAMPAIGN_ID, CampaignPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CampaignContactPeer::CONTACT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CampaignContactPeer::CONTACT_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Campaign';
  }

  public function getFields()
  {
    return array(
      'id'                                => 'Number',
      'slug'                              => 'Text',
      'name'                              => 'Text',
      'commentaire'                       => 'Text',
      'subject'                           => 'Text',
      'template_id'                       => 'ForeignKey',
      'content'                           => 'Text',
      'prepared_content'                  => 'Text',
      'text_content'                      => 'Text',
      'prepared_text_content'             => 'Text',
      'status'                            => 'Number',
      'from_name'                         => 'Text',
      'from_email'                        => 'Text',
      'scheduled_at'                      => 'Date',
      'schedule_type'                     => 'Number',
      'test_type'                         => 'Number',
      'test_user_list'                    => 'Text',
      'target'                            => 'Text',
      'reply_to_email'                    => 'Text',
      'return_path_email'                 => 'Text',
      'return_path_server'                => 'Text',
      'return_path_login'                 => 'Text',
      'return_path_password'              => 'Text',
      'is_archived'                       => 'Number',
      'google_analytics_enabled'          => 'Boolean',
      'google_analytics_source'           => 'Text',
      'google_analytics_medium'           => 'Text',
      'google_analytics_campaign_type'    => 'Number',
      'google_analytics_campaign_content' => 'Text',
      'google_analytics_content'          => 'Text',
      'litmus_test_id'                    => 'Text',
      'created_at'                        => 'Date',
      'created_by'                        => 'ForeignKey',
      'updated_at'                        => 'Date',
      'campaign_contact_element_list'     => 'ManyKey',
      'campaign_contact_group_list'       => 'ManyKey',
      'campaign_contact_list'             => 'ManyKey',
    );
  }
}
