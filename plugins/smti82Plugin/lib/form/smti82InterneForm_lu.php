<?php 

class smti82InterneForm_lu extends czForm {

	public function configure()
	{
		parent::configure();

		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//subtitle - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("subtitle", "Sous-titre", array('style' => 'width: 700px'));
		//content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("content", "Contenu", array('style' => 'width: 700px'));
		//link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("link", "Lien", array());
	}
}