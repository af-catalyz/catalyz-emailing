<?php

class dpiCampaign01WizzardForm_main_articles extends czForm {

	public function configure()
	{
		parent::configure();

		//main_articles_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("main_articles_title", "Titre", array());
		//main_articles_picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("main_articles_picture", "Illustration", 137, 137);
		//main_articles_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("main_articles_content", "Contenu", array('style' => 'width: 700px'));
		//main_articles_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addTextField("main_articles_caption", "Titre", array());
		$this->addUrlField("main_articles_link", "Lien", array());
	}
}