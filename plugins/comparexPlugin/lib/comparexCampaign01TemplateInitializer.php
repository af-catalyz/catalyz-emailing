<?php

class comparexCampaign01TemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();
		$result['footer'] = 'COMPAREX France S.A.S.
48 rue Camille Desmoulins, CS 20001 - 92791 Issy-les-Moulineaux Cedex 9
Tél. : +33 1 55 95 69 00 • Fax : +33 1 55 95 69 49';
		$result['footer_email'] = 'info@comparex.fr';
		$result['footer_url'] = 'http://www.comparex.fr';
		$result['video_promo_button'] = '/comparexPlugin/images/campaign01/test.jpg';
		$result['header'] = '/comparexPlugin/images/campaign01/header.jpg';

		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>