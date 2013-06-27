<?php
class asfoCalendrierForm_formation extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
		        'caption' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'time' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'price' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'period_1' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'period_2' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'period_3' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'link' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'caption' => 'Intitulé',
		        'time' => 'Durée',
		        'price' => 'Cout HT/p.',
		        'period_1' => 'Date période 1',
		        'period_2' => 'Date période 2',
		        'period_3' => 'Date période 3',
		        'link' => 'Lien'
		        ));
	}
}

?>