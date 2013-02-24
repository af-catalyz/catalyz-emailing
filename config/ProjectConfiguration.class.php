<?php

require_once '/home/sites/symfony/1.4/lib/autoload/sfCoreAutoload.class.php';
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
        $this->enablePlugins('comparexPlugin');
    }
}