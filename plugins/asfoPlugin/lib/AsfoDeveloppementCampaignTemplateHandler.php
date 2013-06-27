<?php

class AsfoDeveloppementCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'asfoDeveloppementForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('asfo/asfoDeveloppement', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'asfo/asfoDeveloppement_edit';
	}
}

?>