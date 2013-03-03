<?php

class CampaignTemplateImporter_TypeMapper_Picture extends CampaignTemplateImporter_TypeMapper_Default {
    function __construct($prefix, $name, $type, $label, $attributes, $defaultValue)
    {
        parent::__construct($prefix, $name, $type, $label, $attributes, $defaultValue);

    	if(isset($attributes['width'])){
    		$this->width = $attributes['width'];
    	}elseif(preg_match('/width="([^"]+)"/', $defaultValue, $tokens)){
    		$this->width = $tokens[1];
    	}else{
    		$this->width = 100;
    	}
    	if(isset($attributes['height'])){
    		$this->height = $attributes['height'];
    	}elseif(preg_match('/height="([^"]+)"/', $defaultValue, $tokens)){
    		$this->height = $tokens[1];
    	}else{
    		$this->height = 100;
    	}
    }

    function getFormCode()
    {
        return sprintf('$this->addPictureField("%1$s", "%2$s", %3$d, %4$d);', $this->name, $this->label, $this->getWidth(), $this->getHeight());
    }

    protected $height;
    public function getHeight()
    {
        return $this->height;
    }

    protected $width;
    public function getWidth()
    {
        return $this->width;
    }


}

?>