<?php $renderer = new CatalyzEmailTextRenderer();

$title = 'INVITATION';
if (isset($parameters['baseline']) && !empty($parameters['baseline'])) {



	$title.= ' - '.$parameters['baseline'];
}
$renderer->renderHeader1($title);

$renderer->renderContent(@$parameters['top_content']."\n".@$parameters['bottom_content']);



?>
