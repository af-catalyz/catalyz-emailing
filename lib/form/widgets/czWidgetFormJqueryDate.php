<?php

class czWidgetFormJqueryDate extends sfWidgetFormJqueryDate {
	protected function configure($options = array(), $attributes = array()) {
		parent::configure($options, $attributes);

		$culture = sfConfig::get('app_catalyz_language','fr');

		//var_dump($culture);exit;
		$this->addOption('years');
		$this->addOption('display_month_name');



		if (!isset($options['years'])) {
			$years = range(date('Y') - 5, date('Y') + 5);
			$years = array_combine($years, $years);
		}
		else{
			$years = $options['years'];
		}


		if (!isset($options['display_month_name'])) {
			$dateWidget = new sfWidgetFormI18nDate(array('years'=> $years ,'culture' => $culture,'empty_values'=> array('year' => '&nbsp;', 'month' => '&nbsp;', 'day' => '&nbsp;')));
		}
		else{
			$dateWidget = new sfWidgetFormI18nDate(array('years'=> $years,'month_format' => 'number','culture' => $culture,'empty_values'=> array('year' => '&nbsp;', 'month' => '&nbsp;', 'day' => '&nbsp;')));
		}


		$this->setOption('date_widget',$dateWidget);
		$this->setOption('image','/images/calendar.png');
		$this->setOption('culture',$culture);
	}

	function getJavaScripts(){
		$result = parent::getJavaScripts();
//		$result[] = '/js/jquery.js';
		$result[] = '/js/jquery-ui-1.8.20.custom.min.js';

		if ($this->getOption('culture') == 'fr') {

			$result[] = '/js/jquery.ui.datepicker-fr.js';
		}
		return $result;
	}

	public function render($name, $value = null, $attributes = array(), $errors = array())
	{
		if ($value == '0000-00-00') {
			$value=null;
		}

		return parent::render($name, $value, $attributes, $errors);
	}

	public static function getSubFormDateTimestamp($values){
		if (empty($values['day']) ||  empty($values['month']) || empty($values['year'])) {
			return FALSE;
		}

		return mktime(0, 0, 0, $values['month'], $values['day'], $values['year']);
	}
}

?>