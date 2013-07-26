<?php
class semAutomationCampaign02Form extends sfForm {

	protected function createWidget($attributes = array())
	{
		return new sfWidgetFormTextareaTinyMCE(
		array(
		    'width' => sfConfig::get('app_wysiwyg_width', 777),
		    'height' => 500,
		    'config' => 'relative_urls : false, convert_fonts_to_spans : false,theme_advanced_font_sizes : "8px,10px,12px,14px,16px,24px", remove_script_host : false, document_base_url : "' . CatalyzEmailing::getApplicationUrl() . '", language: "fr", plugins: "table,imagemanager,filemanager,paste,advlink,directionality,fullscreen",theme:"advanced",'
		     . 'theme_advanced_buttons1:"forecolor,fontsizeselect,bold,italic,|,link,unlink,|,insertimage,image,|,tablecontrols,code",'
		     . 'theme_advanced_buttons2:"",theme_advanced_buttons3:"",theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"none",theme_advanced_path_location:"none",valid_elements:"*[*]",theme_advanced_blockformats:"p,h1,h2,h3,h4",table_cell_styles:"",table_styles:""'
		     . ',advlink_styles:""'
		     . ',content_css:""'
		    ), $attributes
		);
	}

	public function configure()
	{
		parent::configure();

		//region titre
		$this->widgetSchema['titre'] = new sfWidgetFormInput(array(),array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['titre'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('titre', '');
		//endregion

		//region logo_picture
		$this->widgetSchema['logo_picture'] = new czWidgetFormImage(array('picture.width' => 216, 'picture.height' => 100, 'thumbnail.width' => 216, 'thumbnail.height' => 100), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['logo_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('logo_picture', '');
		//endregion

		//region logo_target
		$this->widgetSchema['logo_target'] = new czWidgetFormLink(array(),array('label' => 'Lien','style' => 'width: 400px'));
		$this->validatorSchema['logo_target'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('logo_target', '');
		//endregion

		//region bandeau_picture
		$this->widgetSchema['bandeau_picture'] = new czWidgetFormImage(array('picture.width' => 379, 'picture.height' => 154, 'thumbnail.width' => 379, 'thumbnail.height' => 154), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['bandeau_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('bandeau_picture', '');
		//endregion

		//region bandeau_target
		$this->widgetSchema['bandeau_target'] = new czWidgetFormLink(array(),array('label' => 'Lien','style' => 'width: 400px'));
		$this->validatorSchema['bandeau_target'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('bandeau_target', '');
		//endregion

		//region left_picture
		$this->widgetSchema['left_picture'] = new czWidgetFormImage(array('picture.width' => 216, 'picture.height' => 329, 'thumbnail.width' => 216, 'thumbnail.height' => 329), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['left_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('left_picture', '');
		//endregion

		//region left_target
		$this->widgetSchema['left_target'] = new czWidgetFormLink(array(),array('label' => 'Lien','style' => 'width: 400px'));
		$this->validatorSchema['left_target'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('left_target', '');
		//endregion

		//region left_content
		$this->widgetSchema['left_content'] = $this->createWidget(array('label' => 'Contenu'));
		$this->validatorSchema['left_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('left_content', '');
		//endregion

		//region right_content
		$this->widgetSchema['right_content'] = $this->createWidget(array('label' => 'Contenu'));
		$this->validatorSchema['right_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('right_content', '');
		//endregion

		//region right_picture
		$this->widgetSchema['right_picture'] = new czWidgetFormImage(array('picture.width' => 379, 'picture.height' => 123, 'thumbnail.width' => 379, 'thumbnail.height' => 123), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['right_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('right_picture', '');
		//endregion

		//region right_target
		$this->widgetSchema['right_target'] = new czWidgetFormLink(array(),array('label' => 'Lien','style' => 'width: 400px'));
		$this->validatorSchema['right_target'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('right_target', '');
		//endregion

		//region contact_text
		$this->widgetSchema['contact_text'] = new sfWidgetFormInput(array(),array('label' => 'Contactez nous','style' => 'width: 600px'));
		$this->validatorSchema['contact_text'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('contact_text', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
