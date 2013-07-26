<?php

class cciFormationInvitationTemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{

		$result = array();
		$result['top_picture'] = '/cciFormationPlugin/images/invitation/header_invitation.jpg';
		$result['others_title'] = 'DÉCOUVREZ AUSSI';
		$result['number'] = '';
		$result['subtitle'] = '';

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
