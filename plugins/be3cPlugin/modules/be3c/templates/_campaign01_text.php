<?php $renderer = new CatalyzEmailTextRenderer();

$parameters = unEscape($parameters);

if (!empty($parameters['title'])) {
	$renderer->renderHeader1($parameters ['title']);
}
if (!empty($parameters['introduction'])) {
	$renderer->renderContent($parameters ['introduction']);
}

if (!empty($parameters['main_title'])) {
	$renderer->renderHeader2($parameters ['main_title']);
}
if (!empty($parameters['main_content'])) {
	$renderer->renderContent($parameters ['main_content']);
}
if (!empty($parameters['main_line_1'])) {
	$renderer->renderContent($parameters ['main_line_1']);
}
if (!empty($parameters['main_line_2'])) {
	$renderer->renderContent('Intervenant : '.$parameters ['main_line_2']);
}
if (!empty($parameters['main_line_3']) && CatalyzDate::getDateFromTab($parameters ['main_line_3'])) {
	$renderer->renderContent('inscription avant le '.CatalyzDate::getDateFromTab($parameters ['main_line_3']));
}

if (!empty($parameters['inscription_title'])) {
	$renderer->renderHeader1($parameters ['inscription_title']);
}

if (!empty($parameters['email'])) {
	$renderer->renderContent($parameters ['email']);
}

if (!empty($parameters['phone'])) {
	$renderer->renderContent($parameters ['phone']);
}
if (!empty($parameters['fax'])) {
	$renderer->renderContent($parameters ['fax']);
}

if (!empty($parameters['other_content'])) {
	if (count($parameters ['other_content'])>0) {

	$renderer->renderHeader1('Les autres rendez-vous :');

		foreach ($parameters ['other_content'] as $other){
			$renderer->renderHeader2($other ['title']);
			if (!empty($other['content'])) {
				$renderer->renderContent($other ['content']);
			}
			if (!empty($other['line_1'])) {
				$renderer->renderContent($other ['line_1']);
			}
			if (!empty($other['line_2'])) {
				$renderer->renderContent('Intervenant : '.$other ['line_2']);
			}
			if (!empty($other['line_3']) && CatalyzDate::getDateFromTab($other ['line_3'])) {
				$renderer->renderContent('inscription avant le '.CatalyzDate::getDateFromTab($other ['line_3']));
			}
		}
	}
}


?>