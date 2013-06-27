<?php
class asfoPromotionForm extends sfForm {
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

		//region training_1_caption
		$this->widgetSchema['training_1_caption'] = new sfWidgetFormInput(array(), array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['training_1_caption'] = new sfValidatorString(array('required' => false));
		$this->defaults['training_1_caption'] = '';
		$this->getWidgetSchema()->setHelp('training_1_caption', '');
		//endregion

		//region training_1_price
		$this->widgetSchema['training_1_price'] = new sfWidgetFormInput(array(), array('label' => 'Prix (€HT / pers)','style' => 'width: 400px'));
		$this->validatorSchema['training_1_price'] = new sfValidatorString(array('required' => false));
		$this->defaults['training_1_price'] = '';
		$this->getWidgetSchema()->setHelp('training_1_price', '');
		//endregion

		//region training_1_introduction
		$this->widgetSchema['training_1_introduction'] = new sfWidgetFormTextarea(array(),array('label' => 'Introduction','style' => 'width: 400px'));
		$this->validatorSchema['training_1_introduction'] = new sfValidatorString(array('required' => false));
		$this->defaults['training_1_introduction'] = 'Lorem ipsum dolor sit amet, mucius liberavisse ad cum, quod cotidieque referrentur vim ei, at soleat apeirian partiendo sea.';
		$this->getWidgetSchema()->setHelp('training_1_introduction', '');
		//endregion

		//region training_1_link
		$this->widgetSchema['training_1_link'] = new sfWidgetFormInput(array(), array('label' => 'Lien vers "Consulter le programme"','style' => 'width: 400px'));
		$this->validatorSchema['training_1_link'] = new sfValidatorString(array('required' => false));
		$this->defaults['training_1_link'] = '';
		$this->getWidgetSchema()->setHelp('training_1_link', '');
		//endregion

		//region training_1_date
		$this->widgetSchema['training_1_date'] = new sfWidgetFormTextarea(array(),array('label' => 'Dates','style' => 'width: 400px'));
		$this->validatorSchema['training_1_date'] = new sfValidatorString(array('required' => false));

//		$this->widgetSchema['training_1_date'] = new czWidgetFormSubForm(array(
//		        'fieldName' => 'training_1_date',
//		        'formClass' => 'asfoPromotionForm_date',
//		        'contentObjectClass' => 'campaign[content]',
//		        'title' => 'caption',
//		        'label.add' => 'Ajouter une date',
//		        ), array('label' => false)
//		);
//		$this->validatorSchema['training_1_date'] = new czValidatorSubForm(array('formClass' => 'asfoPromotionForm_date'));
		$this->defaults['training_1_date'] = '';
		$this->getWidgetSchema()->setHelp('training_1_date', '');
		//endregion

		//region training_2_caption
		$this->widgetSchema['training_2_caption'] = new sfWidgetFormInput(array(), array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['training_2_caption'] = new sfValidatorString(array('required' => false));
		$this->defaults['training_2_caption'] = '';
		$this->getWidgetSchema()->setHelp('training_2_caption', '');
		//endregion

		//region training_2_price
		$this->widgetSchema['training_2_price'] = new sfWidgetFormInput(array(), array('label' => 'Prix (€HT / pers)','style' => 'width: 400px'));
		$this->validatorSchema['training_2_price'] = new sfValidatorString(array('required' => false));
		$this->defaults['training_2_price'] = '';
		$this->getWidgetSchema()->setHelp('training_2_price', '');
		//endregion

		//region training_2_introduction
		$this->widgetSchema['training_2_introduction'] = new sfWidgetFormTextarea(array(),array('label' => 'Introduction','style' => 'width: 400px'));
		$this->validatorSchema['training_2_introduction'] = new sfValidatorString(array('required' => false));
		$this->defaults['training_2_introduction'] = 'Lorem ipsum dolor sit amet, mucius liberavisse ad cum, quod cotidieque referrentur vim ei, at soleat apeirian partiendo sea.';
		$this->getWidgetSchema()->setHelp('training_2_introduction', '');
		//endregion

		//region training_2_link
		$this->widgetSchema['training_2_link'] = new sfWidgetFormInput(array(), array('label' => 'Lien vers "Consulter le programme"','style' => 'width: 400px'));
		$this->validatorSchema['training_2_link'] = new sfValidatorString(array('required' => false));
		$this->defaults['training_2_link'] = '';
		$this->getWidgetSchema()->setHelp('training_2_link', '');
		//endregion

		//region training_2_date
		$this->widgetSchema['training_2_date'] = new sfWidgetFormTextarea(array(),array('label' => 'Dates','style' => 'width: 400px'));
		$this->validatorSchema['training_2_date'] = new sfValidatorString(array('required' => false));
//		$this->widgetSchema['training_2_date'] = new czWidgetFormSubForm(array(
//		        'fieldName' => 'training_2_date',
//		        'formClass' => 'asfoPromotionForm_date',
//		        'contentObjectClass' => 'campaign[content]',
//		        'title' => 'caption',
//		        'label.add' => 'Ajouter une date',
//		        ), array('label' => false)
//		);
//		$this->validatorSchema['training_2_date'] = new czValidatorSubForm(array('formClass' => 'asfoPromotionForm_date'));
		$this->defaults['training_2_date'] = '';
		$this->getWidgetSchema()->setHelp('training_2_date', '');
		//endregion

		//region link_catalog
		$this->widgetSchema['link_catalog'] = new czWidgetFormFile(array(), array('label' => 'Lien sur le bouton "catalogue"','style' => 'width: 400px'));
		$this->validatorSchema['link_catalog'] = new sfValidatorString(array('required' => false));
		$this->defaults['link_catalog'] = '';
		$this->getWidgetSchema()->setHelp('link_catalog', '');
		//endregion

		//region promo_content
		$this->widgetSchema['promo_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'promo_content',
		        'formClass' => 'asfoPromotionForm_bottom',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter un élément',
		        ), array('label' => false)
		);
		$this->validatorSchema['promo_content'] = new czValidatorSubForm(array('formClass' => 'asfoPromotionForm_bottom'));
		$this->defaults['promo_content'] = '';
		$this->getWidgetSchema()->setHelp('promo_content', '');
		//endregion

		//region link_commande
		$this->widgetSchema['link_commande'] = new czWidgetFormFile(array(), array('label' => 'Lien sur le bouton "Téléchargez le bon de commande"','style' => 'width: 400px'));
		$this->validatorSchema['link_commande'] = new sfValidatorString(array('required' => false));
		$this->defaults['link_commande'] = '';
		$this->getWidgetSchema()->setHelp('link_commande', '');
		//endregion

		//region picture
		$this->widgetSchema['picture'] = new czWidgetFormImage(array('picture.width' => 298, 'picture.height'=> 147), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['picture'] = new sfValidatorString(array('required' => false));
		$this->defaults['picture'] = '';
		$this->getWidgetSchema()->setHelp('picture', '');
		//endregion

		//region expert_name
		$this->widgetSchema['expert_name'] = new sfWidgetFormInput(array(), array('label' => 'Nom','style' => 'width: 400px'));
		$this->validatorSchema['expert_name'] = new sfValidatorString(array('required' => false));
		$this->defaults['expert_name'] = '';
		$this->getWidgetSchema()->setHelp('expert_name', '');
		//endregion

		//region expert_email
		$this->widgetSchema['expert_email'] = new sfWidgetFormInput(array(), array('label' => 'Email','style' => 'width: 400px'));
		$this->validatorSchema['expert_email'] = new sfValidatorString(array('required' => false));
		$this->defaults['expert_email'] = '';
		$this->getWidgetSchema()->setHelp('expert_email', '');
		//endregion

		//region expert_tel
		$this->widgetSchema['expert_tel'] = new sfWidgetFormInput(array(), array('label' => 'Téléphone','style' => 'width: 400px'));
		$this->validatorSchema['expert_tel'] = new sfValidatorString(array('required' => false));
		$this->defaults['expert_tel'] = '';
		$this->getWidgetSchema()->setHelp('expert_tel', '');
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
