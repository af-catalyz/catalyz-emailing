<?php

class dpiCampaign02WizzardForm extends czForm {

	protected function createWidget($attributes = array())
	{
		return new sfWidgetFormTextareaTinyMCE(
		array(
		    'width' => sfConfig::get('app_wysiwyg_width', 777),
		    'height' => 300,
		    'config' => 'relative_urls : false, convert_fonts_to_spans : false, remove_script_host : false, document_base_url : "' . CatalyzEmailing::getApplicationUrl() . '", language: "fr", plugins: "table,imagemanager,filemanager,paste,advlink,directionality,fullscreen",theme:"advanced",'
		     . 'theme_advanced_buttons1:"formatselect,fontsizeselect,removeformat,code,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,bullist,numlist,separator,undo,redo,separator,charmap",'
		     . 'theme_advanced_buttons2:"forecolor,backcolor,separator,anchor,link,unlink,separator,image,separator,tablecontrols,separator,ltr,rtl,separator,fullscreen",theme_advanced_buttons3:"",theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"none",theme_advanced_path_location:"none",valid_elements:"*[*]",theme_advanced_blockformats:"p,h1,h2,h3,h4",table_cell_styles:"",table_styles:""'
		     . ',advlink_styles:""'
		     . ',content_css:""'
		     .',theme_advanced_text_colors : "'.sfConfig::get('app_catalyz_tinymce_default_colors', '').'"',
		    ), $attributes
		);
	}

	public function configure()
	{
		parent::configure();

		//options - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("options", "Options", "dpiCampaign02WizzardForm_options", "title", array());
		//operation_type - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("operation_type", "Type", array('style' => 'width: 700px'));
		//operation_caption - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("operation_caption", "Nom", array('style' => 'width: 700px'));
		//event_start - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("event_start", "Date de début", array());
		//event_end - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("event_end", "Date de fin", array());
		//main_content - CampaignTemplateImporter_TypeMapper_Wysiwyg

		$this->widgetSchema["main_content"] = $this->createWidget();
		$this->validatorSchema["main_content"] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp("main_content", '');
		$this->getWidgetSchema()->setLabel("main_content", "Contenu");

		//red_content - CampaignTemplateImporter_TypeMapper_Wysiwyg
//		$this->addWysiwygField("red_content", false, array("height" => 300), array());

		$this->widgetSchema["red_content"] = $this->createWidget();
		$this->validatorSchema["red_content"] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp("red_content", '');
		$this->getWidgetSchema()->setLabel("red_content", false);

		//picture - CampaignTemplateImporter_TypeMapper_Text
		$this->addPictureField("picture", "Illustration", 548, 201);

		//phone - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("phone", "Numéro de téléphone", array());
		//fax - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("fax", "Numéro de fax", array());
		//website1_caption - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("website1_caption", "Intitulé", array());
		//website1_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("website1_link", "Lien", array());
		//website2_caption - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("website2_caption", "Intitulé", array());
		//website2_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("website2_link", "Lien", array());
		//adress_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("adress_content", false, array('style' => 'width: 700px'));
		//facebook_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("facebook_link", "Lien facebook", array());

		$this->addPictureField("header_picture1", "Illustration de gauche", 179, 114);
		$this->addPictureField("header_picture2", "Illustration de droite", 176, 114);
		$this->addPictureField("operation_picture", "Illustration", 238, 96);

		$choices = array();
		$choices['default'] = 'Defaut';
		$choices['hiver'] = 'Hiver';

		$this->widgetSchema["style"] = new sfWidgetFormChoice(array('choices' => $choices,'label' => false));;
		$this->validatorSchema["style"] = new sfValidatorChoice(array('required' => true, 'choices' => array_keys($choices)));
		$this->getWidgetSchema()->setHelp("style", '');

	}
}