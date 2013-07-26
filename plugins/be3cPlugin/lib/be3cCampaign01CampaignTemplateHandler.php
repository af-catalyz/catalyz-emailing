<?php

class be3cCampaign01CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'be3cCampaign01Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('be3c/campaign01', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'be3c/campaign01_edit';
	}

	public function computeTextVersion($parameters){
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('be3c/campaign01_text', array('parameters' => $parameters));
	}

	public function displayTextTab(){
		return TRUE;
	}
}

?>