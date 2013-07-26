<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Lignes grises', 'Bas de page');

$formatter->renderField('edito');
$formatter->renderField('website_link');

$formatter->nextTab();
$formatter->renderField('offers_link');
$formatter->renderField('contact_link');
$formatter->renderField('phone');

$formatter->nextTab();
$formatter->renderField('footer');
$formatter->renderField('thanks');
$formatter->renderField('footer_link');

$formatter->endTabs();
?>