<?php

class WebTracker {
    const COOKIE_NAME_VISITOR = 'czetv';
    const COOKIE_NAME_SESSION = 'czets';

	static protected function generateUid($length = 20) {

		if(function_exists('openssl_random_pseudo_bytes')) {
			$result = base64_encode(openssl_random_pseudo_bytes($length, $strong));
			if($strong == TRUE)
				return substr($result, 0, $length); //base64 is about 33% longer, so we need to truncate the result
		}

		# fallback to mt_rand if php < 5.3 or no openssl available
		$characters = '0123456789';
		$characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$charactersLength = strlen($characters)-1;
		$result = '';

		# select some random characters
		for ($i = 0; $i < $length; $i++) {
			$result .= $characters[mt_rand(0, $charactersLength)];
		}

		return $result;
	}

    static function execute($request, $response)
    {
    	if(!isset($_SERVER['HTTP_REFERER'])){
    		$_SERVER['HTTP_REFERER'] = '';
    	}
		$refererInfos = parse_url($_SERVER['HTTP_REFERER']);
    	foreach(array('scheme', 'host', 'path', 'query') as $k){
    		if(!isset($refererInfos[$k])){
    			$refererInfos[$k] = '';
    		}
    	}
    	parse_str($refererInfos['query'], $result);

        //region Visitor
        $visitor = false;
        if ($request->getCookie(self::COOKIE_NAME_VISITOR)) {
            $visitor = WebVisitorPeer::retrieveByPk($request->getCookie(self::COOKIE_NAME_VISITOR));
        }
        if (!$visitor) {
            $visitor = new WebVisitor();
            $visitor->setUid(self::generateUid());
        }
        if (!empty($result['czet'])) {
        	$criteria = new Criteria();
        	$criteria->add(ContactPeer::EMAIL, $result['czet']);
            $contact = ContactPeer::doSelectOne($criteria);
        	if($contact){
        		$visitor->setContactId($contact->getId());
        	}
        }
        $visitor->save();
        $response->setCookie(self::COOKIE_NAME_VISITOR, $visitor->getId(), strtotime('+10 years'));
        //endregion

        //region Session
        $session = false;
        if ($request->getCookie(self::COOKIE_NAME_SESSION)) {
            $session = WebSessionPeer::retrieveByPk($request->getCookie(self::COOKIE_NAME_SESSION));
        }
        if (!$session) {
            $session = new WebSession();
            $session->setWebVisitor($visitor);
            $session->save();
        }
        $response->setCookie(self::COOKIE_NAME_SESSION, $session->getId(),/* session only */ 0);
        //endregion

        //region WebPage
        $criteria = new Criteria();
        $criteria->add(WebPagePeer::SCHEME, $refererInfos['scheme']);
        $criteria->add(WebPagePeer::HOST, $refererInfos['host']);
        $criteria->add(WebPagePeer::PATH, $refererInfos['path']);
        $page = WebPagePeer::doSelectOne($criteria);
        if (!$page) {
            $page = new WebPage();
            $page->setScheme($refererInfos['scheme']);
            $page->setHost($refererInfos['host']);
            $page->setPath($refererInfos['path']);
            $page->save();
        }
        //endregion

        //region WebPageAccess
        $webPageAccess = new WebPageAccess();
        $webPageAccess->setWebSession($session);
        $webPageAccess->setIp($_SERVER['REMOTE_ADDR']);
        $webPageAccess->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $webPageAccess->setWebPage($page);
        if (!empty($refererInfos['query'])) {
            $webPageAccess->setQuery($refererInfos['query']);
        }
        $webPageAccess->save();
        //endregion

        // print_r($visitor);
        // print_r($session);
        // print_r($page);
        // print_r($webPageAccess);
    }
    static function isModuleAvailable()
    {
        return sfConfig::get('app_webtracker_enabled', false);
    }
}

?>
