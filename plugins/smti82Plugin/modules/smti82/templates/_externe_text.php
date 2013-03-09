$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

// SubForm: edito
if (!empty($parameters['title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['title']);
}
if (!empty($parameters['edition'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['edition']);
}
// SubForm: book
if (!empty($parameters['picture'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['picture']);
}
if (!empty($parameters['main_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['main_title']);
}
if (!empty($parameters['content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['content']);
}
if (!empty($parameters['read_picture'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['read_picture']);
}
if (!empty($parameters['read_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['read_title']);
}
// SubForm: informations
if (!empty($parameters['infos_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['infos_title']);
}
if (!empty($parameters['footer'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['footer']);
}
if (!empty($parameters['fb_page'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['fb_page']);
}
if (!empty($parameters['unsubscribe_email'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['unsubscribe_email']);
}
