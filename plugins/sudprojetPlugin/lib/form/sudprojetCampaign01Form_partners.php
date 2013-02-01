<?php
class sudprojetCampaign01Form_partners extends czContentObjectSubForm {
    function configure()
    {
        parent::configure();

        $this->setWidgets(array(
                'illustration' => new czWidgetFormImage(array('picture.width' => 72, 'picture.height'=> 72), array('label' => 'Illustration', 'style' => 'width: 400px')),
                'link' => new czWidgetFormLink(array(), array('label' => 'Lien', 'style' => 'width: 400px'))
                ));
    	$this->getWidgetSchema()->setLabels(array(
                'illustration' => 'Illustration',
                'link' => 'Lien'
                ));

    	$this->widgetSchema->setNameFormat('campaign[content][%s]');
    }
}

?>