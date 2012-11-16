<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Colonne de gauche', 'Colonne de droite', 'Bas de page');

$formatter->renderField('edito_picture');
$formatter->renderField('website_link');

$formatter->nextTab();
$formatter->renderField('main_content');

$formatter->nextTab();
$formatter->renderField('right_title');
$formatter->renderField('right_content');

$formatter->nextTab();
$formatter->renderField('footer');

$formatter->endTabs();
?>