<?php

class OtNewsletter2012CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'OtNewsletter2012Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfLoader::loadHelpers('Partial');
		return get_partial('OfficeTourismeMontaubanPlugin/newsletter2012', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'OfficeTourismeMontaubanPlugin/newsletter2012_edit';
	}
}

?>