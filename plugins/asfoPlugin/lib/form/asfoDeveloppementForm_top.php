<?php
class asfoDeveloppementForm_top extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
		        'caption' => new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px')),
		        'link' => new sfWidgetFormInput(array(), array('label' => 'Lien', 'style' => 'width: 400px')),
		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'caption' => 'Titre du lien',
		        'link' => 'Lien'
		        ));
	}
}

?>