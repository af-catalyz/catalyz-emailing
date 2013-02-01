<?php

class sudprojetCampaign01TemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();
		$result['grey_title'] = 'Présentation de Sud Projet';
		$result['adress'] = 'ZA de Lauzard – 1 rue de Vérone';
		$result['email'] = 'contact@sudprojet.com';
		$result['website_adress'] = 'http://www.sudprojet.com';
		$result['zip'] = '82370';
		$result['city'] = 'LABASTIDE SAINT PIERRE';
		$result['phone'] = '05.63.20.02.98';
		$result['fax'] = '05.63.20.03.01';

		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>
