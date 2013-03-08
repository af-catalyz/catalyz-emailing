<?php

class comparexAutodeskForm extends czForm {

	public function configure()
	{
		parent::configure();

		//edito - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("edito", "Edito", array("height" => 300), array());
		//video_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("video_link", "Lien sur la vidéo", array());
		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//left_top_picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("left_top_picture", "Illustration", 45, 58);
		//left_top_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextField("left_top_content", "Légende de l'image", array());
		//left_bottom_content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("left_bottom_content", "Contenu", array("height" => 300), array());
		//right_top_picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("right_top_picture", "Illustration", 235, 84);
		//right_bottom_content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("right_bottom_content", "Contenu", array("height" => 300), array());
		//bottom_content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("bottom_content", false, array("height" => 300), array());
		//contact - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("contact", "Contact", array());
		//email - CampaignTemplateImporter_TypeMapper_Url
		$this->addTextField("email", "email", array());
		//website - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("website", "website", array());
	}
}