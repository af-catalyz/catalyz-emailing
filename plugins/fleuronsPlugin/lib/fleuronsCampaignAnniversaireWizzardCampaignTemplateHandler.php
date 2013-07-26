<?php 

class fleuronsCampaignAnniversaireWizzardCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'fleuronsCampaignAnniversaireWizzardForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('fleurons/campaignAnniversaireWizzard', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'fleurons/campaignAnniversaireWizzard_edit';
	}

	static function getCampaignName(){
		$name = '#SUBJECT#';
		return empty($name)?CampaignTemplateHandler::getCampaignName():$name;
	}
}