<?php

$formatter = new CatalyzFormFormatter3($form);
$formatter->startTabs('Menu du haut', 'Menu', 'Colonne de gauche', 'Colonne de droite', 'Formulaire 1', 'Formulaire 2', 'Bas de page', 'Plan du site');
$formatter->renderField('top_menu');

$formatter->nextTab();
$formatter->renderField('menu');

$formatter->nextTab();
$formatter->startGroup('Boite 1');
$formatter->renderField('box1_title');
$formatter->renderField('box1_content');
$formatter->endGroup();


$formatter->renderField('video');

$formatter->startGroup('Boite 2');
$formatter->renderField('box2_title');
$formatter->renderField('box2_content');
$formatter->endGroup();

$formatter->startGroup('Boite 3');
$formatter->renderField('box3_title');
$formatter->renderField('box3_content');
$formatter->endGroup();

$formatter->nextTab();
$formatter->renderField('reverse_form_order');
$formatter->startGroup('Publicité 1');
$formatter->renderField('top_right_picture');
$formatter->renderField('top_right_picture_url');
$formatter->renderField('top_right_content');
$formatter->endGroup();

$formatter->startGroup('Publicité 2');
$formatter->renderField('right_ad_picture');
$formatter->renderField('right_ad_url');
$formatter->endGroup();


$formatter->renderField('right_bottom');

$formatter->nextTab();
$formatter->renderNotificationFields('form1');

$formatter->nextTab();
$formatter->renderNotificationFields('form2');

$formatter->nextTab();

$formatter->startGroup('VIP');
$formatter->renderField('bottom_title');
$formatter->renderField('bottom_zone1');
$formatter->renderField('bottom_zone2');
$formatter->renderField('bottom_zone3');
$formatter->renderField('bottom_zone4');
$formatter->renderField('bottom_legend');
$formatter->endGroup();

$formatter->startGroup('Bandeau rouge');
$formatter->renderField('footer_caption');
$formatter->renderField('footer_phone');
$formatter->renderField('footer_email');
$formatter->endGroup();

$formatter->nextTab();
$formatter->startGroup('Zone 1');
$formatter->renderField('sitemap1_title');
$formatter->renderField('sitemap1_url');
$formatter->renderField('sitemap1');
$formatter->endGroup();

$formatter->startGroup('Zone 2');
$formatter->renderField('sitemap2_title');
$formatter->renderField('sitemap2_url');
$formatter->renderField('sitemap2');
$formatter->endGroup();

$formatter->startGroup('Zone 3');
$formatter->renderField('sitemap3_title');
$formatter->renderField('sitemap3_url');
$formatter->renderField('sitemap3');
$formatter->endGroup();

$formatter->startGroup('Zone 4');
$formatter->renderField('sitemap4_title');
$formatter->renderField('sitemap4_url');
$formatter->renderField('sitemap4');
$formatter->endGroup();

$formatter->endTabs();
?>