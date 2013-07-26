<?php

class sudprojetInvitationForm extends czForm {

	public function configure()
	{
		parent::configure();

		$this->addTextareaField('title', 'Titre');
		$this->addTextField('date', 'Date');
		$this->addPictureField('picture', 'Illustration', 362, 292);
		$this->addWysiwygField('content', 'Contenu');

		$this->addSubformField('programme', 'Ajouter un élément', 'sudprojetInvitationForm_programme');
		$this->addSubformField('articles', 'Ajouter un article', 'sudprojetInvitationForm_article');

		$this->addTextField('adress', 'Adresse');
		$this->addTextField('email', 'Email');
		$this->addUrlField('website_adress', 'Url');
		$this->addTextField('zip', 'Code postal');
		$this->addTextField('city', 'Ville');
		$this->addTextField('phone', 'Téléphone');
		$this->addTextField('fax', 'Fax');
	}
}