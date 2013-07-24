<?php

class fleuronsCampaignPromoWizzardForm_header_links extends czForm {

	public function configure()
	{
		parent::configure();

		//header_links_caption - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("header_links_caption", "Intitulé", array());
		//header_links_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("header_links_link", "Lien du site", array());
	}
}