<?php

class CampaignTemplateImporter_TypeMapper_Wysiwyg extends CampaignTemplateImporter_TypeMapper_Default {
    function __construct($prefix, $name, $type, $label, $attributes, $defaultValue)
    {
        parent::__construct($prefix, $name, $type, $label, $attributes, $defaultValue);
        $this->fontFace = isset($attributes['font'])?$attributes['font']:'';
        $this->linkColor = isset($attributes['link'])?$attributes['link']:'';
        $this->cssStyles = isset($attributes['css'])?$attributes['css']:'';
    }
    protected $fontFace;
    protected function getFontFace()
    {
        return $this->fontFace;
    }

    protected $linkColor;
    protected function getLinkColor()
    {
        return $this->linkColor;
    }

    protected $cssStyles;
    protected function getCssStyles()
    {
        return $this->cssStyles;
    }

    function getDisplayCode()
    {
        return sprintf('<?php if (!empty(%1$s["%2$s"])) { $renderer = new CatalyzEmailRenderer("%3$s", "%4$s", "%5$s"); echo $renderer->renderWysiwyg(utf8_decode(%1$s["%2$s"]), "%4$s"); } ?>', $this->getAccessorName(), $this->name, $this->getFontFace(), $this->getLinkColor(), $this->getCssStyles());
    }
	function getFormCode(){
		return sprintf('$this->addWysiwygField("%1$s", "%2$s", array("height" => 300), array());', $this->name, $this->label);
	}
}

?>