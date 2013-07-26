<?php
class asfoCalendrierForm extends sfForm {
	public function configure()
	{
		parent::configure();

		//region introduction
		$this->widgetSchema['introduction'] = new sfWidgetFormTextarea(array(),array('label' => 'Introduction','style' => 'width: 400px','rows'=>2));
		$this->validatorSchema['introduction'] = new sfValidatorString(array('required' => false));
		$this->defaults['introduction'] = 'Lorem ipsum dolor sit amet, mucius liberavisse ad cum, quod cotidieque referrentur vim ei, at soleat apeirian partiendo sea.';
		$this->getWidgetSchema()->setHelp('introduction', '');
		//endregion

		//region periode_1
		$this->widgetSchema['periode_1'] = new sfWidgetFormInput(array(), array('label' => 'Période 1','style' => 'width: 400px'));
		$this->validatorSchema['periode_1'] = new sfValidatorString(array('required' => false));
		$this->defaults['periode_1'] = '';
		$this->getWidgetSchema()->setHelp('periode_1', '');
		//endregion

		//region periode_2
		$this->widgetSchema['periode_2'] = new sfWidgetFormInput(array(), array('label' => 'Période 2','style' => 'width: 400px'));
		$this->validatorSchema['periode_2'] = new sfValidatorString(array('required' => false));
		$this->defaults['periode_2'] = '';
		$this->getWidgetSchema()->setHelp('periode_2', '');
		//endregion

		//region periode_3
		$this->widgetSchema['periode_3'] = new sfWidgetFormInput(array(), array('label' => 'Période 3','style' => 'width: 400px'));
		$this->validatorSchema['periode_3'] = new sfValidatorString(array('required' => false));
		$this->defaults['periode_3'] = '';
		$this->getWidgetSchema()->setHelp('periode_3', '');
		//endregion

		$choices_tab = array();
		$choices_tab['Général']=array();
		$choices_tab['Général']['administratif']='Administratif';
		$choices_tab['Général']['management']='Management';
		$choices_tab['Général']['qse']='Qualité sécurité environnement';
		$choices_tab['Général']['technique']='Technique';
		$choices_tab['Général']['strategie']='Stratégie';
		$choices_tab['Général']['gestion']='Gestion des compétences';


		//region ligne_1_style
		$this->widgetSchema['ligne_1_style'] = new sfWidgetFormSelect(array('multiple' => FALSE, 'choices'=> $choices_tab),array('label' => 'Type de campagne'));
		$this->validatorSchema['ligne_1_style'] = new sfValidatorString(array('required' => false));
		$this->defaults['ligne_1_style'] = '';
		$this->getWidgetSchema()->setHelp('ligne_1_style', '');
		//endregion

		//region ligne_1_formations
		$this->widgetSchema['ligne_1_formations'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'ligne_1_formations',
		        'formClass' => 'asfoCalendrierForm_formation',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'caption',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)

		);
		$this->validatorSchema['ligne_1_formations'] = new czValidatorSubForm(array('formClass' => 'asfoCalendrierForm_formation'));
		$this->defaults['ligne_1_formations'] = '';
		$this->getWidgetSchema()->setHelp('ligne_1_formations', '');
		//endregion

		//region ligne_2_style
		$this->widgetSchema['ligne_2_style'] = new sfWidgetFormSelect(array('multiple' => FALSE, 'choices'=> $choices_tab),array('label' => 'Type de campagne'));
		$this->validatorSchema['ligne_2_style'] = new sfValidatorString(array('required' => false));
		$this->defaults['ligne_2_style'] = '';
		$this->getWidgetSchema()->setHelp('ligne_2_style', '');
		//endregion

		//region ligne_2_formations
		$this->widgetSchema['ligne_2_formations'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'ligne_2_formations',
		        'formClass' => 'asfoCalendrierForm_formation',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'caption',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)

		);
		$this->validatorSchema['ligne_2_formations'] = new czValidatorSubForm(array('formClass' => 'asfoCalendrierForm_formation'));
		$this->defaults['ligne_2_formations'] = '';
		$this->getWidgetSchema()->setHelp('ligne_2_formations', '');
		//endregion

		//region ligne_3_style
		$this->widgetSchema['ligne_3_style'] = new sfWidgetFormSelect(array('multiple' => FALSE, 'choices'=> $choices_tab),array('label' => 'Type de campagne'));
		$this->validatorSchema['ligne_3_style'] = new sfValidatorString(array('required' => false));
		$this->defaults['ligne_3_style'] = '';
		$this->getWidgetSchema()->setHelp('ligne_3_style', '');
		//endregion

		//region ligne_3_formations
		$this->widgetSchema['ligne_3_formations'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'ligne_3_formations',
		        'formClass' => 'asfoCalendrierForm_formation',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'caption',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)

		);
		$this->validatorSchema['ligne_3_formations'] = new czValidatorSubForm(array('formClass' => 'asfoCalendrierForm_formation'));
		$this->defaults['ligne_3_formations'] = '';
		$this->getWidgetSchema()->setHelp('ligne_3_formations', '');
		//endregion

		//region ligne_4_style
		$this->widgetSchema['ligne_4_style'] = new sfWidgetFormSelect(array('multiple' => FALSE, 'choices'=> $choices_tab),array('label' => 'Type de campagne'));
		$this->validatorSchema['ligne_4_style'] = new sfValidatorString(array('required' => false));
		$this->defaults['ligne_4_style'] = '';
		$this->getWidgetSchema()->setHelp('ligne_4_style', '');
		//endregion

		//region ligne_4_formations
		$this->widgetSchema['ligne_4_formations'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'ligne_4_formations',
		        'formClass' => 'asfoCalendrierForm_formation',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'caption',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)

		);
		$this->validatorSchema['ligne_4_formations'] = new czValidatorSubForm(array('formClass' => 'asfoCalendrierForm_formation'));
		$this->defaults['ligne_4_formations'] = '';
		$this->getWidgetSchema()->setHelp('ligne_4_formations', '');
		//endregion

		//region ligne_5_style
		$this->widgetSchema['ligne_5_style'] = new sfWidgetFormSelect(array('multiple' => FALSE, 'choices'=> $choices_tab),array('label' => 'Type de campagne'));
		$this->validatorSchema['ligne_5_style'] = new sfValidatorString(array('required' => false));
		$this->defaults['ligne_5_style'] = '';
		$this->getWidgetSchema()->setHelp('ligne_5_style', '');
		//endregion

		//region ligne_5_formations
		$this->widgetSchema['ligne_5_formations'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'ligne_5_formations',
		        'formClass' => 'asfoCalendrierForm_formation',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'caption',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)

		);
		$this->validatorSchema['ligne_5_formations'] = new czValidatorSubForm(array('formClass' => 'asfoCalendrierForm_formation'));
		$this->defaults['ligne_5_formations'] = '';
		$this->getWidgetSchema()->setHelp('ligne_5_formations', '');
		//endregion

		//region ligne_6_style
		$this->widgetSchema['ligne_6_style'] = new sfWidgetFormSelect(array('multiple' => FALSE, 'choices'=> $choices_tab),array('label' => 'Type de campagne'));
		$this->validatorSchema['ligne_6_style'] = new sfValidatorString(array('required' => false));
		$this->defaults['ligne_6_style'] = '';
		$this->getWidgetSchema()->setHelp('ligne_6_style', '');
		//endregion

		//region ligne_6_formations
		$this->widgetSchema['ligne_6_formations'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'ligne_6_formations',
		        'formClass' => 'asfoCalendrierForm_formation',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'caption',
		        'label.add' => 'Ajouter une formation',
		        ), array('label' => false)

		);
		$this->validatorSchema['ligne_6_formations'] = new czValidatorSubForm(array('formClass' => 'asfoCalendrierForm_formation'));
		$this->defaults['ligne_6_formations'] = '';
		$this->getWidgetSchema()->setHelp('ligne_6_formations', '');
		//endregion

		//region link_catalog
		$this->widgetSchema['link_catalog'] = new sfWidgetFormInput(array(), array('label' => 'Lien sur le bouton "catalogue"','style' => 'width: 400px'));
		$this->validatorSchema['link_catalog'] = new sfValidatorString(array('required' => false));
		$this->defaults['link_catalog'] = '';
		$this->getWidgetSchema()->setHelp('link_catalog', '');
		//endregion

		//region link_commande
		$this->widgetSchema['link_commande'] = new sfWidgetFormInput(array(), array('label' => 'Lien sur le bouton "Téléchargez le bon de commande"','style' => 'width: 400px'));
		$this->validatorSchema['link_commande'] = new sfValidatorString(array('required' => false));
		$this->defaults['link_commande'] = '';
		$this->getWidgetSchema()->setHelp('link_commande', '');
		//endregion

		//region link_contact
		$this->widgetSchema['link_contact'] = new sfWidgetFormInput(array(), array('label' => 'Lien sur le bouton "Contact"','style' => 'width: 400px'));
		$this->validatorSchema['link_contact'] = new sfValidatorString(array('required' => false));
		$this->defaults['link_contact'] = '';
		$this->getWidgetSchema()->setHelp('link_contact', '');
		//endregion

		//region atout
		$this->widgetSchema['atout'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'atout',
		        'formClass' => 'asfoPromotionForm_bottom',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter un atout',
		        ), array('label' => false)

		);
		$this->validatorSchema['atout'] = new czValidatorSubForm(array('formClass' => 'asfoPromotionForm_bottom'));
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

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}