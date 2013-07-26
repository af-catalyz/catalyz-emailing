<?php

define('SF_ROOT_DIR', realpath(__DIR__ . '/../../..'));

include SF_ROOT_DIR . '/config/ProjectConfiguration.class.php';
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'tinymce', false);
sfContext::createInstance($configuration);
sfConfig::set('sf_web_debug', false);

?>