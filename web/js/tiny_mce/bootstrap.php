<?php

define('SF_ROOT_DIR', realpath(__DIR__ . '/../../..'));
require_once(__DIR__.'/../../../plugins/sfErrorNotifierPlugin/lib/sfErrorNotifier.php');
require_once(__DIR__.'/../../../plugins/sfErrorNotifierPlugin/lib/sfErrorNotifierMail.php');

include SF_ROOT_DIR . '/config/ProjectConfiguration.class.php';
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration);
sfConfig::set('sf_web_debug', false);

?>