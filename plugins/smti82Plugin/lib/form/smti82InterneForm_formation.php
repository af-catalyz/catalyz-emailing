<?php 

class smti82InterneForm_formation extends czForm {

	public function configure()
	{
		parent::configure();

		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//date_formation - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("date_formation", "Date", array());
		//organisme_nom - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("organisme_nom", "Organisme", array());
	}
}