<?php

class fleuronsCampaignPromoWizzardCampaignTemplateInitializer extends CampaignTemplateInitializer {
  function execute(Campaign $campaign, CampaignTemplate $template)
  {
    $result = array();
    // add your fields initialization here:
    // $result['fieldName'] = 'fieldValue';
    // $result['header_links'] = '';
		$result['header_picture'] = '/fleuronsPlugin/images/campaignPromoWizzard/header.jpg';
		// $result['main_products'] = '';
		// $result['title'] = '';
		// $result['main_content'] = '';
		// $result['secondary_products'] = '';
		// $result['green_content'] = '';
		// $result['mentions_content'] = '';
		// $result['livraison_link'] = '';
		// $result['paiement_link'] = '';
		// $result['point_de_vente_link'] = '';
		// $result['youtube_link'] = '';
  	$result['facebook_link'] = 'http://www.facebook.com/Fleuronsdelomagne';
  	$result['website_caption'] = 'www.fleuronsdelomagne.com';
  	$result['website_link'] = 'http://www.fleuronsdelomagne.com';
  	$result['adresse'] = 'Moissac - Place Roger Delthil (face à la Mairie) - 82 200 Moissac';
  	$result['phone'] = '05.63.95.37.78';
  	$result['contact_caption'] = 'magmoissac@fleuronsdelomagne.com';
  	$result['contact_link'] = 'magmoissac@fleuronsdelomagne.com';
  	$result['footer_content'] = '<p>L\'abus d\'alcool est dangereux pour la santé, consommez avec modération.<br/>Pour votre santé, mangez au moins 5 fruits et légumes par jour. <a target="_blank" style="color:#9f8a8f;" href="http://www.manger-bouger.fr">www.manger-bouger.fr</a><br/></p>';
    $xml = czWidgetFormWizard::asXml($result);
    $campaign->setContent($xml);
  }
}