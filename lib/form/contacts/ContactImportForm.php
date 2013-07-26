<?php

class ContactImportForm extends sfForm {
	const OPTION_GROUP_NONE = 1;
	const OPTION_GROUP_NEW = 2;
	const OPTION_GROUP_EXISTING = 3;
	public function setup()
	{
		$widgets = array();
		$validators = array();
		$defaults = array();

		if(false == sfConfig::get('app_options_contact_group')){
			//region operation
			$widgets['operation'] = new sfWidgetFormInputHidden();
			$validators['operation'] = new sfValidatorChoice(array('choices' => array(self::OPTION_GROUP_NONE)));
			//endregion
		}else{
			//region operation
			$groups = ContactGroupPeer::getGroups();
			$hasGroups = false;

			$choices = array();
			$choices[self::OPTION_GROUP_NONE] = 'Importer les contacts sans créer de groupe';
			$choices[self::OPTION_GROUP_NEW] = 'Importer les contacts et les ajouter à un nouveau groupe s\'appelant:';

			if (!empty($groups)) {
				$choices[self::OPTION_GROUP_EXISTING] = 'Importer les contacts et les ajouter aux groupes suivants :';
				$hasGroups = true;
			}
			$widgets['operation'] = new sfWidgetFormSelectRadio(array('label'=>'Options', 'choices' => $choices, 'formatter' => array($this, 'formatChoices')));
			$validators['operation'] = new sfValidatorChoice(array('choices' => array(self::OPTION_GROUP_NONE, self::OPTION_GROUP_NEW, self::OPTION_GROUP_EXISTING)));
			//endregion

			//region new_group
				$widgets['new_group'] = new sfWidgetFormInput();
				$validators['new_group'] = new sfValidatorString(array('required' => false), array('required' => 'Le nom du groupe est requis'));
			//endregion

			//region existing_groups
			if ($hasGroups) {

				$widgets['existing_groups'] = new sfWidgetFormSelectCheckbox(array('choices' => $groups, 'formatter' => array($this, 'formatGroupChoices')));
				$validators['existing_groups'] = new sfValidatorChoice( array('choices' => array_keys($groups), 'required' => false, 'multiple' => true), array('required' => 'Vous devez sélectionner au moins un groupe'));
			}
			//endregion
		}

		$defaults['operation'] = self::OPTION_GROUP_NONE;


		//region file
		$widgets['file'] = new sfWidgetFormInputFile(array('label' => 'Fichier à importer'));

		//excels
		$allowedMimeTypes = array ('application/vnd.ms-office','application/vnd.ms-excel', 'application/x-msexcel', 'application/ms-excel', 'application/excel', 'application/msword');
		foreach($allowedMimeTypes as $k => $v){
			$allowedMimeTypes[] = $v.'; charset=binary';
		}
		//csv
		$allowedMimeTypes[] = 'text/plain; charset=unknown-8bit';
		$allowedMimeTypes[] = 'text/plain; charset=iso-8859-1';
		$allowedMimeTypes[] = 'text/plain; charset=us-ascii';

		//fichier exporté depuis l'appli
		$allowedMimeTypes[] = 'cdf v2 document, corrupt: cannot read summary info';

		$validators['file'] = new czValidatorFileContactImport(array('required' => true, 'mime_types' =>  $allowedMimeTypes), array('required' => 'Le fichier excel est requis','mime_types'=>'Le format de fichier n\'est pas compatible. Veuillez fournir un fichier au format excel(xls) ou Csv(csv) pour importer vos contacts. (%mime_type%)'));
		//endregion

		//region is_test_group
		$widgets['is_test_group'] = new sfWidgetFormInputCheckbox(array('label' => 'Cochez cette case s\'il s\'agit d\'un groupe d\'utilisateurs de tests'));
		$validators['is_test_group'] = new sfValidatorBoolean();
		//endregion

		$this->setWidgets($widgets);
		$this->setDefaults($defaults);
		$this->setValidators($validators);
		$this->widgetSchema->setNameFormat('contact_import[%s]');
		$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

		parent::setup();
	}

	public function bind(array $taintedValues = null, array $taintedFiles = null)
	{
		switch (@$taintedValues["operation"]) {
			case self::OPTION_GROUP_NONE:
				break;
			case self::OPTION_GROUP_NEW:
				$this->validatorSchema["new_group"]->setOption('required', true);
				break;
			case self::OPTION_GROUP_EXISTING:
				$this->validatorSchema["existing_groups"]->setOption('required', true);
				break;
			default: ;
		} // switch
		return parent::bind($taintedValues, $taintedFiles);
	}

	public function formatChoices($widget, $choices)
	{
		$result = get_partial('contacts/formImportEditChoices', array('form' => $this, 'widget' => $widget, 'choices' => $choices));
		return $result;
	}

	public function formatGroupChoices($widget, $choices)
	{
		$result = '';
		foreach($choices as $choice) {
			$result .= sprintf('<label class="checkbox listenGroups">%s%s</label>', $choice['input'], html_entity_decode($choice['label']));
		}
		return $result;
	}

	public function initializeContactImporter(ContactImporter $importer)
	{
		switch ($this->getValue('operation')) {
			case ContactImportForm::OPTION_GROUP_NONE:
				break;
			case ContactImportForm::OPTION_GROUP_NEW:
				$group = new ContactGroup();
				$group->setName($this->getValue('new_group'));
				$group->setIsTestGroup($this->getValue('is_test_group'));
				$group->save();

				$importer->commit();
				$importer->addToGroup($group);

				break;
			case ContactImportForm::OPTION_GROUP_EXISTING:
				$importer->addToGroupIds($this->getValue('existing_groups'));
				break;
			default:
				throw new Exception('Unsupported case: ' . $this->getValue('operation'));
		} // switch
	}
}
