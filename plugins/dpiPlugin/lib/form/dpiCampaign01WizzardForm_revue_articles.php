<?php

class dpiCampaign01WizzardForm_revue_articles extends czForm {

	public function configure()
	{
		parent::configure();

		//revue_articles_picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("revue_articles_picture", "Illustration", 137, 137);
		//revue_articles_date - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("revue_articles_date", "Date", array());
		//revue_articles_titre - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("revue_articles_titre", "Titre", array('style' => 'width: 700px'));
		//revue_articles_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("revue_articles_content", "Contenu", array('style' => 'width: 700px'));
		//revue_articles_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("revue_articles_link", "Lien", array());
	}
}