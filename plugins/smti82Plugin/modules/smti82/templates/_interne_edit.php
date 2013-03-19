<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Actualités', 'Evénements', 'Bibliothèque', 'Lu pour vous', 'Formations', 'Actualités internes', 'Bas de page');
$formatter->renderField('email_title');
$formatter->renderField('edition');

$formatter->nextTab();
$formatter->renderField('news_title');
$formatter->renderField('actus');

$formatter->nextTab();
$formatter->renderField('events_title');
$formatter->renderField('dates');

$formatter->nextTab();
$formatter->renderField('content_title');
$formatter->renderField('library_content');

$formatter->nextTab();
$formatter->renderField('lu_title');
$formatter->renderField('lu');

$formatter->nextTab();
$formatter->renderField('formations');
$formatter->renderField('intro_formation');
$formatter->renderField('formation');
$formatter->renderField('logos_formations');

$formatter->nextTab();
$formatter->renderField('actu');
$formatter->renderField('bottom_actu');

$formatter->nextTab();
$formatter->renderField('footer');
$formatter->renderField('unsubscribe_email');


// move fields here
$formatter->endTabs();