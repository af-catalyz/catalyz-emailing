<?php 

class smti82InterneForm_bottom_actu extends czForm {

	public function configure()
	{
		parent::configure();

		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("content", "Contenu", array('style' => 'width: 700px'));
	}
}