$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

// SubForm: header_links
if (!empty($parameters['header_picture'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['header_picture']);
}
// SubForm: main_products
if (!empty($parameters['title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['title']);
}
if (!empty($parameters['main_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['main_content']);
}
// SubForm: secondary_products
if (!empty($parameters['green_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['green_content']);
}
if (!empty($parameters['mentions_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['mentions_content']);
}
if (!empty($parameters['livraison_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['livraison_link']);
}
if (!empty($parameters['paiement_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['paiement_link']);
}
if (!empty($parameters['point_de_vente_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['point_de_vente_link']);
}
if (!empty($parameters['youtube_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['youtube_link']);
}
if (!empty($parameters['facebook_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['facebook_link']);
}
if (!empty($parameters['website_caption'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['website_caption']);
}
if (!empty($parameters['website_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['website_link']);
}
if (!empty($parameters['adresse'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['adresse']);
}
if (!empty($parameters['phone'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['phone']);
}
if (!empty($parameters['contact_caption'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['contact_caption']);
}
if (!empty($parameters['contact_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['contact_link']);
}
if (!empty($parameters['footer_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['footer_content']);
}
