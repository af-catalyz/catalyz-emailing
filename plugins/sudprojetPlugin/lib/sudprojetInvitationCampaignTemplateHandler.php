<?php

class sudprojetInvitationCampaignTemplateHandler extends CampaignTemplateHandler {
    public function createEditWidget()
    {
        $formClass = 'sudprojetInvitationForm';
        $result['widget'] = new czWidgetFormWizard(array('formClass' => $formClass, 'campaign' => $this->campaign));
        $result['validator'] = new czValidatorWizard(array('formClass' => $formClass));
        $result['default'] = (string)$this->campaign->getContent();
        return $result;
    }

    public function compute($parameters)
    {
        sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
        return get_partial('sudprojet/invitation', array('parameters' => $parameters));
    }

    public function getEditPartialName()
    {
        return 'sudprojet/invitation_edit';
    }

//    public function computeTextVersion($parameters)
//    {
//        sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
//        return get_partial('sudprojet/invitation_text', array('parameters' => $parameters));
//    }
//
//    public function displayTextTab()
//    {
//        return true;
//    }
}