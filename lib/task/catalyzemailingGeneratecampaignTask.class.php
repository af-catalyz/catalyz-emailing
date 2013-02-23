<?php

class catalyzemailingGeneratecampaignTask extends sfBaseTask {
    protected function configure()
    {
        $this->addArgument('customer', sfCommandArgument::REQUIRED, 'Customer\'s name');
        $this->addArgument('template', sfCommandArgument::REQUIRED, 'Template\'s name');

		 $this->addOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'frontend');
        $this->addOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev');
        $this->addOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel');
        $this->addOption('with-initializer', null, sfCommandOption::PARAMETER_NONE);
        $this->addOption('import', null, sfCommandOption::PARAMETER_REQUIRED);

        $this->namespace = 'catalyz-emailing';
        $this->name = 'generate-campaign';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [catalyz-emailing:generate-campaign|INFO] task does things.
Call it with:

  [php symfony catalyz-emailing:generate-campaign|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array())
    {
        // initialize the database connection
    	sfContext::createInstance($this->configuration);
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'])->getConnection();
        // add your code here
        $ProjectName = ucfirst($arguments['customer']);
        $TemplateName = ucfirst($arguments['template']);
        $projectName = lcfirst($ProjectName);
        $templateName = lcfirst($TemplateName);

        $root_path = sfConfig::get('sf_root_dir');

        $folders = array();
        $folders[] = sprintf('plugins/%sPlugin/lib/form', $ProjectName);
        $folders[] = sprintf('plugins/%sPlugin/modules/%s/templates', $ProjectName, $ProjectName);
        $folders[] = sprintf('plugins/%sPlugin/web/images', $ProjectName);
        foreach($folders as $folder) {
            $full_folder = $root_path . '/' . $folder;
            if (!file_exists($full_folder)) {
                $this->log(sprintf('Creating %s', $full_folder));
                mkdir($full_folder, 0777, true);
            }
        }
        $this->generateForm(sprintf('%s%sForm', $ProjectName, $TemplateName), sprintf('%s/plugins/%sPlugin/lib/form/%s%sForm.php', $root_path, $ProjectName, $ProjectName, $TemplateName));
        $this->generateCampaignTemplateHandler($ProjectName, $TemplateName, sprintf('%s/plugins/%sPlugin/lib/%s%sCampaignTemplateHandler.php', $root_path, $ProjectName, $ProjectName, $TemplateName));
        if ($options['with-initializer']) {
            $this->generateCampaignTemplateInitializer(sprintf('%s%sCampaignTemplateInitializer', $ProjectName, $TemplateName), sprintf('%s/plugins/%sPlugin/lib/%s%sCampaignTemplateInitializer.php', $root_path, $ProjectName, $ProjectName, $TemplateName));
        }
        $this->generateCampaignTemplateHtml(sprintf('%s/plugins/%sPlugin/modules/%s/templates/_%s.php', $root_path, $ProjectName, $ProjectName, $templateName));
        $this->generateCampaignTemplateText(sprintf('%s/plugins/%sPlugin/modules/%s/templates/_%s_text.php', $root_path, $ProjectName, $ProjectName, $templateName));
        $this->generateCampaignTemplateEdit(sprintf('%s/plugins/%sPlugin/modules/%s/templates/_%s_edit.php', $root_path, $ProjectName, $ProjectName, $templateName));
    }

    protected function generateForm($className, $filename)
    {
        $this->log(sprintf('Creating %s (%s)', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename), $className));
        $content = "<?php \n\n";
        $content .= $this->getPartial('generator/Form', array('className' => $className));
        file_put_contents($filename, $content);
    }

    public function generateCampaignTemplateHandler($ProjectName, $TemplateName, $filename)
    {
        $this->log(sprintf('Creating %s', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename)));
    	$content = "<?php \n\n";
    	$content .= $this->getPartial('generator/CampaignTemplateHandler', array('ProjectName' => $ProjectName, 'TemplateName' => $TemplateName));
    	file_put_contents($filename, $content);
    }

    public function generateCampaignTemplateInitializer($className, $filename)
    {
        $this->log(sprintf('Creating %s (%s)', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename), $className));
    	$content = "<?php \n\n";
    	$content .= $this->getPartial('generator/CampaignTemplateInitializer', array('ProjectName' => $ProjectName, 'TemplateName' => $TemplateName, 'fields' => $this->fields));
    	file_put_contents($filename, $content);
    }

	protected $fields = array();

	public function generateCampaignTemplateHtml($filename)
	{
		$this->log(sprintf('Creating %s', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename)));
		file_put_contents($filename, $this->getPartial('generator/html', array('ProjectName' => $ProjectName, 'TemplateName' => $TemplateName, 'fields' => $this->fields)));
	}

	public function generateCampaignTemplateText($filename)
	{
		$this->log(sprintf('Creating %s', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename)));
		file_put_contents($filename, $this->getPartial('generator/text', array('ProjectName' => $ProjectName, 'TemplateName' => $TemplateName, 'fields' => $this->fields)));
	}
	public function generateCampaignTemplateEdit($filename)
    {
        $this->log(sprintf('Creating %s', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename)));
		file_put_contents($filename, $this->getPartial('generator/edit', array('ProjectName' => $ProjectName, 'TemplateName' => $TemplateName, 'fields' => $this->fields)));
    }

    protected function getPartial($templateName, $vars = array())
    {
        $context = sfContext::getInstance();
        // partial is in another module?
        if (false !== $sep = strpos($templateName, '/')) {
            $moduleName = substr($templateName, 0, $sep);
            $templateName = substr($templateName, $sep + 1);
        } else {
            $moduleName = $context->getActionStack()->getLastEntry()->getModuleName();
        }
        $actionName = '_' . $templateName;

        $view = new sfPartialView($context, $moduleName, $actionName, '');
        $view->setPartialVars($vars);

        return $view->render();
    }
}