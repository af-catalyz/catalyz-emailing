<?php

class catalyzemailingImporttemplateTask extends sfBaseTask {
    protected function configure()
    {
        // // add your own arguments here
        $this->addArgument('customer', sfCommandArgument::REQUIRED, 'Customer\'s name');
        $this->addArgument('template', sfCommandArgument::REQUIRED, 'Template\'s name');

        $this->addOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name');
        $this->addOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev');
        $this->addOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel');
        $this->addOption('with-initializer', null, sfCommandOption::PARAMETER_NONE);
        $this->addOption('import', null, sfCommandOption::PARAMETER_REQUIRED);

        $this->namespace = 'cze';
        $this->name = 'import-template';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [cze:import-template|INFO] task does things.
Call it with:

  [php symfony cze:import-template|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array())
    {
        sfPropelBehavior::registerHooks('sfPropelActAsSluggableBehavior', array (':save:pre' => array ('sfPropelActAsSluggableBehavior', 'preSave'),));

        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'])->getConnection();
        // add your code here
        $ProjectName = $arguments['customer'];
        $TemplateName = ucfirst($arguments['template']);
        $projectName = lcfirst($ProjectName);
        $templateName = lcfirst($TemplateName);
        $campaignHandlerClassName = sprintf('%s%sCampaignTemplateHandler', $ProjectName, $TemplateName);
        if (!class_exists($campaignHandlerClassName)) {
            $this->logSection('ERROR', sprintf('La classe %s est introuvable', $campaignHandlerClassName), null, 'ERROR');
            return false;
        }

        $template = new CampaignTemplate();
        $template->setName(call_user_func("$campaignHandlerClassName::getCampaignName"));
        $template->setClassName($campaignHandlerClassName);
        $template->setPreviewFilename(sprintf('/%sPlugin/images/%s.jpg', $projectName, $templateName));
        $template->setTemplate(false);
        $initializerClassName = sprintf('%s%sCampaignTemplateInitializer', $ProjectName, $TemplateName);
        if (class_exists($initializerClassName)) {
            $template->setInitializer($initializerClassName);
        }

        $template->save();
        $this->log(sprintf('Le modèle de campagne %s a été importé dans le projet.', $template->getName()));
    }
}