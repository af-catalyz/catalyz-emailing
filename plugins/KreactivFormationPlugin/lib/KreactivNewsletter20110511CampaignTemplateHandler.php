<?php

class KreactivNewsletter20110511CampaignTemplateHandler extends CampaignTemplateHandler {
    public function createEditWidget()
    {
        $formClass = 'kreactivNewsletter20110511Form';
        $result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
        $result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
        $result['default'] = (string)$this->campaign->getContent();
        return $result;
    }

    public function compute($parameters)
    {
    	sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
        return get_partial('KreactivFormation/newsletter20110511', array('parameters' => $parameters));
    }

	public function getEditPartialName(){
		return 'KreactivFormation/newsletter20110511_edit';
	}

	public function computeTextVersion($parameters){
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		return get_partial('KreactivFormation/newsletter20110511_text', array('parameters' => $parameters));
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