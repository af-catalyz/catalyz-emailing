<?php $renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);
$renderer->renderHeader1('CCI formation : Invitation');

if (!empty($parameters['number'])) {
	$renderer->renderHeader2(utf8_decode($parameters['number']));
}
if (!empty($parameters['date'])) {
	$renderer->renderHeader2(utf8_decode($parameters['date']));
}
if (!empty($parameters['subtitle'])) {
	$renderer->renderHeader2(utf8_decode($parameters['subtitle']));
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

if (!empty($parameters['news_title'])) {
	$renderer->renderHeader2(utf8_decode($parameters['news_title']));
}

if (!empty($parameters['news_content'])) {
	$renderer->renderContent(utf8_decode($parameters['news_content']));
}

if (!empty($parameters['right_title'])) {
	$renderer->renderHeader2(utf8_decode($parameters['right_title']));
}

if (!empty($parameters['right_content'])) {
	$renderer->renderContent(utf8_decode($parameters['right_content']));
}

if (!empty($parameters['testimony'])) {
	$renderer->renderContent(utf8_decode($parameters['testimony']));
}

if (!empty($parameters['others'])) {
	foreach ($parameters['others'] as $main){
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