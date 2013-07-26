<?php
$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page','Colonne de gauche','Colonne de droite', 'Bas de page');

$formatter->renderField('number');
$formatter->nextTab();
$formatter->renderField('edito');
$formatter->renderField('main_content');

$formatter->renderGroup('Boite grise', array('grey_title','grey_content','grey_link','grey_picture'));


$formatter->nextTab();
$formatter->renderGroup("Autres articles", array('other_articles'));
$formatter->renderGroup("Partenaires", array('partners'));


$formatter->nextTab();
$formatter->renderField('adress');
$formatter->renderField('zip');
$formatter->renderField('city');
$formatter->renderField('phone');
$formatter->renderField('fax');
$formatter->renderField('email');
$formatter->renderField('website_adress');

$formatter->endTabs();
?>