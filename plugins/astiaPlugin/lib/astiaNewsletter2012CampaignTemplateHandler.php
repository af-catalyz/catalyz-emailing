<?php

class astiaNewsletter2012CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'astiaNewsletter2012Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
	sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('astia/newsletter2012', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'astia/newsletter2012_edit';
	}

	public function computeTextVersion($parameters){
	sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('astia/newsletter2012_text', array('parameters' => $parameters));
	}

	public function displayTextTab(){
		return TRUE;
	}

	public function getPreviewHeight()
	{
		return 1000;
	}
}

?>