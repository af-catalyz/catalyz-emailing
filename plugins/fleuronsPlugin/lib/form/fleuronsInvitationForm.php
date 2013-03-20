<?php

class fleuronsInvitationForm extends czForm {

	public function configure()
	{
		parent::configure();

		//card - CampaignTemplateImporter_TypeMapper_Subform
		$this->addSubformField("card", "Ajouter un événement", "fleuronsInvitationForm_card", "event_name", array());
		//logo - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("logo", "Lien vers votre site", array());
		//date - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("date", "Lieu et date", array());
		//top_letter_content - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("top_letter_content", "Introduction", array("height" => 300), array());
		//picture1 - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("picture1", "Illustration 1", 46, 224);
		//picture2 - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("picture2", "Illustration 2", 46, 224);
		//picture3 - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("picture3", "Illustration 3", 46, 224);
		//picture4 - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("picture4", "Illustration 4", 46, 224);
		//title - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("title", "Titre", array());
		//intro_card - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("intro_card", "Introduction", array("height" => 300), array());
		//signature - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("signature", "Signature", array("height" => 300), array());
		//baseline - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("baseline", "Lien sur image 'Votre spécialiste du cadeau gourmand'", array());
		//fb_page - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("fb_page", "Adresse de votre page Facebook", array());
		//website - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("website", "Adresse de votre site internet (sans http://)", array());
		//adresse - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("adresse", "Adresse", array('style' => 'width: 700px'));
		//tel - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("tel", "Tél", array());
		//email - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("email", "Email", array());
	}
}