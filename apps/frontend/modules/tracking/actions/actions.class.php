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
    public function executeIndex(sfWebRequest $request)
    {
        $criteria = new Criteria();
    	$criteria->add(WebVisitorPeer::CONTACT_ID, 0, Criteria::GREATER_THAN);
        $criteria->addDescendingOrderByColumn(WebPageAccessPeer::CREATED_AT);
        $criteria->addJoin(WebSessionPeer::ID, WebPageAccessPeer::WEB_SESSION_ID);
        $criteria->addJoin(WebPageAccessPeer::WEB_SESSION_ID, WebSessionPeer::WEB_VISITOR_ID);
        $criteria->addJoin(WebSessionPeer::WEB_VISITOR_ID, WebVisitorPeer::ID);
        $criteria->setOffset(0);
        $criteria->setLimit(10);
        $criteria->setDistinct();
        $this->sessions = WebSessionPeer::doSelect($criteria);

        return sfView::SUCCESS;
    }
    public function executeAgent(sfWebRequest $request)
    {
        $response =/*(sfWebResponse)*/ $this->getResponse();

        WebTracker::execute($request, $response);
        $response->setContent('/* Catalyz Emailing Web Tracker */');
        sfConfig::set('sf_web_debug', false);
        return sfView::NONE;
    }

    public function executeSettings(sfWebRequest $request)
    {
        return sfView::SUCCESS;
    }
}