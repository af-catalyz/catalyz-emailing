<?php

/**
 * statistics actions.
 *
 * @package    catalyz_emailing
 * @subpackage statistics
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statisticsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
	public function executeIndex(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		//region now
		$this->prepared_target_count = $this->campaign->getPreparedTargetCount();
		$this->target_count = $this->campaign->getTargetCount();
		$this->sent_count = $this->campaign->getSentCount();

		$this->view_count = $this->campaign->getOpenedCount();
		$this->click_count = $this->campaign->getClickedCount();

		$this->failed_count = $this->campaign->getFailedSentCount();

		$this->reactivite = $this->view_count != 0?($this->click_count * 100) / $this->view_count:0;

		$this->taux_ouverture = $this->prepared_target_count != 0?($this->view_count * 100) / $this->prepared_target_count-$this->failed_count:0;
		$this->taux_clicks = $this->prepared_target_count != 0?($this->click_count * 100) / $this->prepared_target_count-$this->failed_count:0;

		$this->unsubscribe_count = $this->campaign->getUnsubscribeCount();
		//endregion now



		$title = sprintf('%s - Statistiques / Vue d\'ensemble %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);

		return sfView::SUCCESS;
	}

	public function executeTargets(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));
		return sfView::SUCCESS;
	}

	public function executeViews(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));
		return sfView::SUCCESS;
	}

	public function executeShowLinks($request)
	{
		$this->forward404Unless($this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$this->links = $this->campaign->getClickStatistics(true);
		$this->contacts = array();
		foreach($this->links as $url => $details) {
			$criteria = new Criteria();
			$criteria->add(CampaignLinkPeer::URL, $url);
			$criteria->add(CampaignLinkPeer::CAMPAIGN_ID, $this->campaign->getId());
			$criteria->addJoin(CampaignLinkPeer::ID, CampaignClickPeer::CAMPAIGN_LINK_ID);
			$criteria->addDescendingOrderByColumn(CampaignClickPeer::CREATED_AT);
			$result = CampaignClickPeer::doSelectJoinCampaignContact($criteria);

			$this->contacts[$url] = array();
			foreach($result as/*(CampaignClick)*/ $click) {
				$this->contacts[$url][strtotime($click->getCreatedAt())] = $click->getCampaignContact();
			}
		}

		$this->total= array_sum($this->links);
		$title = sprintf('%s - Statistiques / Clicks %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);


		$this->getResponse()->addJavaScript('/js/jquery.js');
		$this->getResponse()->addJavaScript('/js/overlib/overlib_mini.js', 'last');

		return sfView::SUCCESS;
	}

	public function executeDisplayIframe($request)
	{
		$this->getResponse()->addJavaScript('/js/jquery.js');
		$this->getResponse()->addJavaScript('/js/overlib/overlib_mini.js', 'last');
		$this->forward404Unless($campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		sfConfig::set('sf_web_debug', false);

		$campaignContent = $campaign->getPreparedContent();

		if (empty($campaignContent)) {
			$campaignContent = czWidgetFormWizard::asArray((string)$campaign->getContent());
		}

		$campaignTemplate = $campaign->getCampaignTemplate();
		$this->forward404Unless($campaignTemplate);

		$templateHandlerClassName = $campaignTemplate->getClassName();
		if (!empty($templateHandlerClassName)) {
			$templateHandler = new $templateHandlerClassName($campaign);

			$campaignContent = czWidgetFormWizard::asArray((string)$campaign->getContent());
			$campaignContent = $templateHandler->compute($campaignContent);
			// $campaignContent = preg_replace('/href="([^"]*)"/', 'href="javascript:void();" onclick="alert(\'Lien vers &quot;\1&quot;\'); return false;"', $campaignContent);
		} else {
			$campaignContent = $campaign->getContent();
		}

		$campaignContent = CatalyzEmailing::addStatisticsToLinks($campaignContent, $campaign->getUrls(), $campaign->getClickedUrlsWithPos());
		$this->getResponse()->setContent($campaignContent);

		return sfView::NONE;
	}

	/*to display iframe in message tab*/
	public function executeDisplayCampaignContentIframe($request)
	{
		$this->forward404Unless($campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		sfConfig::set('sf_web_debug', false);

		$campaignContent = $campaign->getPreparedContent();

		if (empty($campaignContent)) {
			$campaignContent = czWidgetFormWizard::asArray((string)$campaign->getContent());
		}

		$campaignTemplate = $campaign->getCampaignTemplate();
		$this->forward404Unless($campaignTemplate);

		$templateHandlerClassName = $campaignTemplate->getClassName();
		if (!empty($templateHandlerClassName)) {
			$templateHandler = new $templateHandlerClassName($campaign);

			$campaignContent = czWidgetFormWizard::asArray((string)$campaign->getContent());
			$campaignContent = $templateHandler->compute($campaignContent);
			// $campaignContent = preg_replace('/href="([^"]*)"/', 'href="javascript:void();" onclick="alert(\'Lien vers &quot;\1&quot;\'); return false;"', $campaignContent);
		} else {
			$campaignContent = $campaign->getContent();
		}
		$this->getResponse()->setContent($campaignContent);

		return sfView::NONE;
	}

	public function executeShowClicks($request)
	{
		$this->forward404Unless($this->url =/*(Campaignlink)*/ CampaignLinkPeer::retrieveByPk($request->getParameter('id')));
		$this->forward404Unless($this->campaign =/*(Campaign)*/ $this->url->getCampaign());

		$criteria = new Criteria();
		$criteria->add(CampaignClickPeer::CAMPAIGN_LINK_ID, $this->url->getId());
		$criteria->addJoin(CampaignClickPeer::CAMPAIGN_CONTACT_ID, CampaignContactPeer::ID, Criteria::LEFT_JOIN);
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID, Criteria::LEFT_JOIN);
		$criteria->addDescendingOrderByColumn(CampaignClickPeer::CREATED_AT);
		// $result = CampaignContactPeer::doSelect($criteria);
		$criteria->setDistinct();
		$pager = new sfPropelPager('Contact', 15);
		$pager->setCriteria($criteria);
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
		// $this->total= array_sum($this->links);
		return sfView::SUCCESS;
	}

	public function executeMessage(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));
		return sfView::SUCCESS;
	}

	public function executeShowBrowser(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));


		$this->browscap = CatalyzEmailing::browscapEnable();
		if ($this->browscap) {
			$UserAgents = $this->campaign->getUsersAgents();

			$this->parents = $UserAgents['parents'];
			$this->platforms = $UserAgents['platforms'];
		}

		$title = sprintf('%s - Statistiques / Clients de messagerie %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);

		return sfView::SUCCESS;
	}
}
