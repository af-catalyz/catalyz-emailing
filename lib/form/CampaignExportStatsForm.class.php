<?php

class CampaignExportStatsForm extends sfForm {
	const OPTION_ALL = 1;
	const OPTION_OPEN = 2;
	const OPTION_CLICK = 3;

	public function setup()
	{
		$widgets = array();
		$validators = array();
		$defaults = array();

		$c = new Criteria();
		$c->add(CampaignPeer::STATUS, Campaign::STATUS_COMPLETED, Criteria::EQUAL);
		$c->addDescendingOrderByColumn(CampaignPeer::SCHEDULED_AT);
		$campaigns = CampaignPeer::doSelect($c);
		$choices = array();
		foreach ($campaigns as $campaign){
			$choices[$campaign->getId()] = $campaign->getName();
		}
		$widgets['campaigns'] = new sfWidgetFormChoice(array('label'=>false, 'choices' => $choices, 'multiple' => true, 'expanded' => true));
		$validators['campaigns'] = new sfValidatorChoice(array('choices' => array_keys($choices), 'multiple' => true), array('required' => 'Veuillez choisir au moins une campagne.'));

		$choices = array();
		$choices[self::OPTION_ALL] = "Vue d'ensemble";
		$choices[self::OPTION_OPEN] = 'Liste des contacts ayant ouvert les campagnes';
		$choices[self::OPTION_CLICK] = 'Liste des contacts ayant clickés dans les campagnes';

		$widgets['type'] = new sfWidgetFormChoice(array('label'=>false, 'choices' => $choices, 'multiple' => false, 'expanded' => false));
		$validators['type'] = new sfValidatorChoice(array('choices' => array_keys($choices), 'multiple' => false));

		$this->setWidgets($widgets);
		$this->setDefaults($defaults);
		$this->setValidators($validators);
		$this->widgetSchema->setNameFormat('campaign_export[%s]');
		$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

		parent::setup();
	}

	public function doExport()
	{
		$values = $this->getValues();

		switch($values['type']){
			case self::OPTION_CLICK:
				$spreadsheet = self::getExportClicksSheet($values['campaigns']);
				break;
			case self::OPTION_OPEN:
				$spreadsheet = self::getExportOpenSheet($values['campaigns']);
				break;
			default:
				$spreadsheet = self::getExportTargetSheet($values['campaigns']);
		} // switch

		$objWriter = new PHPExcel_Writer_Excel2007($spreadsheet);
		$tempFilename = tempnam(sfConfig::get('sf_app_cache_dir'), 'export');
		$objWriter->save($tempFilename);

		$response = sfContext::getInstance()->getResponse();
		$response->setContentType('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		$response->setHttpHeader('Content-Disposition', sprintf('attachment; filename=%s', sprintf('%s_%s.xlsx', 'export', date('Ymd'))));
		$response->setHttpHeader('Content-Length', filesize($tempFilename));
		$response->sendHttpHeaders();
		readfile($tempFilename);
		unlink($tempFilename);

		return sfView::NONE;
	}

	public static function getSelectableCampaigns()
	{
		$c = new Criteria();
		$c->add(CampaignPeer::STATUS, Campaign::STATUS_COMPLETED, Criteria::EQUAL);
		$c->addDescendingOrderByColumn(CampaignPeer::SCHEDULED_AT);
		$campaigns = CampaignPeer::doSelect($c);

		$active = array();
		$archived = array();

		foreach ($campaigns as/*(Campaign)*/ $campaign) {
			if (!$campaign->getIsArchived()) {
				$active[strtotime($campaign->getCreatedAt())] = $campaign;
			}else {
				$archived[date('Y-m', strtotime($campaign->getCreatedAt()))][] = $campaign;
			}
		}

		krsort($archived);
		krsort($active);

		return array('active' => $active, 'archived' => $archived);
	}

	public static function getExportTargetSheet($campaigns){
		$criteria = new Criteria();
		$criteria->setDistinct();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $campaigns, Criteria::IN);
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID, Criteria::LEFT_JOIN);
		$criteria->addAscendingOrderByColumn(ContactPeer::LAST_NAME);
		$results = CampaignContactPeer::doSelectJoinAll($criteria);

		$return = array();
		foreach ($results as /*(CampaignContact)*/$result){
			$return[$result->getCampaign()->getId()][] = $result;
		}
		ksort($return);

		$sheetTitle = sprintf('Details de l\'envoi');

		$spreadsheet = new sfPhpExcel();
		$spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

		$spreadsheet->setActiveSheetIndex(0);
		$activeSheet = $spreadsheet->getActiveSheet();
		$activeSheet->setTitle($sheetTitle);

		$activeSheet->setCellValueExplicit('A1', 'Campagne');
		$activeSheet->setCellValueExplicit('B1', 'Nom');
		$activeSheet->setCellValueExplicit('C1', 'Envoyé le');
		$activeSheet->setCellValueExplicit('D1', 'Ouvert le');
		$activeSheet->setCellValueExplicit('E1', 'Click le');
		$activeSheet->setCellValueExplicit('F1', 'Bounce');

		$row = 2;
		foreach ($return as/*(CampaignContact)*/ $campaignId => $CampaignContacts) {
			foreach ($CampaignContacts as/*(CampaignContact)*/ $CampaignContact) {
				if ($contact = $CampaignContact->getContact()) {
					$activeSheet->setCellValueExplicit('A' . $row, $CampaignContact->getCampaign()->getName());
					$activeSheet->setCellValueExplicit('B' . $row, $contact->getFullName());
					$activeSheet->setCellValueExplicit('C' . $row, $CampaignContact->getSentAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getSentAt())):'');
					$activeSheet->setCellValueExplicit('F' . $row, $CampaignContact->getViewAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getViewAt())):'');
					$activeSheet->setCellValueExplicit('E' . $row, $CampaignContact->getClickedAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getClickedAt())):'');
					$activeSheet->setCellValueExplicit('F' . $row, $CampaignContact->getBounceType() != 1?$CampaignContact->getBounceTypeFmt():'');
					$row++;
				}
			}
		}

		return $spreadsheet;
	}

	public static function getExportOpenSheet($campaigns){
		$criteria = new Criteria();
		$criteria->setDistinct();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $campaigns, Criteria::IN);
		$criteria->add(CampaignContactPeer::VIEW_AT, null, Criteria::ISNOTNULL);
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID, Criteria::LEFT_JOIN);
		$criteria->addDescendingOrderByColumn(CampaignContactPeer::VIEW_AT);
		$results = CampaignContactPeer::doSelectJoinAll($criteria);

		$return = array();
		foreach ($results as /*(CampaignContact)*/$result){
			$return[$result->getCampaign()->getId()][] = $result;
		}
		ksort($return);

		$sheetTitle = sprintf('Details des ouvertures');

		$spreadsheet = new sfPhpExcel();
		$spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

		$spreadsheet->setActiveSheetIndex(0);
		$activeSheet = $spreadsheet->getActiveSheet();
		$activeSheet->setTitle($sheetTitle);

		$activeSheet->setCellValueExplicit('A1', 'Campagne');
		$activeSheet->setCellValueExplicit('B1', 'Nom');
		$activeSheet->setCellValueExplicit('C1', 'Envoyé le');
		$activeSheet->setCellValueExplicit('D1', 'Ouvert le');
		$activeSheet->setCellValueExplicit('E1', 'Click le');

		$row = 2;
		foreach ($return as/*(CampaignContact)*/ $campaignId => $CampaignContacts) {
			foreach ($CampaignContacts as/*(CampaignContact)*/ $CampaignContact) {
				if ($contact = $CampaignContact->getContact()) {
				$activeSheet->setCellValueExplicit('A' . $row, $CampaignContact->getCampaign()->getName());
				$activeSheet->setCellValueExplicit('B' . $row, $contact->getFullName());
				$activeSheet->setCellValueExplicit('C' . $row, $CampaignContact->getSentAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getSentAt())):'');
				$activeSheet->setCellValueExplicit('D' . $row, $CampaignContact->getViewAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getViewAt())):'');
				$activeSheet->setCellValueExplicit('E' . $row, $CampaignContact->getClickedAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getClickedAt())):'');
				$row++;
				}
			}
		}

		return $spreadsheet;
	}

	public static function getExportClicksSheet($campaigns){
		$criteria = new Criteria();
		$criteria->add(CampaignLinkPeer::CAMPAIGN_ID, $campaigns, Criteria::IN);
		$criteria->addJoin(CampaignLinkPeer::ID, CampaignClickPeer::CAMPAIGN_LINK_ID);
		$criteria->addJoin(CampaignClickPeer::CAMPAIGN_CONTACT_ID, CampaignContactPeer::ID);
		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID);

		$criteria->addAscendingOrderByColumn(CampaignLinkPeer::CREATED_AT);
		$results = CampaignClickPeer::doSelectJoinAll($criteria);

		$returns = array();
		foreach ($results as/*(CampaignClick)*/ $result) {
			$CampaignLink =/*(CampaignLink)*/ $result->getCampaignLink();
			$Campaign =/*(Campaign)*/ $CampaignLink->getCampaign();
			$contact = $result->getCampaignContact()->getContact();

			if (empty($returns[$Campaign->getId()][$result->getCampaignContact()->getContact()->getId()])) {
				$returns[$Campaign->getId()][$contact->getId()] = array('name' => $contact->getFullName(), 'clicks' => array());
			}

			$returns[$Campaign->getId()][$contact->getId()]['clicks'][strtotime($result->getCreatedAt())] = array('campaign' =>$CampaignLink->getCampaign()->getName() ,'name' => $CampaignLink->getGoogleAnalyticsTerm(), 'url' => $CampaignLink->getUrl(), 'date' => CatalyzDate::formatShortWithTime(strtotime($result->getCreatedAt())));
		}

		ksort($returns);

		$sheetTitle = sprintf('Details des clicks');

		$spreadsheet = new sfPhpExcel();
		$spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

		$spreadsheet->setActiveSheetIndex(0);
		$activeSheet = $spreadsheet->getActiveSheet();
		$activeSheet->setTitle($sheetTitle);

		$activeSheet->setCellValueExplicit('A1', 'Campagne');
		$activeSheet->setCellValueExplicit('B1', 'Nom');
		$activeSheet->setCellValueExplicit('C1', 'Nom de l\'url');
		$activeSheet->setCellValueExplicit('D1', 'Url');
		$activeSheet->setCellValueExplicit('E1', 'Date');

		$row = 2;
		foreach ($returns as $campaignID => $return_details) {
			foreach ($return_details as $return) {
				$contactName = $return['name'];
				foreach ($return['clicks'] as $clicks) {

					$url_name = $clicks['name'];
					$url_path = $clicks['url'];
					$date = $clicks['date'];
					$campaign = $clicks['campaign'];

					$activeSheet->setCellValueExplicit('A' . $row, $campaign);
					$activeSheet->setCellValueExplicit('B' . $row, $contactName);
					$activeSheet->setCellValueExplicit('C' . $row, $url_name);
					$activeSheet->setCellValueExplicit('D' . $row, $url_path);
					$activeSheet->setCellValueExplicit('E' . $row, $date);
					$row++;
				}
			}
		}


		return $spreadsheet;

	}
}