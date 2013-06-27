<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Haut de page', 'Formation 1', 'Formation 2', 'Méthodologie','Bas de page');
$formatter->renderField('style');
$formatter->renderField('introduction');

$formatter->nextTab();
$formatter->renderField('training_1_caption');
$formatter->renderField('training_1_price');
$formatter->renderField('training_1_introduction');
$formatter->renderField('training_1_link');
$formatter->renderField('training_1_date');

$formatter->nextTab();
$formatter->renderField('training_2_caption');
$formatter->renderField('training_2_price');
$formatter->renderField('training_2_introduction');
$formatter->renderField('training_2_link');
$formatter->renderField('training_2_date');

$formatter->nextTab();
$formatter->renderField('promo_content');
$formatter->nextTab();

$formatter->renderField('link_contact');
$formatter->renderField('link_catalog');
$formatter->renderField('link_commande');
$formatter->renderGroup('Expert', array('expert_name','expert_email','expert_tel'));
$formatter->renderField('picture');
$formatter->endTabs();
		?>