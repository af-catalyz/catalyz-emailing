<?php

class fleuronsCampaignOpeSpecialWizzardCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'fleuronsCampaignOpeSpecialWizzardForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('fleurons/campaignOpeSpecialWizzard', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'fleurons/campaignOpeSpecialWizzard_edit';
	}

	static function getCampaignName(){
		$name = 'OpeSpecial';
		return empty($name)?CampaignTemplateHandler::getCampaignName():$name;
	}
}