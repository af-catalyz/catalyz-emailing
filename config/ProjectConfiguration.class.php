<?php
if (PHP_OS == 'WINNT') {
	require_once 'C:/Program Files/WaterProof/PHPEdit/4.0.5/Extensions/Symfony/distribution/1.4/lib/autoload/sfCoreAutoload.class.php';

} else {
	require_once '/home/share/symfony/1.4/lib/autoload/sfCoreAutoload.class.php';
}

sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {
    public function setup()
    {
        $this->enablePlugins('sfPropelPlugin');
        $this->enablePlugins('sfGuardPlugin');
        $this->enablePlugins('sfWebBrowserPlugin');
        $this->enablePlugins('sfThumbnailPlugin');
        $this->enablePlugins('sfPhpExcelPlugin');
        $this->enablePlugins('sfFormExtraPlugin');
        $this->enablePlugins('sfPropelActAsSluggableBehaviorPlugin');
        // enable clients
//        $this->enablePlugins('KreactivFormationPlugin');
//        $this->enablePlugins('newtechPlugin');
//        $this->enablePlugins('atp5sPlugin');
//        $this->enablePlugins('luxhedgePlugin');
//        $this->enablePlugins('staPlugin');
//        $this->enablePlugins('sudprojetPlugin');
//        $this->enablePlugins('cciFormationPlugin');
//        $this->enablePlugins('comparexPlugin');
        $this->enablePlugins('OfficeTourismeMontaubanPlugin');
        $this->enablePlugins('lcfPlugin');
        $this->enablePlugins('elaulPlugin');
        $this->enablePlugins('SemAutomationPlugin');
        $this->enablePlugins('dpiPlugin');
        $this->enablePlugins('fleuronsPlugin');
        $this->enablePlugins('asfoPlugin');
        $this->enablePlugins('cimlecPlugin');
        $this->enablePlugins('KogysPlugin');
        $this->enablePlugins('vigourouxPlugin');
        $this->enablePlugins('be3cPlugin');
        $this->enablePlugins('nutritisPlugin');
      $this->enablePlugins('sfErrorNotifierPlugin');
  }
}


