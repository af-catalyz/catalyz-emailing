<?php

class dpiCampaign02WizzardCampaignTemplateInitializer extends CampaignTemplateInitializer {
  function execute(Campaign $campaign, CampaignTemplate $template)
  {
    $result = array();
    // add your fields initialization here:
    // $result['fieldName'] = 'fieldValue';
    // $result['options'] = '';
		// $result['operation_type'] = '';
		// $result['operation_caption'] = '';
		// $result['event_start'] = '';
		// $result['event_end'] = '';
		// $result['main_content'] = '';
		// $result['red_content'] = '';

		 $result['fax'] = '0 820 070 700';
		 $result['website1_caption'] = 'www.doumercpneus.net';
		 $result['website1_link'] = 'http://www.doumercpneus.net';
		 $result['website2_caption'] = 'www.gtradial.fr';
		 $result['website2_link'] = 'http://www.gtradial.fr';

  	$result['phone'] = '0 820 825 177';
  	$result['adress_content'] = "DOUMERC PNEUS INTERNATIONAL - D P I\n43 Impasse DOUMERC - 82700 Montbartier";
  	$result['facebook_link'] = 'http://www.facebook.com/pages/GT-Radial-France/328827503865164';

    $xml = czWidgetFormWizard::asXml($result);
    $campaign->setContent($xml);
  }
}