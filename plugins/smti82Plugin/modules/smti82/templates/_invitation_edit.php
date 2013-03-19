<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Contenu', 'Invitation à l\'action', 'Bas de page');

$formatter->renderField('header_title');
$formatter->nextTab();

$formatter->renderField('picture');
$formatter->renderField('sup_title');
$formatter->renderField('title');
$formatter->renderField('when');
$formatter->startGroup('Programme');
$formatter->renderField('programme');
$formatter->endGroup();
$formatter->renderField('content');

$formatter->nextTab();
$formatter->renderField('title2');
$formatter->renderField('content2');
$formatter->renderField('actions');

$formatter->nextTab();
$formatter->renderField('footer');
$formatter->renderField('unsubscribe_email');


$formatter->endTabs();
