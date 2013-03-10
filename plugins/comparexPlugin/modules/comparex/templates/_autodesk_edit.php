<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Colonne de gauche', 'Colonne de droite', 'Bas de page', 'Contact');
$formatter->renderField('edito');
$formatter->renderField('video_link');
$formatter->renderField('title');
$formatter->nextTab();
$formatter->renderField('left_top_picture');
$formatter->renderField('left_top_content');
$formatter->renderField('left_bottom_content');

$formatter->nextTab();
$formatter->renderField('right_top_picture');
$formatter->renderField('right_bottom_content');
$formatter->nextTab();
$formatter->renderField('bottom_content');

$formatter->nextTab();
$formatter->renderField('contact');
$formatter->renderField('email');
$formatter->renderField('website');

$formatter->endTabs();
