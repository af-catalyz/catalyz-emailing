<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Photos', 'Contenu de la carte', 'Bas de page');
$formatter->renderField('logo');
$formatter->renderField('date');
$formatter->renderField('top_letter_content');

$formatter->nextTab();
$formatter->renderField('picture1');
$formatter->renderField('picture2');
$formatter->renderField('picture3');
$formatter->renderField('picture4');

$formatter->nextTab();
$formatter->renderField('title');

$formatter->renderField('intro_card');

$formatter->startGroup('Evénements');
$formatter->renderField('card');
$formatter->endGroup();


$formatter->nextTab();

$formatter->renderField('signature');
$formatter->renderField('baseline');
$formatter->renderField('website');

$formatter->renderField('fb_page');
$formatter->renderField('adresse');
$formatter->renderField('tel');
$formatter->renderField('email');

// move fields here

$formatter->endTabs();
