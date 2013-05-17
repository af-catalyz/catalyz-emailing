<?php
class astiaNewsletter2012Form_right3 extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
						'title' => new sfWidgetFormTextarea(array(), array('style' => 'width: 400px')),
						'link' => new czWidgetFormLink(array(), array('style' => 'width: 400px')),
						'picture' => new czWidgetFormImage(array('picture.width' => 90,'picture.height' => 90, 'thumbnail.width' => 90/2,'thumbnail.height' => 90/2), array('style' => 'width: 400px'))
		        ));

		$this->getWidgetSchema()->setLabels(array(
						'title' => 'Titre',
						'link' => 'Lien',
						'picture' => 'Illustration'
		        ));
	}
}

?>