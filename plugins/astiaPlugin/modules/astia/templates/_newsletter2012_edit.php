<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Editorial', 'Colonne de gauche', 'Colonne de droite','Bas de page');

$formatter->renderField('number');
$formatter->renderField('date');


$formatter->nextTab();
$formatter->renderField('edito');
$formatter->nextTab();

$formatter->startGroup('Zone actualité');
$formatter->renderField('zone_actu_title');
$formatter->renderField('zone_actu_picture');
$formatter->renderGroup('Contenu', array('zone_actu_content'));
$formatter->renderField('zone_actu_link');
$formatter->endGroup();

$formatter->startGroup('Zone rubrique pour l\'annexe');
$formatter->renderField('zone_annexe_title');
$formatter->renderField('zone_annexe_content');
$formatter->renderField('zone_annexe_link');
$formatter->endGroup();

$formatter->startGroup('Zone retour d\'experiences');
$formatter->renderField('zone_experiences_title');
$formatter->renderField('zone_experiences_content');
$formatter->endGroup();

$formatter->nextTab();
$formatter->renderGroup('Les brèves', array('breves'));
$formatter->renderGroup('Agenda', array('agendas'));
$formatter->renderGroup('Zoom sur ...', array('zooms'));
$formatter->renderGroup('Le saviez vous ?', array('savoirs'));
$formatter->renderGroup('Les chiffres', array('chiffres'));

$formatter->nextTab();
$formatter->renderField('footer_title');
$formatter->renderField('adress');
$formatter->renderField('phone');
$formatter->renderField('fax');
$formatter->renderField('email');

$formatter->endTabs();
?>