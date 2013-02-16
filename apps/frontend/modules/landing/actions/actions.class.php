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

    public function executeDuplicate($request)
    {
        $this->forward404Unless($landing = LandingPeer::retrieveByPk($request->getParameter('id')));

        $new_landing = new Landing();
        $options = $landing->toArray();
        unset($options['Id']);
        unset($options['Slug']);
        unset($options['CreatedAt']);
        unset($options['CreatedBy']);
        unset($options['UpdatedAt']);
        $options['Name'] = sprintf('Copie de %s', $options['Name']);
        $options['Slug'] = CatalyzEmailing::slug($options['Name']);

        $new_landing->fromArray($options);
        $new_landing->save();

        $message = sprintf('<h4 class="alert-heading">Page d\'atterrissage copiée</h4><p>La page d\'atterrissage "%s" a été dupliquée.</p>', $landing->getName());
        $this->getUser()->setFlash('notice_success', $message);

        $this->redirect('@landing_edit?id=' . $new_landing->getId());
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
        $this->forward404Unless($landing =/*(Landing)*/ LandingPeer::retrieveBySlug($request->getParameter('slug')));
        $this->forward404Unless($actionType = $request->getParameter('type'));
        $this->forward404Unless($landing->hasAction($actionType));

        $datas = $request->getParameter('datas', array());

        $userKey = $request->getParameter('key');
        if ($userKey) {
            try {
                list($email, $campaignId) = Campaign::extractKeyInformation($userKey);

                $CampaignContact = Campaign::LogView($campaignId, $email, $request->getHttpHeader('User-Agent'));
                // var_dump($CampaignContact);
                if ($CampaignContact) {
                    $CampaignContact->addLandingAction($landing->getTemplateClass(), $actionType, $datas);
                    $CampaignContact->save();
                }
            }
            catch(Exception $e) {
                // no campaign
            }
        }

        $properties = $landing->getActionParameters($actionType);

        $this->sendWebmasterNotification($properties, $datas, $landing, $actionType);
        $this->sendVisitorNotification($landing->getUserFormProperties($actionType), $datas, $landing, $actionType);

        return $this->renderText($properties['feedback']);
    }

    public function sendWebmasterNotification($properties, $datas, $landing, $actionType)
    {
        $messageObject =/*(Swift_Message)*/ Swift_Message::newInstance();
        $messageObject->setCharset('utf-8');
        $messageObject->setFrom($properties['from']);
        $messageObject->setTo($properties['to']);

        if (sfConfig::get('app_mail_bcc', false)) {
            $messageObject->addBcc(sfConfig::get('app_mail_bcc', false));
        }

        $messageObject->setSubject($properties['subject']);

    		$class = sprintf('%sLandingForm', $landing->getTemplateClass());
    	$result = array();
    	foreach($datas as $key => $value){
    		$result[$class::translateActionFormFieldName($actionType, $key)] = $value;
    	}

		$content = $this->getPartial('landing/notification', array('datas' => $result, 'type' => $class::translateActionFormName($actionType)));
		$content = $this->getPartial('landing/email', array('content' => $content));
		$messageObject->setBody($content, 'text/html', 'UTF-8') ;

        $mailer = Swift_Mailer::newInstance($this->getEmailTransport());
        $mailer->send($messageObject);
    }

    public function sendVisitorNotification($properties, $datas, $landing, $actionType)
    {
        // $message = CatalyzTextFilter::makeLinksAbsolute($message);
        if (empty($properties['enabled']) || empty($datas['email'])) {
            return false;
        }
    	$messageObject =/*(Swift_Message)*/ Swift_Message::newInstance();
        $messageObject->setCharset('utf-8');
        $messageObject->setFrom($properties['from_email'], $properties['from_name']);
        $messageObject->setTo($datas['email']);

        if (sfConfig::get('app_mail_bcc', false)) {
            $messageObject->addBcc(sfConfig::get('app_mail_bcc', false));
        }

        $messageObject->setSubject($properties['subject']);

    	$messageObject->setBody($this->getPartial('landing/email', array('content' => CatalyzEmailing::makeLinksAbsolute($properties['message']))), 'text/html', 'UTF-8') ;

        $mailer = Swift_Mailer::newInstance($this->getEmailTransport());
        $mailer->send($messageObject);
    }

    protected function getEmailTransport()
    {
        return Swift_SmtpTransport::newInstance(sfConfig::get('app_mail_server', 'localhost'), sfConfig::get('app_mail_port', 25));
    }
}