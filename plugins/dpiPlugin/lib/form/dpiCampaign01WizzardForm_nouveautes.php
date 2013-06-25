<?php

class dpiCampaign01WizzardForm_nouveautes extends czForm {

	public function configure()
	{
		parent::configure();

		//nouveautes_picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("nouveautes_picture", "Illustration", 229, 229);
		//nouveautes_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("nouveautes_link", "Lien", array());
		//nouveautes_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextField("nouveautes_link_caption", "Titre", array());
		$this->addTextareaField("nouveautes_content", "Contenu", array('style' => 'width: 700px'));
	}
}