<?php
class asfoPromotionForm_bottom extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
		        'content' => new sfWidgetFormTextarea(array(), array('style' => 'width: 400px'))
		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'content' => 'Contenu'
		        ));
	}
}

?>