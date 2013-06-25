<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Colonne de gauche', 'Colonne de droite', 'Bas de page');

$formatter->renderField('number');
$formatter->renderField('month');
$formatter->renderField('details');

$formatter->nextTab();

$formatter->renderGroup('Articles', array('main_articles'));
$formatter->renderGroup('Revues de presse', array('revue_articles'));
$formatter->nextTab();

$formatter->renderGroup('Événements', array('evenements_title','evenements'));
$formatter->renderGroup('Nouveautés', array('nouveaute_title','nouveautes'));
$formatter->renderGroup('Ils en parlent', array('talk_title','talks'));
$formatter->renderGroup('Bloc "vierge"', array('custom_title','custom_content'));

$formatter->nextTab();

$formatter->renderField('phone');


$formatter->renderGroup('Site internet', array('website_caption','website_link'));
$formatter->renderField('adress_content');
//$formatter->renderField('facebook_link');

$formatter->endTabs();
