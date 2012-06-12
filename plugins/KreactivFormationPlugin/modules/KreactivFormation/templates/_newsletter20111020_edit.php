<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Contenu éditorial', 'Details de l\'invitation');
$formatter->renderField('title');
$formatter->renderField('page_content');

$formatter->nextTab();
$formatter->renderField('date');
$formatter->renderField('hour');
$formatter->renderField('location');
$formatter->renderField('top_content');
$formatter->renderField('contact');
$formatter->renderField('tel');
$formatter->renderField('bottom_content');

$formatter->endTabs();

?>