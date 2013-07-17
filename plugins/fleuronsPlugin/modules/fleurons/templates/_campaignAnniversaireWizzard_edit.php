<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Colonne de gauche', 'Colonne de droite', 'Chèque','Bas de page');
$formatter->renderField('left_content');

$formatter->nextTab();
$formatter->renderField('title');
$formatter->renderField('date');
$formatter->renderField('right_content');

$formatter->nextTab();
$formatter->renderField('promo_title');
$formatter->renderField('amount');
$formatter->renderField('promo_content');
$formatter->renderField('promo_code');
$formatter->renderField('promo_legals');

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
