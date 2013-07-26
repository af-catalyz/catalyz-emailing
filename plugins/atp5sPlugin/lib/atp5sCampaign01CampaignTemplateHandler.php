<?php

class atp5sCampaign01CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'atp5sCampaign01Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('atp5s/campaign01', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'atp5s/campaign01_edit';
	}

	public function computeTextVersion($parameters){
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('atp5s/campaign01_text', array('parameters' => $parameters));
	}

	public function displayTextTab(){
		return TRUE;
	}

	public function getPreviewHeight()
	{
		return 860;
	}
}

?>