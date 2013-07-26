<?php 

class smti82InvitationCampaignTemplateInitializer extends CampaignTemplateInitializer {
  function execute(Campaign $campaign, CampaignTemplate $template)
  {
    $result = array();
    // add your fields initialization here:
    // $result['fieldName'] = 'fieldValue';
    		// $result['programme'] = '';
		// $result['header_title'] = '';
		// $result['picture'] = '';
		// $result['sup_title'] = '';
		// $result['title'] = '';
		// $result['when'] = '';
		// $result['content'] = '';
		// $result['footer'] = '';
		// $result['unsubscribe_email'] = '';
    $xml = czWidgetFormWizard::asXml($result);
    $campaign->setContent($xml);
  }
}