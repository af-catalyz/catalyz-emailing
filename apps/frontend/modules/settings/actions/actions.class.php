<?php

/**
 * settings actions.
 *
 * @package    catalyz_emailing
 * @subpackage settings
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class settingsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    return sfView::SUCCESS;
  }

	public function executeChangeContactListLimit($request)
	{

		$czSettings = /*(CatalyzSettings)*/CatalyzSettings::instance();

		$usersLimits = $czSettings->get(CatalyzSettings::CUSTOM_LIMIT);
		$usersLimits[$this->getUser()->getProfile()->getid()] =  $request->getParameter('list_limit', 15);
		$czSettings->set(CatalyzSettings::CUSTOM_LIMIT, $usersLimits);

		$this->redirect('@contacts');
		exit();
	}
}
