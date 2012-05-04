<?php

/**
 * campaign actions.
 *
 * @package    catalyz_emailing
 * @subpackage campaign
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class campaignActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$this->forward404Unless($this->campaign = CampaignPeer::retrieveByPk($request->getParameter('slug')));

    return sfView::SUCCESS;
  }
}
