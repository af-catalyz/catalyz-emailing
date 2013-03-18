<?php

class smti82ExterneForm extends czForm {

	public function configure()
	{
		parent::configure();

		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//edition - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("edition", "N°et date d'édition", array());
		//book - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("article", "Ajouter une publication", "smti82ExterneForm_article", "title", array());
		//footer - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("footer", "Pied de page", array("height" => 300), array());
		//fb_page - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("fb_page", "Lien vers page Facebook", array());
		//unsubscribe_email - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("unsubscribe_email", "Email de contact pour le désabonnement", array());
	}
}