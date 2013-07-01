<?php

class be3cCampaign01TemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();
		$result['main_picture'] = '/be3cPlugin/images/campaign01/img_01.jpg';
		$result['inscription_title'] = 'POUR VOUS INSCRIRE :';
		$result['email'] = '<p>Envoyez nous un email de confirmation &agrave;<br /><a href="mailto:be3c@be3c.com" target="_blank">be3c@be3c.com</a>,<br />en pr&eacute;cisant le point technique auquel vous souhaitez participer.</p>';
		$result['phone'] = '<p>Confirmez votre pr&eacute;sence par t&eacute;lephone au<br /><strong>05 63 23 21 00</strong></p>';
		$result['fax'] = '<p>Remplissez le bordereau d&rsquo;inscription PDF et envoyez-le par fax au<br /> <strong>05 63 23 21 01</strong></p>';

		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>