<?php

class campaignsActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->selectedTab = $request->getParameter('type', 1);
		return sfView::SUCCESS;
	}

	public function executeCreate(sfWebRequest $request)
	{
		return sfView::SUCCESS;
	}
}
