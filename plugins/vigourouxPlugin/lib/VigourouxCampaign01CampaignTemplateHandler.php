<?php

class VigourouxCampaign01CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'vigourouxCampaign01Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('vigouroux/campaign01', array('parameters' => $parameters));
	}

	public function computeTextVersion($parameters){
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('vigouroux/campaign01_text', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'vigouroux/campaign01_edit';
	}

	public function displayTextTab(){
		return TRUE;
	}
}

?>