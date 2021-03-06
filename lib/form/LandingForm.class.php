<?php

/**
 * Landing form.
 *
 * @package catalyz_emailing
 * @subpackage form
 * @author Your name here
 */
class LandingForm extends BaseLandingForm {
    public function configure()
    {
//        unset($this['template_class']);
        unset($this['created_at']);
        unset($this['created_by']);
        unset($this['updated_at']);
        //unset($this['url']);

    	$this->setWidget('template_class', new sfWidgetFormInputHidden());

    	$formClass = $this->getObject()->getTemplateClassName();

    	$this->setWidget('name', new sfWidgetFormInputText(array(), array('style' => 'width: 700px')));
    	$this->setWidget('slug', new sfWidgetFormInputText(array(), array('style' => 'width: 700px')));

		$this->setWidget('content', new czWidgetFormWizardLanding(array('formClass' => $formClass, 'landing' => $this->getObject())));
		$this->setValidator('content', new czValidatorWizard(array('formClass' => $formClass)));
		$this->setDefault('content', $this->getObject()->getContent());

        $this->getWidgetSchema()->setLabels(array(
                'name' => 'Nom',
                'slug' => 'Adresse de la page',
                'content' => false
                ));
    }

	protected function doUpdateObject($values)
	{
		parent::doUpdateObject($values);
		$object = $this->getObject();
		if(!$object->getSlug()){
			$object->setSlug(CatalyzEmailing::slug($object->getName()));
		}
	}
}