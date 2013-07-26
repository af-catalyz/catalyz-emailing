<?php

class AsfoCalendrier2CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'asfoCalendrier2Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('asfo/asfoCalendrier2', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'asfo/asfoCalendrier2_edit';
	}
}

?>