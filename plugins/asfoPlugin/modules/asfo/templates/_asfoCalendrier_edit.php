<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Calendrier', 'Avantages','Bas de page');
$formatter->renderField('introduction');
$formatter->renderField('periode_1');
$formatter->renderField('periode_2');
$formatter->renderField('periode_3');

$formatter->nextTab();
$formatter->renderGroup('Ligne 1', array('ligne_1_style','ligne_1_formations'));
$formatter->renderGroup('Ligne 2', array('ligne_2_style','ligne_2_formations'));
$formatter->renderGroup('Ligne 3', array('ligne_3_style','ligne_3_formations'));
$formatter->renderGroup('Ligne 4', array('ligne_4_style','ligne_4_formations'));
$formatter->renderGroup('Ligne 5', array('ligne_5_style','ligne_5_formations'));
$formatter->renderGroup('Ligne 6', array('ligne_6_style','ligne_6_formations'));
$formatter->renderField('link_contact');
$formatter->renderField('link_catalog');


$formatter->nextTab();
$formatter->renderField('atout');
$formatter->nextTab();


$formatter->renderField('link_commande');
$formatter->renderField('picture_1');
$formatter->renderField('picture_2');



$formatter->endTabs();
?>