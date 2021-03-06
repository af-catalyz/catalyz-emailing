<?php
class elaulCampaign01Form_products extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
		        'picture' => new czWidgetFormImage(array('picture.width' => 122,'picture.height' => 122, 'thumbnail.width' => 122/2,'thumbnail.height' => 122/2), array('style' => 'width: 400px')),
		        'is_new' => new czWidgetFormInputCheckbox(),
						'title' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'content' => new sfWidgetFormTextarea(array(),array('label' => 'Introduction','style' => 'width: 400px','rows'=>5)),
		        'more' => new czWidgetFormLink(),
		        'link' => new czWidgetFormLink(),
		        'link2' => new czWidgetFormLink()
		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'is_new' => 'Afficher le logo "nouveau"',
		        'title' => 'Titre',
		        'content' => 'Présentation',
		        'picture' => 'Illustration',
		        'more' => 'Lien informations complémentaires',
		        'link' => 'Lien vers la documentation',
		        'link2' => 'Lien vers le devis'
		        ));
	}
}

?>