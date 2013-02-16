<?php

class czForm extends sfForm {

	function configure(){
		 parent::configure();

		$this->widgetSchema->setNameFormat($this->getFormType().'[content][%s]');
	}

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
    protected function addTextField($fieldName, $label, $options = array())
    {
        $options['label'] = $label;
		$this->widgetSchema[$fieldName] = new sfWidgetFormInputText(array(), $options);
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

    protected function addWysiwygField($fieldName, $label, $options = array(), $attributes = array())
    {
        $attributes['label'] = $label;
        $this->widgetSchema[$fieldName] = new czWidgetFormTextareaTinyMCE($options, $attributes);
        $this->validatorSchema[$fieldName] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp($fieldName, '');
    	$this->getWidgetSchema()->setLabel($fieldName, $label);
    }

	protected function getFormType(){
		return 'campaign';
	}

    protected function addSubformField($fieldName, $label, $subFormClass, $itemTitleFieldName = 'title', $options = array())
    {
        $this->widgetSchema[$fieldName] = new czWidgetFormSubForm(array(
                'fieldName' => $fieldName,
                'formClass' => $subFormClass,
                'contentObjectClass' => sprintf('%s[content]', $this->getFormType()),
                'title' => $itemTitleFieldName,
                'label.add' => $label,
                ), array('label' => false)

            );
        $this->validatorSchema[$fieldName] = new czValidatorSubForm(array('formClass' => $subFormClass));
        $this->defaults[$fieldName] = '';
        $this->getWidgetSchema()->setHelp($fieldName, '');
    }

	public function addNotificationFields($prefix)
	{
		$this->addTextField($prefix.'_from', 'Expéditeur', array('style' => 'width: 700px'));
		$this->addTextField($prefix.'_to', 'Destinataire', array('style' => 'width: 700px'));
		$this->addTextField($prefix.'_subject', 'Objet du message', array('style' => 'width: 700px'));
		$this->addTextareaField($prefix.'_feedback', 'Message de confirmation pour le visiteur', array('style' => 'width: 700px'));
	}
}

?>