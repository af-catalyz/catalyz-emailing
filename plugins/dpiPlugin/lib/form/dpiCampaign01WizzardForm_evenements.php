<?php

class dpiCampaign01WizzardForm_evenements extends czForm {

	public function configure()
	{
		parent::configure();

		//evenements_picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("evenements_picture", "Illustration", 90, 90);
		//evenements_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("evenements_content", "Contenu", array('style' => 'width: 700px'));
		$this->addUrlField("evenements_link", "Lien", array());
	}
}