$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

// SubForm: articles
if (!empty($parameters['top_banner'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['top_banner']);
}
if (!empty($parameters['top_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['top_content']);
}
if (!empty($parameters['header_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['header_content']);
}
if (!empty($parameters['header_include_made_in_france'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['header_include_made_in_france']);
}
// SubForm: left_links
if (!empty($parameters['left_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['left_title']);
}
if (!empty($parameters['left_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['left_content']);
}
// SubForm: right_links
if (!empty($parameters['left_illustration'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['left_illustration']);
}
if (!empty($parameters['right_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['right_title']);
}
if (!empty($parameters['right_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['right_content']);
}
if (!empty($parameters['footer'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['footer']);
}
if (!empty($parameters['unsubscribe_email'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['unsubscribe_email']);
}
