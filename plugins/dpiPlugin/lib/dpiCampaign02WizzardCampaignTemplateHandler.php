<?php

class dpiCampaign02WizzardCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'dpiCampaign02WizzardForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('dpi/campaign02Wizzard', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'dpi/campaign02Wizzard_edit';
	}

	static function getCampaignName(){
		$name = 'Newsletter 2 (avec assistant)';
		return empty($name)?CampaignTemplateHandler::getCampaignName():$name;
	}
}