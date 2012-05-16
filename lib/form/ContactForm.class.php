<?php

/**
 * Contact form.
 *
 * @package    catalyz_emailing
 * @subpackage form
 * @author     Your name here
 */
class ContactForm extends BaseContactForm
{
  public function configure()
  {
  	parent::configure();

  	unset(
  		$this['created_at'],
  		$this['updated_at'],
  		$this['campaign_contact_element_list'],
  		$this['campaign_contact_list']
  	);

  	foreach (array('first_name','last_name','company','email') as $field){
  		$this->widgetSchema[$field] =  new sfWidgetFormInput(array(),array('class'=> 'input-xlarge'));
  	}

  	$this->widgetSchema['slug'] =  new sfWidgetFormInputHidden();
  	$this->widgetSchema['status'] =  new sfWidgetFormInputHidden();
  	$this->widgetSchema['external_reference'] =  new sfWidgetFormInputHidden();
  	$this->widgetSchema['contact_contact_group_list'] =  new sfWidgetFormPropelChoice(array('multiple' => true, 'expanded'=> true , 'model' => 'ContactGroup'));


  	//region $customFields
  	//first create hidden fields
  	for ($i=2;$i<= sfConfig::get('app_fields_count', 10);$i++){
  		$field = 'custom'.$i;
  		$this->widgetSchema[$field] =  new sfWidgetFormInputHidden();
  	}

  	//then display enabled
  	$customFields = CatalyzEmailing::getCustomFields();
  	foreach ($customFields as $key => $caption) {
  		$this->widgetSchema[$key] =  new sfWidgetFormInput(array(),array('class'=> 'input-xlarge'));
  	}
  	//endregion



		foreach ($customFields as $key => $caption) {
			$this->validatorSchema[$key] = new sfValidatorString(array('max_length' => 255, 'required' => false));
		}

  	$this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true), array(
  	            'required' => 'L\'adresse email est requise',
  	            'invalid' => 'L\'adresse email n\'est pas valide')
  	);



		$this->validatorSchema->setPostValidator(new czValidatorPropelUniqueContact());

		$labels = array(
		    'first_name' => 'Prénom',
		    'last_name' => 'Nom',
		    'company' => 'Société',
		    'email' => 'Email',
		    'contact_contact_group_list' => 'Groupes',
		    );

		foreach ($customFields as $key => $caption) {
			$labels[$key] = $caption;
		}

  	$this->widgetSchema->setLabels($labels);



		$this->widgetSchema->setNameFormat('contact[%s]');
	}

	public function save($con = null)
	{
		$return = parent::save($con);

		if (!$this->getObject()->isNew()) {
			$criteria = new Criteria();
			$criteria->add(ContactContactGroupPeer::CONTACT_ID, $this->getObject()->getId());
			ContactContactGroupPeer::doDelete($criteria, $con);
		}

		foreach($this->getValue('contact_group') as $groupId) {
			$item = new ContactContactGroup();
			$item->setContactGroupId($groupId);
			$item->setContactId($this->getObject()->getId());
			$item->save($con);
		}

		return $return;
	}
}
