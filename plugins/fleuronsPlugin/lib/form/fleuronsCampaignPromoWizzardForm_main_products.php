<?php

class fleuronsCampaignPromoWizzardForm_main_products extends czForm {

	public function configure()
	{
		parent::configure();

		//main_products_picture - CampaignTemplateImporter_TypeMapper_Picture
		$this->addPictureField("main_products_picture", "Illustration", 265, 265);
		//main_products_price - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("main_products_price", "Prix", array());
		//main_products_strike_price - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("main_products_strike_price", "Prix barré", array());
		//main_products_pourcentage - CampaignTemplateImporter_TypeMapper_Text
		$this->addTextField("main_products_pourcentage", "Pourcentage", array());
		//main_products_title - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("main_products_title", "Titre", array('style' => 'width: 700px'));
		//main_products_details - CampaignTemplateImporter_TypeMapper_Textarea
		$this->addTextareaField("main_products_details", "Details", array('style' => 'width: 700px'));
		//main_products_link - CampaignTemplateImporter_TypeMapper_Url
		$this->addUrlField("main_products_link", "Lien du produit", array());

	}
}