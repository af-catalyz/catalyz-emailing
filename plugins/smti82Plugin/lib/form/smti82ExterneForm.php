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
for ($i = 1; $i <= 7; $i++) {
	//subtitle - CampaignTemplateImporter_TypeMapper_Text
	$this->addTextField("title$i", "Titre", array());
	//source - CampaignTemplateImporter_TypeMapper_Url
	$this->addPictureField("picture$i", "Illustration", 100, 120);
	$this->addCheckboxField("picture_border$i", "Ajouter une bordure au dessus de la photo");
	//resume - CampaignTemplateImporter_TypeMapper_Wysiwyg
	$this->addSubformField("items$i", "Ajouter un article", 'smti82ExterneForm_item', 'title', array('label' => 'Articles'));

}
		//footer - CampaignTemplateImporter_TypeMapper_Wysiwyg
		$this->addWysiwygField("footer", "Pied de page", array("height" => 300), array());
		//fb_page - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("fb_page", "Lien vers page Facebook", array());
		//unsubscribe_email - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("unsubscribe_email", "Email de contact pour le désabonnement", array());
	}
}