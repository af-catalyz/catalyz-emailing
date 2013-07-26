<?php 

class lcfCampaign01Form_right_links extends czForm {

	public function configure()
	{
		parent::configure();

		//url - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("url", "Lien", array());
		//text - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("text", "Libellé", array());
	}
}