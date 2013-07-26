<?php
class astiaNewsletter2012Form_actu extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
						'title' => new sfWidgetFormTextarea(array(), array('style' => 'width: 400px'))
		        ));

		$this->getWidgetSchema()->setLabels(array(
						'title' => 'Titre'
		        ));
	}
}

?>