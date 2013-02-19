<?php

class CampaignDeliveryManager {
    protected $Campaign;
    protected $hasBeenPrepared = false;

    function __construct($Campaign)
    {
        $this->Campaign = $Campaign;
    }

	protected function cleanUrl($url){
		$result = str_replace('&amp;', '&', $url);
		$result = preg_replace('/(#[^#]+)?$/s', '', $result);
		printf('cleanUrl: %s - %s<br />', $url, $result);
		return $result;
	}

    public function getLinkList($content)
    {
        if (preg_match_all("/<a[^>]*href=\"([^\"]+)\"[^>]*>/", $content, $tokens, PREG_OFFSET_CAPTURE)) {
            $result = array();
            foreach ($tokens[1] as $element) {
				$result[$element[1]] = $this->cleanUrl($element[0]);
            }

            foreach($result as $resultKey => $resultItem) {
                if (0 === strpos($resultItem, 'javascript:')) {
                    unset($result[$resultKey]);
                }
                if (0 === strpos($resultItem, 'skype:')) {
                    unset($result[$resultKey]);
                }
            }
            return $result;
        }
        return array();
    }

    public function getRessourceList($content)
    {
        $result = array();
        if (preg_match_all('#"([a-zA-Z0-9_/\-]*\.(?:jpg|png|gif))"#', $content, $tokens)) {
            $result = $tokens[1];
        }
        return $result;
    }

    public function replace($map, $content)
    {
        $keys = array();
        $values = array();
        foreach($map as $key => $link) {
            $keys[] = '"' . $key . '"';
            $values[] = '"' . $link . '"';
        }
        return str_replace($keys, $values, $content);
    }

    protected function deleteCampaignLink()
    {
        $Criteria = new Criteria();
        $Criteria->add(CampaignLinkPeer::CAMPAIGN_ID, $this->Campaign->getId());
        CampaignLinkPeer::doDelete($Criteria);
    }

    public function mapLinks($content)
    {
        $Criteria = new Criteria();
        $Criteria->add(CampaignLinkPeer::CAMPAIGN_ID, $this->Campaign->getId());
        $olds = CampaignLinkPeer::doSelect($Criteria);

        $linkTab = array();
        foreach ($olds as $old) {
            $linkTab[$old->getUrl()] = $old;
        }

        $srcPrefix = CatalyzEmailing::getApplicationUrl();

        $linkMap = array();
        $links = $this->getLinkList($content);
$linkTabNew = array();
        foreach(array_unique($links) as $key => $link) {
            // creations des links pour la campagne
            if ($this->isLinkValid($link)) {
                if (preg_match('|^(/?uploads/repository.+)$|', $link) || preg_match('|^(/?uploads/assets.+)$|', $link)) {
                    if ($link[1] != '/') {
                        $targetLink = $srcPrefix . '/' . $link;
                    } else {
                        $targetLink = $srcPrefix . $link;
                    }
                } else {
                    $targetLink = $link;
                }

                if (!isset($linkTab[$targetLink])) {
                    $CampaignLink = new CampaignLink();
                    $CampaignLink->setCampaign($this->Campaign);
                    $CampaignLink->setUrl($targetLink);
                    $CampaignLink->save();
                    $linkTabNew[$CampaignLink->getUrl()] = $CampaignLink;
                }else{
                	$linkTabNew[$targetLink] = $linkTab[$targetLink];
                	unset($linkTab[$targetLink]);
                }
            }
            // remove des mauvais liens
            else {
                $links = $this->removeFromTab($links, $link);
            }
        }

    	foreach($linkTab as $link){
    		$link->delete();
    	}

        foreach ($links as $pos => $link) {
            $CL = false;
            if (empty($linkTab[$link])) {
                $temp_link = $srcPrefix . $link;
                if (!empty($linkTab[$temp_link])) {
                    $CL = $linkTab[$temp_link];
                }

                $temp_link = $srcPrefix . '/' . $link;
                if (!empty($linkTab[$temp_link])) {
                    $CL = $linkTab[$temp_link];
                }
            } else {
                $CL = $linkTab[$link];
            }
            if ($CL) {
                $posId = $this->Campaign->getUrlPosition($link, $pos);
                if (is_object($CL)) {
                    $linkMap[] = $CL->getCollectorLink($posId);
                }
            }
        }

        return $this->replaceLinks($linkMap, $content, $links);
    }

    protected function removeFromTab($tab, $value)
    {
        while (in_array($value, $tab)) {
            $cle = array_search($value, $tab);
            unset($tab[$cle]);
        }

        return $tab;
    }

    public function mapRessources($content)
    {
        $ressources = $this->getRessourceList($content);
        $imgStoragePath = $this->getImageStoragePath(true);
        // $imgStoragePrefix = CatalyzEmailing::getApplicationUrl() . '/images/t/#SPY_KEY#' . $this->getImageStoragePath(false);
        $imgStoragePrefix = CatalyzEmailing::getApplicationUrl() ./*'/images/t/#SPY_KEY#' . */ $this->getImageStoragePath(false);

        if (!file_exists($imgStoragePath)) {
            mkdir($imgStoragePath, 0777, true);
        }
        if (!is_writable($imgStoragePath)) {
            throw new Exception('Image storage path is not writeable: ' . $imgStoragePath);
        }
        $srcPrefix = sfConfig::get('sf_web_dir') ;
        $ressourceMap = array();
        foreach($ressources as $ressource) {
            $padding = ('/' == $ressource[0])?'':'/'; // tiny_mce removes starting / for all images but not embedded css ressources for example...
            $src = $srcPrefix . $padding . $ressource;
            $dest = $imgStoragePath . $padding . $ressource;

            $destDir = dirname($dest);
            if (!file_exists($destDir)) {
                mkdir($destDir, 0777, true);
            }
            if (!copy($src, $dest)) {
                // throw new Exception(sprintf('Unable to copy %s to %s', $src, $dest));
            }
            $ressourceMap[$ressource] = $imgStoragePrefix . $padding . $ressource;
        }

        return $this->replace($ressourceMap, $content);
    }

    public function prepareCampaignDelivery()
    {
        if (!$this->hasBeenPrepared) {
            //region $content
            $content = $this->Campaign->getContent();

            $campaignTemplate = $this->Campaign->getCampaignTemplate();
            $templateHandlerClassName = $campaignTemplate->getClassName();
            if ($templateHandlerClassName) {
                $templateHandler =/*(KreactivNewsletter20110511CampaignTemplateHandler)*/ new $templateHandlerClassName($this->Campaign);
                $campaignContent = czWidgetFormWizard::asArray((string) $this->Campaign->getContent());
                $content = (string) $templateHandler->compute($campaignContent);
            }

            $content = $this->mapLinks($content);
            $content = $this->mapRessources($content);
            $content = $this->embedStylesheets($content);
            $this->Campaign->setPreparedContent($content);
            //endregion

            //region $text_content

            if (!$this->Campaign->getCampaignTemplateHandler()) {
                $content = $this->Campaign->getTextContent();
            } else {
                $datas = czWidgetFormWizard::asArray((string)$this->Campaign->getContent());

                $campaignTemplate = $this->Campaign->getCampaignTemplate();
                $templateHandlerClassName = $campaignTemplate->getClassName();
                $templateHandler = new $templateHandlerClassName($this->Campaign);

                $content = $templateHandler->computeTextVersion($datas);

                $content = str_ireplace("</pre>", "\n", $content);
                $content = strip_tags($content);
            }
            $this->Campaign->setPreparedTextContent($content);
            //endregion

            $this->Campaign->save();
            $this->hasBeenPrepared = true;
        }
        return true;
    }

    public function getImageStoragePath($full = false)
    {
        $result = '/images/campaigns/' . $this->Campaign->getId() ;
        if ($full) {
            $result = sfConfig::get('sf_web_dir') . $result;
        }
        return $result;
    }

    /**
     * Campaign::buildUnsubscribeLink()
     *
     * @param mixed $email
     * @return
     */
    public function getUnsubscribeLink($email)
    {
        return $this->getUrl('@unsubscribe?key=' . $this->getUserKey($email));
    }

    function getUrl($route)
    {
        $controller = sfContext::getInstance()->getController();
        $homepage = $controller->genUrl('@homepage');
        $target = $controller->genUrl($route, false);
        return CatalyzEmailing::getApplicationUrl() . str_replace($homepage, '/', $target) ;
    }

    /**
     * Campaign::buildViewOnlineLink()
     *
     * @param mixed $email
     * @return
     */
    public function getViewOnlineLink($email)
    {
        return $this->getUrl('@view-online?key=' . $this->getUserKey($email));
    }

    public function getPrintLink($email)
    {
        return $this->getUrl('@campaign-print?key=' . $this->getUserKey($email));
    }

    public function getUserKey($email)
    {
        return sprintf('%s-%d-%s', $email, $this->Campaign->getId(), md5($email . sfConfig::get('app_seed')));
    }

    protected function replaceMacrosForEmail($text, $email, $additionnal = array())
    {
        $macros = $additionnal;
        $macros['#EMAIL#'] = $email;
        $macros['#UNSUBSCRIBE#'] = $this->getUnsubscribeLink($email);
        $macros['#VIEW_ONLINE#'] = $this->getViewOnlineLink($email);
        $macros['#PRINT#'] = $this->getPrintLink($email);
        $macros['#SPY_KEY#'] = $this->getUserKey($email);

        $macroKeywords = array_keys($macros);
        $macroValues = array_values($macros);
        return str_replace($macroKeywords, $macroValues, $text);
    }

    public function prepareContentForEmail($email, $additionalMacros = array(), $onlineView = false)
    {
        $additionalMacros['#SUBJECT#'] = $this->prepareSubjectForEmail($email, $additionalMacros);



        // $campaignTemplate = $this->Campaign->getCampaignTemplate();
        // $templateHandlerClassName = $campaignTemplate->getClassName();
        // if ($templateHandlerClassName) {



        // $templateHandler = /*(KreactivNewsletter20110511CampaignTemplateHandler)*/new $templateHandlerClassName($this->Campaign);
        // $campaignContent = czWidgetFormWizard::asArray((string) $this->Campaign->getPreparedContent());
        // $content = (string) $templateHandler->compute($campaignContent);
        // }else{
        $content = $this->Campaign->getPreparedContent();
        // }
        // if ($onlineView) {
        // $content = preg_replace('|<p.+"#VIEW_ONLINE#".+</p>|im', '', $content) ;
        // $content = preg_replace('|<font.+"#VIEW_ONLINE#".+</font>|im', '', $content) ;
        // }
        $result = $this->replaceMacrosForEmail($content, $email, $additionalMacros);

        $spyUrl = sfContext::getInstance()->getController()->genUrl('@spy?key=' . $this->getUserKey($email), false);
    	$spyUrlFiltered = $this->stripCommandLinePath($spyUrl);
    	//$debug = sprintf('[%s][%s]', $spyUrl, $spyUrlFiltered);

        $result = str_ireplace('</body>', /*$debug.*/'<img src="' . CatalyzEmailing::getApplicationUrl() . $spyUrl . '" height="1" width="1" alt=""/></body>', $result);
        return $result;
    }
	protected function stripCommandLinePath($value){
		return preg_replace('/^(.*symfony)(.*)$/', '\2', $value);
	}

    public function prepareContentTextForEmail($email, $additionalMacros = array(), $onlineView = false)
    {
        $additionalMacros['#SUBJECT#'] = $this->prepareSubjectForEmail($email, $additionalMacros);
        // $campaignTemplate = $this->Campaign->getCampaignTemplate();
        // $templateHandlerClassName = $campaignTemplate->getClassName();
        // if ($templateHandlerClassName) {
        // $templateHandler = new $templateHandlerClassName($this->Campaign);
        // $campaignContent = czWidgetFormWizard::asArray((string) $this->Campaign->getPreparedContent());
        // $content = (string) $templateHandler->computeTextVersion($campaignContent);
        // }else{
        $content = $this->Campaign->getPreparedTextContent();
        // }
        $result = $this->replaceMacrosForEmail($content, $email, $additionalMacros);

        return $result;
    }

    public function prepareSubjectForEmail($email, $additionalMacros = array())
    {
        return $this->replaceMacrosForEmail($this->Campaign->getSubject(), $email, $additionalMacros);
    }

    public function sendTo($emails, $additionalMacros = array())
    {
        if (is_string($emails)) {
            $emails = $this->extractEmails($emails);
        }

        if (count($additionalMacros) == 0) {
            $additionalMacros = array();
            $additionalMacros['#FIRSTNAME#'] = htmlentities('<Prénom>', ENT_COMPAT, 'utf-8');
            $additionalMacros['#LASTNAME#'] = htmlentities('<Nom>', ENT_COMPAT, 'utf-8');
            $additionalMacros['#COMPANY#'] = htmlentities('<Société>', ENT_COMPAT, 'utf-8');

            $czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
            // var_dump($czSettings->get(CatalyzSettings::CUSTOM_FIELDS));exit;
            foreach($czSettings->get(CatalyzSettings::CUSTOM_FIELDS) as $fieldKey => $label) {
                $additionalMacros[sprintf('#%s#', strtoupper($fieldKey))] = htmlentities(sprintf('<%s>', $label), ENT_COMPAT, 'utf-8');
            }
        }

        $result = array('success' => array(), 'failed' => array());

        $emailConfiguration = array();
        $emailConfiguration['from'] = array($this->Campaign->getFromEmail() != ''?$this->Campaign->getFromEmail():sfConfig::get('app_mail_from_email') => $this->Campaign->getFromName() != ''?$this->Campaign->getFromName():sfConfig::get('app_mail_from_name'));
        $emailConfiguration['replyTo'] = $this->Campaign->getReplyToEmail() != ''?$this->Campaign->getReplyToEmail():sfConfig::get('app_mail_reply_email');
        $emailConfiguration['returnPath'] = $this->Campaign->getReturnPathEmail()?$this->Campaign->getReturnPathEmail():$this->Campaign->getReturnPathLogin();

        $this->prepareCampaignDelivery();
        try {
            foreach($emails as $k => $email) {
                if (empty($email)) {
                    unset($emails[$k]);
                } else {
                    $expectedCount = 1;

                    $messageObject =/*(Swift_Message)*/ Swift_Message::newInstance();
                    $messageObject->setCharset('utf-8');
                    $messageObject->setFrom($emailConfiguration['from']);
                    $messageObject->setReplyTo($emailConfiguration['replyTo']);
                    $messageObject->setReturnPath($emailConfiguration['returnPath']);
                    $messageObject->setTo($email);

                    if (sfConfig::get('app_mail_bcc', false)) {
                        $messageObject->addBcc(sfConfig::get('app_mail_bcc', false));
                        $expectedCount++;
                    }

                    $messageObject->setSubject($this->prepareSubjectForEmail($email, $additionalMacros));
                    $messageObject->setBody($this->prepareContentForEmail($email, $additionalMacros), 'text/html', 'UTF-8') ;
                    $messageObject->addPart($this->prepareContentTextForEmail($email, $additionalMacros), 'text/plain', 'UTF-8');

                    $messageObject->getHeaders()->addTextHeader('X-Catalyz-Email', $email);
                    $messageObject->getHeaders()->addTextHeader('X-Catalyz-Campaign', $this->Campaign->getId());
                    $messageObject->getHeaders()->addTextHeader('List-Unsubscribe', sprintf('<%s>', $this->getUnsubscribeLink($email)));

                    $transport = Swift_SmtpTransport::newInstance(sfConfig::get('app_mail_server'), sfConfig::get('app_mail_port'));
                    // ->setUsername('your username')
                    // ->setPassword('your password') ;
                    $mailer = Swift_Mailer::newInstance($transport);
                    $sent = $mailer->send($messageObject);

                    if ($sent == $expectedCount) {
                        $result['success'][] = $email;
                    }
                }
            }
            // $mailer->disconnect();
            // $result['failed'] = Swift_LogContainer::getLog()->getFailedRecipients();
        }
        catch (Exception $e) {
            echo $e->getMessage();
            $result['failed'] = $emails;
        }

        return $result;
    }

//    function getMailerConnection()
//    {
//        return new Swift_Connection_SMTP(sfConfig::get('app_mail_server', 'localhost'), sfConfig::get('app_mail_port', 25));
//    }
    public function extractEmails($emails)
    {
        return preg_split('/[^a-zA-Z0-9_.\-@]+/', $emails);
    }

    /**
     * Send an email to a campaign contact
     *
     * @param CampaignContact $target
     * @return boolean True if email has been sent to contact and false elsewhere
     */
    public function sendToCampaignContact(CampaignContact $target, $isTest = false)
    {
        $contact = $target->getContact();
        $result = $this->sendToContact($contact);

        if (in_array($contact->getEmail(), $result['success'])) {
            if (!$isTest) {
                $target->setSentAt(time());
                $target->save();
            }
            return true;
        } else {
            if (!$isTest) {
                $target->setFailedSentAt(time());
                $target->save();
            }
            return false;
        }
    }

    public function getMacrosForContact(Contact $contact)
    {
        $email = $contact->getEmail();
        $additionalMacros = array();
        $additionalMacros['#FIRSTNAME#'] = htmlentities($contact->getFirstName(), ENT_COMPAT, 'utf-8') ;
        $additionalMacros['#LASTNAME#'] = htmlentities($contact->getLastName(), ENT_COMPAT, 'utf-8') ;
        $additionalMacros['#COMPANY#'] = htmlentities($contact->getCompany(), ENT_COMPAT, 'utf-8') ;

    	$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
    	foreach($czSettings->get(CatalyzSettings::CUSTOM_FIELDS) as $fieldKey => $label) {
    		$method = 'get'.ucfirst($fieldKey);
    		$additionalMacros[sprintf('#%s#', strtoupper($fieldKey))] = $contact->$method();
    	}

        return $additionalMacros;
    }

    public function sendToList($emails)
    {
        $emails = $this->extractEmails(strtolower($emails));

        $targets = array();
        foreach($emails as $email) {
            $targets[$email] = null;
        }

        $result = array('success' => array(), 'failed' => array());

        $criteria = new Criteria();
        $criteria->add(ContactPeer::EMAIL, $emails, Criteria::IN);
        foreach(ContactPeer::doSelect($criteria) as $Contact) {
            unset($targets[strtolower($Contact->getEmail())]);
            $curResult = $this->sendToContact($Contact);
            $result['success'] = array_merge($result['success'], $curResult['success']);
            $result['failed'] = array_merge($result['failed'], $curResult['failed']);
        }
        foreach($targets as $email => $null) {
            $curResult = $this->sendTo($email);
            $result['success'] = array_merge($result['success'], $curResult['success']);
            $result['failed'] = array_merge($result['failed'], $curResult['failed']);
        }

        return $result;
    }

    public function sendToContact(Contact $contact)
    {
        return $this->sendTo($contact->getEmail(), $this->getMacrosForContact($contact));
    }

    public function isLinkValid($link)
    {
        if (preg_match('/^mailto:/i', $link)) {
            return false;
        }
        return true;
    }

    protected function str_replace_once($str_pattern, $str_replacement, $string)
    {
        if (strpos($string, $str_pattern) !== false) {
            $occurrence = strpos($string, $str_pattern);
            return substr_replace($string, $str_replacement, strpos($string, $str_pattern), strlen($str_pattern));
        }

        return $string;
    }

    public function replaceLinks($map, $content, $links)
    {
        $temp = array();
        foreach ($links as $link) {
            $temp[] = $link;
        }
        $links = $temp;

        $keys = array();
        $values = array();
        foreach($map as $key => $val) {
            $keys[] = '"' . $links[$key] . '"';
            $values[] = '"' . $val . '"';
        }

        foreach ($keys as $k => $link) {
            $content = $this->str_replace_once($link, $values[$k], $content);
        }
        return $content;
    }

    /**
     * CampaignDeliveryManager::embedStylesheets()
     *
     * @param mixed $content
     * @return
     */
    public function embedStylesheets($content)
    {
        if (preg_match_all('#<link\srel="stylesheet"\shref="([^"]+)"\s/>#', $content, $tokens)) {
            foreach($tokens[1] as $index => $cssFilename) {
                $cssContent = '<style class="text/css">';
                $cssContent .= "\n" . file_get_contents(sfConfig::get('sf_web_dir') . $cssFilename);
                $cssContent .= '</style>';
                $content = str_replace($tokens[0][$index], $cssContent, $content);
            }
        }
        return $content;
    }
}

?>

