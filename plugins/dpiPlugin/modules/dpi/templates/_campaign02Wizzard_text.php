$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

// SubForm: options
if (!empty($parameters['operation_type'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['operation_type']);
}
if (!empty($parameters['operation_caption'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['operation_caption']);
}
if (!empty($parameters['event_start'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['event_start']);
}
if (!empty($parameters['event_end'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['event_end']);
}
if (!empty($parameters['main_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['main_content']);
}
if (!empty($parameters['red_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['red_content']);
}
if (!empty($parameters['phone'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['phone']);
}
if (!empty($parameters['fax'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['fax']);
}
if (!empty($parameters['website1_caption'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['website1_caption']);
}
if (!empty($parameters['website1_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['website1_link']);
}
if (!empty($parameters['website2_caption'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['website2_caption']);
}
if (!empty($parameters['website2_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['website2_link']);
}
if (!empty($parameters['adress_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['adress_content']);
}
if (!empty($parameters['facebook_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['facebook_link']);
}
