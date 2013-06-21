<?php
class elaulCampaign01Form_reference extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
		        'picture' => new czWidgetFormImage(array('picture.width' => 67,'picture.height' => 67, 'thumbnail.width' => 67,'thumbnail.height' => 67), array('style' => 'width: 400px')),
						'title' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'content' => new sfWidgetFormTextarea(array(),array('label' => 'Introduction','style' => 'width: 400px','rows'=>5))
		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'title' => 'Nom de la société',
		        'content' => 'Présentation',
		        'picture' => 'Illustration'
		        ));
	}
}

?>