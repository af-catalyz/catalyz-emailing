
<?php

$formatter = new CatalyzFormFormatter3($form);

$tabs = array();
$tabs[] = 'Haut de page';
for ($i = 1; $i <= 7; $i++) {
    $tabs[] = "Contenu $i";
}
$tabs[] = 'Bas de page';
call_user_func_array(array($formatter, 'startTabs'), $tabs);


$formatter->renderField('title');
$formatter->renderField('edition');

for ($i = 1; $i <= 7; $i++) {
    $formatter->nextTab();
    $formatter->renderField("title$i");
    $formatter->renderField("picture$i");
    $formatter->renderField("picture_border$i");
    $formatter->renderField("items$i");
}
$formatter->nextTab();
$formatter->renderField('footer');
$formatter->renderField('fb_page');
$formatter->renderField('unsubscribe_email');
// move fields here
$formatter->endTabs();