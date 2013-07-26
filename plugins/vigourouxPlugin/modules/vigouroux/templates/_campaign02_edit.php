<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Contenu','Bas de page');


$formatter->renderField('campaign_number');
$formatter->renderField('title');

$formatter->nextTab();
$formatter->renderField('contenu');



$formatter->nextTab();

$formatter->renderField('footer');



$formatter->endTabs();
?>