<?php

class czWidgetFormDateInput extends sfWidgetFormInput
{
	public function render($name, $value = null, $attributes = array(), $errors = array())
	{
		if (preg_match('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}/', $value)) {
			$value = date('d/m/Y H:i', strtotime($value));
		}

		return parent::render($name, $value, $attributes, $errors);;
	}
}
