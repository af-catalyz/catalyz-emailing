<?php

class smti82InvitationForm extends czForm {

	public function configure()
	{
		parent::configure();

		//programme - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("programme", "Ajouter un élément", "smti82InvitationForm_programme", "title", array());
		//header_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("header_title", "Titre", array());
		//picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("picture", "Illustration", 225, 546);
		//sup_title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("sup_title", "Sur-titre", array());
		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//when - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("when", "Date", array());
		//content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("content", "Contenu", array("height" => 300), array());
		//footer - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("footer", "Contenu", array("height" => 300), array());
		//unsubscribe_email - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("unsubscribe_email", "Email de désabonnement", array());
	}
}