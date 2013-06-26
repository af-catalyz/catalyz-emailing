<?php 

class dpiCampaign02WizzardForm_options extends czForm {

	public function configure()
	{
		parent::configure();

		//options_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("options_title", "Titre", array());
	}
}