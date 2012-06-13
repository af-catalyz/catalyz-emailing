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

		$title = sprintf('%s - Statistiques / Vue d\'ensemble %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);

		return sfView::SUCCESS;
	}

	public function executeTargets(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$criteria = new Criteria();
		$criteria->setDistinct();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->campaign->getId());
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID, Criteria::LEFT_JOIN);
		$criteria->addAscendingOrderByColumn(ContactPeer::LAST_NAME);

		$pager = new sfPropelPager('CampaignContact', 15);
		$pager->setCriteria($criteria);
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->setPeerMethod('doSelectJoinContact');
		$pager->init();
		$this->pager = $pager;

		$title = sprintf('%s - Statistiques / Cibles %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);

		return sfView::SUCCESS;
	}

	public function executeViews(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$criteria = new Criteria();
		$criteria->setDistinct();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->campaign->getId());
		$criteria->add(CampaignContactPeer::VIEW_AT, null, Criteria::ISNOTNULL);
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID, Criteria::LEFT_JOIN);
		$criteria->addDescendingOrderByColumn(CampaignContactPeer::VIEW_AT);

		$pager = new sfPropelPager('CampaignContact', 15);
		$pager->setCriteria($criteria);
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;

		$title = sprintf('%s - Statistiques / Ouvertures %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);

		return sfView::SUCCESS;
	}

	public function executeShowLinks($request)
	{
		$this->forward404Unless($this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$this->links = $this->campaign->getClickStatistics(true);
		$this->contacts = array();
		if (!empty($this->links)) {
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
		}


		$title = sprintf('%s - Statistiques / Clicks %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
		$this->getResponse()->setTitle($title);


		$this->getResponse()->addJavaScript('/js/jquery.js');
		$this->getResponse()->addJavaScript('/js/overlib/overlib_mini.js', 'last');

		return sfView::SUCCESS;
	}

	public function executeDisplayIframe($request)
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

	public function executeExportClicks(sfWebRequest $request)
	{

		$this->forward404Unless($campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$criteria = new Criteria();
		$criteria->add(CampaignLinkPeer::CAMPAIGN_ID, $campaign->getId());
		$criteria->addJoin(CampaignLinkPeer::ID, CampaignClickPeer::CAMPAIGN_LINK_ID);
		$criteria->addJoin(CampaignClickPeer::CAMPAIGN_CONTACT_ID, CampaignContactPeer::ID);
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID);

		$criteria->addAscendingOrderByColumn(ContactPeer::LAST_NAME);
		$results = CampaignClickPeer::doSelectJoinAll($criteria);


		$returns = array();
		foreach ($results as /*(CampaignClick)*/$result){
			$CampaignLink = /*(CampaignLink)*/$result->getCampaignLink();
			$contact = $result->getCampaignContact()->getContact();
			if (empty($returns[$result->getCampaignContact()->getContact()->getId()])) {
				$returns[$contact->getId()] = array('name'=>$contact->getFullName(), 'clicks' => array());
			}

			$returns[$contact->getId()]['clicks'][] = array('name' => $CampaignLink->getGoogleAnalyticsTerm(), 'url' => $CampaignLink->getUrl(), 'date' => CatalyzDate::formatShortWithTime(strtotime($result->getCreatedAt())));
		}

		$sheetTitle = sprintf('Details des clicks');

		$this->spreadsheet = new sfPhpExcel();
		$this->spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

		$this->spreadsheet->setActiveSheetIndex(0);
		$this->activeSheet = $this->spreadsheet->getActiveSheet();
		$this->activeSheet->setTitle($sheetTitle);

		$this->activeSheet->setCellValue('A1', 'Nom');
		$this->activeSheet->setCellValue('B1', 'Nom de l\'url');
		$this->activeSheet->setCellValue('C1', 'url');
		$this->activeSheet->setCellValue('D1', 'date');

		$row = 2;
		foreach ($returns as $return){
					$contactName = $return['name'];
			foreach ($return['clicks'] as $clicks){
				$url_name = $clicks['name'];
				$url_path = $clicks['url'];
				$date = $clicks['date'];

				$this->activeSheet->setCellValue('A'.$row, $contactName);
				$this->activeSheet->setCellValue('B'.$row, $url_name);
				$this->activeSheet->setCellValue('C'.$row, $url_path);
				$this->activeSheet->setCellValue('D'.$row, $date);
				$row++;
			}
		}

		$objWriter = new PHPExcel_Writer_Excel2007($this->spreadsheet);
		$tempFilename = tempnam(sfConfig::get('sf_app_cache_dir'), 'export');
		$objWriter->save($tempFilename);

		$response = $this->getResponse();
		$response->setContentType('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		$response->setHttpHeader('Content-Disposition', sprintf('attachment; filename=%s',sprintf('%s_%s_%s.xlsx', CatalyzEmailing::slug($campaign->getName()),CatalyzEmailing::slug($sheetTitle), date('Ymd'))));
		$response->setHttpHeader('Content-Length', filesize($tempFilename));
		$response->sendHttpHeaders();
		readfile($tempFilename);
		unlink($tempFilename);
		return sfView::NONE;
	}

	public function executeExportTargets(sfWebRequest $request)
	{

		$this->forward404Unless($campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$criteria = new Criteria();
		$criteria->setDistinct();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $campaign->getId());
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID, Criteria::LEFT_JOIN);
		$criteria->addAscendingOrderByColumn(ContactPeer::LAST_NAME);
		$results = CampaignContactPeer::doSelectJoinAll($criteria);

		$sheetTitle = sprintf('Details de l\'envoi');

		$this->spreadsheet = new sfPhpExcel();
		$this->spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

		$this->spreadsheet->setActiveSheetIndex(0);
		$this->activeSheet = $this->spreadsheet->getActiveSheet();
		$this->activeSheet->setTitle($sheetTitle);

		$this->activeSheet->setCellValue('A1', 'Nom');
		$this->activeSheet->setCellValue('B1', 'Envoyé le');
		$this->activeSheet->setCellValue('C1', 'Ouvert le');
		$this->activeSheet->setCellValue('D1', 'Click le');
		$this->activeSheet->setCellValue('E1', 'Bounce');

		$row = 2;
		foreach ($results as /*(CampaignContact)*/$CampaignContact){
			$contact = $CampaignContact->getContact();
				$this->activeSheet->setCellValue('A'.$row, $contact->getFullName());
				$this->activeSheet->setCellValue('B'.$row, $CampaignContact->getSentAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getSentAt())):'');
				$this->activeSheet->setCellValue('C'.$row, $CampaignContact->getViewAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getViewAt())):'');
				$this->activeSheet->setCellValue('D'.$row, $CampaignContact->getClickedAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getClickedAt())):'');
				$this->activeSheet->setCellValue('E'.$row, $CampaignContact->getBounceType()!=1?$CampaignContact->getBounceTypeFmt():'');
				$row++;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($this->spreadsheet);
		$tempFilename = tempnam(sfConfig::get('sf_app_cache_dir'), 'export');
		$objWriter->save($tempFilename);

		$response = $this->getResponse();
		$response->setContentType('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		$response->setHttpHeader('Content-Disposition', sprintf('attachment; filename=%s',sprintf('%s_%s_%s.xlsx', CatalyzEmailing::slug($campaign->getName()),CatalyzEmailing::slug($sheetTitle), date('Ymd'))));
		$response->setHttpHeader('Content-Length', filesize($tempFilename));
		$response->sendHttpHeaders();
		readfile($tempFilename);
		unlink($tempFilename);
		return sfView::NONE;
	}

	public function executeExportViews(sfWebRequest $request)
	{

		$this->forward404Unless($campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$criteria = new Criteria();
		$criteria->setDistinct();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $campaign->getId());
		$criteria->add(CampaignContactPeer::VIEW_AT, null, Criteria::ISNOTNULL);
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID, Criteria::LEFT_JOIN);
		$criteria->addDescendingOrderByColumn(CampaignContactPeer::VIEW_AT);
		$results = CampaignContactPeer::doSelectJoinAll($criteria);

		$sheetTitle = sprintf('Details des ouvertures');

		$this->spreadsheet = new sfPhpExcel();
		$this->spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

		$this->spreadsheet->setActiveSheetIndex(0);
		$this->activeSheet = $this->spreadsheet->getActiveSheet();
		$this->activeSheet->setTitle($sheetTitle);

		$this->activeSheet->setCellValue('A1', 'Nom');
		$this->activeSheet->setCellValue('B1', 'Envoyé le');
		$this->activeSheet->setCellValue('C1', 'Ouvert le');
		$this->activeSheet->setCellValue('D1', 'Click le');

		$row = 2;
		foreach ($results as /*(CampaignContact)*/$CampaignContact){
			$contact = $CampaignContact->getContact();
			$this->activeSheet->setCellValue('A'.$row, $contact->getFullName());
			$this->activeSheet->setCellValue('B'.$row, $CampaignContact->getSentAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getSentAt())):'');
			$this->activeSheet->setCellValue('C'.$row, $CampaignContact->getViewAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getViewAt())):'');
			$this->activeSheet->setCellValue('D'.$row, $CampaignContact->getClickedAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getClickedAt())):'');
			$row++;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($this->spreadsheet);
		$tempFilename = tempnam(sfConfig::get('sf_app_cache_dir'), 'export');
		$objWriter->save($tempFilename);

		$response = $this->getResponse();
		$response->setContentType('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		$response->setHttpHeader('Content-Disposition', sprintf('attachment; filename=%s',sprintf('%s_%s_%s.xlsx', CatalyzEmailing::slug($campaign->getName()),CatalyzEmailing::slug($sheetTitle), date('Ymd'))));
		$response->setHttpHeader('Content-Length', filesize($tempFilename));
		$response->sendHttpHeaders();
		readfile($tempFilename);
		unlink($tempFilename);
		return sfView::NONE;
	}
}
