<?php

class czWidgetFormDate extends sfWidgetFormJQueryDate {
	protected function configure($options = array(), $attributes = array()) {
		parent::configure($options, $attributes);

		$this->addOption('years');
		$this->addOption('display_month_name');
		$this->setOption('culture','fr');

		if (!isset($options['years'])) {
			$years = range(date('Y') - 5, date('Y') + 5);
			$years = array_combine($years, $years);
		}
		else{
			$years = $options['years'];
		}

		$this->setOption('years', $years);

		if (!isset($options['display_month_name'])) {
			$dateWidget = new sfWidgetFormI18nDate(array('years'=> $years,'month_format' => 'name','culture' => 'fr','empty_values'=> array('year' => '&nbsp;', 'month' => '&nbsp;', 'day' => '&nbsp;')));
		}
		else{
			$dateWidget = new sfWidgetFormI18nDate(array('years'=> $years,'month_format' => 'number','culture' => 'fr','empty_values'=> array('year' => '&nbsp;', 'month' => '&nbsp;', 'day' => '&nbsp;')));
		}

		$this->addOption('date_widget',$dateWidget);
		$this->setOption('image','/images/icons/calendar.png');


	}

	public function render($name, $value = null, $attributes = array(), $errors = array())
	{
		sfContext::getInstance()->getResponse()->addJavascript('/js/jquery.ui.datepicker-fr.js' ,'last');

		if ($value == '0000-00-00') {
			$value=null;
		}
		return parent::render($name, $value, $attributes, $errors);
	}
}

?>