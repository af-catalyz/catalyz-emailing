<?php $renderer = new CatalyzEmailTextRenderer();
//,,,,,,,,,,bottom_content,,
$parameters = unEscape($parameters);
$renderer->renderHeader1('CCI formation : Calendrier');

if (!empty($parameters['number'])) {
	$renderer->renderHeader2(utf8_decode($parameters['number']));
}
if (!empty($parameters['date'])) {
	$renderer->renderHeader2(utf8_decode($parameters['date']));
}
if (!empty($parameters['subtitle'])) {
	$renderer->renderHeader2(utf8_decode($parameters['subtitle']));
}

if (!empty($parameters['left_title'])) {
	$renderer->renderHeader1(utf8_decode($parameters['left_title']));
}

if (!empty($parameters['left_content'])) {

	foreach ($parameters['left_content'] as $main){
		if (!empty($main['title'])) {
			$renderer->renderHeader2(utf8_decode($main['title']));
		}
		if (!empty($main['introduction'])) {
			$renderer->renderContent(utf8_decode($main['introduction']));
		}
	}
}

if (!empty($parameters['right_title'])) {
	$renderer->renderHeader1(utf8_decode($parameters['right_title']));
}

if (!empty($parameters['right_content'])) {

	foreach ($parameters['right_content'] as $main){
		if (!empty($main['title'])) {
			$renderer->renderHeader2(utf8_decode($main['title']));
		}
		if (!empty($main['introduction'])) {
			$renderer->renderContent(utf8_decode($main['introduction']));
		}
	}
}

if (!empty($parameters['other_articles'])) {

	foreach ($parameters['other_articles'] as $main){
		if (!empty($main['title'])) {
			$renderer->renderHeader2(utf8_decode($main['title']));
		}
		if (!empty($main['introduction'])) {
			$renderer->renderContent(utf8_decode($main['introduction']));
		}
	}
}


if (!empty($parameters['bottom_title'])) {
	$renderer->renderHeader2(utf8_decode($parameters['bottom_title']));
}

if (!empty($parameters['right_content'])) {
	$renderer->renderContent(utf8_decode($parameters['phone']));
}

if (!empty($parameters['phone'])) {
	$renderer->renderContent('Téléphone :'.utf8_decode($parameters['right_content']));
}

if (!empty($parameters['email'])) {
	$renderer->renderContent('Email :'.utf8_decode($parameters['email']));
}

?>