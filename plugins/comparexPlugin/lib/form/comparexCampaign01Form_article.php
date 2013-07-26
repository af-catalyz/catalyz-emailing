<?php
class comparexCampaign01Form_article extends czContentObjectSubForm {
    function configure()
    {
        parent::configure();
        $this->addTextareaField('title', 'Titre', array('style' => 'width: 400px'));
        $this->addWysiwygField('content', 'Contenu');
        $this->addTextareaField('button_text', 'Texte', array('style' => 'width: 400px'));
        $this->addUrlField('button_url', 'URL');

    	$this->widgetSchema->setNameFormat('campaign[content][%s]');
    }
}

?>