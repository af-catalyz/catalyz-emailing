<?php 

class fleuronsInvitationCampaignTemplateInitializer extends CampaignTemplateInitializer {
  function execute(Campaign $campaign, CampaignTemplate $template)
  {
    $result = array();
    // add your fields initialization here:
    // $result['fieldName'] = 'fieldValue';
    		// $result['card'] = '';
		// $result['logo'] = '';
		// $result['date'] = '';
		// $result['top_letter_content'] = '';
		// $result['picture1'] = '';
		// $result['picture2'] = '';
		// $result['picture3'] = '';
		// $result['picture4'] = '';
		// $result['title'] = '';
		// $result['intro_card'] = '';
		// $result['signature'] = '';
		// $result['baseline'] = '';
		// $result['fb_page'] = '';
		// $result['website'] = '';
		// $result['adresse'] = '';
		// $result['tel'] = '';
		// $result['email'] = '';
    $xml = czWidgetFormWizard::asXml($result);
    $campaign->setContent($xml);
  }
}