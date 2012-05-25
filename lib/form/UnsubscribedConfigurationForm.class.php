<?php

class UnsubscribedConfigurationForm extends sfForm {
	public function configure()
	{
		$defaults = array();
		//region Confirmation
		$choices = array(1 => 'Le texte suivant',2 => 'Les informations présentes à l\'adresse suivante');
		$widgets['conf_type'] = new sfWidgetFormSelectRadio(array('choices' => $choices, 'formatter' => array($this, 'formatType')));;
		$validators['conf_type'] = new sfValidatorChoice(array('choices' => array_keys($choices),'required' => TRUE));
		$defaults['conf_type'] = 1;

		$widgets['conf_content'] = new czWidgetFormTextareaTinyMCE();
		$validators['conf_content'] = new sfValidatorString(array('required' => FALSE), array('required' => '<span class="help-block">Le message de validation ne peut être vide</span>'));
		$defaults['conf_content'] = 'Vous avez été désinscrit de la lettre d\'information.';

		$widgets['conf_url'] = new sfWidgetFormInput(array(), array('class' => 'input-xlarge'));
		$validators['conf_url'] = new sfValidatorUrl(array('required' => FALSE) ,array('invalid' => '<span class="help-block">l\'adresse n\'est pas valide</span>', 'required' => '<span class="help-block">Vous devez fournir l\'adresse sur laquelle l\'utilisateur sera dirigé</span>'));
		//endregion

		//region Qualification
		$widgets['qualif_enabled'] = new sfWidgetFormInputCheckbox(array(),array('class' => 'qualif_listen'));
		$validators['qualif_enabled'] = new sfValidatorBoolean(array('required' => FALSE));

		$widgets['qualif_header'] = new czWidgetFormTextareaTinyMCE();
		$validators['qualif_header'] = new sfValidatorString(array('required' => FALSE));

		$widgets['qualif_list_enabled'] = new sfWidgetFormInputCheckbox(array(),array('class' => 'qualif_list_listen'));
		$validators['qualif_list_enabled'] = new sfValidatorBoolean(array('required' => FALSE));

		$widgets['qualif_list_introduction'] = new czWidgetFormTextareaTinyMCE();
		$validators['qualif_list_introduction'] = new sfValidatorString(array('required' => FALSE));

		$widgets['qualif_motif_introduction'] = new czWidgetFormTextareaTinyMCE();
		$validators['qualif_motif_introduction'] = new sfValidatorString(array('required' => FALSE));

		$widgets['qualif_motif_raisons'] = new sfWidgetFormTextarea(array(),array('style' => 'width: 616px; resize: none;'));
		$validators['qualif_motif_raisons'] = new sfValidatorString(array('required' => FALSE), array('required' => '<span class="help-block">Vous devez définir au moins une raison</span>'));

		$widgets['qualif_footer'] = new czWidgetFormTextareaTinyMCE();
		$validators['qualif_footer'] = new sfValidatorString(array('required' => FALSE));
		//endregion

		//region Notification
		$widgets['notif_enabled'] = new sfWidgetFormInputCheckbox(array(),array('class' => 'notif_listen'));
		$validators['notif_enabled'] = new sfValidatorBoolean(array('required' => FALSE));

		$widgets['notif_recipient'] = new sfWidgetFormInput(array(), array('class' => 'input-xlarge'));
		$validators['notif_recipient'] = new czValidatorEmailList(array('required' => FALSE), array('required' => '<span class="help-block">Vous devez définir le destinataire des emails de notification</span>', 'invalid' => '<span class="help-block">L\'email est invalide</span>'));

		$widgets['notif_subject'] = new sfWidgetFormInput(array(), array('class' => 'input-xlarge'));
		$validators['notif_subject'] = new sfValidatorString(array('max_length' => 255, 'required' => FALSE), array('required' => '<span class="help-block">Vous devez définir le sujet du mail de notification</span>'));
		$defaults['notif_subject'] ='[Catalyz Emailing] #FIRSTNAME# #LASTNAME# s\'est désabonné';
		//endregion

		$this->setWidgets($widgets);
		$this->setDefaults($defaults);
		$this->setValidators($validators);

		$this->getWidgetSchema()->setLabels(array(
		'conf_type' => 'Une fois l\'utilisateur désabonné, quel message souhaitez-vous lui présenter?',
		'conf_content' => FALSE,
		'conf_url' => FALSE,
		'qualif_enabled' => 'Qualifier les désabonnements',
		'qualif_header' => 'Haut de page',
		'qualif_list_enabled' => 'Permettre à l\'utilisateur de sélectionner les types de publication duquel il souhaite se désabonner',
		'qualif_list_introduction' => 'Introduction',
		'qualif_motif_introduction' => 'Introduction',
		'qualif_motif_raisons' => 'Listez ci-dessous les motifs que vous souhaitez proposer à vos abonnés pour préciser la raison de leur désabonnement',
		'qualif_footer' => 'Bas de page',
		'notif_enabled' => 'Recevoir un email de notification quand un contact se désabonne',
		'notif_recipient' => 'Destinataire',
		'notif_subject' => 'Sujet',
		));


		$this->widgetSchema->setNameFormat('unsubscribed[%s]');
		$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
	}

	public function formatType($widget, $choices)
	{
		return get_partial('settings/editType', array('form' => $this, 'widget' => $widget, 'choices' => $choices));
	}

	public function bind(array $taintedValues = null, array $taintedFiles = null)
	{
		//if (!empty($taintedValues['qualif_list_enabled'])) {
//			$this->validatorSchema['qualif_list_publication']->setOption('required', true);
//		}

		if (!empty($taintedValues['conf_type'])) {
			if ($taintedValues['conf_type'] == 1) {
				$this->validatorSchema['conf_content']->setOption('required', true);
			}else{
				$this->validatorSchema['conf_url']->setOption('required', true);
			}
		}

		if (!empty($taintedValues['qualif_enabled'])) {
			$this->validatorSchema['qualif_motif_raisons']->setOption('required', true);
		}

		if (!empty($taintedValues['notif_enabled'])) {
			$this->validatorSchema['notif_recipient']->setOption('required', true);
			$this->validatorSchema['notif_subject']->setOption('required', true);
		}

		parent::bind($taintedValues, $taintedFiles);
	}

}