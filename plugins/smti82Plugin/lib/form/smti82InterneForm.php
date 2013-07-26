<?php

class smti82InterneForm extends czForm {

	public function configure()
	{
		parent::configure();

		//actus - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("actus", "Ajouter un article", "smti82InterneForm_actus", "title", array());
		//email_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("email_title", "Titre", array());
		//edition - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("edition", "N° et date d'édition", array());
		//news_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("news_title", "Titre", array());
		//dates - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("dates", "Ajouter un article", "smti82InterneForm_dates", "title", array());
		//events_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("events_title", "Titre", array());
		//lu - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("lu", "Ajouter un article", "smti82InterneForm_lu", "title", array());
		//content_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("content_title", "Titre", array());
		//library_content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("library_content", "Contenu", array("height" => 300), array());
		//lu_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("lu_title", "Titre", array());
		//formation - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("formation", "Ajouter une formation", "smti82InterneForm_formation", "title", array());
		//formations - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("formations", "Titre", array());
		$this->addUrlField("formations_url", "Url");
		//intro_formation - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("intro_formation", "Introduction", array("height" => 300), array());
		//bottom_actu - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("bottom_actu", "Ajouter un article", "smti82InterneForm_bottom_actu", "title", array());
		//logos_formations - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("logos_formations", "Conclusion", array("height" => 300), array());
		//actu - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("actu", "Titre", array());
		//footer - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("footer", "Contenu", array("height" => 300), array());
		//unsubscribe_email - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("unsubscribe_email", "Email de contact pour le désabonnement", array());
	}
}