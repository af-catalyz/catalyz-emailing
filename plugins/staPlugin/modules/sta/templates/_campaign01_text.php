<?php $renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

$renderer->renderHeader1('Newsletter STA');

if (!empty($parameters['main_content'])) {
	foreach ($parameters['main_content'] as $content){
		$renderer->renderContent($content['content']);
	}
}


if (!empty($parameters['right_title'])) {
	$renderer->renderHeader2($parameters['right_title']);
}

if (!empty($parameters['right_content'])) {
	foreach ($parameters['right_content'] as $content){
		if (!empty($content['title'])) {
			$renderer->renderContent($content['title']);
		}
		if (!empty($content['link'])) {
			$renderer->renderContent($content['link']);
		}
		echo "\n";
	}
}

if (!empty($parameters['footer'])) {
	$renderer->renderHeader2('Contactez nous :');
	$renderer->renderContent($parameters['footer']);
}


?>