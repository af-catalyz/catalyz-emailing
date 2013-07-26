<?php

class CampaignTemplateImporter_TypeMapper_Default {
    function __construct($prefix, $name, $type, $label, $attributes, $defaultValue)
    {
        $this->prefix = $prefix;
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->attributes = $attributes;
        $this->defaultValue = $defaultValue;
    }

    protected function getAccessorName()
    {
        if ($this->prefix) {
            return '$' . $this->prefix;
        } else {
            return '$parameters';
        }
    }

    function getFormCode()
    {
        return sprintf('$this->addTextField("%1$s", "%2$s", array());', $this->name, $this->label);
    }

    function getDisplayCode()
    {
        $value = $this->getDisplayCodeForCurrentField();
        if ($this->defaultValue) {
            return sprintf('<?php if(isset(%1$s["%2$s"])){ ?>%3$s<?php } ?>', $this->getAccessorName(), $this->name, $this->getDisplayCodeForDefaultValue($value));
        }
        return $value;
    }

    function getDisplayCodeForDefaultValue($value = false)
    {
        if (!$value) {
            $value = $this->getDisplayCodeForCurrentField();
        }

        $result = str_replace('#VALUE#', $value, $this->defaultValue);
        // print_r($result);
        $result = preg_replace('/#VALUE\(([a-zA-Z0-9_]+)\)#/', '<?php echo ' . $this->getAccessorName() . '["\1"]; ?>', $result);
        $result = preg_replace('/#VALUE\(([a-zA-Z0-9_]+)\.([a-zA-Z0-9_]+)\)#/', '<?php echo $\1["\2"]; ?>', $result);
        // print_r($result);
        return $result;
    }

    function getDisplayCodeForCurrentField()
    {
        return sprintf('<?php echo %1$s["%2$s"]; ?>', $this->getAccessorName(), $this->name);
    }
}

?>