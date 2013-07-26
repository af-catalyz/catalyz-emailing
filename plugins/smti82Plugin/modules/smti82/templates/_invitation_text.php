$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

// SubForm: programme
if (!empty($parameters['header_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['header_title']);
}
if (!empty($parameters['picture'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['picture']);
}
if (!empty($parameters['sup_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['sup_title']);
}
if (!empty($parameters['title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['title']);
}
if (!empty($parameters['when'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['when']);
}
if (!empty($parameters['content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['content']);
}
if (!empty($parameters['footer'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['footer']);
}
if (!empty($parameters['unsubscribe_email'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['unsubscribe_email']);
}
