<?php

class OtNewsletter2012CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'OtNewsletter2012Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('OfficeTourismeMontauban/newsletter2012', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'OfficeTourismeMontauban/newsletter2012_edit';
	}
}

?>