<?php

class CampaignTemplateImporter_TypeMapper_Text extends CampaignTemplateImporter_TypeMapper_Default {
    function __construct($prefix, $name, $type, $label, $attributes, $defaultValue)
    {
        parent::__construct($prefix, $name, $type, $label, $attributes, $defaultValue);
    	if(!preg_match('/#VALUE#/', $this->defaultValue)){
    		$this->defaultValue = '#VALUE#';
    	}

    }
}

?>