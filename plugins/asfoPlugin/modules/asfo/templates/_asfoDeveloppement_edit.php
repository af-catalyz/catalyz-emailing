<?php



$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page','Pôle 1','Pôle 2','Pôle 3','Pôle 4','Pôle 5', 'Atouts' ,'Bas de page');
$formatter->renderField('style');
$formatter->renderField('introduction');

$formatter->nextTab();
$formatter->renderField('bloc_1_title');
$formatter->renderGroup('Formations', array('bloc_1_content'));
$formatter->renderGroup('Référent', array('bloc_1_trainer','bloc_1_trainer_email'));

$formatter->nextTab();
$formatter->renderField('bloc_2_title');
$formatter->renderGroup('Formations', array('bloc_2_content'));
$formatter->renderGroup('Référent', array('bloc_2_trainer','bloc_2_trainer_email'));

$formatter->nextTab();
$formatter->renderField('bloc_3_title');
$formatter->renderGroup('Formations', array('bloc_3_content'));
$formatter->renderGroup('Référent', array('bloc_3_trainer','bloc_3_trainer_email'));

$formatter->nextTab();
$formatter->renderField('bloc_4_title');
$formatter->renderGroup('Formations', array('bloc_4_content'));
$formatter->renderGroup('Référent', array('bloc_4_trainer','bloc_4_trainer_email'));

$formatter->nextTab();
$formatter->renderField('bloc_5_title');
$formatter->renderGroup('Formations', array('bloc_5_content'));
$formatter->renderGroup('Référent', array('bloc_5_trainer','bloc_5_trainer_email'));

$formatter->nextTab();
$formatter->renderGroup('Atouts', array('atout'));

$formatter->nextTab();
$formatter->renderField('link_contact');
$formatter->renderField('link_catalog');

$formatter->renderField('picture_1');
$formatter->renderField('picture_2');
$formatter->endTabs();

?>