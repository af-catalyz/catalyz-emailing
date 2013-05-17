<?php
class astiaNewsletter2012Form_right4 extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
						'number' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
						'title' => new sfWidgetFormTextarea(array(), array('style' => 'width: 400px')),
						'link' => new czWidgetFormLink(array(), array('style' => 'width: 400px'))
		        ));

		$this->getWidgetSchema()->setLabels(array(
						'title' => 'Titre',
						'link' => 'Lien',
						'number' => 'Chiffre'
		        ));
	}
}

?>