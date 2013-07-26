<?php
$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

// SubForm: main_articles
if (!empty($parameters['number'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['number']);
}
if (!empty($parameters['month'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['month']);
}
if (!empty($parameters['details'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['details']);
}
// SubForm: revue_articles
// SubForm: evenements
if (!empty($parameters['evenements_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['evenements_title']);
}
// SubForm: nouveautes
if (!empty($parameters['nouveaute_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['nouveaute_title']);
}
// SubForm: talks
if (!empty($parameters['talk_title'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['talk_title']);
}
if (!empty($parameters['phone'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['phone']);
}
if (!empty($parameters['website_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['website_link']);
}
if (!empty($parameters['adress_content'])) {
	echo "\n";
	echo $renderer->renderContent($parameters['adress_content']);
}
if (!empty($parameters['facebook_link'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['facebook_link']);
}
