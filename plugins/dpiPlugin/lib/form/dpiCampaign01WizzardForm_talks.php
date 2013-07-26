<?php

class dpiCampaign01WizzardForm_talks extends czForm {

	public function configure()
	{
		parent::configure();

		//talks_picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("talks_picture", "Illustration", 226, 226);
		//talks_title - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("talks_title", "Titre", array('style' => 'width: 700px'));
		//talks_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("talks_content", "Contenu", array('style' => 'width: 700px'));
	}
}