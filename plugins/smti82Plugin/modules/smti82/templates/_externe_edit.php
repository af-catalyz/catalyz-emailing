
<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Contenu', 'Bas de page');

$formatter->renderField('title');
$formatter->renderField('edition');

$formatter->nextTab();
$formatter->renderField('article');

$formatter->nextTab();
$formatter->renderField('footer');
$formatter->renderField('fb_page');
$formatter->renderField('unsubscribe_email');

// move fields here

$formatter->endTabs();
