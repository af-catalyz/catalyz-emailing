<?php

class fleuronsCampaignPromoWizzardCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'fleuronsCampaignPromoWizzardForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('fleurons/campaignPromoWizzard', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'fleurons/campaignPromoWizzard_edit';
	}

	static function getCampaignName(){
		$name = 'Promo';
		return empty($name)?CampaignTemplateHandler::getCampaignName():$name;
	}
}