$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

// SubForm: actus
if (!empty($parameters['email_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['email_title']);
}
if (!empty($parameters['edition'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['edition']);
}
if (!empty($parameters['news_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['news_title']);
}
// SubForm: dates
if (!empty($parameters['events_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['events_title']);
}
// SubForm: lu
if (!empty($parameters['content_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['content_title']);
}
if (!empty($parameters['library_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['library_content']);
}
if (!empty($parameters['lu_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['lu_title']);
}
// SubForm: formation
if (!empty($parameters['formations'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['formations']);
}
if (!empty($parameters['intro_formation'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['intro_formation']);
}
// SubForm: bottom_actu
if (!empty($parameters['logos_formations'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['logos_formations']);
}
if (!empty($parameters['actu'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['actu']);
}
if (!empty($parameters['footer'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['footer']);
}
if (!empty($parameters['unsubscribe_email'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['unsubscribe_email']);
}
