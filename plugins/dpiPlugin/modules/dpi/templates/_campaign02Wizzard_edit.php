<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Contenu','Encart rouge','Options de l\'offre', 'Illustration','Bas de page');

$formatter->renderGroup('Style de l\'emailing', array('style'));
$formatter->renderGroup('Bandeau titre', array('header_picture1','header_picture2'));
$formatter->renderGroup('Opération', array('operation_type','operation_caption','operation_picture'));

$formatter->nextTab();
$formatter->renderGroup('Dates', array('event_start','event_end'));
$formatter->renderField('main_content');


$formatter->nextTab();
$formatter->renderField('red_content');
$formatter->nextTab();
$formatter->renderField('options');
$formatter->nextTab();
$formatter->renderField('picture');
$formatter->nextTab();
$formatter->renderGroup('Coordonnées', array('phone','fax'));
$formatter->renderGroup('Site 1', array('website1_caption','website1_link'));
$formatter->renderGroup('Site 2', array('website2_caption','website2_link'));
$formatter->renderGroup('Adresse', array('adress_content'));
$formatter->renderField('facebook_link');

$formatter->endTabs();
