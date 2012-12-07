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

		$this->failed_count = $this->campaign->getAllBouncesCount();

		$this->reactivite = $this->view_count != 0?($this->click_count * 100) / $this->view_count:0;

		$this->taux_ouverture = $this->prepared_target_count != 0?(($this->view_count * 100) / ($this->prepared_target_count-$this->failed_count)):0;
		$this->taux_clicks = $this->prepared_target_count != 0?(($this->click_count * 100) / ($this->prepared_target_count-$this->failed_count)):0;

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

		$pager = new sfPropelPager('CampaignContact', sfConfig::get('app_divers_pagerSize',15));
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

		$pager = new sfPropelPager('CampaignContact', sfConfig::get('app_divers_pagerSize',15));
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


		$title = sprintf('%s - Statistiques / Clics %s', $this->campaign->getName(), sfConfig::get('app_settings_default_suffix'));
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
		$pager = new sfPropelPager('Contact', sfConfig::get('app_divers_pagerSize',15));
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

			$returns[$contact->getId()]['clicks'][strtotime($result->getCreatedAt())] = array('name' => $CampaignLink->getGoogleAnalyticsTerm(), 'url' => $CampaignLink->getUrl(), 'date' => CatalyzDate::formatShortWithTime(strtotime($result->getCreatedAt())));
		}

		$sheetTitle = sprintf('Details des clicks');

		$this->spreadsheet = new sfPhpExcel();
		$this->spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

		$this->spreadsheet->setActiveSheetIndex(0);
		$this->activeSheet = $this->spreadsheet->getActiveSheet();
		$this->activeSheet->setTitle($sheetTitle);

		$this->activeSheet->setCellValueExplicit('A1', 'Nom');
		$this->activeSheet->setCellValueExplicit('B1', 'Nom de l\'url');
		$this->activeSheet->setCellValueExplicit('C1', 'url');
		$this->activeSheet->setCellValueExplicit('D1', 'date');

		$row = 2;
		foreach ($returns as $return){
					$contactName = $return['name'];
			foreach ($return['clicks'] as $clicks){
				$url_name = $clicks['name'];
				$url_path = $clicks['url'];
				$date = $clicks['date'];

				$this->activeSheet->setCellValueExplicit('A'.$row, $contactName);
				$this->activeSheet->setCellValueExplicit('B'.$row, $url_name);
				$this->activeSheet->setCellValueExplicit('C'.$row, $url_path);
				$this->activeSheet->setCellValueExplicit('D'.$row, $date);
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

		$this->activeSheet->setCellValueExplicit('A1', 'Nom');
		$this->activeSheet->setCellValueExplicit('B1', 'Envoyé le');
		$this->activeSheet->setCellValueExplicit('C1', 'Ouvert le');
		$this->activeSheet->setCellValueExplicit('D1', 'Click le');
		$this->activeSheet->setCellValueExplicit('E1', 'Bounce');

		$row = 2;
		foreach ($results as /*(CampaignContact)*/$CampaignContact){
			$contact = $CampaignContact->getContact();
				$this->activeSheet->setCellValueExplicit('A'.$row, $contact->getFullName());
				$this->activeSheet->setCellValueExplicit('B'.$row, $CampaignContact->getSentAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getSentAt())):'');
				$this->activeSheet->setCellValueExplicit('C'.$row, $CampaignContact->getViewAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getViewAt())):'');
				$this->activeSheet->setCellValueExplicit('D'.$row, $CampaignContact->getClickedAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getClickedAt())):'');
				$this->activeSheet->setCellValueExplicit('E'.$row, $CampaignContact->getBounceType()!=1?$CampaignContact->getBounceTypeFmt():'');
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

		$this->activeSheet->setCellValueExplicit('A1', 'Nom');
		$this->activeSheet->setCellValueExplicit('B1', 'Envoyé le');
		$this->activeSheet->setCellValueExplicit('C1', 'Ouvert le');
		$this->activeSheet->setCellValueExplicit('D1', 'Click le');

		$row = 2;
		foreach ($results as /*(CampaignContact)*/$CampaignContact){
			$contact = $CampaignContact->getContact();
			$this->activeSheet->setCellValueExplicit('A'.$row, $contact->getFullName());
			$this->activeSheet->setCellValueExplicit('B'.$row, $CampaignContact->getSentAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getSentAt())):'');
			$this->activeSheet->setCellValueExplicit('C'.$row, $CampaignContact->getViewAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getViewAt())):'');
			$this->activeSheet->setCellValueExplicit('D'.$row, $CampaignContact->getClickedAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getClickedAt())):'');
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

	public function executeUnsubscribe(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));
		$this->list_choices = FALSE;

		$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
		$configuration = $czSettings->get(CatalyzSettings::CUSTOM_UNSUBSCRIBED_CONFIGURATION, array());
		if (!empty($configuration['qualif_list_publication'])) {
			$list_publication = unserialize($configuration['qualif_list_publication']);
			$this->list_choices = array();
			foreach ($list_publication as $ListId => $list_details){
				$this->list_choices[$ListId] = $list_details['title'];
			}
		}

		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->campaign->getId());
		$criteria->add(CampaignContactPeer::UNSUBSCRIBED_AT, null, Criteria::NOT_EQUAL);
		$criteria->addDescendingOrderByColumn(CampaignContactPeer::UNSUBSCRIBED_AT);

		$pager = new sfPropelPager('CampaignContact', sfConfig::get('app_divers_pagerSize',15));
		$pager->setCriteria($criteria);
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->setPeerMethod('doSelectJoinContact');
		$pager->init();
		$this->pager = $pager;

		return sfView::SUCCESS;
	}

	public function executeExportUnsubscribe(sfWebRequest $request)
	{
		$this->forward404Unless($campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$list_choices = array();
		$czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
		$configuration = $czSettings->get(CatalyzSettings::CUSTOM_UNSUBSCRIBED_CONFIGURATION, array());
		if (!empty($configuration['qualif_list_publication'])) {
			$list_publication = unserialize($configuration['qualif_list_publication']);
			foreach ($list_publication as $ListId => $list_details){
				$list_choices[$ListId] = $list_details['title'];
			}
		}
		$sheetTitle = sprintf('Desinscriptions');

		$this->spreadsheet = new sfPhpExcel();
		$this->spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

		$this->spreadsheet->setActiveSheetIndex(0);
		$this->activeSheet = $this->spreadsheet->getActiveSheet();
		$this->activeSheet->setTitle($sheetTitle);

		$this->activeSheet->setCellValueExplicit('A1', 'Date');
		$this->activeSheet->setCellValueExplicit('B1', 'Nom complet');
		$this->activeSheet->setCellValueExplicit('C1', 'Email');
		$this->activeSheet->setCellValueExplicit('D1', 'Motifs');
		if (!empty($list_choices)) {
			$this->activeSheet->setCellValueExplicit('E1', 'Listes');
		}

		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $campaign->getId());
		$criteria->add(CampaignContactPeer::UNSUBSCRIBED_AT, null, Criteria::NOT_EQUAL);
		$criteria->addDescendingOrderByColumn(CampaignContactPeer::UNSUBSCRIBED_AT);
		$CampaignContacts = CampaignContactPeer::doSelectJoinContact($criteria);


		$row = 2;
		foreach ($CampaignContacts as /*(CampaignContact)*/$CampaignContact){
			$this->activeSheet->setCellValueExplicit('A'.$row, $CampaignContact->getUnsubscribedAt('d/m/Y'));
			$this->activeSheet->setCellValueExplicit('B'.$row, $CampaignContact->getContact()->getFullName());
			$this->activeSheet->setCellValueExplicit('C'.$row, $CampaignContact->getContact()->getEmail());
			$this->activeSheet->setCellValueExplicit('D'.$row, $CampaignContact->getRaison() );

			if (!empty($list_choices)) {
				$selectedLists = unserialize($CampaignContact->getUnsubscribedLists());
				$temp = array();
				foreach ($list_choices as $listId => $caption){
					if (!empty($selectedLists[$listId])) {
						$temp[] = $caption;
					}
				}
				$this->activeSheet->setCellValueExplicit('E'.$row, implode(" | ", $temp) );
			}

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

	public function executeReturnErrors(sfWebRequest $request)
	{
		$this->forward404Unless($this->campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$return = array();
		$this->items = array();

		//region soft and hard bounces
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->campaign->getId());
		$CampaignContacts = CampaignContactPeer::doSelectJoinContact($criteria);

		$ids = array();
		foreach ($CampaignContacts as /*(CampaignContact)*/$CampaignContact){
			$ids[$CampaignContact->getId()] = $CampaignContact->getId();
		}

		$criteria->add(CampaignContactBouncePeer::CAMPAIGN_CONTACT_ID, $ids, Criteria::IN);
		$criteria->setDistinct();
		$criteria->addAscendingOrderByColumn(CampaignContactBouncePeer::BOUNCE_TYPE);
		$bounces = CampaignContactBouncePeer::doSelectJoinCampaignContact($criteria);
		$this->total_soft = 0;
		$this->total_hard = 0;

		foreach ($bounces as /*(CampaignContactBounce)*/$bounce){
			$return[] = $bounce;
			$bounce->getBounceType() == catalyzemailingHandlebouncesTask::BOUNCE_HARD?$this->total_hard++:$this->total_soft++;
		}
		//endregion

		//region erreurs à l'envoi
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $this->campaign->getId());
		$criteria->add(CampaignContactPeer::FAILED_SENT_AT, null, Criteria::NOT_EQUAL);
		$failed =  CampaignContactPeer::doSelect($criteria);

		foreach ($failed as $fail_element){
			$return[] = $fail_element;
		}

		$this->failed_count = count($failed);
		//endregion

		//region Pager
		$this->endPager = 0;
		$pagerSize=sfConfig::get('app_divers_pagerSize',15);
		$this->actual = $request->getParameter('page', 1);
		$view = 'details';
		$this->endPager=ceil(count($return)/$pagerSize);
		$nb=($this->actual-1)*$pagerSize;
		$this->items = array_splice($return,$nb,$pagerSize);
		//endregion

		return sfView::SUCCESS;
	}

	public function executeExportBounces(sfWebRequest $request)
	{

		$this->forward404Unless($campaign =/*(Campaign)*/ CampaignPeer::retrieveBySlug($request->getParameter('slug')));

		$sheetTitle = sprintf('Erreurs durant l\'envoi');

		$this->spreadsheet = new sfPhpExcel();
		$this->spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

		$this->spreadsheet->setActiveSheetIndex(0);
		$this->activeSheet = $this->spreadsheet->getActiveSheet();
		$this->activeSheet->setTitle($sheetTitle);

		$this->activeSheet->setCellValueExplicit('A1', 'Type');
		$this->activeSheet->setCellValueExplicit('B1', 'Email');
		$this->activeSheet->setCellValueExplicit('C1', 'Nom complet');
		$this->activeSheet->setCellValueExplicit('D1', 'Date');

		$row = 2;

		//region soft and hard bounces
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $campaign->getId());
		$CampaignContacts = CampaignContactPeer::doSelectJoinContact($criteria);

		$ids = array();
		foreach ($CampaignContacts as /*(CampaignContact)*/$CampaignContact){
			$ids[$CampaignContact->getId()] = $CampaignContact->getId();
		}

		$criteria->add(CampaignContactBouncePeer::CAMPAIGN_CONTACT_ID, $ids, Criteria::IN);
		$criteria->setDistinct();
		$criteria->addAscendingOrderByColumn(CampaignContactBouncePeer::BOUNCE_TYPE);
		$bounces = CampaignContactBouncePeer::doSelectJoinCampaignContact($criteria);

		foreach ($bounces as /*(CampaignContactBounce)*/$bounce){
			$this->activeSheet->setCellValueExplicit('A'.$row, $bounce->getBounceType() == catalyzemailingHandlebouncesTask::BOUNCE_HARD?'HARD':'SOFT');
			$this->activeSheet->setCellValueExplicit('B'.$row, $bounce->getAddress());
			$this->activeSheet->setCellValueExplicit('C'.$row, $bounce->getCampaignContact()->getContact()->getFullName());
			$this->activeSheet->setCellValueExplicit('D'.$row, $bounce->getArrivedAt('d/m/Y'));
			$row++;
		}
		//endregion

		//region erreurs à l'envoi
		$criteria = new Criteria();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $campaign->getId());
		$criteria->add(CampaignContactPeer::FAILED_SENT_AT, null, Criteria::NOT_EQUAL);
		$failed =  CampaignContactPeer::doSelect($criteria);

		foreach ($failed as $fail_element){
			$this->activeSheet->setCellValueExplicit('A'.$row, 'ERREUR À L\'ENVOI');
			$this->activeSheet->setCellValueExplicit('B'.$row, $fail_element->getContact()->getEmail());
			$this->activeSheet->setCellValueExplicit('C'.$row, $fail_element->getContact()->getFullName());
			$this->activeSheet->setCellValueExplicit('D'.$row, $fail_element->getFailedSentAt('d/m/Y'));
			$row++;
		}
		//endregion

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

	public function executeDisplayBounceDetails(sfWebRequest $request)
	{
		$this->forward404Unless($bounce = /*(CampaignContactBounce)*/ CampaignContactBouncePeer::retrieveByPK($request->getParameter('id')));
		return $this->renderText(sprintf('<div class="well">%s</div>', nl2br($bounce->getMessage())));
	}

}
