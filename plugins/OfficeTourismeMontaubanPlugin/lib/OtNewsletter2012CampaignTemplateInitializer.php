<?php

class OtNewsletter2012CampaignTemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();
		$result['top_picture'] = '/OfficeTourismeMontaubanPlugin/images/newsletter2012/image_01.gif';
		$result['zoom_picture'] = '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_02.gif';
		$result['footer_picture'] = '/OfficeTourismeMontaubanPlugin/images/newsletter2012/img_13.gif';
		$result['contact_content'] = '<p><strong>Office de Tourisme&nbsp;:</strong><br /> 4, rue du coll&egrave;ge - BP 201 -<br /> 82 002 Montauban C&eacute;dex - T&eacute;l. : 05 63 63 60 60<br /> <br /> <strong>Horaires d\'ouverture&nbsp;:</strong> de 9h30 &agrave; 12h30 et de 14h &agrave; 18h30<br /> Juillet / Ao&ucirc;t : de 9h30 &agrave; 18h30 le dimanche de 10h &agrave; 13h<br /> Une question ? Besoin d\'une info pr&eacute;cise ? <a href="mailto:info@montauban-tourisme.com">Contactez-nous</a></p>';

		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>