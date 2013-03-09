<?php 

class smti82ExterneCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'smti82ExterneForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('smti82/externe', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'smti82/externe_edit';
	}

	static function getCampaignName(){
		$name = 'SMTI82 Externe';
		return empty($name)?CampaignTemplateHandler::getCampaignName():$name;
	}
}