<?php $renderer = new CatalyzEmailTextRenderer();

$parameters = $parameters->getRawValue();

$title = 'INVITATION';
if (isset($parameters['title']) && !empty($parameters['title'])) {
	$title.= ' - '.$parameters['title'];
}
$renderer->renderHeader1($title);

$renderer->renderContent(@$parameters['main_content']."\n".@$parameters['case_study']);



?>
