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

		$choices = array();
		$criteria = new Criteria();
		$criteria->addDescendingOrderByColumn(CampaignPeer::UPDATED_AT);
		$criteria->add(CampaignPeer::STATUS, Campaign::STATUS_SENDING, Criteria::GREATER_EQUAL);

		foreach(CampaignPeer::doSelectJoinAll($criteria) as /*(Campaign)*/$campaign) {
			$choices[$campaign->getId()] = $campaign->getName();
		}

		$widgets['campaigns'] = new sfWidgetFormChoice(array('label'=>false, 'choices' => $choices, 'multiple' => true, 'expanded' => true));
		$validators['campaigns'] = new sfValidatorChoice(array('choices' => array_keys($choices), 'multiple' => true, 'required' => true), array('required' => 'Veuillez choisir au moins une campagne'));

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

	 	$type = $values['type'];

		$criteria = new Criteria();
		$criteria->setDistinct();
		$criteria->add(CampaignContactPeer::CAMPAIGN_ID, $values['campaigns'], Criteria::IN);

		switch($type){
			case self::OPTION_CLICK:
				$criteria->add(CampaignContactPeer::CLICKED_AT, null, Criteria::ISNOTNULL);
				break;
			case self::OPTION_OPEN:
				$criteria->add(CampaignContactPeer::VIEW_AT, null, Criteria::ISNOTNULL);
				break;
			default:
				;
		} // switch

		$criteria->addJoin(CampaignContactPeer::CONTACT_ID, ContactPeer::ID, Criteria::LEFT_JOIN);
		//$criteria->addDescendingOrderByColumn(CampaignContactPeer::VIEW_AT);
		$results = CampaignContactPeer::doSelectJoinAll($criteria);

		$sheetTitle = sprintf('Details des ouvertures');

		$this->spreadsheet = new sfPhpExcel();
		$this->spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

		$this->spreadsheet->setActiveSheetIndex(0);
		$this->activeSheet = $this->spreadsheet->getActiveSheet();
		$this->activeSheet->setTitle($sheetTitle);

		$this->activeSheet->setCellValueExplicit('A1', 'Campagne');
		$this->activeSheet->setCellValueExplicit('B1', 'Nom');
		$this->activeSheet->setCellValueExplicit('C1', 'Envoyé le');
		$this->activeSheet->setCellValueExplicit('D1', 'Ouvert le');

		switch($type){
			case self::OPTION_OPEN:
				break;
			default:
			$this->activeSheet->setCellValueExplicit('E1', 'Click le');
			;
		} // switch

		$row = 2;
		foreach ($results as/*(CampaignContact)*/ $CampaignContact) {
			if ($contact = $CampaignContact->getContact()) {
				$this->activeSheet->setCellValueExplicit('A' . $row, $CampaignContact->getCampaign()->getName());
				$this->activeSheet->setCellValueExplicit('B' . $row, $contact->getFullName());
				$this->activeSheet->setCellValueExplicit('C' . $row, $CampaignContact->getSentAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getSentAt())):'');
				$this->activeSheet->setCellValueExplicit('D' . $row, $CampaignContact->getViewAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getViewAt())):'');

				switch($type){
					case self::OPTION_OPEN:
						break;
					default:
						$this->activeSheet->setCellValueExplicit('E' . $row, $CampaignContact->getClickedAt()?CatalyzDate::formatShort(strtotime($CampaignContact->getClickedAt())):'');
					;
				} // switch
			}

			$row++;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($this->spreadsheet);
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
}