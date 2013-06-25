<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Contenu','Colonne de gauche', 'Colonne centrale');
	$formatter->renderField('page_content');

$formatter->nextTab();
	$formatter->renderField('bottom_left');

$formatter->nextTab();
	$formatter->renderField('bottom_center');


$formatter->endTabs();
?>