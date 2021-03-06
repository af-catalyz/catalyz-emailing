<?php

class czValidatorSubForm extends sfValidatorBase {
    public function __construct($options = array(), $messages = array())
    {
        $this->addRequiredOption('formClass');
        if (empty($options['required'])) {
            $options['required'] = false;
        }
        parent::__construct($options, $messages);
    }

    protected function doClean($value)
    {
    	return czWidgetFormSubForm::asXml($value, $this->getOption('formClass'));
    }
}

?>