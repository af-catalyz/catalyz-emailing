<?php
class kreactivNewsletter20110511Form_casestudy extends czContentObjectSubForm {
    function configure()
    {
        parent::configure();

        $this->setWidgets(array(
                'illustration' => new czWidgetFormImage(array('picture.width' => 249, 'picture.height'=> 249), array('label' => 'Illustration', 'style' => 'width: 400px')),
                'title' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
                'introduction' => new sfWidgetFormTextarea(array(),array('ajax' => $this->getOption('delay', false))),
                'link_caption' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
                'link' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
                ));
    	$this->getWidgetSchema()->setLabels(array(
                'illustration' => 'Illustration',
                'title' => 'Titre',
                'introduction' => 'Introduction',
                'link_caption' => 'Titre du lien',
                'link' => 'Lien',
                ));
        // $this->setValidators(array(
        // 'title' => new sfValidatorString(array('required' => false)),
        // 'cible' => new sfValidatorString(array('required' => true)),
        // ));
        $this->setDefaults(array(
                'link_caption' => 'visualisez le travail réalisé.',
                ));
    }
}

?>