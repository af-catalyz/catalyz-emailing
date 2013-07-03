<?php

/**
 * tracking actions.
 *
 * @package catalyz_emailing
 * @subpackage tracking
 * @author Your name here
 * @version SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class trackingActions extends sfActions {
	protected function getVisitor($request, $response){
		$visitor = false;
		if ($request->getCookie('catalyz-emailing-tracking')) {
			$visitor = WebVisitorPeer::retrieveByPk($request->getCookie('catalyz-emailing-tracking'));
		}
		if (!$visitor) {
			// create a new visitor id
			$visitor = new WebVisitor();
			$visitor->save();
		}
		$response->setCookie('catalyz-emailing-tracking', $visitor->getId());
	}

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeAgent(sfWebRequest $request)
    {
    	$response =/*(sfWebResponse)*/ $this->getResponse();

        $visitor = $this->getVisitor($request, $response);
		$contact_id = $this->getContactId();

    	$refererInfos = parse_url($_SERVER['HTTP_REFERER']);
    	parse_str($refererInfos['query'], $result);
    	print_r($refererInfos);
    	if(isset($result['czet'])){
    			$contact = ContactPeer::retrieveByPk($result['czet']);
    	}else{
    		$contact = false;
    	}

    	$webPageAccess = new WebPageAccess();
    	$webPageAccess->setWebSessionId();
    	$webPageAccess->setIp($_SERVER['REMOTE_ADDR']);
    	$webPageAccess->setUserAgent($_SERVER['HTTP_USER_AGENT']);




        return sfView::NONE;
    }

}