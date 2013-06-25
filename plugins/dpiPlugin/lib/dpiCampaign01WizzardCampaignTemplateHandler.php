<?php

class dpiCampaign01WizzardCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'dpiCampaign01WizzardForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('dpi/campaign01Wizzard', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'dpi/campaign01Wizzard_edit';
	}

	static function getCampaignName(){
		$name = 'Newsletter 1 (avec assistant)';
		return empty($name)?CampaignTemplateHandler::getCampaignName():$name;
	}
}