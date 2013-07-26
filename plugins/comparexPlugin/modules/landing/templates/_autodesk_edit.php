<?php

$formatter = new CatalyzFormFormatter3($form);
$formatter->startTabs('Menu du haut', 'Menu', 'Haut de page','Colonne de gauche', 'Colonne de droite', 'Boites', 'Bas de page', 'Plan du site');
$formatter->renderField('top_menu');

$formatter->nextTab();
$formatter->renderField('menu');

$formatter->nextTab();
$formatter->renderField('banner');
$formatter->renderField('title');


$formatter->startGroup('Contenu de droite');
$formatter->renderField('right_image');
$formatter->renderField('right_content');
$formatter->endGroup();
$formatter->renderField('edito_content');

$formatter->nextTab();

$formatter->renderField('left_content');
$formatter->renderField('center_content');


$formatter->nextTab();
$formatter->renderField('form1_introduction');
$formatter->renderNotificationFields('form1');

$formatter->nextTab();

$formatter->startGroup('Zone 1');
$formatter->renderField('box1_title');
$formatter->renderField('box1_image');
$formatter->renderField('box1_content');
$formatter->endGroup();
$formatter->startGroup('Zone 2');
$formatter->renderField('box2_title');
$formatter->renderField('box2_image');
$formatter->renderField('box2_content');
$formatter->endGroup();
$formatter->startGroup('Zone 3');
$formatter->renderField('box3_title');
$formatter->renderField('box3_image');
$formatter->renderField('box3_content');
$formatter->endGroup();

$formatter->nextTab();
$formatter->renderField('bottom_content');

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