<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Zoom sur ...','Colonne de gauche','Colonne de droite','Visites', 'Bas de page');


$formatter->renderField('top_picture');
$formatter->renderField('date');

$formatter->nextTab();
	$formatter->renderField('zoom_picture');
	$formatter->renderField('zoom_content');

$formatter->nextTab();

	$formatter->renderField('box_left');

$formatter->nextTab();

$formatter->renderField('box_right');

$formatter->nextTab();

$formatter->renderField('visites');
$formatter->nextTab();

$formatter->renderField('footer_picture');
$formatter->renderField('contact_content');

$formatter->endTabs();
?>