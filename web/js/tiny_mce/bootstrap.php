<?php

define('SF_ROOT_DIR', realpath(dirname(__file__) . '/../../..'));
include SF_ROOT_DIR . '/config/ProjectConfiguration.class.php';
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration);
sfConfig::set('sf_web_debug', false);

?>