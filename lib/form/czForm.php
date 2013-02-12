<?php

class czForm extends sfForm {
    protected function addUrlField($fieldName, $label)
    {
        $this->widgetSchema[$fieldName] = new czWidgetFormLink(array(), array('label' => $label, 'style' => 'width: 400px'));
        $this->validatorSchema[$fieldName] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp($fieldName, '');
    	$this->getWidgetSchema()->setLabel($fieldName, $label);
    }

    protected function addTextareaField($fieldName, $label, $options = array())
    {
    	$options['label'] = $label;
        $this->widgetSchema[$fieldName] = new sfWidgetFormTextarea(array(), $options);
        $this->validatorSchema[$fieldName] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp($fieldName, '');
        $this->getWidgetSchema()->setLabel($fieldName, $label);

    }
    protected function addTextField($fieldName, $label)
    {
        $this->widgetSchema[$fieldName] = new sfWidgetFormInputText(array(), array('label' => $label));
        $this->validatorSchema[$fieldName] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp($fieldName, '');
    	$this->getWidgetSchema()->setLabel($fieldName, $label);
    }
    protected function addPictureField($fieldName, $label, $pictureWidth, $pictureHeight)
    {
        $this->widgetSchema[$fieldName] = new czWidgetFormImage(array('picture.width' => $pictureWidth, 'picture.height' => $pictureHeight), array('label' => $label, 'style' => 'width: 400px'));
        $this->validatorSchema[$fieldName] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp($fieldName, '');
    	$this->getWidgetSchema()->setLabel($fieldName, $label);
    }

    protected function addWysiwygField($fieldName, $label, $options = array())
    {
        $options['label'] = $label;
        $this->widgetSchema[$fieldName] = new czWidgetFormTextareaTinyMCE(array(), $options);
        $this->validatorSchema[$fieldName] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp($fieldName, '');
    	$this->getWidgetSchema()->setLabel($fieldName, $label);
    }

    protected function addSubformField($fieldName, $label, $subFormClass, $itemTitleFieldName = 'title', $options = array())
    {
        $this->widgetSchema[$fieldName] = new czWidgetFormSubForm(array(
                'fieldName' => $fieldName,
                'formClass' => $subFormClass,
                'contentObjectClass' => 'campaign[content]',
                'title' => $itemTitleFieldName,
                'label.add' => $label,
                ), array('label' => false)

            );
        $this->validatorSchema[$fieldName] = new czValidatorSubForm(array('formClass' => $subFormClass));
        $this->defaults[$fieldName] = '';
        $this->getWidgetSchema()->setHelp($fieldName, '');
    }
}

?>