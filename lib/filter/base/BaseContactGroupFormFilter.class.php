<?php

/**
 * ContactGroup filter form base class.
 *
 * @package    catalyz_emailing
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseContactGroupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                        => new sfWidgetFormFilterInput(),
      'is_test_group'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'legend'                      => new sfWidgetFormFilterInput(),
      'created_at'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'campaign_contact_group_list' => new sfWidgetFormPropelChoice(array('model' => 'Campaign', 'add_empty' => true)),
      'contact_contact_group_list'  => new sfWidgetFormPropelChoice(array('model' => 'Contact', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                        => new sfValidatorPass(array('required' => false)),
      'is_test_group'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'legend'                      => new sfValidatorPass(array('required' => false)),
      'created_at'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'campaign_contact_group_list' => new sfValidatorPropelChoice(array('model' => 'Campaign', 'required' => false)),
      'contact_contact_group_list'  => new sfValidatorPropelChoice(array('model' => 'Contact', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_group_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
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

    $criteria->addJoin(CampaignContactGroupPeer::CONTACT_GROUP_ID, ContactGroupPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CampaignContactGroupPeer::CAMPAIGN_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CampaignContactGroupPeer::CAMPAIGN_ID, $value));
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

    $criteria->addJoin(ContactContactGroupPeer::CONTACT_GROUP_ID, ContactGroupPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(ContactContactGroupPeer::CONTACT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(ContactContactGroupPeer::CONTACT_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'ContactGroup';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'name'                        => 'Text',
      'is_test_group'               => 'Boolean',
      'legend'                      => 'Text',
      'created_at'                  => 'Date',
      'updated_at'                  => 'Date',
      'campaign_contact_group_list' => 'ManyKey',
      'contact_contact_group_list'  => 'ManyKey',
    );
  }
}
