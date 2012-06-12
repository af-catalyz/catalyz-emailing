<?php
class kreactivNewsletter20110511Form_main extends czContentObjectSubForm {
    function configure()
    {
        parent::configure();

        $this->setWidgets(array(
                'section' => new sfWidgetFormInput(array(), array('label' => 'Section', 'style' => 'width: 400px')),
                'illustration' => new czWidgetFormImage(array('picture.width' => 105, 'picture.height'=> 200), array('label' => 'Illustration', 'style' => 'width: 400px')),
                'title' => new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px')),
                'introduction' => new czWidgetFormTextareaTinyMCE(array(),array('ajax' => $this->getOption('delay', false))),
                'link_caption' => new sfWidgetFormInput(array(), array('label' => 'Intitulé du lien', 'style' => 'width: 400px')),
                'link' => new sfWidgetFormInput(array(), array('label' => 'Lien', 'style' => 'width: 400px')),
                ));
    	$this->getWidgetSchema()->setLabels(array(
                'section' => 'Section',
                'illustration' => 'Illustration',
                'title' => 'Titre',
                'introduction' => 'Introduction',
                'link_caption' => 'Titre du lien',
                'link' => 'Lien',
                ));


//        $this->setValidators(array(
//                'title' => new sfValidatorString(array('required' => false)),
//                'cible' => new sfValidatorString(array('required' => true)),
//                ));
    	$this->widgetSchema->setNameFormat('campaign[content][%s]');
    }
}

?>