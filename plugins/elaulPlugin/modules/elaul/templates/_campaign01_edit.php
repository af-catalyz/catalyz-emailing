<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Editorial', 'Colonne de gauche', 'Colonne de droite', 'Autres produits','Bas de page');

$formatter->renderField('legals_top');
$formatter->renderField('baseline');
$formatter->renderGroup('Lien 1', array('lien_1_title', 'lien_1_link'));
$formatter->renderGroup('Lien 2', array('lien_2_title', 'lien_2_link'));
$formatter->renderGroup('Lien 3', array('lien_3_title', 'lien_3_link'));


$formatter->nextTab();
$formatter->renderField('edito');
$formatter->nextTab();

$formatter->renderGroup('Produits', array('products_subform'));
$formatter->renderGroup('Lien vers le catalogue', array('catalog_title', 'catalog_link'));

$formatter->nextTab();
$formatter->startGroup('Atouts');
$formatter->renderField('atouts_title');
$formatter->renderField('atouts');
$formatter->endGroup();
$formatter->renderField('question_box');
$formatter->startGroup('Références');
$formatter->renderField('references_title');
$formatter->renderField('references_content');
$formatter->renderGroup('Société référence', array('references_subform'));

$formatter->endGroup();

$formatter->nextTab();
$formatter->renderField('bottom_introduction');
$formatter->renderGroup('Produits', array('bottom_content'));

$formatter->nextTab();
$formatter->renderField('footer');
$formatter->renderField('legals_bottom');

$formatter->endTabs();
?>