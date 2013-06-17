<?php
class OtNewsletter2012Form_box extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$sfWidgetFormSchema = /*(sfWidgetFormSchema)*/ $this->getWidgetSchema();


		$styleTab = array();
		$styleTab['manifestation'] = 'Manifestation';
		$styleTab['musique'] = 'Musique';
		$styleTab['sport'] = 'Sport';
		$styleTab['culture'] = 'Culture';
		$styleTab['tourisme'] = 'Tourisme';
		$styleTab['cinema'] = 'Cinéma';
		$styleTab['danse'] = 'Danse';
		$styleTab['loisirs'] = 'Loisirs';
		$styleTab['stage'] = 'Stage';
		$styleTab['exposition'] = 'Exposition';


		$this->setWidgets(array(
						'style' => new sfWidgetFormSelect(array("choices" => $styleTab), array('style' => 'width: 400px')),
						'picture' => new czWidgetFormImage(array('picture.width' => 389, 'picture.height' => 141,'thumbnail.width' => 389/2, 'thumbnail.height' => 141/2), array('style' => 'width: 400px')),
						'content' => new czWidgetFormTextareaTinyMCE(array(),array('ajax' => $this->getOption('delay', false))),
		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'style' => 'Style de l\'encart',
		        'content' => 'Contenu',
		        'picture' => 'Illustration'
		        ));
	}
}

?>