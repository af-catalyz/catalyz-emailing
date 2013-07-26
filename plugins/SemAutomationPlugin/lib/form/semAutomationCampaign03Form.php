<?php
class semAutomationCampaign03Form extends sfForm {

	protected function createWidget($attributes = array())
	{
		return new sfWidgetFormTextareaTinyMCE(
		array(
		    'width' => sfConfig::get('app_wysiwyg_width', 777),
		    'height' => 500,
		    'config' => 'relative_urls : false,theme_advanced_font_sizes : "8px,10px,12px,14px,16px,24px", convert_fonts_to_spans : false, remove_script_host : false, document_base_url : "' . CatalyzEmailing::getApplicationUrl() . '", language: "fr",
plugins: "fullscreen,table,imagemanager,filemanager,paste,media,advlink,style",theme:"advanced",'
		     . 'theme_advanced_buttons1:"forecolor,formatselect,fontsizeselect,styleselect,bold,italic,bullist,|,justifyleft,justifycenter,justifyright",'
		     . 'theme_advanced_buttons2:"link,unlink,|,insertimage,image,|,tablecontrols,code",theme_advanced_buttons3:"",theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"none",theme_advanced_path_location:"none"
,theme_advanced_blockformats:"p,h1,h2",table_cell_styles:"",table_styles:""'
		     . ',advlink_styles:"Lien avec puce=more"'
		     . ',style_formats:[{title:"Boite orange",selector:"p",attributes:{"class":"box_orange"},exact:true},{title:"Boite grise",selector:"p",attributes:{"class":"box_grey"},exact:true}
]'


		     . ',content_css:"'.CatalyzEmailing::getApplicationUrl().'/SemAutomation/css/campaign03.css"'
		    ), $attributes
		);
	}

	public function configure()
	{
		parent::configure();

		//region titre
		$this->widgetSchema['titre'] = new sfWidgetFormTextarea(array(),array('label' => 'Titre','style' => 'width: 400px'));
		$this->validatorSchema['titre'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('titre', '');
		//endregion

		//region logo_picture
		$this->widgetSchema['logo_picture'] = new czWidgetFormImage(array('picture.width' => 237, 'picture.height' => 400, 'thumbnail.width' => 238/2, 'thumbnail.height' => 400/2), array('label' => 'Illustration', 'style' => 'width: 400px'));
		$this->validatorSchema['logo_picture'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('logo_picture', '');
		//endregion

		//region logo_target
		$this->widgetSchema['logo_target'] = new czWidgetFormLink(array(),array('label' => 'Lien','style' => 'width: 400px'));
		$this->validatorSchema['logo_target'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('logo_target', '');
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

		//region website
		$this->widgetSchema['website'] = new czWidgetFormLink(array(),array('label' => 'Lien vers le site','style' => 'width: 400px'));
		$this->validatorSchema['website'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('website', '');
		//endregion

		//region contact_name
		$this->widgetSchema['contact_name'] = new sfWidgetFormInput(array(),array('label' => 'Nom','style' => 'width: 400px'));
		$this->validatorSchema['contact_name'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('contact_name', '');
		//endregion

		//region contact_target
		$this->widgetSchema['contact_target'] = new sfWidgetFormInput(array(),array('label' => 'Email','style' => 'width: 400px'));
		$this->validatorSchema['contact_target'] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp('contact_target', '');
		//endregion

		$this->widgetSchema->setNameFormat('campaign[content][%s]');
	}
}
