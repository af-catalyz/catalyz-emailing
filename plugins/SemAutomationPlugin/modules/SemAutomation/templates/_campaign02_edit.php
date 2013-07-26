<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Entete','Colonne de gauche', 'Colonne de droite');
	$formatter->renderField('titre');
	$formatter->renderGroup('Logo', array('logo_picture','logo_target'));
	$formatter->renderGroup('Bandeau', array('bandeau_picture','bandeau_target'));


$formatter->nextTab();
	$formatter->renderField('left_picture');
	$formatter->renderField('left_target');
	$formatter->renderText('Les images présentes dans le contenu ci-dessous doivent avoir au maximum une taille de 216px.');
	$formatter->renderField('left_content');

$formatter->nextTab();
	$formatter->renderText('Les images présentes dans le contenu ci-dessous doivent avoir au maximum une taille de 359px.');
	$formatter->renderField('right_content');
	$formatter->renderGroup('Illustration', array('right_picture', 'right_target'));
	$formatter->renderField('contact_text');


$formatter->endTabs();
?>