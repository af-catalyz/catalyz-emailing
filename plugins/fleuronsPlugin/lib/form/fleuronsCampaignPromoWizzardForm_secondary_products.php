<?php

class fleuronsCampaignPromoWizzardForm_secondary_products extends czForm {

	public function configure()
	{
		parent::configure();

		//secondary_products_left_title - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("secondary_products_left_title", "Gauche : Titre", array('style' => 'width: 700px'));
		//secondary_products_left_price - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("secondary_products_left_price", "Gauche : Prix", array());
		//secondary_products_left_strike_price - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("secondary_products_left_strike_price", "Gauche : Prix barré", array());
		//secondary_products_left_pourcentage - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("secondary_products_left_pourcentage", "Gauche : Pourcentage", array());
		//secondary_products_left_picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("secondary_products_left_picture", "Gauche : Illustration", 274, 274);

		//secondary_products_left_details - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("secondary_products_left_details", "Gauche : Details", array('style' => 'width: 700px'));
		//secondary_products_left_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("secondary_products_left_link", "Gauche : Lien du produit", array());
		//secondary_products_right_title - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("secondary_products_right_title", "Droite : Titre", array('style' => 'width: 700px'));
		//secondary_products_right_price - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("secondary_products_right_price", "Droite : Prix", array());
		//secondary_products_right_strike_price - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("secondary_products_right_strike_price", "Droite : Prix barré", array());
		//secondary_products_right_pourcentage - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("secondary_products_right_pourcentage", "Droite : Pourcentage", array());

		//secondary_products_right_picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("secondary_products_right_picture", "Droite : Illustration", 274, 274);

		//secondary_products_right_details - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("secondary_products_right_details", "Droite : Details", array('style' => 'width: 700px'));
		//secondary_products_right_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("secondary_products_right_link", "Droite : Lien du produit", array());
	}
}