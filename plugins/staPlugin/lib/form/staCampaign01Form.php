<?php
class staCampaign01Form extends sfForm {

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
