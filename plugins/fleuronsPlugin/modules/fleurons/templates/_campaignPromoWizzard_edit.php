<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Contenu','Produit mis en avant', 'Autre produits', 'Encart vert','Boutons bas de page','Bas de page');
$formatter->renderField('header_links');
$formatter->renderField('header_picture');


$formatter->nextTab();
$formatter->renderField('title');
$formatter->renderField('main_content');

$formatter->nextTab();

$formatter->renderField('main_products');
$formatter->nextTab();
$formatter->renderField('secondary_products');

$formatter->nextTab();
$formatter->renderField('green_content');
$formatter->renderField('mentions_content');

$formatter->nextTab();
$formatter->renderField('livraison_link');
$formatter->renderField('paiement_link');
$formatter->renderField('point_de_vente_link');
$formatter->renderField('youtube_link');

$formatter->nextTab();
$formatter->renderField('facebook_link');
$formatter->renderField('website_caption');
$formatter->renderField('website_link');
$formatter->renderField('adresse');
$formatter->renderField('phone');
$formatter->renderField('contact_caption');
$formatter->renderField('contact_link');
$formatter->renderField('footer_content');


$formatter->endTabs();
