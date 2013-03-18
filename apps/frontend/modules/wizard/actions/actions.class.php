<?php

/**
 * wizard actions.
 *
 * @package emailing.catalyz.fr
 * @subpackage wizard
 * @author Your name here
 * @version SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class wizardActions extends sfActions {
    public function executePreview($request)
    {
        sfConfig::set('sf_web_debug', false);
        if ($request->getMethod() == sfRequest::POST) {
            $campaignInfos = $request->getParameter('campaign');
            $campaignId = $campaignInfos['id'];
            $campaignContent = $campaignInfos['content'];
        } else {
            $campaignId = $request->getParameter('campaign');;
        }
        $campaign =/*(Campaign)*/ CampaignPeer::retrieveByPK($campaignId);
        $this->forward404Unless($campaign);
        if (empty($campaignContent)) {
            $campaignContent = czWidgetFormWizard::asArray((string)$campaign->getContent());
        }

        $campaignTemplate = $campaign->getCampaignTemplate();
        $this->forward404Unless($campaignTemplate);

        $templateHandlerClassName = $campaignTemplate->getClassName();
        $templateHandler = new $templateHandlerClassName($campaign);

        $result = $templateHandler->compute($campaignContent);
        $result = preg_replace('/href="([^"]*)"/', 'href="javascript:void();" onclick="alert(\'Lien vers &quot;\1&quot;\'); return false;"', $result);

        return $this->renderText($result);
    }

    public function executePreviewText($request)
    {
        sfConfig::set('sf_web_debug', false);
        if ($request->getMethod() == sfRequest::POST) {
            $campaignInfos = $request->getParameter('campaign');
            $campaignId = $campaignInfos['id'];
            $campaignContent = $campaignInfos['content'];
        } else {
            $campaignId = $request->getParameter('campaign');
        }

        $campaign =/*(Campaign)*/ CampaignPeer::retrieveByPK($campaignId);
        $this->forward404Unless($campaign);
        if (empty($campaignContent)) {
            $campaignContent = czWidgetFormWizard::asArray((string)$campaign->getContent());
        }

        $campaignTemplate = $campaign->getCampaignTemplate();
        $this->forward404Unless($campaignTemplate);

        $templateHandlerClassName = $campaignTemplate->getClassName();
        $templateHandler = new $templateHandlerClassName($campaign);

        $this->result = $templateHandler->computeTextVersion($campaignContent);
        // $this->result = preg_replace('/href="([^"]*)"/', 'href="javascript:void();" onclick="alert(\'Lien vers &quot;\1&quot;\'); return false;"', $result);
        $this->setLayout('layoutTextPlain');
        return sfView::SUCCESS ;
    }

    public function executeAjaxAddForm(sfWebRequest $request)
    {
        $fieldId = md5(time());

        $formId = $request->getParameter('formId');

        $formName = $request->getParameter('FormType');
        $fieldName = $request->getParameter('FieldName');
        $ContentObjectClass = $request->getParameter('ContentObjectClass');
        $selected = $request->getParameter('selected');

        $form =/*(sfForm)*/ new $formName(array(), array('delay' => true));
        $form->getWidgetSchema()->setNameFormat($ContentObjectClass . "[$fieldId][%s]");
        $form->getWidgetSchema()->addOption('form', $form);
        $form->getWidgetSchema()->addOption('delay', true);

        $this->renderPartial('wizard/czWidgetFormSubForm', array('ajax' => true, 'form' => $form, 'Name' => '', 'form_id' => $formId,
                'selectedField' => $form->getWidgetSchema()->generateId($ContentObjectClass . '[' . $fieldName . '][' . $fieldId . '][' . $selected . ']')));

        $this->setLayout(false);
        return sfView::NONE;
    }

    public function executeCreateThumbnailPath(sfWebRequest $request)
    {
        sfContext::getInstance()->getConfiguration()->loadHelpers(array('Tag', 'Asset', 'cz'));
        $path = thumbnail_path($request->getParameter('url'), $request->getParameter('width'), $request->getParameter('height'));
        die($path);
    }

    public function executeAjaxAddLinkForm(sfWebRequest $request)
    {
        $random = $request->getParameter('random');
        $value = $request->getParameter('value');
        $defaultRadio = 0;
        $fieldName = $request->getParameter('FieldName');
        $fieldId = $fieldName;
        $fieldId = str_replace(array('[]', '][', '[', ']'), array((null !== $fieldName ? '_' . $fieldName : ''), '_', '_', ''), $fieldId);
        $fieldId = preg_replace(array('/^[^A-Za-z]+/', '/[^A-Za-z0-9\:_\.\-]/'), array('', '_'), $fieldId);

        $form = new sfForm();

        $form->setWidget($random . '_file_link', new sfWidgetFormInput(array(), array(
                    'id' => $random . '_file_link',
                    'onclick' => 'document.getElementById(\'' . $random . '_LinkType2\').checked = true;', 'style' => 'width: 500px;')));
        $form->setValidator($random . '_file_link', new sfValidatorPass());

        $form->setWidget($random . '_website_link', new sfWidgetFormInput(array(), array(
                    'id' => $random . '_website_link',
                    'onclick' => 'document.getElementById(\'' . $random . '_LinkType3\').checked = true;', 'style' => 'width: 500px;'))
            );
        $form->setValidator($random . '_website_link', new sfValidatorPass());

        $choices = array();
        if (LandingPageUtils::isModuleAvailable()) {
            $choices = LandingPeer::getAllOptions();
            if (count($choices) > 0) {
                $form->setWidget($random . '_landing_link', new sfWidgetFormChoice(array('choices' => $choices), array(
                            'id' => $random . '_landing_link',
                            'onclick' => 'document.getElementById(\'' . $random . '_LinkType_landing\').checked = true;', 'style' => 'width: 400px;')));
                $form->setValidator($random . '_landing_link', new sfValidatorChoice(array('choices' => array_keys($choices))));

                $form->setWidget($random . '_landing_link_anchor', new sfWidgetFormInput(array(), array(
                            'id' => $random . '_landing_link_anchor',
                            'onclick' => 'document.getElementById(\'' . $random . '_LinkType_landing\').checked = true;')));
                $form->setValidator($random . '_landing_link_anchor', new sfValidatorPass());
            }
        }

        if ($value) {
            if (substr($value, 0, 15) == '/uploads/assets') {
                $form->setDefault($random . '_file_link', $value);
                $defaultRadio = 2;
            } else {
                $found = false;
                foreach($choices as $url => $name) {
                    if (strpos($value, $url) === 0) {
                        $anchor = substr($value, strlen($url) + 1);
                        $form->setDefault($random . '_landing_link', $value);
                        $form->setDefault($random . '_landing_link_anchor', $anchor);
                        $defaultRadio = 1;
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $form->setDefault($random . '_website_link', $value);
                    $defaultRadio = 3;
                }
            }
        }

        $this->renderPartial('wizard/ajaxAddLinkForm', array('form' => $form, 'fieldName' => $fieldName, 'fieldId' => $fieldId, 'random' => $random, 'defaultRadio' => $defaultRadio));
        $this->setLayout(false);
        return sfView::NONE;
    }
}