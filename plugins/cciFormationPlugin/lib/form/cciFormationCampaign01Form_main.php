<?php
class cciFormationCampaign01Form_main extends czContentObjectSubForm {
    function configure()
    {
        parent::configure();

        $this->setWidgets(array(
                'title' => new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px')),
                'introduction' => new sfWidgetFormTextarea(array()),
                'link_caption' => new sfWidgetFormInput(array(), array('label' => 'Intitulé du lien', 'style' => 'width: 400px')),
                'link' => new czWidgetFormLink(array(), array('label' => 'Lien', 'style' => 'width: 400px'))
                ));
    	$this->getWidgetSchema()->setLabels(array(
                'title' => 'Titre',
                'introduction' => 'Introduction',
                'link_caption' => 'Titre du lien',
                'link' => 'Lien'
                ));

    	$this->widgetSchema->setNameFormat('campaign[content][%s]');
    }
}

?>