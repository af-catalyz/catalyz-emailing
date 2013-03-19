<?php

class smti82InterneForm_actus extends czForm {

	public function configure()
	{
		parent::configure();

		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("picture", "Illustration", 100, 120);
		//source - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("source", "Source", array());
		//content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("content", "Contenu", array("height" => 300), array());
		//read_more - CampaignTemplateImporter_TypeMapper_Url
		$this->addTextField("read_more_caption", "Titre du lien", array());
		$this->addUrlField("read_more", "Cible du lien", array());
	}
}