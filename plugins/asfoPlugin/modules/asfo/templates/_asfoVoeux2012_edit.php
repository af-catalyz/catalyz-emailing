<?php

$formatter = new CatalyzFormFormatter3($form);

$formatter->renderHeader();
$formatter->renderField('title');
$formatter->renderField('page_content');

$formatter->renderFooter();
?>