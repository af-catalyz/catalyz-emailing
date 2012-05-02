<?php

require_once 'C://Program Files//WaterProof//PHPEdit//4.3.1//Extensions//Symfony//distribution//1.4//lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfPropelPlugin');
  }
}
