<?php 

class smti82InterneCampaignTemplateInitializer extends CampaignTemplateInitializer {
  function execute(Campaign $campaign, CampaignTemplate $template)
  {
    $result = array();
    // add your fields initialization here:
    // $result['fieldName'] = 'fieldValue';
    		// $result['actus'] = '';
		// $result['email_title'] = '';
		// $result['edition'] = '';
		// $result['news_title'] = '';
		// $result['dates'] = '';
		// $result['events_title'] = '';
		// $result['lu'] = '';
		// $result['content_title'] = '';
		// $result['library_content'] = '';
		// $result['lu_title'] = '';
		// $result['formation'] = '';
		// $result['formations'] = '';
		// $result['intro_formation'] = '';
		// $result['bottom_actu'] = '';
		// $result['logos_formations'] = '';
		// $result['actu'] = '';
		// $result['footer'] = '';
		// $result['unsubscribe_email'] = '';
    $xml = czWidgetFormWizard::asXml($result);
    $campaign->setContent($xml);
  }
}