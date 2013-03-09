
<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Editorial', 'Dossier Spécial', 'Lu pour vous', 'Infos Pratiques', 'Bas de page');

$formatter->renderField('title');
$formatter->renderField('edition');

$formatter->nextTab();
$formatter->renderField('edito');

$formatter->nextTab();
$formatter->renderField('picture');
$formatter->renderField('main_title');
$formatter->renderField('content');

$formatter->nextTab();
$formatter->renderField('read_picture');
$formatter->renderField('read_title');
$formatter->renderField('book');

$formatter->nextTab();
$formatter->renderField('infos_title');
$formatter->renderField('informations');

$formatter->nextTab();
$formatter->renderField('footer');
$formatter->renderField('fb_page');
$formatter->renderField('unsubscribe_email');

// move fields here

$formatter->endTabs();
