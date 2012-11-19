<?php $renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

$renderer->renderHeader1('Newsletter STA');

if (!empty($parameters['main_content'])) {
	foreach ($parameters['main_content'] as $content){
		$renderer->renderContent(utf8_decode($content['content']));
	}
}


if (!empty($parameters['right_title'])) {
	$renderer->renderHeader2(utf8_decode($parameters['right_title']));
}

if (!empty($parameters['right_content'])) {
	foreach ($parameters['right_content'] as $content){
		if (!empty($content['title'])) {
			$renderer->renderContent(utf8_decode($content['title']));
		}
		if (!empty($content['link'])) {
			$renderer->renderContent(utf8_decode($content['link']));
		}
		echo "\n";
	}
}

if (!empty($parameters['footer'])) {
	$renderer->renderHeader2('Contactez nous :');
	$renderer->renderContent(utf8_decode($parameters['footer']));
}


?>