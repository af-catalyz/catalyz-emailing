<?php 

class smti82InterneForm_dates extends czForm {

	public function configure()
	{
		parent::configure();

		//date - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("date", "Date", array());
		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//date_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("date_content", "Contenu", array('style' => 'width: 700px'));
		//read_more - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("read_more", "Cible du lien", array());
	}
}