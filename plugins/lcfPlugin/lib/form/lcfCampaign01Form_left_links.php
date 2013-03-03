<?php 

class lcfCampaign01Form_left_links extends czForm {

	public function configure()
	{
		parent::configure();

		//url - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("url", "Url du premier lien", array());
		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//subtitle - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("subtitle", "Sous titre", array());
	}
}