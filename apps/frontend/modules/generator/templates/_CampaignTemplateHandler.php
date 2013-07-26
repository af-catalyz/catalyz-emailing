class <?php echo $ProjectName; ?><?php echo $TemplateName; ?>CampaignTemplateHandler extends CampaignTemplateHandler {
	public function createEditWidget()
	{
		$formClass = '<?php echo $ProjectName; ?><?php echo $TemplateName; ?>Form';
		$result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
		$result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
		$result['default'] = (string)$this->campaign->getContent();
		return $result;
	}

	public function compute($parameters)
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('<?php echo $ProjectName; ?>/<?php echo lcfirst($TemplateName); ?>', array('parameters' => $parameters));
	}

	public function getEditPartialName(){
		return '<?php echo $ProjectName; ?>/<?php echo lcfirst($TemplateName); ?>_edit';
	}

	static function getCampaignName(){
		$name = '<?php echo $title; ?>';
		return empty($name)?CampaignTemplateHandler::getCampaignName():$name;
	}
}