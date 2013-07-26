<?php
class vigourouxCampaign01Form_news extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
		        'title' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'content' => new sfWidgetFormTextarea(array(),array('label' => 'Introduction','style' => 'width: 400px','rows'=>5)),
		        'picture' => new czWidgetFormImage(array('picture.width' => 175, 'picture.height' => 75), array('style' => 'width: 400px')),
		        'link' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'title' => 'Titre de la nouveauté',
		        'content' => 'Contenu',
		        'picture' => 'Illustration',
		        'link' => 'Lien'
		        ));
	}
}

?>