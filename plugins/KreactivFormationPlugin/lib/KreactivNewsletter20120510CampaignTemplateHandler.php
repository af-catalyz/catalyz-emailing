<?php

class KreactivNewsletter20120510CampaignTemplateHandler extends KreactivNewsletter20111020CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'kreactivNewsletter20111020Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('KreactivFormation/newsletter20120510', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'KreactivFormation/newsletter20111020_edit';
	}
}

?>