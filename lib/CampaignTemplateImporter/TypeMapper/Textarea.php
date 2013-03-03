<?php

class CampaignTemplateImporter_TypeMapper_Textarea extends CampaignTemplateImporter_TypeMapper_Default {
	function getDisplayCode(){
		return sprintf('<?php echo nl2br(htmlentities(utf8_decode(%1$s["%2$s"]))); ?>', $this->getAccessorName(), $this->name);
	}
}

?>