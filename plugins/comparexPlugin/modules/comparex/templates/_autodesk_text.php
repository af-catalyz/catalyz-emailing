$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

if (!empty($parameters['edito'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['edito']);
}
if (!empty($parameters['video_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['video_link']);
}
if (!empty($parameters['title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['title']);
}
if (!empty($parameters['left_top_picture'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['left_top_picture']);
}
if (!empty($parameters['left_top_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['left_top_content']);
}
if (!empty($parameters['left_bottom_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['left_bottom_content']);
}
if (!empty($parameters['right_top_picture'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['right_top_picture']);
}
if (!empty($parameters['right_bottom_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['right_bottom_content']);
}
if (!empty($parameters['bottom_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['bottom_content']);
}
if (!empty($parameters['contact'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['contact']);
}
if (!empty($parameters['email'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['email']);
}
if (!empty($parameters['website'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['website']);
}
