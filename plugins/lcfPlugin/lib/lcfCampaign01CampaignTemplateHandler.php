<?php 

class lcfCampaign01CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'lcfCampaign01Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('lcf/campaign01', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'lcf/campaign01_edit';
	}

	static function getCampaignName(){
		$name = 'La Clôture Française';
		return empty($name)?CampaignTemplateHandler::getCampaignName():$name;
	}
}