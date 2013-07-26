<?php

class dpiCampaign03WizzardCampaignTemplateInitializer extends CampaignTemplateInitializer {
  function execute(Campaign $campaign, CampaignTemplate $template)
  {
    $result = array();
    // add your fields initialization here:
    // $result['fieldName'] = 'fieldValue';
    		// $result['date'] = '';
		// $result['main_content'] = '';
  	 $result['adress'] = "DOUMERC PNEUS INTERNATIONAL - D P I\n43 Impasse DOUMERC - 82700 Montbartier";
		 $result['phone'] = '0 820 070 700';
		 $result['website_caption'] = 'www.doumercpneus.net';
		 $result['website_link'] = 'http://www.doumercpneus.net';
		 $result['facebook_link'] = 'http://www.facebook.com/pages/GT-Radial-France/328827503865164';
    $xml = czWidgetFormWizard::asXml($result);
    $campaign->setContent($xml);
  }
}