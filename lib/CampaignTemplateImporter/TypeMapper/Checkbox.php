<?php

class CampaignTemplateImporter_TypeMapper_Checkbox extends CampaignTemplateImporter_TypeMapper_Default {
    function getFormCode()
    {
        return sprintf('$this->addCheckboxField("%1$s", "%2$s", array());', $this->name, $this->label);
    }

	function getDisplayCodeForCurrentField()
	{
		return '';
	}
}

?>