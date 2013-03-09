<?php 

class smti82ExterneForm_edito extends czForm {

	public function configure()
	{
		parent::configure();

		//picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("picture", "Illustration", 100, 92);
		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("content", "Contenu", array("height" => 300), array());
	}
}