<?php

class comparexLandingForm extends czLandingForm {
    public function configure()
    {
        parent::configure();

        $this->addSubformField('top_menu', 'Ajouter un élément de menu', 'comparexLandingForm_menu');
        $this->addSubformField('menu', 'Ajouter un élément de menu', 'comparexLandingForm_menu');

        $this->addTextField('box1_title', 'Titre', array('style' => 'width: 700px'));
        $this->addWysiwygField('box1_content', 'Contenu', array('height' => 200));

    	$this->addWysiwygField('video', 'Vidéo', array('height' => 500));

		$this->addTextField('box2_title', 'Titre', array('style' => 'width: 700px'));
        $this->addWysiwygField('box2_content', 'Contenu', array('height' => 200));

        $this->addTextField('box3_title', 'Titre', array('style' => 'width: 700px'));
        $this->addWysiwygField('box3_content', 'Contenu', array('height' => 200));

        $this->addNotificationFields('form1');

        $this->addPictureField('top_right_picture', 'Image de la publicité', 233, 102);
        $this->addUrlField('top_right_picture_url', 'Cible');
        $this->addWysiwygField('top_right_content', 'Contenu');

        $this->addNotificationFields('form2');

        $this->addPictureField('right_ad_picture', 'Image de la publicité', 443, 53);
        $this->addUrlField('right_ad_url', 'Cible');

        $this->addWysiwygField('right_bottom', 'Détails de l\'offre', array('height' => 400));

        $this->addTextField('bottom_title', 'Titre', array('style' => 'width: 700px'));
        $this->addTextareaField('bottom_zone1', 'Zone 1', array('style' => 'width: 700px'));
        $this->addTextareaField('bottom_zone2', 'Zone 2', array('style' => 'width: 700px'));
        $this->addTextareaField('bottom_zone3', 'Zone 3', array('style' => 'width: 700px'));
        $this->addTextareaField('bottom_zone4', 'Zone 4', array('style' => 'width: 700px'));
        $this->addTextareaField('bottom_legend', 'Légende', array('style' => 'width: 700px'));

        $this->addTextField('footer_caption', 'Texte', array('style' => 'width: 700px'));
        $this->addTextField('footer_phone', 'Téléphone', array('style' => 'width: 700px'));
        $this->addTextField('footer_email', 'Email', array('style' => 'width: 700px'));

		$this->addTextField('sitemap1_title', 'Titre', array('style' => 'width: 700px'));
        $this->addUrlField('sitemap1_url', 'URL');
        $this->addSubformField('sitemap1', 'Ajouter un élément de menu', 'comparexLandingForm_menu');

        $this->addTextField('sitemap2_title', 'Titre', array('style' => 'width: 700px'));
        $this->addUrlField('sitemap2_url', 'URL');
        $this->addSubformField('sitemap2', 'Ajouter un élément de menu', 'comparexLandingForm_menu');

        $this->addTextField('sitemap3_title', 'Titre', array('style' => 'width: 700px'));
        $this->addUrlField('sitemap3_url', 'URL');
        $this->addSubformField('sitemap3', 'Ajouter un élément de menu', 'comparexLandingForm_menu');

        $this->addTextField('sitemap4_title', 'Titre', array('style' => 'width: 700px'));
        $this->addUrlField('sitemap4_url', 'URL');
        $this->addSubformField('sitemap4', 'Ajouter un élément de menu', 'comparexLandingForm_menu');
    }

    static function translateActionFormName($name)
    {
        switch ($name) {
            case 'form1':
                return 'Formulaire 1';
            case 'form2':
                return 'Formulaire 2';
        }
        return parent::translateActionFormName($name);
    }
    static function translateActionFormFieldName($formName, $fieldName)
    {
        //return "$formName, $fieldName";
		switch ($formName) {
            case 'form1':
                switch ($fieldName) {
                    case 'first_name': return 'Prénom';
                    case 'last_name': return 'Nom';
                    case 'email': return 'Email';
                    case 'company': return 'Société';
                }
            	break;
            case 'form2':
            	switch ($fieldName) {
            		case 'first_name': return 'Prénom';
            		case 'last_name': return 'Nom';
            		case 'email': return 'Email';
            		case 'company': return 'Société';
            		case 'user_count': return 'Nb utilisateurs';
            	}
            	break;
        }
        return parent::translateActionFormFieldName($formName, $fieldName);
    }
}

?>