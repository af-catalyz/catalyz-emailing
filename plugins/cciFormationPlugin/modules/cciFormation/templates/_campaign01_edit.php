<?php
$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page','Colonne de gauche','Colonne de droite','Qui sommes-nous?', 'Bas de page');

$formatter->renderField('number');
$formatter->renderField('date');
$formatter->renderField('top_picture');
$formatter->renderField('subtitle');

$formatter->nextTab();

$formatter->renderGroup('Articles', array('left_content'));

$formatter->startGroup('Actualités');
$formatter->renderField('news_title');
$formatter->renderField('news_content');
$formatter->renderField('news_target_caption');
$formatter->renderField('news_target');
$formatter->endGroup();

$formatter->nextTab();
$formatter->startGroup('Formation');
$formatter->renderField('right_picture');
$formatter->renderField('right_title');
$formatter->renderField('right_content');
$formatter->renderField('right_target_caption');
$formatter->renderField('right_target');
$formatter->endGroup();


$formatter->renderGroup('Témoignage', array('testimony'));

$formatter->nextTab();
$formatter->renderField('others');

$formatter->nextTab();
$formatter->renderField('bottom_title');
$formatter->renderField('bottom_content');
$formatter->renderField('phone');
$formatter->renderField('email');


$formatter->endTabs();
?>