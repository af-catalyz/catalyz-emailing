<?php 

class fleuronsInvitationForm_card extends czForm {

	public function configure()
	{
		parent::configure();

		//event_name - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("event_name", "Nom", array());
		//event_date - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("event_date", "Date", array());
	}
}