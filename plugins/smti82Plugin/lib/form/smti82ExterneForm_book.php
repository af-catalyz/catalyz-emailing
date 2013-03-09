<?php

class smti82ExterneForm_book extends czForm {

	public function configure()
	{
		parent::configure();

		//subtitle - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("subtitle", "Titre", array());
		//source - CampaignTemplateImporter_TypeMapper_Url
		$this->addTextField("source", "Source", array());
		//resume - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("resume", "Résumé", array("height" => 300), array());
		//link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("link", "Cible du lien", array());
		//link_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("link_title", "Libellé du lien", array());
	}
}