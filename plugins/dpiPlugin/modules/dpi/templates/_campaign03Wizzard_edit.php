<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Contenu', 'Bas de page');
$formatter->renderField('date');
$formatter->renderField('main_content');

$formatter->nextTab();

$formatter->renderField('adress');
$formatter->renderField('phone');
$formatter->renderGroup('Site internet', array('website_caption','website_link'));
$formatter->renderField('facebook_link');

$formatter->endTabs();
