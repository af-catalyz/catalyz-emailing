<?php

class CampaignTemplateImporter {
    protected $originalContent;

    protected $errors;
    protected function logError($offset, $message)
    {
        $this->errors[] = sprintf('Line %d: %s', $this->getLineNoFromOffset($offset), $message);
    }

    protected function getLineNoFromOffset($offset)
    {
        return substr_count(substr($this->originalContent, 0, $offset), "\n") + 1;
    }

    public function getErrors()
    {
        return $this->errors;
    }
    public function execute($content, $ProjectName, $TemplateName)
    {
        $this->originalContent = $content;
        $this->errors = array();
        $this->title = false;

        $content = $this->updateTitle($content);
        $content = $this->updateRessourcePaths($content, $ProjectName, $TemplateName);

        $this->fields = array();

        $currentOffset = 0;
        $result = '<?php $parameters = unEscape($parameters); ?>';

        if (preg_match_all('|<!-- cze:subform((\s+[a-zA-Z0-9]+="[^"]+")*) -->(.*)<!-- /cze:subform -->|msU', $content, $tokens, PREG_OFFSET_CAPTURE)) {
            foreach($tokens[0] as $subformIndex => $subforms) {
                $attributes = $this->extractAttributes($tokens[1][$subformIndex][0]);
                 //print_r($tokens);
                if (isset($attributes['name'])) {
                    $name = $attributes['name'];
                	unset($attributes['name']);
                } else {
                    $name = 'unnamed';
                    $this->logError($subforms[1], sprintf('"name" attribute is missing for Subform definition'));
                }

            	if(isset($attributes['label'])){
            		$this->fields[$name]['label'] = $attributes['label'];
            		unset($attributes['label']);
            	}else{
            		$this->fields[$name]['label'] = null;
            	}
                $subFormContent = $tokens[3][$subformIndex][0];
                $this->fields[$name]['type'] = 'subform';
                $this->fields[$name]['fields'] = array();

                $this->fields[$name]['mapper'] = new CampaignTemplateImporter_TypeMapper_Subform($name, sprintf('%s%sForm_%s', $ProjectName, $TemplateName, $name), $this->fields[$name]['label'], $attributes);

                $result .= $this->processFields(substr($content, $currentOffset, $subforms[1] - $currentOffset));
                $result .= sprintf('<?php if (isset($parameters["%1$s"]) && is_array($parameters["%1$s"])): foreach($parameters["%1$s"] as $%1$s): ?>', $name);
                $result .= $this->processSubForm($name, $subFormContent);
                $result .= '<?php endforeach; endif; ?>';

                $currentOffset = $subforms[1] + strlen($subforms[0]);
            }
        }
        $result .= $this->processFields(substr($content, $currentOffset));

        return $result;
    }

    protected function processSubForm($name, $content)
    {
        $prefix = $name;
        return $this->processFields($content, $prefix);
    }

    protected function processFields($content, $prefix = null)
    {
        // printf("fields(%s)\n\n%s\n\n", $prefix, $content);
        $result = '';
        $currentOffset = 0;
        if (preg_match_all('|<!-- cze:field((\s+[a-zA-Z0-9]+="[^"]+")+) -->(.*)<!-- /cze:field -->|msU', $content, $tokens, PREG_OFFSET_CAPTURE)) {
            // print_r($tokens);
            foreach($tokens[0] as $fieldIndex => $field) {
                $defaultValue = $tokens[3][$fieldIndex][0];

                $attributes = $this->extractAttributes($tokens[1][$fieldIndex][0]);
                // print_r($attributes);
                $name = $attributes['name'];
                unset($attributes['name']);
                if (isset($attributes['type'])) {
                    $type = $attributes['type'];
                    unset($attributes['type']);
                } else {
                    $type = 'text';
                }
                if (isset($attributes['label'])) {
                    $label = $attributes['label'];
                    unset($attributes['label']);
                } else {
                    $label = $this->guessLabelFromName($name);
                }

                $typeMapperClassName = sprintf('CampaignTemplateImporter_TypeMapper_%s', ucfirst($type));
            	//var_dump($typeMapperClassName);
                if (class_exists($typeMapperClassName)) {
                    $mapper = new $typeMapperClassName($prefix, $name, $type, $label, $attributes, $defaultValue);
                } else {
                    $mapper = new CampaignTemplateImporter_TypeMapper_Default($prefix, $name, $type, $label, $attributes, $defaultValue);
                }
                $this->registerField($prefix, $name, $type, $label, $mapper);
                $result .= substr($content, $currentOffset, $field[1] - $currentOffset);
            	$result .= $mapper->getDisplayCode();
            	$currentOffset = $field[1] + strlen($field[0]);
            }
            $result .= substr($content, $currentOffset);
        } else {
            $result = $content;
        }

        return $result;
    }

    protected function extractAttributes($content)
    {
        $result = array();
        if (preg_match_all('|([a-zA-Z0-9]+)="([^"]+)"|msU', $content, $tokens)) {
            // print_r($tokens);
            foreach($tokens[0] as $index => $attribute) {
                if ($tokens[1][$index]) {
                    $result[$tokens[1][$index]] = $tokens[2][$index];
                }
            }
        }
        // print_r($result);
        return $result;
    }

    protected function registerField($prefix, $name, $type, $label, $mapper)
    {
        // print_r($name, $type, $attributes, $defaultValue);
        $field = array();
        $field['type'] = $type;
        $field['label'] = $label;
        $field['mapper'] = $mapper;

        if ($prefix) {
            $this->fields[$prefix]['fields'][$name] = $field;
        } else {
            $this->fields[$name] = $field;
        }
    }
    protected $fields;
    function getFields()
    {
        return $this->fields;
    }

    public function guessLabelFromName($name)
    {
        $name = preg_replace('/([A-Z])([A-Z])/', '$1 $2', $name);
        return ucfirst(strtolower(preg_replace('/([a-zA-Z])([A-Z0-9])/', '$1 $2', $name)));
    }

    public function updateRessourcePaths($content, $ProjectName, $TemplateName)
    {
        $path = sprintf('<?php echo CatalyzEmailing::getApplicationUrl() ?>/%sPlugin/images/%s', $ProjectName, lcfirst($TemplateName));

        $patterns = array();
        $replacement = array();

        if (preg_match_all('|src="(?P<src>[^"]*)"|si', $content, $matchElements)) {
            foreach ($matchElements[0] as $key => $element) {
                if (preg_match('/(jpg|gif|png|css)$/', strtolower($matchElements['src'][$key]))) {
                    $patterns[] = $element;
                    $replacement[] = sprintf('src="%s/%s"', $path, $matchElements['src'][$key]);
                }
            }
        }

        if (preg_match_all('|href="(?P<target>[^"]*)"|si', $content, $matchElements)) {
            foreach ($matchElements[0] as $key => $element) {
                if (preg_match('/(css|pdf)$/', strtolower($matchElements['target'][$key]))) {
                    $patterns[] = $element;
                    $replacement[] = sprintf('href="%s/%s"', $path, $matchElements['target'][$key]);
                }
            }
        }

        return str_replace($patterns, $replacement, $content);
    }
    protected $title;
    public function getTitle()
    {
        return $this->title;
    }

    public function updateTitle($content)
    {
        $this->title = false;
        if (preg_match('/<title[^>]*>(.*?)<\/title>/is', $content, $tokens)) {
            $this->title = $tokens[1];
            $content = str_ireplace($tokens[0], '<title>#SUBJECT#</title>', $content);
        }

        return $content;
    }
}