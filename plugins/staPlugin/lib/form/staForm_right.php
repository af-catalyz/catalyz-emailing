<?php
class staForm_right extends czContentObjectSubForm {
    function configure()
    {
        parent::configure();

        $this->setWidgets(array(
                'title' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
                'illustration' => new czWidgetFormImage(array('picture.width' => 154, 'picture.height'=> 136), array('label' => 'Illustration', 'style' => 'width: 400px')),
                'link' => new czWidgetFormLink(array(), array('style' => 'width: 400px')),
                ));

    	$this->getWidgetSchema()->setLabels(array(
                'title' => 'Titre',
                'illustration' => 'Illustration',
                'link' => 'Lien'
                ));

    	$this->widgetSchema->setNameFormat('campaign[content][%s]');
    }
}

?>