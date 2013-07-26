<?php

class cciFormationCalendrierTemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{

		$result = array();
		$result['top_picture'] = '/cciFormationPlugin/images/calendrier/header_calendrier.jpg';
		$result['number'] = '';
		$result['subtitle'] = '';
		$result['download_title'] = '';
		$result['download_text'] = '';
		$result['download_picture'] = '';
		$result['bottom_title'] = 'Une question ?';
		$result['bottom_content'] = 'Contactez Marie Henri,
votre conseillère formation';
		$result['email'] = 'ccif@montauban.cci.fr';
		$result['phone'] = '05 63 21 71 00';


		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>
