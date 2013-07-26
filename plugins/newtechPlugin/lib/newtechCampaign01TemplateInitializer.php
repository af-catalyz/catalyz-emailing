<?php

class newtechCampaign01TemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();
		$result['edito'] = '<p>Opérateur télécom et spécialiste des solutions pour la relation client<br />est heureux de vous annoncer <strong>le lancement de son nouveau site</strong>.</p>';
		$result['website_link'] = 'http://www.newtech.fr';
		$result['offers_link'] = 'http://www.newtech.fr';
		$result['contact_link'] = 'http://www.newtech.fr/fr/contacter-newtech';
		$result['phone'] = '0811 34 34 34';
		$result['footer'] = '<p>L\'équipe de <strong>Newtech</strong>. vous souhaite de bonnes vacances et <strong>vous donne rendez-vous à la rentrée</strong>.</p>';
		$result['thanks'] = '<p>À bientôt.</p>';

		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>