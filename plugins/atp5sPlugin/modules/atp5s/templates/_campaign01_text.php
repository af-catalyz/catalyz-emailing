<?php $renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);
$renderer->renderHeader1('Newsletter ATP5S');

if (!empty($parameters['edito_title'])) {
	$renderer->renderHeader2($parameters ['edito_title']);
}
if (!empty($parameters['edito'])) {
	$renderer->renderContent($parameters ['edito']);
}

if (!empty($parameters['left_column'])) {
	$renderer->renderContent($parameters['left_column']);
}

if (!empty($parameters['right_column'])) {
	$renderer->renderContent($parameters['left_column']);
}

if (!empty($parameters['custom'])) {
	$renderer->renderContent($parameters['custom']);
}

if (!empty($parameters['blue_content'])) {
	$renderer->renderContent($parameters['blue_content']);
}


?>