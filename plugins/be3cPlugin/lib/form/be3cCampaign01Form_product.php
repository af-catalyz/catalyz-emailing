<?php
class be3cCampaign01Form_product extends czContentObjectSubForm {
	function configure()
	{
		parent::configure();

		$this->setWidgets(array(
		        'title' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'content' => new sfWidgetFormTextarea(array(),array('label' => 'Introduction','style' => 'width: 400px','rows'=>5)),
		        'line_1' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'line_2' => new sfWidgetFormInput(array(), array('style' => 'width: 400px')),
		        'line_3' => new czWidgetFormDate(array('display_month_name' => 'number'))
		        ));

		$this->getWidgetSchema()->setHelps(array(
		        'line_2' => '<span class="hint">Exemple : "M. Jean Pierre"</span>'
		        ));

		$this->getWidgetSchema()->setLabels(array(
		        'title' => 'Sujet',
		        'content' => 'Présentation',
		        'line_1' => 'Date et lieu',
		        'line_2' => 'Intervenant',
		        'line_3' => 'Date limite d\'inscription'
		        ));
	}
}

?>