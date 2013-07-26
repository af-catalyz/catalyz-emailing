<?php

class czWidgetFormFile extends sfWidgetFormInput {
	protected function configure($options = array(), $attributes = array())
	{
		parent::configure($options, $attributes);
		$this->setAttribute('size', 90);
	}
	public function render($name, $value = null, $attributes = array(), $errors = array()) {
		sfContext::getInstance()->getResponse()->addJavascript('/js/tiny_mce/plugins/filemanager/js/mcfilemanager.js');
		if(count($errors)>0){
			if(empty($attributes['class'])){
				$attributes['class'] = 'error';
			}else{
				$attributes['class'] .= ' error';
			}
		}
		$result = parent::render($name, $value, $attributes, $errors);
		// la ligne mcFileManager.baseURL = ... est nécessaire dans le cas ou le widget est utilisé sans la présence d'un tiny_mce.
		$result .=  ' [<a href="javascript:mcFileManager.baseURL = \'/js/tiny_mce/plugins/filemanager/\'; mcFileManager.open(\'catalyzEdit\', \'' . $name . '\', \'\', '
		 . 'function (url, data){	$(\'#file' . $this->generateId($name) . '\').attr(\'src\', url);$(\'#' . $this->generateId($name) . '\').attr(\'value\', url);}, '
		 . '{remove_script_host: true} );">Parcourir</a>]';

		return $result;
	}
}

?>