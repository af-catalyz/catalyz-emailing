<?php

class UnsubscribedClientForm extends sfForm {

	public function setup()
	{

		parent::setup();

		$labels = array();
		$widgets['email'] = new sfWidgetFormInputHidden();
		$validators['email'] = new sfValidatorString(array('required' => FALSE));

		$widgets['campaignId'] = new sfWidgetFormInputHidden();
		$validators['campaignId'] = new sfValidatorString(array('required' => FALSE));

		$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
		$configuration = $czSettings->get(CatalyzSettings::CUSTOM_UNSUBSCRIBED_CONFIGURATION, array());

		$raisons = $configuration['qualif_motif_raisons'];
		$choices = array();
		$tokens = explode('<br />', nl2br($raisons));
		$choices['non précisé'] = '--Veuillez choisir une raison--';
		foreach ($tokens as $token){
			$choices[trim($token)] = trim($token);
		}

		$widgets['raison'] = new sfWidgetFormSelect(array('choices' => $choices));
		$validators['raison'] = new sfValidatorChoice(array('choices' => array_keys($choices),'required' => FALSE));

		if (!empty($configuration['qualif_list_enabled']) && !empty($configuration['qualif_list_enabled'])) {
			$listes = unserialize($configuration['qualif_list_publication']);

			$list_choices = array();
			foreach ($listes as $liste_id => $liste_details){
				$list_choices[$liste_id] = $liste_details['title'];
			}

			$widgets['qualif_list_publication'] = new sfWidgetFormChoice(array('choices' => $list_choices , 'multiple' => true, 'expanded' => true));
			$validators['qualif_list_publication'] = new sfValidatorChoice(array('choices' => array_keys($list_choices), 'multiple' => true,'required' => FALSE));
			$this->setDefault('qualif_list_publication', array_keys($list_choices));
		}



		$this->setWidgets($widgets);
		$this->setValidators($validators);

		$this->getWidgetSchema()->setLabels($labels);

		$this->widgetSchema->setNameFormat('unsubscribed[%s]');
		$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
	}
}