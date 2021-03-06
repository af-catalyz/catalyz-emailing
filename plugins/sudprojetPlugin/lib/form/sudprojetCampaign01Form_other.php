<?php
class sudprojetCampaign01Form_other extends czContentObjectSubForm {
    function configure()
    {
        parent::configure();

        $this->setWidgets(array(
                'illustration' => new czWidgetFormImage(array('picture.width' => 158, 'picture.height'=> 158), array('label' => 'Illustration', 'style' => 'width: 400px')),
                'title' => new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px')),
                'introduction' => new sfWidgetFormTextarea(array(),array('style' => 'height: 200px;width: 400px')),
                'link_caption' => new sfWidgetFormInput(array(), array('label' => 'Intitulé du lien', 'style' => 'width: 400px')),
                'link' => new czWidgetFormLink(array(), array('label' => 'Lien', 'style' => 'width: 400px'))
                ));

    	$this->getWidgetSchema()->setLabels(array(
                'illustration' => 'Illustration',
                'title' => 'Titre',
                'introduction' => 'Introduction',
                'link_caption' => 'Titre du lien',
                'link' => 'Lien'
                ));

    	$this->widgetSchema->setNameFormat('campaign[content][%s]');
    }
}

?>