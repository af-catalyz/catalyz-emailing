<?php

/**
 * Contact filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseContactFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'slug'                          => new sfWidgetFormFilterInput(),
      'first_name'                    => new sfWidgetFormFilterInput(),
      'last_name'                     => new sfWidgetFormFilterInput(),
      'company'                       => new sfWidgetFormFilterInput(),
      'email'                         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'                        => new sfWidgetFormFilterInput(),
      'external_reference'            => new sfWidgetFormFilterInput(),
      'custom1'                       => new sfWidgetFormFilterInput(),
      'custom2'                       => new sfWidgetFormFilterInput(),
      'custom3'                       => new sfWidgetFormFilterInput(),
      'custom4'                       => new sfWidgetFormFilterInput(),
      'custom5'                       => new sfWidgetFormFilterInput(),
      'custom6'                       => new sfWidgetFormFilterInput(),
      'custom7'                       => new sfWidgetFormFilterInput(),
      'custom8'                       => new sfWidgetFormFilterInput(),
      'custom9'                       => new sfWidgetFormFilterInput(),
      'custom10'                      => new sfWidgetFormFilterInput(),
      'created_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'campaign_contact_element_list' => new sfWidgetFormPropelChoice(array('model' => 'Campaign', 'add_empty' => true)),
      'campaign_contact_list'         => new sfWidgetFormPropelChoice(array('model' => 'Campaign', 'add_empty' => true)),
      'contact_contact_group_list'    => new sfWidgetFormPropelChoice(array('model' => 'ContactGroup', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'slug'                          => new sfValidatorPass(array('required' => false)),
      'first_name'                    => new sfValidatorPass(array('required' => false)),
      'last_name'                     => new sfValidatorPass(array('required' => false)),
      'company'                       => new sfValidatorPass(array('required' => false)),
      'email'                         => new sfValidatorPass(array('required' => false)),
      'status'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'external_reference'            => new sfValidatorPass(array('required' => false)),
      'custom1'                       => new sfValidatorPass(array('required' => false)),
      'custom2'                       => new sfValidatorPass(array('required' => false)),
      'custom3'                       => new sfValidatorPass(array('required' => false)),
      'custom4'                       => new sfValidatorPass(array('required' => false)),
      'custom5'                       => new sfValidatorPass(array('required' => false)),
      'custom6'                       => new sfValidatorPass(array('required' => false)),
      'custom7'                       => new sfValidatorPass(array('required' => false)),
      'custom8'                       => new sfValidatorPass(array('required' => false)),
      'custom9'                       => new sfValidatorPass(array('required' => false)),
      'custom10'                      => new sfValidatorPass(array('required' => false)),
      'created_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'campaign_contact_element_list' => new sfValidatorPropelChoice(array('model' => 'Campaign', 'required' => false)),
      'campaign_contact_list'         => new sfValidatorPropelChoice(array('model' => 'Campaign', 'required' => false)),
      'contact_contact_group_list'    => new sfValidatorPropelChoice(array('model' => 'ContactGroup', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_filters[%s]');

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

    $criteria->addJoin(CampaignContactElementPeer::CONTACT_ID, ContactPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CampaignContactElementPeer::CAMPAIGN_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CampaignContactElementPeer::CAMPAIGN_ID, $value));
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

    $criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CampaignContactPeer::CAMPAIGN_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CampaignContactPeer::CAMPAIGN_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addContactContactGroupListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(ContactContactGroupPeer::CONTACT_ID, ContactPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(ContactContactGroupPeer::CONTACT_GROUP_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(ContactContactGroupPeer::CONTACT_GROUP_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Contact';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'slug'                          => 'Text',
      'first_name'                    => 'Text',
      'last_name'                     => 'Text',
      'company'                       => 'Text',
      'email'                         => 'Text',
      'status'                        => 'Number',
      'external_reference'            => 'Text',
      'custom1'                       => 'Text',
      'custom2'                       => 'Text',
      'custom3'                       => 'Text',
      'custom4'                       => 'Text',
      'custom5'                       => 'Text',
      'custom6'                       => 'Text',
      'custom7'                       => 'Text',
      'custom8'                       => 'Text',
      'custom9'                       => 'Text',
      'custom10'                      => 'Text',
      'created_at'                    => 'Date',
      'updated_at'                    => 'Date',
      'campaign_contact_element_list' => 'ManyKey',
      'campaign_contact_list'         => 'ManyKey',
      'contact_contact_group_list'    => 'ManyKey',
    );
  }
}
