<?php
class astiaNewsletter2012Form extends sfForm {
	public function configure()
	{
		parent::configure();

		//region number
		$this->widgetSchema['number'] = new sfWidgetFormInput(array(),array('label' => 'Numéro de la newsletter','style' => 'width: 400px'));
		$this->validatorSchema['number'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('number', '');
		//endregion

		//region date
		$this->widgetSchema['date'] = new sfWidgetFormInput(array(),array('label' => 'Date de la newsletter','style' => 'width: 400px'));
		$this->validatorSchema['date'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('date', '');
		//endregion

		//region edito
		$this->widgetSchema['edito'] = new czWidgetFormTextareaTinyMCE(array(),array('label' => 'Edito','height' => 300 ,'style' => 'width: 400px'));
		$this->validatorSchema['edito'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('edito', '');
		//endregion

		//region zone_actu_title
		$this->widgetSchema['zone_actu_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['zone_actu_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('zone_actu_title', '');
		//endregion

		//region zone_actu_picture
		$this->widgetSchema['zone_actu_picture'] = new czWidgetFormImage(array( 'picture.width' => 205, 'picture.height' => 250, 'thumbnail.width' => 205/2, 'thumbnail.height' => 250/2), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['zone_actu_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('zone_actu_picture', '');
		//endregion

		//region zone_actu_content
			$this->widgetSchema['zone_actu_content'] = new czWidgetFormSubForm(array(
			        'fieldName' => 'zone_actu_content',
			        'formClass' => 'astiaNewsletter2012Form_actu',
			        'contentObjectClass' => 'campaign[content]',
			        'title' => 'title'
			        ), array('label' => false)
			);
			$this->validatorSchema['zone_actu_content'] = new czValidatorSubForm(array('formClass' => 'astiaNewsletter2012Form_actu'));
			$this->getWidgetSchema()->setHelp('zone_actu_content', '');
			//endregion

		//region zone_actu_link
		$this->widgetSchema['zone_actu_link'] = new czWidgetFormLink(array(),array('label' => 'Lien','style' => 'width: 400px'));
		$this->validatorSchema['zone_actu_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('zone_actu_title', '');
		//endregion

		//region zone_annexe_title
		$this->widgetSchema['zone_annexe_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['zone_annexe_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('zone_annexe_title', '');
		//endregion

		//region zone_annexe_content
		$this->widgetSchema['zone_annexe_content'] = new sfWidgetFormTextarea(array(),array('label' => 'Contenu','style' => 'width: 400px'));
		$this->validatorSchema['zone_annexe_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('zone_annexe_content', '');
		//endregion

		//region zone_annexe_link
		$this->widgetSchema['zone_annexe_link'] = new czWidgetFormLink(array(),array('label' => 'Lien','style' => 'width: 400px'));
		$this->validatorSchema['zone_annexe_link'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('zone_annexe_link', '');
		//endregion

		//region zone_experiences_title
		$this->widgetSchema['zone_experiences_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['zone_experiences_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('zone_experiences_title', '');
		//endregion

		//region zone_experiences_content
		$this->widgetSchema['zone_experiences_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'zone_experiences_content',
		        'formClass' => 'astiaNewsletter2012Form_experiences',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title'
		        ), array('label' => false)
		);
		$this->validatorSchema['zone_experiences_content'] = new czValidatorSubForm(array('formClass' => 'astiaNewsletter2012Form_experiences'));
		$this->getWidgetSchema()->setHelp('zone_experiences_content', '');
		//endregion

		//region breves
		$this->widgetSchema['breves'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'breves',
		        'formClass' => 'astiaNewsletter2012Form_right1',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title'
		        ), array('label' => false)
		);
		$this->validatorSchema['breves'] = new czValidatorSubForm(array('formClass' => 'astiaNewsletter2012Form_right1'));
		$this->getWidgetSchema()->setHelp('breves', '');
		//endregion

		//region agendas
		$this->widgetSchema['agendas'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'agendas',
		        'formClass' => 'astiaNewsletter2012Form_right2',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title'
		        ), array('label' => false)
		);
		$this->validatorSchema['agendas'] = new czValidatorSubForm(array('formClass' => 'astiaNewsletter2012Form_right2'));
		$this->getWidgetSchema()->setHelp('agendas', '');
		//endregion

		//region zooms
		$this->widgetSchema['zooms'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'zooms',
		        'formClass' => 'astiaNewsletter2012Form_right3',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title'
		        ), array('label' => false)
		);
		$this->validatorSchema['zooms'] = new czValidatorSubForm(array('formClass' => 'astiaNewsletter2012Form_right3'));
		$this->getWidgetSchema()->setHelp('zooms', '');
		//endregion

		//region savoirs
		$this->widgetSchema['savoirs'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'savoirs',
		        'formClass' => 'astiaNewsletter2012Form_right3',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title'
		        ), array('label' => false)
		);
		$this->validatorSchema['savoirs'] = new czValidatorSubForm(array('formClass' => 'astiaNewsletter2012Form_right3'));
		$this->getWidgetSchema()->setHelp('savoirs', '');
		//endregion

		//region chiffres
		$this->widgetSchema['chiffres'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'chiffres',
		        'formClass' => 'astiaNewsletter2012Form_right4',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title'
		        ), array('label' => false)
		);
		$this->validatorSchema['chiffres'] = new czValidatorSubForm(array('formClass' => 'astiaNewsletter2012Form_right4'));
		$this->getWidgetSchema()->setHelp('chiffres', '');
		//endregion

		//region footer_title
		$this->widgetSchema['footer_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['footer_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('footer_title', '');
		//endregion

		//region adress
		$this->widgetSchema['adress'] = new sfWidgetFormInput(array(),array('label' => 'Adresse','style' => 'width: 400px'));
		$this->validatorSchema['adress'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('adress', '');
		//endregion

		//region phone
		$this->widgetSchema['phone'] = new sfWidgetFormInput(array(),array('label' => 'Téléphone','style' => 'width: 400px'));
		$this->validatorSchema['phone'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('phone', '');
		//endregion

		//region fax
		$this->widgetSchema['fax'] = new sfWidgetFormInput(array(),array('label' => 'Fax','style' => 'width: 400px'));
		$this->validatorSchema['fax'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('fax', '');
		//endregion

		//region email
		$this->widgetSchema['email'] = new sfWidgetFormInput(array(),array('label' => 'Email','style' => 'width: 400px'));
		$this->validatorSchema['email'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('email', '');
		//endregion

		//region mentions
		/*
		$this->widgetSchema['mentions'] = new czWidgetFormTextareaTinyMCE(array('height' => 300),array('label' => 'Mentions légales'));
		$this->validatorSchema['mentions'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('mentions', '');
		*/
		//endregion


		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
