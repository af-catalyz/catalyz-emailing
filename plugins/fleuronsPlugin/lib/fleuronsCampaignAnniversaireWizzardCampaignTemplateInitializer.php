<?php

class fleuronsCampaignAnniversaireWizzardCampaignTemplateInitializer extends CampaignTemplateInitializer {
  function execute(Campaign $campaign, CampaignTemplate $template)
  {
    $result = array();
    // add your fields initialization here:
    // $result['fieldName'] = 'fieldValue';
    $result['left_content'] = '<p><img src="http://www.fleuronsdelomagne-emailing.com/uploads/assets/fleurons.gif" height="85" width="145" /><br /><br />
<br /> <img src="http://www.fleuronsdelomagne-emailing.com/uploads/assets/cake.jpg" height="85" width="145" /> <br /><br /><br />
<img src="http://www.fleuronsdelomagne-emailing.com/uploads/assets/boutiques.gif" height="37" width="161" /> <br /><br /><br />
<img src="http://www.fleuronsdelomagne-emailing.com/uploads/assets/facebook_tracker.jpg" height="107" width="73" /></p>';
		$result['title'] = 'JOYEUX ANNIVERSAIRE';
		// $result['date'] = '';
		// $result['right_content'] = '';
		$result['promo_title'] = 'OFFRE ANNIVERSAIRE';
		// $result['amount'] = '';
		// $result['promo_content'] = '';
		$result['promo_code'] = '/fleuronsPlugin/images/campaignAnniversaireWizzard/code.jpg';
		$result['promo_legals'] = '*Offre non cumulable avec d\'autres offres en cours. Valable 2 mois après la date d\'envoi.';
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