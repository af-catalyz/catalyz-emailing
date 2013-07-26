<?php 

class lcfCampaign01CampaignTemplateInitializer extends CampaignTemplateInitializer {
  function execute(Campaign $campaign, CampaignTemplate $template)
  {
    $result = array();
    // add your fields initialization here:
    // $result['fieldName'] = 'fieldValue';
    		// $result['articles'] = '';
		// $result['top_banner'] = '';
		// $result['top_content'] = '';
		// $result['header_content'] = '';
		// $result['header_include_made_in_france'] = '';
		// $result['left_links'] = '';
		// $result['left_title'] = '';
		// $result['left_content'] = '';
		// $result['right_links'] = '';
		// $result['left_illustration'] = '';
		// $result['right_title'] = '';
		// $result['right_content'] = '';
		// $result['footer'] = '';
		// $result['unsubscribe_email'] = '';
    $xml = czWidgetFormWizard::asXml($result);
    $campaign->setContent($xml);
  }
}