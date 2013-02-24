<?php
$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Colonne de gauche','Colonne de droite', 'Bas de page');

$formatter->renderField('title');
$formatter->renderField('date');
$formatter->renderField('picture');
$formatter->renderField('content');

$formatter->nextTab();
$formatter->renderGroup('Programme', array('programme'));
$formatter->renderGroup('Articles', array('articles'));

$formatter->nextTab();
$formatter->renderField('adress');
$formatter->renderField('zip');
$formatter->renderField('city');
$formatter->renderField('phone');
$formatter->renderField('fax');
$formatter->renderField('email');
$formatter->renderField('website_adress');

$formatter->endTabs();
?>