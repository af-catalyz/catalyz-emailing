<?php
$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

if (!empty($parameters['date'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['date']);
}
if (!empty($parameters['main_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['main_content']);
}
if (!empty($parameters['adress'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['adress']);
}
if (!empty($parameters['phone'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['phone']);
}
if (!empty($parameters['website_caption'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['website_caption']);
}
if (!empty($parameters['website_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['website_link']);
}
if (!empty($parameters['facebook_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['facebook_link']);
}
