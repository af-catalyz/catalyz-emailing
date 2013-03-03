<?php

class CampaignTemplateImporter_TypeMapper_Subform extends CampaignTemplateImporter_TypeMapper_Default {
    protected $itemTitleFieldName;
    function __construct($name, $formClass, $label, $attributes)
    {
        parent::__construct('', $name, '', $label, $attributes, '');
        $this->itemTitleFieldName = isset($attributes['itemTitleFieldName'])?$attributes['itemTitleFieldName']:'title';
        $this->formClass = $formClass;
    }

    function getFormCode()
    {
        return sprintf('$this->addSubformField("%1$s", "%2$s", "%3$s", "%4$s", array());', $this->name, $this->label, $this->formClass, $this->itemTitleFieldName);
    }

	function getDisplayCode()
	{
		return false;
	}
}

?>