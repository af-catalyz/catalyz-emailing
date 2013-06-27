<?php

class AsfoCalendrierCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'asfoCalendrierForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('asfo/asfoCalendrier', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'asfo/asfoCalendrier_edit';
	}
}

?>