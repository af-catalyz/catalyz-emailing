<?php $renderer = new CatalyzEmailTextRenderer();

$parameters = unEscape($parameters);

$title = 'INVITATION';
if (isset($parameters['title']) && !empty($parameters['title'])) {
	$title.= ' - '.$parameters['title'];
}
$renderer->renderHeader1($title);

$renderer->renderContent(@$parameters['main_content']."\n".@$parameters['case_study']);



?>
