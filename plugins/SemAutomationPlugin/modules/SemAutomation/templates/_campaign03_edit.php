<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Entete','Colonne de gauche', 'Colonne de droite', 'Bas de page');
	$formatter->renderGroup('Logo', array('logo_picture','logo_target'));
	$formatter->renderField('titre');

$formatter->nextTab();
	$formatter->renderText('Les images présentes dans le contenu ci-dessous doivent avoir au maximum une taille de 225px.');
	$formatter->renderField('left_content');

$formatter->nextTab();
	$formatter->renderText('Les images présentes dans le contenu ci-dessous doivent avoir au maximum une taille de 334px.');
	$formatter->renderField('right_content');

$formatter->nextTab();
	$formatter->renderGroup('Site internet', array('website'));
	$formatter->renderGroup('Contact', array('contact_name','contact_target'));

$formatter->endTabs();

?>