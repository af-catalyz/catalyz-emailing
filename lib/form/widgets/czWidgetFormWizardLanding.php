<?php
class czWidgetFormWizardLanding extends sfWidgetForm {
    public function __construct($options = array(), $attributes = array())
    {
        $this->addRequiredOption('formClass');
        $this->addRequiredOption('landing');
        parent::__construct($options, $attributes);
    }

    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $formName = $this->getOption('formClass');
        $form =/*(sfForm)*/ new $formName;

        $form->setDefaults(czWidgetFormWizard::asArray((string)$this->getOption('landing')->getContent()));

    	return get_partial('wizard/editLanding', array('form' => $form, 'landing' => $this->getOption('landing')));
    }

}

?>