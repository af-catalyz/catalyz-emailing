<?php

class staCampaign01TemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();
		$result['footer'] = 'SOCIÉTÉ TOULOUSAINE D\'ASSURANCES - 18 Rue Tolosane - B.P 50304 - 31003 TOULOUSE Cedex 6
Téléphone : 05 34 31 71 91 - Fax : 05 34 31 71 90';


		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>