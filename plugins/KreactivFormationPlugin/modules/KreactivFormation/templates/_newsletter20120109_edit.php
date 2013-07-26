<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Bas de page');

$formatter->renderField('baseline');
$formatter->renderField('top_content');

$formatter->nextTab();

$formatter->renderField('bottom_content');

$formatter->endTabs();

?>