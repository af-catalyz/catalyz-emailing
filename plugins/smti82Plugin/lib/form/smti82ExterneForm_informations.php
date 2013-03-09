<?php

class smti82ExterneForm_informations extends czForm {

	public function configure()
	{
		parent::configure();

		//name - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("name", "Titre", array());
		//url - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("url", "Cible", array());
	}
}