<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Bandeau', 'Haut de page', 'Colonne de gauche', 'Colonne de droite', 'Bas de page');

$formatter->renderField('top_banner');
$formatter->renderField('top_content');
$formatter->renderField('top_include_made_in_france');

$formatter->nextTab();
$formatter->renderField('header_content');
$formatter->renderField('header_include_made_in_france');
$formatter->renderField('articles');

$formatter->nextTab();
$formatter->renderField('left_illustration');
$formatter->renderField('left_title');
$formatter->renderField('left_content');
$formatter->renderField('left_links');

$formatter->nextTab();
$formatter->renderField('right_links');
$formatter->renderField('right_title');
$formatter->renderField('right_content');
$formatter->renderField('right_illustration');
$formatter->renderField('footer');

$formatter->nextTab();
$formatter->renderField('unsubscribe_email');


$formatter->endTabs();
