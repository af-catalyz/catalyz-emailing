<?php 

class dpiCampaign03WizzardCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'dpiCampaign03WizzardForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('dpi/campaign03Wizzard', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'dpi/campaign03Wizzard_edit';
	}

	static function getCampaignName(){
		$name = '#SUBJECT#';
		return empty($name)?CampaignTemplateHandler::getCampaignName():$name;
	}
}