<?php

/**
 * user actions.
 *
 * @package    catalyz_emailing
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
	public function executeLogin(sfWebRequest $request)
	{
		$this->setLayout('layoutAnonymous');
		return sfView::SUCCESS;
	}
	public function executeLogout(sfWebRequest $request)
	{
		$this->redirect('@login');
	}
}
