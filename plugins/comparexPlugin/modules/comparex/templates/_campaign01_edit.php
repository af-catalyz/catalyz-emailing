<?php

$formatter = new CatalyzFormFormatter3($form);
$formatter->startTabs('Haut de page', 'Articles', 'Bas de page');

$formatter->renderField('header');
$formatter->renderField('edito');
$formatter->renderField('video_url');
$formatter->renderField('video_promo_button');
$formatter->renderField('video_promo_url');

$formatter->nextTab();
$formatter->renderField('articles');

$formatter->nextTab();
$formatter->renderField('bottom_text');
$formatter->renderField('footer');
$formatter->renderField('footer_email');
$formatter->renderField('footer_url');

$formatter->endTabs();
?>