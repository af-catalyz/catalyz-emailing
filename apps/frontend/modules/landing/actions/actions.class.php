<?php

/**
 * landing actions.
 *
 * @package catalyz_emailing
 * @subpackage landing
 * @author Your name here
 * @version SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class landingActions extends sfActions {
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $criteria = new Criteria();
        $criteria->addAscendingOrderByColumn(LandingPeer::NAME);
        $this->landingPages = LandingPeer::doSelect($criteria);

        $this->landingTemplates = LandingPageUtils::getTemplates();

        return sfView::SUCCESS;
    }

    public function executeAdd(sfWebRequest $request)
    {
        $landing = new Landing();
        $landing->setTemplateClass($request->getParameter('template'));
        $this->form = new LandingForm($landing);
        return sfView::SUCCESS;
    }

    public function executeEdit($request)
    {
        $this->forward404Unless($landing = LandingPeer::retrieveByPk($request->getParameter('id')));

        $this->form = new LandingForm($landing);

        $title = sprintf('%s - Page d\'atterrissage / Modification %s', $landing->getName(), sfConfig::get('app_settings_default_suffix'));
        $this->getResponse()->setTitle($title);
    }
    public function executeUpdate($request)
    {
        $this->forward404Unless($request->isMethod('post'));

        $this->form = new LandingForm($landing = LandingPeer::retrieveByPk($request->getParameter('id')));
        $this->form->bind($request->getParameter('landing'));
        if ($this->form->isValid()) {
            $landing =/*(Landing)*/ $this->form->getObject();

            $landing = $this->form->save();

            if ($request->hasParameter('id')) {
                $message = sprintf('<h4 class="alert-heading">Page d\'atterrissage modifiée</h4><p>La page d\'atterrissage "%s" a été modifiée.</p>', $landing->getName());
            } else {
                $message = sprintf('<h4 class="alert-heading">Page d\'atterrissage créée</h4><p>La page d\'atterrissage "%s" a été créée.</p>', $landing->getName());
            }

            $this->getUser()->setFlash('notice_success', $message);

            $this->redirect('@landing');
            return false;
        }

        if (isset($landing)) {
            $title = sprintf('%s - Page d\'atterrissage / Modification %s', $landing->getName(), sfConfig::get('app_settings_default_suffix'));
        } else {
            $title = sprintf('Page d\'atterrissage / Ajout %s', sfConfig::get('app_settings_default_suffix'));
        }

        $this->getResponse()->setTitle($title);

        $this->setTemplate('edit');
    }

    public function executeDelete($request)
    {
        $this->forward404Unless($landing = LandingPeer::retrieveByPk($request->getParameter('id')));
        $message = sprintf('<h4 class="alert-heading">Page d\'atterrissage supprimée</h4><p>La page d\'atterrissage "%s" a été supprimée.</p>', $landing->getName());
        $this->getUser()->setFlash('notice_success', $message);
        $landing->delete();

        $this->redirect('@landing');
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->forward404Unless($landing = LandingPeer::retrieveBySlug($request->getParameter('slug')));

        $parameters = czWidgetFormWizard::asArray((string)$landing->getContent());
        return $this->renderPartial(sprintf('landing/%s', $landing->getTemplateClass()), array('parameters' => $parameters, 'landing' => $landing));
    }

    public function executeAction(sfWebRequest $request)
    {
    	sfConfig::set('sf_web_debug', false);
    	$this->forward404Unless($landing = /*(Landing)*/LandingPeer::retrieveBySlug($request->getParameter('slug')));
        $this->forward404Unless($actionType = $request->getParameter('type'));
        $this->forward404Unless($landing->hasAction($actionType));

        $datas = $request->getParameter('datas', array());

        list($email, $campaignId) = Campaign::extractKeyInformation($request->getParameter('key'));

        $CampaignContact = Campaign::LogView($campaignId, $email, $request->getHttpHeader('User-Agent'));
    	//var_dump($CampaignContact);
        if ($CampaignContact) {
            $CampaignContact->addLandingAction($landing->getTemplateClass(), $actionType, $datas);
            $CampaignContact->save();

            $properties = $landing->getActionParameters($actionType);
            return $this->renderText($properties['feedback']);
        }
        return $this->renderText('');
    }
}