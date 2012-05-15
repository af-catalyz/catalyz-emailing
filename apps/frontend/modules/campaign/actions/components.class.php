<?php
class campaignComponents extends sfComponents
{
	public function executeEnveloppe(sfWebRequest $request)
	{

	}

	public function executeMessage(sfWebRequest $request)
	{

	}

	public function executeLinks(sfWebRequest $request)
	{

	}

	public function executeGoogleAnalytics(sfWebRequest $request)
	{
    $this->form = new CampaignAnalyticsForm($this->campaign);
	}

	public function executeAntiSpam(sfWebRequest $request)
	{

	}

	public function executeVisualControls(sfWebRequest $request)
	{

	}

	public function executeTargets(sfWebRequest $request)
	{

	}

	public function executeReturnErrors(sfWebRequest $request)
	{

	}

	public function executeScheduling(sfWebRequest $request)
	{

	}

}