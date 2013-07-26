<?php

class comparexAutodeskCampaignTemplateInitializer extends CampaignTemplateInitializer {
  function execute(Campaign $campaign, CampaignTemplate $template)
  {
    $result = array();
    // add your fields initialization here:
    // $result['fieldName'] = 'fieldValue';

    // $result['edito'] = '';
		// $result['video_link'] = '';
		// $result['title'] = '';
		// $result['left_top_picture'] = '';
		// $result['left_top_content'] = '';
		// $result['left_bottom_content'] = '';
		// $result['right_top_picture'] = '';
		// $result['right_bottom_content'] = '';
		// $result['bottom_content'] = '';
  	$result['contact'] = 'COMPAREX France S.A.S.
48 rue Camille Desmoulins, CS 20001 - 92791 Issy-les-Moulineaux Cedex 9
T&eacute;l. : +33 1 55 95 69 00 &bull; Fax : +33 1 55 95 69 49';
		$result['email'] = 'info@comparex.fr';
		$result['website'] = 'http://www.comparex.fr';
    $xml = czWidgetFormWizard::asXml($result);
    $campaign->setContent($xml);
  }
}