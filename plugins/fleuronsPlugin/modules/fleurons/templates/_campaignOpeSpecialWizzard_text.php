$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

if (!empty($parameters['title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['title']);
}
if (!empty($parameters['top_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['top_content']);
}
if (!empty($parameters['picture'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['picture']);
}
if (!empty($parameters['middle_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['middle_content']);
}
if (!empty($parameters['button_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['button_link']);
}
if (!empty($parameters['bottom_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['bottom_content']);
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
