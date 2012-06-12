<?php
class kreactivNewsletter20110511Form extends sfForm {
    public function configure()
    {
        parent::configure();

        //region title
        $this->widgetSchema['title'] = new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px'));
        $this->validatorSchema['title'] = new sfValidatorString(array('required' => false));
        $this->defaults['title'] = 'NEWSLETTER 10 MAI 2011';
        $this->getWidgetSchema()->setHelp('title', '');
        //endregion

    	//region main_content
    	$this->widgetSchema['main_content'] = new czWidgetFormSubForm(array(
    	        'fieldName' => 'main_content',
    	        'formClass' => 'kreactivNewsletter20110511Form_main',
    	        'contentObjectClass' => 'campaign[content]',
    	        'title' => 'section',
    	        'label.add' => 'Ajouter un article',
    	        ), array('label' => false)

    	);
    	$this->validatorSchema['main_content'] = new czValidatorSubForm(array('formClass' => 'kreactivNewsletter20110511Form_main'));
    	$this->defaults['main_content'] = '';
    	$this->getWidgetSchema()->setHelp('main_content', '');
    	//endregion

    	//region case_study
    	$this->widgetSchema['case_study'] = new czWidgetFormSubForm(array(
    	        'fieldName' => 'case_study',
    	        'formClass' => 'kreactivNewsletter20110511Form_casestudy',
    	        'contentObjectClass' => 'campaign[content]',
    	        'title' => 'title',
    	        'label.add' => 'Ajouter une réalisation',
    	        ), array('label' => false)

    	);
    	$this->validatorSchema['main_content'] = new czValidatorSubForm(array('formClass' => 'kreactivNewsletter20110511Form_casestudy'));
    	$this->defaults['main_content'] = '';
    	$this->getWidgetSchema()->setHelp('main_content', '');
    	//endregion

        $this->widgetSchema->setNameFormat('campaign[content][%s]');

//    	$this->widgetSchema->addFormFormatter('catalyz', new sfWidgetFormSchemaFormatterContentObject($this->widgetSchema));
//    	$this->widgetSchema->setFormFormatterName('catalyz');

    }
}