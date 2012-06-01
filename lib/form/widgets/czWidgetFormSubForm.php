<?php

class czWidgetFormSubForm extends sfWidgetForm {
    public function getStylesheets()
    {
        $result = parent::getStylesheets();

        $formClass = $this->getOption('formClass');
        $form =/*(sfForm)*/ new $formClass();

        foreach($form as $widget) {
            $result = array_merge($result, $widget->getWidget()->getStylesheets());
        }
        return $result;
    }

    public function getJavaScripts()
    {
        $result = parent::getJavaScripts();

        $formClass = $this->getOption('formClass');
        $form =/*(sfForm)*/ new $formClass();

        foreach($form as $widget) {
            $result = array_merge($result, $widget->getWidget()->getJavaScripts());
        }
        return $result;
    }

    public function __construct($options = array(), $attributes = array())
    {
        $this->addRequiredOption('fieldName');
        $this->addRequiredOption('formClass');
        $this->addRequiredOption('contentObjectClass');
        $this->addOption('label.add', sfContext::getInstance()->getI18N()->__('Add an item', null, 'catalyz'));
        $this->addOption('title', 'title');

        parent::__construct($options, $attributes);
    }

    static function asArray($xml)
    {
				$fieldId = 0;
        $xmlDoc = simplexml_load_string($xml1);
        $value = array();
        if ($xmlDoc instanceof SimpleXMLElement) {
            foreach($xmlDoc->item as $item) {
                while(!empty($value[$fieldId])){
                	$fieldId++;
                }
								foreach($item as $subFieldName => $subFieldValue) {
                    $value[$fieldId][$subFieldName] = unserialize((string)$subFieldValue);
                }
            }
        }


        return $value;
    }

    static function asXml(array $value, $formName)
    {
        $xml = "<?xml version='1.0' standalone='yes'?><root></root>";
        $xmlDoc = new SimpleXMLElement($xml);

        foreach($value as $formValues) {
            $node = $xmlDoc->addChild('item');

            $form = new $formName();
            $form->bind($formValues);

            foreach($formValues as $fieldName => $fieldValue) {
                $node->addChild($fieldName, htmlspecialchars(serialize($fieldValue)));
            }
        }

        return $xmlDoc->asXml();
    }

    static function asXml2(array $value)
    {
        $xml = "<?xml version='1.0' standalone='yes'?><root></root>";
        $xmlDoc = new SimpleXMLElement($xml);
        foreach($value as $formValues) {
            $node = $xmlDoc->addChild('item');
            foreach($formValues as $fieldName => $fieldValue) {
                $node->addChild($fieldName, htmlspecialchars(serialize($fieldValue)));
            }
        }
        return $xmlDoc->asXml();
    }

    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $i18n = sfContext::getInstance()->getI18N();
				sfContext::getInstance()->getConfiguration()->loadHelpers('Text');


        $id = $this->generateId($name);
        $fieldName = $this->getOption('fieldName');
        $formClass = $this->getOption('formClass');
        $contentObjectClass = $this->getOption('contentObjectClass');

        if (is_string($value)) {
            $value = self::asArray($value);
        }
        $result = '';
        $result .= sprintf('<a  style="float:right;display:block;margin:5px;" id="collapseAll_%s" name="collapse_%s" href="javascript://">Tout replier</a>', $id, $id);
        $result .= sprintf('<a  style="float:right;display:block;margin:5px;" id="expandedAll_%s" name="expanded_%s" href="javascript://">Tout déplier</a>', $id, $id);

        $result .= sprintf('<div id="fields_%s">', $id);
        $sortable = false;
        $selectedField = $list = false;
        if (is_array($value)) {
            foreach($value as $fieldId => $item) {
            	$form =/*(sfForm)*/ new $formClass();

                $temp = $sortable = true;
                foreach ($form->getWidgetSchema()->getFields() as $key => $field) {

                    if ($field instanceof czWidgetFormTextareaWysiwyg || $field instanceof czWidgetFormTextareaTinyMCE) {
                        $temp = false;
                        if (false != $sortable) {
                            $sortable = $temp;
                        }
                    }
                }


                $form->getWidgetSchema()->setNameFormat('[' . $fieldName . '][' . $fieldId . '][%s]');
                $form->getWidgetSchema()->addOption('form', $form);
                foreach($item as $subFieldName => $subFieldValue) {
                    $form->setDefault($subFieldName, $subFieldValue);
                }

                $caption = $this->getOption('title');
                $fields = $form->getWidgetSchema()->getFields();

                if (null !== $caption && !empty($fields[$caption])) {
                    $selectedField = $caption;
                    $fieldElement =/*(sfFormField)*/ $form[$caption];
                    if ($field instanceof sfWidgetFormChoice) {
                        $list = true;
                        $choices = $fieldElement->getWidget()->getChoices();
                        $val = $fieldElement->getValue();
                        if (!empty($choices[$val])) {
                            $caption = $choices[$val];
                        }
                    }else {
                        $val = $fieldElement->getValue();
                        $caption = $val;
                    }
                }else {
                    $caption = '';
                }
//                var_dump($contentObjectClass);
//                var_dump($fieldName);
//                var_dump($fieldId);
//                var_dump($selectedField);
            	$form->getWidgetSchema()->setNameFormat($contentObjectClass . '[' . $fieldName . '][' . $fieldId . '][%s]');
            	$form->getWidgetSchema()->addOption('form', $form);

                $selectedField = $contentObjectClass . '[' . $fieldName . '][' . $fieldId . '][' . $selectedField . ']';
//                var_dump($selectedField);
                $result .= get_partial('wizard/czWidgetFormSubForm',
                	array('form' => $form, 'form_id' => $id, 'Name' => truncate_text($caption, 65),
                	'selectedField' => $form->getWidgetSchema()->generateId($selectedField), 'list' => $list));
            }
        }
        $result .= '</div>';



    	$url = url_for(sprintf('@catalyz-ajax-add-field?FormType=%s&ContentObjectClass=%s&FieldName=%s&selectedField=%s&formId=%s&selected=%s',
    		$formClass, $contentObjectClass, $fieldName, $selectedField, $id, $this->getOption('title')));


        $result .= sprintf('<p><a href="#" class="add_list_element btn btn-success" onclick="$.get(\'%s\', function(data){$(\'#fields_%s\').append(data);}); return false;"><i class="icon-plus-sign icon-white"></i>&nbsp;%s</a></p><br />',
            $url, $id, $this->getOption('label.add'));
        $result .= sprintf('
    	<script type="text/javascript">



    	$("#collapseAll_%1$s").live(\'click\', function() {
    	  $(".elements_%1$s").hide();
    	  $(".show_%1$s").children().attr(\'class\',"icon-plus-sign");

    	});

    	$("#expandedAll_%1$s").live(\'click\', function() {
    	  $(".elements_%1$s").show();
    	  $(".show_%1$s").children().attr(\'class\',"icon-minus-sign");
    	});

    	</script>', $id);
        if ($sortable) {

        	use_stylesheet('/css/ui-lightness/jquery-ui-1.8.20.custom.css');
        	use_javascript('/js/jquery-ui-1.8.20.custom.min.js');


            $result .= sprintf('
    	<script type="text/javascript">
			$(function() {
				$("#fields_%1$s").sortable({
						revert: true,
						placeholder: \'ui-state-highlight\',
						axis:\'y\',
						forceHelperSize: true,
						forcePlaceholderSize: true,
					});
			});</script>', $id);
        }

        return $result;
    }
}

?>