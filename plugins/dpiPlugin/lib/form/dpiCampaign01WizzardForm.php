<?php

class dpiCampaign01WizzardForm extends czForm {

	public function configure()
	{
		parent::configure();

		//main_articles - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("main_articles", "Ajouter un article", "dpiCampaign01WizzardForm_main_articles", "main_articles_title", array());
		//number - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("number", "Numéro", array());
		//month - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("month", "Mois", array());
		//details - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("details", "Details", array());
		//revue_articles - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("revue_articles", null, "dpiCampaign01WizzardForm_revue_articles", "revue_articles_titre", array());
		//evenements - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("evenements", "Ajouter un événement", "dpiCampaign01WizzardForm_evenements", "title", array());
		//evenements_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("evenements_title", "Titre", array());
		//nouveautes - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("nouveautes", 'Ajouter une nouveauté', "dpiCampaign01WizzardForm_nouveautes", "title", array());
		//nouveaute_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("nouveaute_title", "Titre", array());
		//talks - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("talks", null, "dpiCampaign01WizzardForm_talks", "title", array());
		//talk_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("talk_title", "Titre", array());
		//phone - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("phone", "Numéro de téléhone", array());
		//website_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addTextField("website_caption", "Titre", array());
		$this->addUrlField("website_link", "Adresse", array());
		//adress_content - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("adress_content", "Adresse", array('style' => 'width: 700px'));
		//facebook_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("facebook_link", "Lien facebook", array());


		//custom
		$this->addWysiwygField("custom_content", 'Contenu', array());
		$this->addTextField("custom_title", "Titre", array());
	}
}