<?php
class asfoPromotionForm_date extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
		        'caption' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'link' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'caption' => 'Date',
		        'link' => 'Lien'
		        ));
	}
}

?>