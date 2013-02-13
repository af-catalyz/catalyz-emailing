<?php
class cciFormationCalendrierForm_main extends czContentObjectSubForm {
    function configure()
    {
        parent::configure();
			$choices = array();
    	$choices['yellow'] = 'Jaune';
    	$choices['pink'] = 'Rose';
    	$choices['purple'] = 'Violet';
    	$choices['green'] = 'Vert';
    	$choices['orange'] = 'Orange';
    	$choices['brown'] = 'Marron';
    	$choices['blue'] = 'Bleu';

        $this->setWidgets(array(
                'title' => new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px')),
                'introduction' => new sfWidgetFormTextarea(array()),
                'style' => new sfWidgetFormChoice(array('choices' => $choices)),
                'link' => new czWidgetFormLink(array(), array('label' => 'Lien', 'style' => 'width: 400px'))
                ));
    	$this->getWidgetSchema()->setLabels(array(
                'title' => 'Titre',
                'introduction' => 'Introduction',
                'style' => 'Style',
                'link' => 'Lien'
                ));

    	$this->widgetSchema->setNameFormat('campaign[content][%s]');
    }
}

?>