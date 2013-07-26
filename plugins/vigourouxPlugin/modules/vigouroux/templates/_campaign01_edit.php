<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Editorial', 'Produits', 'Nouveautés','Bas de page');


$formatter->renderField('campaign_number');
$formatter->renderField('title');

$formatter->nextTab();
$formatter->renderField('editorial_title');
$formatter->renderField('editorial_content');


$formatter->nextTab();

$formatter->renderField('products_content');

$formatter->nextTab();

$formatter->renderField('news_title');
$formatter->renderField('news_content');


$formatter->nextTab();
$formatter->renderField('footer');



$formatter->endTabs();
?>