$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

if (!empty($parameters['left_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['left_content']);
}
if (!empty($parameters['title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['title']);
}
if (!empty($parameters['date'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['date']);
}
if (!empty($parameters['right_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['right_content']);
}
if (!empty($parameters['promo_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['promo_title']);
}
if (!empty($parameters['amount'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['amount']);
}
if (!empty($parameters['promo_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['promo_content']);
}
if (!empty($parameters['promo_code'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['promo_code']);
}
if (!empty($parameters['promo_legals'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['promo_legals']);
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
