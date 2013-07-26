<?php

class AsfoVoeux2012CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'asfoVoeux2012Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('asfo/asfoVoeux2012', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'asfo/asfoVoeux2012_edit';
	}
}

?>