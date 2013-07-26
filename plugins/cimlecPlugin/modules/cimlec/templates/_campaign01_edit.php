<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Contenu');

$formatter->renderField('top_content');
$formatter->renderField('top_picture');
$formatter->nextTab();


$formatter->renderField('content');

$formatter->renderField('nom');
$formatter->renderField('statut');
$formatter->renderField('email');



$formatter->endTabs();
?>