<?php

class czForm extends sfForm {
    function configure()
    {
        parent::configure();

        $this->widgetSchema->setNameFormat($this->getFormType() . '[content][%s]');
    }

    protected function addUrlField($fieldName, $label)
    {
        $this->widgetSchema[$fieldName] = new czWidgetFormLink(array(), array('label' => $label, 'style' => 'width: 700px'));
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
        $options['style'] = 'width: 700px';
        $this->widgetSchema[$fieldName] = new sfWidgetFormInputText(array(), $options);
        $this->validatorSchema[$fieldName] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp($fieldName, '');
        $this->getWidgetSchema()->setLabel($fieldName, $label);
    }
    protected function addPictureField($fieldName, $label, $pictureWidth, $pictureHeight)
    {
        $options['label'] = $label;
        $options['style'] = 'width: 700px';

        $this->widgetSchema[$fieldName] = new czWidgetFormImage(array('picture.width' => $pictureWidth, 'picture.height' => $pictureHeight), $options);
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

    protected function getFormType()
    {
        return 'campaign';
    }

    protected function addSubformField($fieldName, $label, $subFormClass, $itemTitleFieldName = 'title', $options = array())
    {
        $_options = array(
            'fieldName' => $fieldName,
            'formClass' => $subFormClass,
            'contentObjectClass' => sprintf('%s[content]', $this->getFormType()),
            'title' => $itemTitleFieldName
            );

    		if ($label != null) {
    			$_options['label.add'] = $label;
    		}

        $this->widgetSchema[$fieldName] = new czWidgetFormSubForm($_options, array('label' => false));
        $this->validatorSchema[$fieldName] = new czValidatorSubForm(array('formClass' => $subFormClass));
        $this->defaults[$fieldName] = '';
        $this->getWidgetSchema()->setHelp($fieldName, '');

    	if(isset($options['label'])){
    		 $this->getWidgetSchema()->setLabel($fieldName, $options['label']);
    	}
    }

    public function addNotificationFields($prefix)
    {
        $this->addTextField($prefix . '_from', 'Email de l\'expéditeur', array('style' => 'width: 700px'));
        $this->addTextField($prefix . '_to', 'Email du destinataire', array('style' => 'width: 700px'));
        $this->addTextField($prefix . '_subject', 'Objet du message', array('style' => 'width: 700px'));
        $this->addTextareaField($prefix . '_feedback', 'Message de confirmation pour le visiteur', array('style' => 'width: 700px'));

        $this->addCheckboxField($prefix . '_visitor_notification_enabled', 'Envoyer une notification au visiteur');
        $this->addTextField($prefix . '_visitor_notification_from_name', 'Nom de l\'expéditeur', array('style' => 'width: 700px'));
        $this->addTextField($prefix . '_visitor_notification_from_email', 'Email de l\'expéditeur', array('style' => 'width: 700px'));
        $this->addTextField($prefix . '_visitor_notification_subject', 'Objet', array('style' => 'width: 700px'));
        $this->addWysiwygField($prefix . '_visitor_notification_message', 'Contenu', array('height' => 400), array('style' => 'width: 700px'));
    }

    protected function addCheckboxField($fieldName, $label, $options = array())
    {
        $options['label'] = $label;
        $this->widgetSchema[$fieldName] = new sfWidgetFormInputCheckbox(array(), $options);
        $this->validatorSchema[$fieldName] = new sfValidatorBoolean(array('required' => false));
        $this->getWidgetSchema()->setHelp($fieldName, '');
        $this->getWidgetSchema()->setLabel($fieldName, $label);
    }
}

?>