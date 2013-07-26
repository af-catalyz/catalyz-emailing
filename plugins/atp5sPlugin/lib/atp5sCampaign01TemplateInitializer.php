<?php

class atp5sCampaign01TemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();


		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>