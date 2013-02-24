<?php

class sudprojetCampaign01CampaignTemplateHandler extends CampaignTemplateHandler {
    public function createEditWidget()
    {
        $formClass = 'sudprojetCampaign01Form';
        $result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
        $result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
        $result['default'] = (string)$this->campaign->getContent();
        return $result;
    }

    public function compute($parameters)
    {
        sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
        return get_partial('sudprojet/campaign01', array('parameters' => $parameters));
    }

    public function getEditPartialName()
    {
        return 'sudprojet/campaign01_edit';
    }

    public function computeTextVersion($parameters)
    {
        sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
        return get_partial('sudprojet/campaign01_text', array('parameters' => $parameters));
    }

    public function displayTextTab()
    {
        return true;
    }
}

?>