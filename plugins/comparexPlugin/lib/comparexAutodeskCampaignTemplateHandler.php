<?php 

class comparexAutodeskCampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = 'comparexAutodeskForm';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('comparex/autodesk', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return 'comparex/autodesk_edit';
	}

	static function getCampaignName(){
		$name = '#SUBJECT#';
		return empty($name)?CampaignTemplateHandler::getCampaignName():$name;
	}
}