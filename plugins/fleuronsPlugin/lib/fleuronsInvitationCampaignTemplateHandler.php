<?php 

class fleuronsInvitationCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'fleuronsInvitationForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('fleurons/invitation', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'fleurons/invitation_edit';
	}

	static function getCampaignName(){
		$name = 'Fleurons de Lomagne - Invitation';
		return empty($name)?CampaignTemplateHandler::getCampaignName():$name;
	}
}