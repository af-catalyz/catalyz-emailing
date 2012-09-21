<?php
class atp5sCampaign01Form extends sfForm {

	protected function createWidget($attributes = array())
	{
		return new sfWidgetFormTextareaTinyMCE(
		array(
		    'width' => sfConfig::get('app_wysiwyg_width', 777),
		    'height' => 500,
		    'config' => 'relative_urls : false, convert_fonts_to_spans : false, remove_script_host : false, document_base_url : "' . CatalyzEmailing::getApplicationUrl() . '", language: "fr", plugins: "table,imagemanager,filemanager,paste,advlink,directionality,fullscreen",theme:"advanced",'
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

		//region edito_title
		$this->widgetSchema['edito_title'] = new sfWidgetFormTextarea(array(),array('label' => 'Titre'));
		$this->validatorSchema['edito_title'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('edito_title', '');
		//endregion

		//region picture
		$this->widgetSchema['picture'] = new czWidgetFormImage(array('picture.width' => 305, 'picture.height' => 106, 'thumbnail.width' => 305/2, 'thumbnail.height' => 106/2), array('label' => 'Illustration'));
		$this->validatorSchema['picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('picture', '');
		//endregion

		//region edito
		$this->widgetSchema['edito'] = $this->createWidget(array('label' => 'Contenu'));
		$this->validatorSchema['edito'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('edito', '');
		//endregion

		//region left_column
		$this->widgetSchema['left_column'] = $this->createWidget(array('label' => 'Contenu'));
		$this->validatorSchema['left_column'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('left_column', '');
		//endregion

		//region right_column
		$this->widgetSchema['right_column'] = $this->createWidget(array('label' => 'Contenu'));
		$this->validatorSchema['right_column'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('right_column', '');
		//endregion

		//region custom
		$this->widgetSchema['custom'] = $this->createWidget(array('label' => 'Contenu'));
		$this->validatorSchema['custom'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('custom', '');
		//endregion

		//region blue_content
		$this->widgetSchema['blue_content'] = $this->createWidget(array('label' => 'Contenu'));
		$this->validatorSchema['blue_content'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('blue_content', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
