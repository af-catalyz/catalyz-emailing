<?php
class vigourouxCampaign01Form_product extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
		        'title' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'content' => new sfWidgetFormTextarea(array(),array('label' => 'Introduction','style' => 'width: 400px','rows'=>5)),
		        'picture_01' => new czWidgetFormImage(array('picture.width' => 175, 'picture.height' => 175), array('style' => 'width: 400px')),
		        'picture_02' => new czWidgetFormImage(array('picture.width' => 175, 'picture.height' => 175), array('style' => 'width: 400px')),
		        'picture_03' => new czWidgetFormImage(array('picture.width' => 175, 'picture.height' => 175), array('style' => 'width: 400px')),
		        'picture_04' => new czWidgetFormImage(array('picture.width' => 175, 'picture.height' => 175), array('style' => 'width: 400px')),
		        'link' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'title' => 'Titre du produit',
		        'content' => 'Contenu',
		        'picture_01' => 'Illustration 1',
		        'picture_02' => 'Illustration 2',
		        'picture_03' => 'Illustration 3',
		        'picture_04' => 'Illustration 4',
		        'link' => 'Lien'
		        ));
	}
}

?>