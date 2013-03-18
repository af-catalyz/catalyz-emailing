<?php

class smti82ExterneForm_article extends czForm {

	public function configure()
	{
		parent::configure();

		//subtitle - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//source - CampaignTemplateImporter_TypeMapper_Url
		$this->addPictureField("picture", "Illustration", 100, 120);
		//resume - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addSubformField("items", "Ajouter un article", 'smti82ExterneForm_item', 'title', array('label' => 'Articles'));
	}
}