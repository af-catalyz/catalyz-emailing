$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

// SubForm: card
if (!empty($parameters['logo'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['logo']);
}
if (!empty($parameters['date'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['date']);
}
if (!empty($parameters['top_letter_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['top_letter_content']);
}
if (!empty($parameters['picture1'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['picture1']);
}
if (!empty($parameters['picture2'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['picture2']);
}
if (!empty($parameters['picture3'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['picture3']);
}
if (!empty($parameters['picture4'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['picture4']);
}
if (!empty($parameters['title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['title']);
}
if (!empty($parameters['intro_card'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['intro_card']);
}
if (!empty($parameters['signature'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['signature']);
}
if (!empty($parameters['baseline'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['baseline']);
}
if (!empty($parameters['fb_page'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['fb_page']);
}
if (!empty($parameters['website'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['website']);
}
if (!empty($parameters['adresse'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['adresse']);
}
if (!empty($parameters['tel'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['tel']);
}
if (!empty($parameters['email'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['email']);
}
