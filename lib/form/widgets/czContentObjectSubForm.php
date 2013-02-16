<?php

class czContentObjectSubForm extends czForm {
    public function isRequired($fieldName)
    {
        return $this->validatorSchema[$fieldName]->getOption('required');
    }
}

?>