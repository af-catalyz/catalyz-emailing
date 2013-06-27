<?php
class asfoDeveloppementForm extends /*(sfForm)*/sfForm {
	public function configure()
	{
		parent::configure();

		//region style
		$this->widgetSchema['style'] = new sfWidgetFormSelect(array('multiple' => FALSE, 'choices'=> array(1=>'Générale(Rouge)',2=>'Santé(Vert)')),array('label' => 'Type de campagne'));
		$this->validatorSchema['style'] = new sfValidatorString(array('required' => false));
		$this->defaults['style'] = '';
		$this->getWidgetSchema()->setHelp('style', '');
		//endregion

		//region introduction
		$this->widgetSchema['introduction'] = new sfWidgetFormTextarea(array(),array('label' => 'Introduction','style' => 'width: 400px','rows'=>2));
		$this->validatorSchema['introduction'] = new sfValidatorString(array('required' => false));
		$this->defaults['introduction'] = 'Lorem ipsum dolor sit amet, mucius liberavisse ad cum, quod cotidieque referrentur vim ei, at soleat apeirian partiendo sea.';
		$this->getWidgetSchema()->setHelp('introduction', '');
		//endregion

		//region bloc_1_title
		$this->widgetSchema['bloc_1_title'] = new sfWidgetFormInput(array(), array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['bloc_1_title'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_1_title'] = '';
		$this->getWidgetSchema()->setHelp('bloc_1_title', '');
		//endregion

		//region bloc_1_content
		$this->widgetSchema['bloc_1_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'bloc_1_content',
		        'formClass' => 'asfoDeveloppementForm_top',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'caption',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)
		);
		$this->validatorSchema['bloc_1_content'] = new czValidatorSubForm(array('formClass' => 'asfoDeveloppementForm_top'));
		$this->defaults['bloc_1_content'] = '';
		$this->getWidgetSchema()->setHelp('bloc_1_content', '');
		//endregion

		//region bloc_1_trainer
		$this->widgetSchema['bloc_1_trainer'] = new sfWidgetFormInput(array(), array('label' => 'Nom','style' => 'width: 400px'));
		$this->validatorSchema['bloc_1_trainer'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_1_trainer'] = '';
		$this->getWidgetSchema()->setHelp('bloc_1_trainer', '');
		//endregion

		//region bloc_1_trainer_email
		$this->widgetSchema['bloc_1_trainer_email'] = new sfWidgetFormInput(array(), array('label' => 'Email','style' => 'width: 400px'));
		$this->validatorSchema['bloc_1_trainer_email'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_1_trainer_email'] = '';
		$this->getWidgetSchema()->setHelp('bloc_1_trainer_email', '');
		//endregion

		//region bloc_2_title
		$this->widgetSchema['bloc_2_title'] = new sfWidgetFormInput(array(), array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['bloc_2_title'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_2_title'] = '';
		$this->getWidgetSchema()->setHelp('bloc_2_title', '');
		//endregion

		//region bloc_2_content
		$this->widgetSchema['bloc_2_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'bloc_2_content',
		        'formClass' => 'asfoDeveloppementForm_top',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'caption',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)
		);
		$this->validatorSchema['bloc_2_content'] = new czValidatorSubForm(array('formClass' => 'asfoDeveloppementForm_top'));
		$this->defaults['bloc_2_content'] = '';
		$this->getWidgetSchema()->setHelp('bloc_2_content', '');
		//endregion

		//region bloc_2_trainer
		$this->widgetSchema['bloc_2_trainer'] = new sfWidgetFormInput(array(), array('label' => 'Nom','style' => 'width: 400px'));
		$this->validatorSchema['bloc_2_trainer'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_2_trainer'] = '';
		$this->getWidgetSchema()->setHelp('bloc_2_trainer', '');
		//endregion

		//region bloc_2_trainer_email
		$this->widgetSchema['bloc_2_trainer_email'] = new sfWidgetFormInput(array(), array('label' => 'Email','style' => 'width: 400px'));
		$this->validatorSchema['bloc_2_trainer_email'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_2_trainer_email'] = '';
		$this->getWidgetSchema()->setHelp('bloc_2_trainer_email', '');
		//endregion

		//region bloc_3_title
		$this->widgetSchema['bloc_3_title'] = new sfWidgetFormInput(array(), array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['bloc_3_title'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_3_title'] = '';
		$this->getWidgetSchema()->setHelp('bloc_3_title', '');
		//endregion

		//region bloc_3_content
		$this->widgetSchema['bloc_3_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'bloc_3_content',
		        'formClass' => 'asfoDeveloppementForm_top',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'caption',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)
		);
		$this->validatorSchema['bloc_3_content'] = new czValidatorSubForm(array('formClass' => 'asfoDeveloppementForm_top'));
		$this->defaults['bloc_3_content'] = '';
		$this->getWidgetSchema()->setHelp('bloc_3_content', '');
		//endregion

		//region bloc_3_trainer
		$this->widgetSchema['bloc_3_trainer'] = new sfWidgetFormInput(array(), array('label' => 'Nom','style' => 'width: 400px'));
		$this->validatorSchema['bloc_3_trainer'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_3_trainer'] = '';
		$this->getWidgetSchema()->setHelp('bloc_3_trainer', '');
		//endregion

		//region bloc_3_trainer_email
		$this->widgetSchema['bloc_3_trainer_email'] = new sfWidgetFormInput(array(), array('label' => 'Email','style' => 'width: 400px'));
		$this->validatorSchema['bloc_3_trainer_email'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_3_trainer_email'] = '';
		$this->getWidgetSchema()->setHelp('bloc_3_trainer_email', '');
		//endregion

		//region bloc_4_title
		$this->widgetSchema['bloc_4_title'] = new sfWidgetFormInput(array(), array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['bloc_4_title'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_4_title'] = '';
		$this->getWidgetSchema()->setHelp('bloc_4_title', '');
		//endregion

		//region bloc_4_content
		$this->widgetSchema['bloc_4_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'bloc_4_content',
		        'formClass' => 'asfoDeveloppementForm_top',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'caption',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)
		);
		$this->validatorSchema['bloc_4_content'] = new czValidatorSubForm(array('formClass' => 'asfoDeveloppementForm_top'));
		$this->defaults['bloc_4_content'] = '';
		$this->getWidgetSchema()->setHelp('bloc_4_content', '');
		//endregion

		//region bloc_4_trainer
		$this->widgetSchema['bloc_4_trainer'] = new sfWidgetFormInput(array(), array('label' => 'Nom','style' => 'width: 400px'));
		$this->validatorSchema['bloc_4_trainer'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_4_trainer'] = '';
		$this->getWidgetSchema()->setHelp('bloc_4_trainer', '');
		//endregion

		//region bloc_4_trainer_email
		$this->widgetSchema['bloc_4_trainer_email'] = new sfWidgetFormInput(array(), array('label' => 'Email','style' => 'width: 400px'));
		$this->validatorSchema['bloc_4_trainer_email'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_4_trainer_email'] = '';
		$this->getWidgetSchema()->setHelp('bloc_4_trainer_email', '');
		//endregion

		//region bloc_5_title
		$this->widgetSchema['bloc_5_title'] = new sfWidgetFormInput(array(), array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['bloc_5_title'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_5_title'] = '';
		$this->getWidgetSchema()->setHelp('bloc_5_title', '');
		//endregion

		//region bloc_5_content
		$this->widgetSchema['bloc_5_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'bloc_5_content',
		        'formClass' => 'asfoDeveloppementForm_top',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'caption',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)
		);
		$this->validatorSchema['bloc_5_content'] = new czValidatorSubForm(array('formClass' => 'asfoDeveloppementForm_top'));
		$this->defaults['bloc_5_content'] = '';
		$this->getWidgetSchema()->setHelp('bloc_5_content', '');
		//endregion

		//region bloc_5_trainer
		$this->widgetSchema['bloc_5_trainer'] = new sfWidgetFormInput(array(), array('label' => 'Nom','style' => 'width: 400px'));
		$this->validatorSchema['bloc_5_trainer'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_5_trainer'] = '';
		$this->getWidgetSchema()->setHelp('bloc_5_trainer', '');
		//endregion

		//region bloc_5_trainer_email
		$this->widgetSchema['bloc_5_trainer_email'] = new sfWidgetFormInput(array(), array('label' => 'Email','style' => 'width: 400px'));
		$this->validatorSchema['bloc_5_trainer_email'] = new sfValidatorString(array('required' => false));
		$this->defaults['bloc_5_trainer_email'] = '';
		$this->getWidgetSchema()->setHelp('bloc_5_trainer_email', '');
		//endregion

		//region link_catalog
		$this->widgetSchema['link_catalog'] = new sfWidgetFormInput(array(), array('label' => 'Lien vers le catalogue','style' => 'width: 400px'));
		$this->validatorSchema['link_catalog'] = new sfValidatorString(array('required' => false));
		$this->defaults['link_catalog'] = '';
		$this->getWidgetSchema()->setHelp('link_catalog', '');
		//endregion

		//region atout
		$this->widgetSchema['atout'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'atout',
		        'formClass' => 'asfoDeveloppementForm_bottom',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter un atout',
		        ), array('label' => false)

		);
		$this->validatorSchema['atout'] = new czValidatorSubForm(array('formClass' => 'asfoDeveloppementForm_bottom'));
		$this->defaults['atout'] = '';
		$this->getWidgetSchema()->setHelp('atout', '');
		//endregion

		//region picture_1
		$this->widgetSchema['picture_1'] = new czWidgetFormImage(array('picture.width' => 236, 'picture.height'=> 145), array('label' => 'Illustration de gauche', 'style' => 'width: 400px'));
		$this->validatorSchema['picture_1'] = new sfValidatorString(array('required' => false));
		$this->defaults['picture_1'] = '';
		$this->getWidgetSchema()->setHelp('picture_1', '');
		//endregion

		//region picture_2
		$this->widgetSchema['picture_2'] = new czWidgetFormImage(array('picture.width' => 236, 'picture.height'=> 145), array('label' => 'Illustration de droite', 'style' => 'width: 400px'));
		$this->validatorSchema['picture_2'] = new sfValidatorString(array('required' => false));
		$this->defaults['picture_2'] = '';
		$this->getWidgetSchema()->setHelp('picture_2', '');
		//endregion

		//region link_contact
		$this->widgetSchema['link_contact'] = new sfWidgetFormInput(array(), array('label' => 'Lien sur le bouton "Contact"','style' => 'width: 400px'));
		$this->validatorSchema['link_contact'] = new sfValidatorString(array('required' => false));
		$this->defaults['link_contact'] = '';
		$this->getWidgetSchema()->setHelp('link_contact', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
