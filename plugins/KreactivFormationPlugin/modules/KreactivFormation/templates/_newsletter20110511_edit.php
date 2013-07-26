<?php

$formatter = new CatalyzFormFormatter3($form);

//$formatter->renderHeader();
$formatter->startTabs('Contenu éditorial', 'Réalisations');
$formatter->renderField('title');
$formatter->startGroup('Articles');
$formatter->renderField('main_content');
$formatter->endGroup();

$formatter->nextTab();
$formatter->startGroup('Réalisations');
$formatter->renderField('case_study');
$formatter->endGroup();
$formatter->endTabs();
//$formatter->renderFooter();

?>