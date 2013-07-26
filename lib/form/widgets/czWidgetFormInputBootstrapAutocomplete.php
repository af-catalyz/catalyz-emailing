<?php

class czWidgetFormInputBootstrapAutocomplete extends sfWidgetFormInput
{
	protected function configure($options = array(), $attributes = array()) {
		parent::configure($options, $attributes);

		$this->addOption('choices', array());
		$this->addOption('items', 30);
		$this->addOption('minLength', 0);
	}

	public function render($name, $value = null, $attributes = array(), $errors = array())
	{
		$choices = $this->getOption('choices');
		$temp = array();
		foreach ($choices as $choice){
			$temp[$choice] = $choice;
		}

		if (count($temp)>0) {
			$choices = sprintf('["%s"]', implode('", "', $temp));
			$attributes['data-source'] = $choices;
		}

		$attributes['data-provide'] = 'typeahead';
		$attributes['data-items'] = $this->getOption('items');
		$attributes['data-minLength'] = $this->getOption('minLength');

		return parent::render($name, $value, $attributes, $errors);;
	}
}
