<?php
class cciFormationCalendrierForm_main extends czContentObjectSubForm {
    function configure()
    {
        parent::configure();
			$choices = array();
    	$choices['achat'] = 'Achat logistique';
    	$choices['assistant'] = 'Assistant(e)';
    	$choices['bureautique'] = 'bureautique';
    	$choices['comptabilite'] = 'Comptabilité - Gestion';
    	$choices['developpement'] = 'Developpement Personnel';
    	$choices['direction'] = 'Direction';
    	$choices['formations'] = 'Formations Obligatoires';
    	$choices['import'] = 'Import - Export';
    	$choices['langues'] = 'Langues';
    	$choices['logistique'] = 'Logistique - Distribution';
    	$choices['management'] = 'Management';
    	$choices['prevention'] = 'Prévention - Sécurité';
    	$choices['qualite'] = 'Qualité - Sécurité - Environnement';
    	$choices['relation-client'] = 'Relation Client - Marketing';
    	$choices['ressources-humaines'] = 'Ressources Humaines';



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