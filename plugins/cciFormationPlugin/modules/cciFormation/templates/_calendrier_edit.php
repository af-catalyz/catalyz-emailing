<?php
$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page','Colonne de gauche','Colonne de droite', 'Bas de page');

$formatter->renderField('number');
$formatter->renderField('date');
$formatter->renderField('top_picture');
$formatter->renderField('subtitle');
$formatter->nextTab();
$formatter->renderField('left_title');
$formatter->renderField('left_content');
$formatter->renderField('left_bottom');

$formatter->nextTab();
$formatter->renderGroup("Boite du haut", array(
'download_title',
'download_text',
'download_link',
'download_picture'
));
$formatter->renderGroup("Formation coup de coeur", array(
'right_title',
'right_content'
));


$formatter->nextTab();
$formatter->renderField('bottom_title');
$formatter->renderField('bottom_content');
$formatter->renderField('phone');
$formatter->renderField('email');


$formatter->endTabs();
?>