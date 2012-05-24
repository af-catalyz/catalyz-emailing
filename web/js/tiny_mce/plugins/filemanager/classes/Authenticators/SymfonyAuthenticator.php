<?php
/**
 * SymfonyAuthenticatorImpl.php
 *
 *
 * -> Assuming credential to upload is called "canuploadassets"
 * -> assuming SF_ROOT_DIR/setup.php contains symfony environment setup, needed to use sfContext
 *
 * @author Ilia Kantor
 */
// symfony spoils $cmd, important variable for ImageManager action
//$_iMHidden = $cmd;

if (!defined('SF_ROOT_DIR')) {
    // assuming standard location for plugin
    define('SF_ROOT_DIR', realpath(dirname(__file__) . '/../../../../../../../../..'));
    // include SF_ROOT_DIR.'/web/index.php';
//    include SF_ROOT_DIR . '/config/ProjectConfiguration.class.php';
//    $configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
//    sfContext::createInstance($configuration);
//    $ContentTree = ContentTree::instance();
//    $ContentTree->build();
//    $ContentTree->initializeCurrentNodeByPath('');
}
// var_dump(file_exists(SF_ROOT_DIR.'/web/index.php'));
//$cmd = $_iMHidden;

//unset($_iMHidden);

/**
 * This class is a Symfony authenticator implementation.
 *
 * @package MCImageManager.Authenticators
 */
class Moxiecode_SymfonyAuthenticator extends Moxiecode_ManagerPlugin {
    /**
     * *#@+
     *
     * @access public
     */

    /**
     * Main constructor.
     */
    function Moxiecode_SymfonyAuthenticator()
    {
    }

    function onAuthenticate(&$man)
    {
    	return sfContext::getInstance()->getUser()->isAuthenticated();
//        return Catalyz::getLoginHandler()->hasPermission('update.'.sfConfig::get('app_translations_default_language'), false);
    }

    /**
     * *#@-
     */
}
// Add plugin to MCManager
$man->registerPlugin("SymfonyAuthenticator", new Moxiecode_SymfonyAuthenticator());
