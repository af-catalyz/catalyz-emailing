<?php

class astiaNewsletter2012TemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();
		$result['zone_actu_title'] = 'ACTUALITÉS EN SANTÉ-TRAVAIL';
		$result['zone_annexe_title'] = 'RUBRIQUE POUR L\'ANNEXE';
		$result['zone_experiences_title'] = 'RETOUR D\'EXPÉRIENCES';
		$result['footer_title'] = 'ASTIA - Association de Santé au Travail Interentreprises et de l\'Artisanat';
		$result['adress'] = '9, rue du Dr Delherm  -  31300 Toulouse';
		$result['phone'] = '05 62 13 15 51';
		$result['fax'] = '05 61 59 48 77';
		$result['email'] = 'info@astia.fr';

		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>