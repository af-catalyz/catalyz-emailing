<?php

class dpiCampaign01WizzardCampaignTemplateInitializer extends CampaignTemplateInitializer {
  function execute(Campaign $campaign, CampaignTemplate $template)
  {
    $result = array();
    // add your fields initialization here:
    // $result['fieldName'] = 'fieldValue';

    // $result['main_articles'] = '';
		// $result['number'] = '';
		// $result['month'] = '';
		 $result['details'] = 'mensuel';
		// $result['revue_articles'] = '';
		// $result['evenements'] = '';
		 $result['evenements_title'] = 'ÉVÉNEMENTS À VENIR';
		// $result['nouveautes'] = '';
		 $result['nouveaute_title'] = 'NOUVEAUTÉ SUPPORT';
		// $result['talks'] = '';
		 $result['talk_title'] = 'ILS EN PARLENT ';
		 $result['phone'] = '0 820 070 700';
		 $result['website_caption'] = 'www.doumercpneus.net';
		 $result['website_link'] = 'http://www.doumercpneus.net';
		 $result['adress_content'] = "DOUMERC PNEUS INTERNATIONAL - D P I\n43 Impasse DOUMERC - 82700 Montbartier";
		 $result['facebook_link'] = 'http://www.facebook.com/pages/GT-Radial-France/328827503865164';
    $xml = czWidgetFormWizard::asXml($result);
    $campaign->setContent($xml);
  }
}