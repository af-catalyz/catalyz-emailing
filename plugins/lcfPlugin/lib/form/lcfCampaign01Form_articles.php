<?php 

class lcfCampaign01Form_articles extends czForm {

	public function configure()
	{
		parent::configure();

		//illustration - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("illustration", "Illustration", 155, 61);
		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Title", array());
		//content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("content", "Contenu", array("height" => 300), array());
		//link_url - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("link_url", "URL lien", array());
		//link_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("link_title", "Titre du lien", array());
	}
}