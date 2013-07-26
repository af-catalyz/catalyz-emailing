<?php

class VigourouxCampaign02CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'vigourouxCampaign02Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('vigouroux/campaign02', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'vigouroux/campaign02_edit';
	}
}

?>