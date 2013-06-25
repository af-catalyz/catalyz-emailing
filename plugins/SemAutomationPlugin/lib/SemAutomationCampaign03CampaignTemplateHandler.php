<?php

class SemAutomationCampaign03CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'semAutomationCampaign03Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial'); 
		return get_partial('SemAutomation/campaign03', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'SemAutomation/campaign03_edit';
	}
}

?>