<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Illustration', 'Contenu','Conditions du jeu','Bas de page');
$formatter->renderField('title');
$formatter->renderField('top_content');

$formatter->nextTab();
$formatter->renderField('picture');

$formatter->nextTab();
$formatter->renderField('middle_content');
$formatter->renderField('button_link');

$formatter->nextTab();
$formatter->renderField('bottom_content');

$formatter->nextTab();
$formatter->renderField('facebook_link');
$formatter->renderField('website_caption');
$formatter->renderField('website_link');
$formatter->renderField('adresse');
$formatter->renderField('phone');
$formatter->renderField('contact_caption');
$formatter->renderField('contact_link');
$formatter->renderField('footer_content');

$formatter->endTabs();
