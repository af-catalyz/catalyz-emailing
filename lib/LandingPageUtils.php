<?php

class LandingPageUtils{

	static protected function getTemplateList(){
		$templates = sfConfig::get('app_landing_templates', array());
		if(!is_array($templates)){
			return array();
		}
		return $templates;
	}

	static function isModuleAvailable(){
		return count(self::getTemplateList())>0;
	}

	static function getTemplates(){
		$result = array();
		foreach(self::getTemplateList() as $templateName){
			$result[$templateName] = $templateName;
		}
		return $result;
	}
}

?>