<?php

class AutodeskLandingForm extends czLandingForm {
    public function configure()
    {
        parent::configure();

        $this->addSubformField('top_menu', 'Ajouter un élément de menu', 'comparexLandingForm_menu');
        $this->addSubformField('menu', 'Ajouter un élément de menu', 'comparexLandingForm_menu');

        $this->addTextField('title', 'Titre', array('style' => 'width: 700px'));
    		$this->addPictureField('right_image', 'Illustration', 59, 45);
				$this->addWysiwygField('right_content', 'Contenu');

    		$this->addWysiwygField('edito_content', 'Édito', array('height' => 500));
    		$this->addWysiwygField('left_content', 'Contenu à coté du formulaire', array('height' => 500));

				$this->addNotificationFields('form1');
    		$this->addWysiwygField('form1_introduction', 'Introduction du formulaire', array('height' => 500));

    		$this->addWysiwygField('center_content', 'Contenu sous le formulaire', array('height' => 500));

    		$this->addTextField('box1_title', 'Titre', array('style' => 'width: 700px'));
    		$this->addPictureField('box1_image', 'Illustration', 49, 49);
				$this->addWysiwygField('box1_content', 'Contenu', array('height' => 500));

	    	$this->addTextField('box2_title', 'Titre', array('style' => 'width: 700px'));
	    	$this->addPictureField('box2_image', 'Illustration', 50, 51);
	    	$this->addWysiwygField('box2_content', 'Contenu', array('height' => 500));

	    	$this->addTextField('box3_title', 'Titre', array('style' => 'width: 700px'));
	    	$this->addPictureField('box3_image', 'Illustration', 52, 50);
	    	$this->addWysiwygField('box3_content', 'Contenu', array('height' => 500));

				$this->addWysiwygField('bottom_content', false, array('height' => 500));

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
                return 'Formulaire';
        }
        return parent::translateActionFormName($name);
    }
    static function translateActionFormFieldName($formName, $fieldName)
    {
        //return "$formName, $fieldName";
		switch ($formName) {
            case 'form1':
                switch ($fieldName) {
                    case 'number': return 'Nombre de licences';
                    case 'email': return 'Email';
                    case 'proposition': return 'Envoyer une proposition sur l\'abonnement';
                }
            	break;
        }
        return parent::translateActionFormFieldName($formName, $fieldName);
    }
}

?>