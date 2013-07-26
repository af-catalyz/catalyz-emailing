<?php

class SemAutomationCampaignTemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();
		$result['bottom_left'] = '<p>Pour en savoir davantage sur nos centres de découpe jet d\'eau : </p><ul><li>contactez-nous :<br />05 63 65 09 09</li><li>visitez notre site internet</li></ul>';
		$result['bottom_center'] = 'Sem-O-Jet est le <b>distributeur exclusif</b> des machines Omax et Maxiem, leader mondial dans la conception-réalisation de systèmes d\'usinage à jet d\'eau de très haute précision';

		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>