<?php

class fleuronsCampaignOpeSpecialWizzardForm extends czForm {

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

		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//top_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("top_content", "Contenu", array('style' => 'width: 700px'));
		//picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("picture", "Illustration", 600, 600);
		//middle_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("middle_content", "Contenu", array('style' => 'width: 700px'));
		//button_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("button_link", "Lien du bouton", array());
		//bottom_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("bottom_content", "Contenu", array('style' => 'width: 700px'));
		//facebook_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("facebook_link", "Lien vers facebook", array());
		//website_caption - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("website_caption", "Intitulé", array());
		//website_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("website_link", "Lien du site", array());
		//adresse - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("adresse", "Adresse", array('style' => 'width: 700px'));
		//phone - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("phone", "Téléphone", array());
		//contact_caption - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("contact_caption", "Intitulé", array());
		//contact_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("contact_link", "Lien du site", array());
		//footer_content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->widgetSchema["footer_content"] = $this->createWidget(array('label' => 'Contenu'));
		$this->validatorSchema["footer_content"] = new sfValidatorString(array('required' => false));
		$this->getWidgetSchema()->setHelp("footer_content", '');
	}
}