<?php

class SemAutomationCampaign02TemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();
		$result['titre'] = 'INVITATION';
		$result['contact_text'] = 'Pour plus d\'information, contactez nous : 05 63 65 09 09';

		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>