<?php
class comparexCampaign01Form extends czForm {

    public function configure()
    {
        parent::configure();

    	$this->addPictureField('header', 'Image principale', 702, 198);
    	$this->addWysiwygField('edito', 'Editorial', array('height' => 300), array('style' => 'width: 400px'));
        $this->addUrlField('video_url', 'Lien associé à la vidéo');

        $this->addPictureField('video_promo_button', 'Image promotionnelle "Testez gratuitement pendant 30 jours"', 198, 33);
        $this->addUrlField('video_promo_url', 'Lien associé au bouton');
        $this->addSubformField('articles', 'Ajouter un article', 'comparexCampaign01Form_article');
        $this->addWysiwygField('bottom_text', 'Fin de newsletter', array('height' => 300), array('style' => 'width: 400px'));

        $this->addTextareaField('footer', 'Coordonnées', array('style' => 'width: 700px'));
        $this->addTextField('footer_email', 'Email', array('style' => 'width: 700px'));
        $this->addTextField('footer_url', 'URL', array('style' => 'width: 700px'));

        $this->widgetSchema->setNameFormat('campaign[content][%s]');
    }
}