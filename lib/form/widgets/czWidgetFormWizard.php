<?php
class czWidgetFormWizard extends sfWidgetForm {
    public function __construct($options = array(), $attributes = array())
    {
        $this->addRequiredOption('formClass');
        $this->addRequiredOption('campaign');
        // $this->addRequiredOption('contentObjectClass');
        // $this->addOption('label.add', sfContext::getInstance()->getI18N()->__('Add an item', null, 'catalyz'));
        // $this->addOption('title', 'title');
        parent::__construct($options, $attributes);
    }

    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $formName = $this->getOption('formClass');
        $form =/*(sfForm)*/ new $formName;

//    	foreach( $form->getWidgetSchema()->getFields() as $name => $widget){
//    		$widget->setAttribute('onchange', $widget->getAttribute('onchange'). ' ; refreshCampaignPreview(this.form);');
//    	}

        $form->setDefaults(self::asArray((string)$this->getOption('campaign')->getContent()));

        return get_partial('wizard/edit', array('form' => $form, 'campaign' => $this->getOption('campaign')));
    }

    static function asArray($xml)
    {
        $fieldId = 0;
        $xmlDoc = simplexml_load_string($xml);
        $value = array();

        if ($xmlDoc instanceof SimpleXMLElement) {
            foreach($xmlDoc->item as $item) {
                foreach($item as $subFieldName => $subFieldValue) {
                    $value[$subFieldName] = unserialize((string)$subFieldValue);
                }
                $fieldId++;
            }
        }
        return $value;
    }

    static function asXml(array $value/*, $formName*/)
    {
        $xml = "<?xml version='1.0' standalone='yes'?><root></root>";
        $xmlDoc = new SimpleXMLElement($xml);

        $node = $xmlDoc->addChild('item');

//        $form = new $formName();

        foreach($value as $fieldName => $fieldValue) {
            $node->addChild($fieldName, htmlspecialchars(serialize($fieldValue)));
        }

        return $xmlDoc->asXml();
    }
}

?>