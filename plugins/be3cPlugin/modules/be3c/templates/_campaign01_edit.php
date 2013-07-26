<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Editorial', 'Contenu', 'Autres rendez-vous','Inscriptions');


$formatter->renderField('title');
$formatter->renderField('introduction');

$formatter->nextTab();
$formatter->renderField('main_title');
$formatter->renderField('main_picture');
$formatter->renderField('main_content');
$formatter->renderField('main_line_1');
$formatter->renderField('main_line_2');
//$formatter->renderText('exemple : "M. Jean Pierre"', true);
$formatter->renderField('main_line_3');
//$formatter->renderText('exemple : "10/02/2012"', true);


$formatter->nextTab();

$formatter->renderField('other_content');

$formatter->nextTab();

$formatter->renderField('inscription_title');
$formatter->renderField('email');
$formatter->renderField('phone');
$formatter->renderField('fax');

$formatter->endTabs();
?>