<?php

class lcfCampaign01Form extends czForm {

	public function configure()
	{
		parent::configure();

		//articles - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("articles", "Ajouter un article", "lcfCampaign01Form_articles", "title", array());
		//top_banner - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("top_banner", "Bandeau", 436, 182);
		$this->addCheckboxField("top_include_made_in_france", "Afficher le logo Fabrication Française", array());
		//top_content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("top_content", "Cartouche", array("height" => 300), array());
		//header_content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("header_content", "Message d'introduction", array("height" => 300), array());
		//header_include_made_in_france - CampaignTemplateImporter_TypeMapper_Checkbox
		$this->addCheckboxField("header_include_made_in_france", "Afficher le logo Fabrication Française", array());
		//left_links - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("left_links", "Ajouter un lien", "lcfCampaign01Form_left_links", "title", array());
		//left_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("left_title", "Titre", array());
		//left_content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("left_content", "Contenu", array("height" => 300), array());
		//right_links - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("right_links", "Liens", "lcfCampaign01Form_right_links", "title", array());
		//left_illustration - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("left_illustration", "Illustration", 236, 152);
		//right_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("right_title", "Titre", array());
		//right_content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("right_content", "Contenu", array("height" => 300), array());
		//footer - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("footer", "Contact", array("height" => 300), array());
		//unsubscribe_email - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("unsubscribe_email", "Email de contact pour le désabonnement", array());
	}
}