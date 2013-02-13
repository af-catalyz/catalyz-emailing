<?php

class cciFormationInvitationCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'cciFormationInvitationForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('cciFormation/invitation', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'cciFormation/invitation_edit';
	}

	public function computeTextVersion($parameters){
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('cciFormation/invitation_text', array('parameters' => $parameters));
	}

	public function displayTextTab(){
		return TRUE;
	}
}

?>