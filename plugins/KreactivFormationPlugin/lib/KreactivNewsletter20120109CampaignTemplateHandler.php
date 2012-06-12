<?php

class KreactivNewsletter20120109CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'kreactivNewsletter20120109Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('KreactivFormation/newsletter20120109', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'KreactivFormation/newsletter20120109_edit';
	}

	public function computeTextVersion($parameters){
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('KreactivFormation/newsletter20120109_text', array('parameters' => $parameters));
	}

	public function displayTextTab(){
		return TRUE;
	}
}

?>