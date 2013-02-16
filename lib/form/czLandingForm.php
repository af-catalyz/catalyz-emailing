<?php

class czLandingForm extends czForm {

	protected function getFormType(){
		return 'landing';
	}

	static function translateActionFormName($name){
		return $name;
	}
	static function translateActionFormFieldName($formName, $fieldName){
		return $fieldName;
	}
}

?>