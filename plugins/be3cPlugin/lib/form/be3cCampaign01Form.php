<?php
class be3cCampaign01Form extends sfForm {
	public function configure()
	{
		parent::configure();

		//region title
		$this->widgetSchema['title'] = new sfWidgetFormInput(array(),array('label' => 'Titre de la campagne','style' => 'width: 400px'));
		$this->validatorSchema['title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('title', '');
		//endregion

		//region introduction
		$this->widgetSchema['introduction'] = new sfWidgetFormTextarea(array(),array('label' => 'Introduction','style' => 'width: 400px','rows'=>5));
		$this->validatorSchema['introduction'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('introduction', '');
		//endregion

		//region main_content
		$this->widgetSchema['main_content'] = new sfWidgetFormTextarea(array(),array('label' => 'Contenu','style' => 'width: 400px','rows'=>5));
		$this->validatorSchema['main_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('main_content', '');
		//endregion

		//region main_picture
		$this->widgetSchema['main_picture'] = new czWidgetFormImage(array('picture.width' => 371, 'picture.height' => 371), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['main_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('main_picture', '');
		//endregion

		//region main_title
		$this->widgetSchema['main_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['main_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('main_title', '');
		//endregion

		//region main_line_1
		$this->widgetSchema['main_line_1'] = new sfWidgetFormInput(array(),array('label' => 'Date et lieu','style' => 'width: 400px'));
		$this->validatorSchema['main_line_1'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('main_line_1', '');
		//endregion

		//region main_line_2
		$this->widgetSchema['main_line_2'] = new sfWidgetFormInput(array(),array('label' => 'Intervenant','style' => 'width: 400px'));
		$this->validatorSchema['main_line_2'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('main_line_2', 'Exemple : "M. Jean Pierre"');
		//endregion

		//region main_line_3
		$this->widgetSchema['main_line_3'] = new czWidgetFormDate(array('display_month_name' => 'number'),array('label' => 'Date limite d\'inscription'));
		$this->validatorSchema['main_line_3'] = new sfValidatorDate(array('required' => false));
		$this->getWidgetSchema()->setHelp('main_line_3', '');
		//endregion

		//region products_content
		$this->widgetSchema['other_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'other_content',
		        'formClass' => 'be3cCampaign01Form_product',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'title',
		        'label.add' => 'Ajouter un nouveau rendez-vous',
		        ), array('label' => false)
		);
		$this->validatorSchema['other_content'] = new czValidatorSubForm(array('formClass' => 'be3cCampaign01Form_product'));
		$this->getWidgetSchema()->setHelp('other_content', '');
		//endregion

		//region inscription_title
		$this->widgetSchema['inscription_title'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['inscription_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('inscription_title', '');
		//endregion

		//region email
		$this->widgetSchema['email'] = new czWidgetFormTextareaTinyMCE(array('height' => 300),array('label' => 'Email'));
		$this->validatorSchema['email'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('email', '');
		//endregion

		//region phone
		$this->widgetSchema['phone'] = new czWidgetFormTextareaTinyMCE(array('height' => 300),array('label' => 'Téléphone'));
		$this->validatorSchema['phone'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('phone', '');
		//endregion

		//region fax
		$this->widgetSchema['fax'] = new czWidgetFormTextareaTinyMCE(array('height' => 300),array('label' => 'Fax'));
		$this->validatorSchema['fax'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('fax', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
