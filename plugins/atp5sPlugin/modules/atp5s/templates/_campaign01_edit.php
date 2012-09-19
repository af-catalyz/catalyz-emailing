<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Colonne de gauche', 'Colonne de droite', 'Contenu libre', 'Bas de page');

$formatter->renderField('picture');
$formatter->renderField('edito_title');
$formatter->renderField('edito');

$formatter->nextTab();
$formatter->renderField('left_column');

$formatter->nextTab();
$formatter->renderField('right_column');

$formatter->nextTab();
$formatter->renderField('custom');

$formatter->nextTab();
$formatter->renderField('blue_content');


$formatter->endTabs();
?>