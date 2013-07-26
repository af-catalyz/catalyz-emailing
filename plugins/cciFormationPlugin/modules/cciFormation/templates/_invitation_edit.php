<?php
$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page','Colonne de gauche','Colonne de droite','Découvrez aussi', 'Bas de page');

$formatter->renderField('number');
$formatter->renderField('date');
$formatter->renderField('top_picture');
$formatter->renderField('subtitle');

$formatter->nextTab();
$formatter->renderField('left_title');
$formatter->renderField('left_content');


$formatter->nextTab();
$formatter->renderField('right_title');
$formatter->renderField('right_content');
$formatter->renderField('right_target');

$formatter->nextTab();
$formatter->renderField('others_title');
$formatter->renderField('others');

$formatter->nextTab();
$formatter->renderField('bottom_title');
$formatter->renderField('bottom_content');
$formatter->renderField('phone');
$formatter->renderField('email');


$formatter->endTabs();
?>