<?php

/**
 * contacts actions.
 *
 * @package    catalyz_emailing
 * @subpackage contacts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactsActions extends sfActions
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
	public function executeShow(sfWebRequest $request)
	{
		return sfView::SUCCESS;
	}
	public function executeAdd(sfWebRequest $request)
	{
		return sfView::SUCCESS;
	}
}
