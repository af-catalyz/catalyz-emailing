<?php

class lcfCampaign01Form_left_links extends czForm {

	public function configure()
	{
		parent::configure();

		//url - CampaignTemplateImporter_TypeMapper_Url
		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		$this->addTextField("url", "Url", array());
		//subtitle - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("subtitle", "Sous titre", array());
	}
}