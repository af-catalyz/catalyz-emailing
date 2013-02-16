<?php

class comparexLandingForm extends czLandingForm{
	public function configure()
	{
		parent::configure();

		$this->addSubformField('top_menu', 'Ajouter un élément de menu', 'comparexLandingForm_menu');
		$this->addSubformField('menu', 'Ajouter un élément de menu', 'comparexLandingForm_menu');

		$this->addTextField('box1_title', 'Titre');
		$this->addWysiwygField('box1_content', 'Contenu');

		$this->addTextField('box2_title', 'Titre');
		$this->addWysiwygField('box2_content', 'Contenu');

		$this->addTextField('box3_title', 'Titre');
		$this->addWysiwygField('box3_content', 'Contenu');

		$this->addPictureField('top_right_picture', 'Image de la publicité', 233, 102);
		$this->addUrlField('top_right_picture_url', 'Cible');
		$this->addWysiwygField('top_right_content', 'Contenu');

		$this->addPictureField('right_add', 'Image de la publicité', 443, 53);

		$this->addWysiwygField('right_bottom', 'Contenu');

		$this->addTextField('bottom_title', 'Titre');
		$this->addTextareaField('bottom_zone1', 'Zone 1');
		$this->addTextareaField('bottom_zone2', 'Zone 2');
		$this->addTextareaField('bottom_zone3', 'Zone 3');
		$this->addTextareaField('bottom_zone4', 'Zone 4');
		$this->addTextareaField('bottom_legend', 'Légende');

		$this->addTextField('sitemap1_title', 'Titre');
		$this->addSubformField('sitemap1', 'Ajouter un élément de menu', 'comparexLandingForm_menu');

		$this->addTextField('sitemap2_title', 'Titre');
		$this->addSubformField('sitemap2', 'Ajouter un élément de menu', 'comparexLandingForm_menu');

		$this->addTextField('sitemap3_title', 'Titre');
		$this->addSubformField('sitemap3', 'Ajouter un élément de menu', 'comparexLandingForm_menu');

		$this->addTextField('sitemap4_title', 'Titre');
		$this->addSubformField('sitemap4', 'Ajouter un élément de menu', 'comparexLandingForm_menu');

	}
}

?>