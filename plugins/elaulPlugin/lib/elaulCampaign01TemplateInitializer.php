<?php

class elaulCampaign01TemplateInitializer extends CampaignTemplateInitializer {
	function execute(Campaign $campaign, CampaignTemplate $template)
	{
		$result = array();
		$result['baseline'] = "L'ECLAIRAGE - LE BALISAGE\nET L'ENERGIE SECOURUE A VOS MESURES";
		$result['legals_top'] = '<p>Si les images ne s\'affichent pas correctement, <a href="#VIEW_ONLINE#" target="_blank">cliquez ici</a></p>';
		$result['legals_bottom'] = '<p>Conform&eacute;ment &agrave; la loi Informatique et Libert&eacute;s du 06/01/1978, vous disposez d\'un droit d\'acc&egrave;s, de rectification et d\'opposition aux informations vous concernant qui peut s\'exercer par e-mail &agrave; <a href="mailto:contact@elaul.fr" target="_blank">contact@elaul.fr</a> ou en cliquant sur ce <a href="#UNSUBSCRIBE#" target="_blank">lien de d&eacute;sinscription</a>.</p>';
		$result['atouts_title'] = 'Nos atouts';
		$result['references_title'] = 'Références';
		$result['lien_1_title'] = 'ÉCLAIRAGE ET BALISAGE';
		$result['lien_1_link'] = '#';
		$result['lien_2_title'] = 'ENERGIE SECOURUE';
		$result['lien_2_link'] = '#';
		$result['lien_3_title'] = 'MATÉRIEL ATEX ';
		$result['lien_3_link'] = '#';
		$result['footer'] = '<p><strong>ELAUL<br />L\'&#233;clairage, le balisage & l\'&#233;nergie secourue &#224; vos mesures</strong><br /><br />Elaul scop - Z.I. Nord - Rue Joseph Cugnot - BP 832 - 82008 Montauban Cedex - France<br />T&#233;l : +33 (0)5 63 22 21 21 - Fax : +33 (0)5 63 22 21 22 - <a href="mailto:contact@elaul.fr" target="_blank">contact@elaul.fr</a><br /></p>';
		$result['catalog_title'] = "Consultez\nle catalogue complet";
		$result['catalog_link'] = "#";
		$result['question_box'] = '<p>Une question ?<br />Contactez-nous au<br />05 63 22 21 21<br /><a style="color:#ff8700;" href="mailto:contact@elaul.fr" target="_blank">contact@elaul.fr</a></p>';

		$xml = czWidgetFormWizard::asXml($result);
		$campaign->setContent($xml);
	}
}

?>