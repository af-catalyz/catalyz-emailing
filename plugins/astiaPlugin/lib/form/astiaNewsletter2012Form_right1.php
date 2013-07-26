<?php
class astiaNewsletter2012Form_right1 extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
					'title' => new sfWidgetFormTextarea(array(), array('style' => 'width: 400px')),
					'link' => new czWidgetFormLink(array(), array('style' => 'width: 400px'))
	));

		$this->getWidgetSchema()->setLabels(array(
					'title' => 'Titre',
					'link' => 'Lien'
	));
	}
}

?>