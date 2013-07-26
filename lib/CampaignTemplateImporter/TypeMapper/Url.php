<?php

class CampaignTemplateImporter_TypeMapper_Url extends CampaignTemplateImporter_TypeMapper_Default {
	function getDisplayCode()
	{
		if (!$this->defaultValue) {
			return '';
		}
		return parent::getDisplayCode();
	}

	function getDisplayCodeForCurrentField(){
		return sprintf('<?php echo czWidgetFormLink::displayLink(%1$s["%2$s"]); ?>', $this->getAccessorName(), $this->name);
	}
    function getFormCode()
    {
        return sprintf('$this->addUrlField("%1$s", "%2$s", array());', $this->name, $this->label);
    }
}

?>