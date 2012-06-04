<?php

class CampaignDeliveryManager {
    protected $Campaign;

    function __construct($Campaign)
    {
        $this->Campaign = $Campaign;
    }
    public function getLinkList($content)
    {
        if (preg_match_all("/<a[^>]*href=\"([^#\"][^\"]*)\"[^>]*>/", $content, $tokens, PREG_OFFSET_CAPTURE)) {
            $result = array();
            foreach ($tokens[1] as $element) {
                $result[$element[1]] = str_replace('&amp;', '&', $element[0]);
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
                    $linkTab[$CampaignLink->getUrl()] = $CampaignLink;
                }
            }
            // remove des mauvais liens
            else {
                $links = $this->removeFromTab($links, $link);
            }
        }

        foreach ($links as $pos => $link) {
        	$CL = false;
	        	if (empty($linkTab[$link])) {
	        		$temp_link = $srcPrefix . $link;
	        		if (!empty($linkTab[$temp_link])) {
	        			$CL = $linkTab[$temp_link];
	        		}

	        		$temp_link = $srcPrefix .'/'. $link;
	        		if (!empty($linkTab[$temp_link])) {
	        			$CL = $linkTab[$temp_link];
	        		}

	        	}else{
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

    protected $hasBeenPrepared = false;
    public function prepareCampaignDelivery()
    {
        if (!$this->hasBeenPrepared) {
            //region $content
            $content = $this->Campaign->getContent();
            if (is_object($content)) {
                $templateHandler = $this->Campaign->getCampaignTemplateHandler();
                if ($templateHandler) {
                    $rawContent = $content->getContents();
                    // var_dump($rawContent);
                    if (!is_array($rawContent)) {
                        $rawContent = czWidgetFormWizard::asArray($rawContent);
                        // var_dump($rawContent);
                    }

                    $this->Campaign->setContent(czWidgetFormWizard::asXml($rawContent));
                    $content = $templateHandler->compute($rawContent);
                } else {
                    $content = $content->getContents();
                    $this->Campaign->setContent($content);
                }
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

    protected function getUserKey($email)
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

        $content = $this->Campaign->getPreparedContent();
        // if ($onlineView) {
        // $content = preg_replace('|<p.+"#VIEW_ONLINE#".+</p>|im', '', $content) ;
        // $content = preg_replace('|<font.+"#VIEW_ONLINE#".+</font>|im', '', $content) ;
        // }
        $result = $this->replaceMacrosForEmail($content, $email, $additionalMacros);

        $spyUrl = sfContext::getInstance()->getController()->genUrl('@spy?key=' . $this->getUserKey($email), false);
        $result = str_ireplace('</body>', '<img src="' . CatalyzEmailing::getApplicationUrl() . $spyUrl . '" height="1" width="1" alt=""/></body>', $result);
        return $result;
    }

    public function prepareContentTextForEmail($email, $additionalMacros = array(), $onlineView = false)
    {
        $additionalMacros['#SUBJECT#'] = $this->prepareSubjectForEmail($email, $additionalMacros);

        $content = $this->Campaign->getPreparedTextContent();

        $result = $this->replaceMacrosForEmail($content, $email, $additionalMacros);

        return $result;
    }

    public function prepareSubjectForEmail($email, $additionalMacros = array())
    {
        return $this->replaceMacrosForEmail($this->Campaign->getSubject(), $email, $additionalMacros);
    }

    public function sendTo($emails, $additionalMacros = array())
    {
//    	die('CampaignDeliveryManager.php L322');
        if (is_string($emails)) {
            $emails = $this->extractEmails($emails);
        }

        if (count($additionalMacros) == 0) {
            $additionalMacros = array();
            $additionalMacros['#FIRSTNAME#'] = htmlentities('<Prénom>', ENT_COMPAT, 'utf-8');
            $additionalMacros['#LASTNAME#'] = htmlentities('<Nom>', ENT_COMPAT, 'utf-8');
            $additionalMacros['#COMPANY#'] = htmlentities('<Société>', ENT_COMPAT, 'utf-8');
            for($i = 1; $i <= sfConfig::get('app_fields_count'); $i++) {
                $additionalMacros[sprintf('#CUSTOM%d#', $i)] = htmlentities(sprintf('<Champ personnalisé n°%d>', $i), ENT_COMPAT, 'utf-8');
            }
        }

    	$result = array('success' => array(), 'failed' => array());








    	$emailConfiguration = array();
    	$emailConfiguration['from'] =array($this->Campaign->getFromEmail() => $this->Campaign->getFromName());
    	$emailConfiguration['replyTo'] = $this->Campaign->getReplyToEmail();
    	$emailConfiguration['returnPath'] = $this->Campaign->getReturnPathEmail()?$this->Campaign->getReturnPathEmail():$this->Campaign->getReturnPathLogin();


        $this->prepareCampaignDelivery();
        try {
            foreach($emails as $k => $email) {
                if (empty($email)) {
                    unset($emails[$k]);
                } else {
                    $expectedCount = 1;

                		$messageObject = Swift_Message::newInstance();
                		$messageObject->setFrom($emailConfiguration['from']);
                		$messageObject->setReplyTo($emailConfiguration['replyTo']);
                		$messageObject->setReturnPath($emailConfiguration['returnPath']);
										$messageObject->setTo($email);

										if ($bcc) {
                        $messageObject->addBcc($bcc);
                        $expectedCount++;
                    }

                    $messageObject->setSubject($this->prepareSubjectForEmail($email, $additionalMacros));
                    $messageObject->attach(new Swift_Message_Part($this->prepareContentTextForEmail($email, $additionalMacros), 'text/plain', '8bit', 'UTF-8'));

                    $messageObject->headers->set('X-Catalyz-Email', $email);
                    $messageObject->headers->set('X-Catalyz-Campaign', $this->Campaign->getId());
                    $messageObject->headers->set('List-Unsubscribe', sprintf('<%s>', $this->getUnsubscribeLink($email)));

                	var_dump($messageObject);
                	die();

                	  $sent = $this->getMailer()->send($messageObject);

                    if ($sent == $expectedCount) {
                        $result['success'][] = $email;
                    }
                }
            }
            $mailer->disconnect();
            $result['failed'] = Swift_LogContainer::getLog()->getFailedRecipients();
        }
        catch (Exception $e) {
            echo $e->getMessage();
            $result['failed'] = $emails;
        }

        return $result;
    }

    function getMailerConnection()
    {
        return new Swift_Connection_SMTP(sfConfig::get('app_mail_server', 'localhost'), sfConfig::get('app_mail_port', 25));
    }
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
        for($i = 1; $i <= sfConfig::get('app_fields_count'); $i++) {
            $method = 'getCustom' . $i;
            $additionalMacros[sprintf('#CUSTOM%d#', $i)] = $contact->$method();
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

