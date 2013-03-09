<?php

class CampaignTemplateImporter_TypeMapper_Textarea extends CampaignTemplateImporter_TypeMapper_Default {
	function getFormCode()
	{
		return sprintf('$this->addTextareaField("%1$s", "%2$s", array(\'style\' => \'width: 700px\'));', $this->name, $this->label);
	}
	function getDisplayCode(){
		return sprintf('<?php echo nl2br(htmlentities(utf8_decode(%1$s["%2$s"]))); ?>', $this->getAccessorName(), $this->name);
	}
}

?>