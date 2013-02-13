<?php

class cciFormationCampaign01TemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();
		$result['top_picture'] = '/cciFormationPlugin/images/campaign01/header_emailing.jpg';
		$result['right_picture'] = '/cciFormationPlugin/images/campaign01/formation_img.jpg';
		$result['number'] = '';
		$result['subtitle'] = '';
		$result['news_title'] = 'ACTUALITÉ';

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
