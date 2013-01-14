<?php
class staCampaign01Form extends sfForm {

	const DISPLAY_LINK = 1;
	const DONT_DISPLAY_LINK = 2;

	public function configure()
	{
		parent::configure();

		//region edito_picture
		$this->widgetSchema['edito_picture'] = new czWidgetFormImage(array('picture.width' => 400, 'picture.height' => 108, 'thumbnail.width' => 400/2, 'thumbnail.height' => 108/2), array('label' => 'Illustration'));
		$this->validatorSchema['edito_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('edito_picture', '');
		//endregion

		//region website_link
		$this->widgetSchema['website_link'] = new czWidgetFormLink(array(),array('label' => 'Lien vers le site','style' => 'width: 400px'));
		$this->validatorSchema['website_link'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('website_link', '');
		//endregion

		//region top_right
		$this->widgetSchema['top_right'] = new sfWidgetFormTextarea(array(), array('label' => 'Contenu', 'style' => 'width: 400px'));
		$this->validatorSchema['top_right'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('top_right', '');
		//endregion

		//region display_edit_contact
		$choices = array();
		$choices[staCampaign01Form::DISPLAY_LINK] = 'Afficher le lien pour éditer son compte';
		$choices[staCampaign01Form::DONT_DISPLAY_LINK] = 'Ne pas afficher le lien pour éditer son compte';


		$this->widgetSchema['display_edit_contact'] = new sfWidgetFormChoice(array("choices" => $choices) , array( 'style' => 'width: 400px'));
		$this->validatorSchema['display_edit_contact'] = new sfValidatorChoice(array('required' => false, 'choices' => array_keys($choices)));
		$this->getWidgetSchema()->setHelp('display_edit_contact', '');
		//endregion

		//region main_content
		$this->widgetSchema['main_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'main_content',
		        'formClass' => 'staForm_main',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'section',
		        'label.add' => 'Ajouter un article',
		        ), array('label' => false)
		);
		$this->validatorSchema['main_content'] = new czValidatorSubForm(array('formClass' => 'staForm_main'));
		$this->defaults['main_content'] = '';
		$this->getWidgetSchema()->setHelp('main_content', '');
		//endregion

		//region right_title
		$this->widgetSchema['right_title'] = new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px'));
		$this->validatorSchema['right_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('right_title', '');
		//endregion

		//region right_content
		$this->widgetSchema['right_content'] = new czWidgetFormSubForm(array(
		        'fieldName' => 'right_content',
		        'formClass' => 'staForm_right',
		        'contentObjectClass' => 'campaign[content]',
		        'title' => 'section',
		        'label.add' => 'Ajouter un article',
		        ), array('label' => false)

		);
		$this->validatorSchema['right_content'] = new czValidatorSubForm(array('formClass' => 'staForm_right'));
		$this->defaults['right_content'] = '';
		$this->getWidgetSchema()->setHelp('right_content', '');
		//endregion

		//region footer
		$this->widgetSchema['footer'] = new sfWidgetFormTextarea(array(),array('label' => 'Bas de page'));
		$this->validatorSchema['footer'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('footer', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
