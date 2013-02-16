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

    	$this->sendWebmasterNotification($landing->getWebmasterFormProperties($actionType), $datas);
    	$this->sendVisitorNotification($landing->getUserFormProperties($actionType), $datas);

        return $this->renderText($properties['feedback']);
    }

	public function sendEmailToVisitor($values, $macroKeywords, $macroValues, $visitorEmail)
	{
		if ($visitorEmail && $this->ContentObject->Translation[$this->culture]->visitor_notification_enabled && $visitorEmail != 'Non renseigné par le visiteur') {
			$xml = $this->ContentObject->Translation[$this->culture]->custom_contact_form;
			$field = czWidgetFormGenerator::getVisitorEmailField($xml);

			$message = str_replace($macroKeywords, $macroValues, $this->ContentObject->Translation[$this->culture]->visitor_notification_message);
			$message = CatalyzTextFilter::makeLinksAbsolute($message);

			$messageVisitor = Catalyz::createNewSwiftMessageInstance($visitorEmail);

			$app_config = sfConfig::get('app_site_mail', array());
			if (preg_match('/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i', $this->ContentObject->Translation[$this->culture]->visitor_notification_from_email)) {
				$messageVisitor->setFrom(array($this->ContentObject->Translation[$this->culture]->visitor_notification_from_email => $this->ContentObject->Translation[$this->culture]->visitor_notification_from_name));
			}elseif(!empty($app_config)){
				$messageVisitor->setFrom(array($app_config['from_email'] => $app_config['from_name']));
			}

			$messageVisitor->setSubject(str_replace($macroKeywords, $macroValues, $this->ContentObject->Translation[$this->culture]->visitor_notification_subject));
			$messageVisitor->setBody($message, 'text/html') ;
			if (is_array($field) && count($field) > 1) {
				$notificationRecipients = array();
				foreach ($field as $fieldElement) {
					array_push($notificationRecipients, $values[$fieldElement]);
				}
				$messageVisitor->setCc($notificationRecipients);
			}
			$this->getMailer()->send($messageVisitor);
		}

		return true;
	}


	public function sendWebmasterNotification($properties, $datas)
	{
		//$message = CatalyzTextFilter::makeLinksAbsolute($message);

		$messageAdmin = Catalyz::createNewSwiftMessageInstance($recipients);
		$messageAdmin->setSubject($properties['']);
		$messageAdmin->setBody($message, 'text/html');
		// mettre en piece jointe le fichier
		if (!empty($fichiers)) {
			foreach ($fichiers as $fichier) {
				$messageAdmin->attach(Swift_Attachment::fromPath($fichier['path'], $fichier['mime']));
			}
		}

		$field = czWidgetFormGenerator::getVisitorEmailField($xml);
		$visitorEmail = '';
		if ($field) {
			$visitorEmail = $values[array_shift($field)];
			if ($visitorEmail != 'Non renseigné par le visiteur') {
				$messageAdmin->setReplyTo($visitorEmail);
			}
		}

		$this->getMailer()->send($messageAdmin);

		return $visitorEmail;
	}

	public function sendVisitorNotification($properties, $datas)
	{
		throw new Exception('Non implementé.');
	}
}