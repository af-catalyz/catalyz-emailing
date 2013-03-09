<?php

class smti82ExterneForm extends czForm {

	public function configure()
	{
		parent::configure();

		//edito - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("edito", "Ajouter un article", "smti82ExterneForm_edito", "title", array());
		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//edition - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("edition", "N°et date d'édition", array());
		//book - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("book", "Ajouter une publication", "smti82ExterneForm_book", "title", array());
		//picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("picture", "Illustration", 1, 25);
		//main_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("main_title", "Titre", array());
		//content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("content", "Contenu", array("height" => 300), array());
		//read_picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("read_picture", "Illustration", 100, 56);
		//read_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("read_title", "Titre", array());
		//informations - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("informations", "Ajouter une information pratique", "smti82ExterneForm_informations", "name", array());
		//infos_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("infos_title", "Titre", array());
		//footer - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("footer", "Pied de page", array("height" => 300), array());
		//fb_page - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("fb_page", "Lien vers page Facebook", array());
		//unsubscribe_email - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("unsubscribe_email", "Email de contact pour le désabonnement", array());
	}
}