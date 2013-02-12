<?php $renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);
$renderer->renderHeader1('Newsletter Newtech');

if (!empty($parameters['edito'])) {
	$renderer->renderContent($parameters ['edito']);
}

if (!empty($parameters['website_link'])) {
	$renderer->renderContent($parameters['website_link']);
}

$renderer->renderContent('<br/>', false);

if (!empty($parameters['offers_link']) && $parameters['offers_link']!= '') {
	$renderer->renderContent(sprintf('Pour découvrir nos nouvelles offres sans tarder :<br/>%s<br/>',$parameters ['offers_link']));
}

if (!empty($parameters['contact_link']) && $parameters['contact_link']!= '') {
	$renderer->renderContent(sprintf('Pour être contacté :<br/>%s<br/>',$parameters ['contact_link']));
}

if (!empty($parameters['phone'])) {
	if (!empty($parameters['offers_link']) || !empty($parameters['contact_link'])) {
		$renderer->renderContent(sprintf('Sinon, vous pouvez nous joindre au %s<br/>',$parameters ['phone']));
	}else{
		$renderer->renderContent(sprintf('Vous pouvez nous joindre au %s<br/>',$parameters ['phone']));
	}
}

if (!empty($parameters['footer'])) {
	$renderer->renderContent($parameters ['footer']);
}

if (!empty($parameters['thanks'])) {
	$renderer->renderContent($parameters ['thanks']);
}

?>