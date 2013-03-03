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
        $ProjectName = $arguments['customer'];
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

    	$campaignTemplateFilename = sprintf('%s/plugins/%sPlugin/modules/%s/templates/_%s.php', $root_path, $ProjectName, $ProjectName, $templateName);
    	if ($options['import']) {
    		$importer = new CampaignTemplateImporter();
    		file_put_contents($campaignTemplateFilename, $importer->execute(file_get_contents($options['import']), $ProjectName, $TemplateName));
    		$this->fields = $importer->getFields();
    		$templateTitle = $importer->getTitle();
    	}else{
    		$this->fields = array();
    		$campaignTemplateContent = '';
    		$this->generateCampaignTemplateHtml($ProjectName, $TemplateName, $campaignTemplateFilename);
    		$templateTitle = '';
    	}


        $formClassName = sprintf('%s%sForm', $ProjectName, $TemplateName);
    	$filename = sprintf('%s/plugins/%sPlugin/lib/form/%s%sForm.php', $root_path, $ProjectName, $ProjectName, $TemplateName);
		$this->generateForm($formClassName, $filename);
    	foreach($this->fields as $fieldName => $fieldProperties){
    		if($fieldProperties['type'] == 'subform'){
    			$formClassName = sprintf('%s%sForm_%s', $ProjectName, $TemplateName, $fieldName);
    			$filename = sprintf('%s/plugins/%sPlugin/lib/form/%s%sForm_%s.php', $root_path, $ProjectName, $ProjectName, $TemplateName, $fieldName);
    			$this->generateSubForm($formClassName, $filename, $fieldProperties['fields']);
    		}
    	}


        $this->generateCampaignTemplateHandler($ProjectName, $TemplateName, sprintf('%s/plugins/%sPlugin/lib/%s%sCampaignTemplateHandler.php', $root_path, $ProjectName, $ProjectName, $TemplateName), $templateTitle);
        if ($options['with-initializer']) {
            $this->generateCampaignTemplateInitializer($ProjectName, $TemplateName, sprintf('%s%sCampaignTemplateInitializer', $ProjectName, $TemplateName), sprintf('%s/plugins/%sPlugin/lib/%s%sCampaignTemplateInitializer.php', $root_path, $ProjectName, $ProjectName, $TemplateName));
        }
        $this->generateCampaignTemplateText($ProjectName, $TemplateName, sprintf('%s/plugins/%sPlugin/modules/%s/templates/_%s_text.php', $root_path, $ProjectName, $ProjectName, $templateName));
        $this->generateCampaignTemplateEdit($ProjectName, $TemplateName, sprintf('%s/plugins/%sPlugin/modules/%s/templates/_%s_edit.php', $root_path, $ProjectName, $ProjectName, $templateName));
    }

    protected function generateForm($className, $filename)
    {
        $this->log(sprintf('Creating %s (%s)', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename), $className));
        $content = "<?php \n\n";
        $content .= $this->getPartial('generator/Form', array('className' => $className, 'fields' => $this->fields));
        file_put_contents($filename, $content);
    }

    public function generateCampaignTemplateHandler($ProjectName, $TemplateName, $filename, $templateTitle)
    {
        $this->log(sprintf('Creating %s', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename)));
    	$content = "<?php \n\n";
    	$content .= $this->getPartial('generator/CampaignTemplateHandler', array('ProjectName' => $ProjectName, 'TemplateName' => $TemplateName, 'title'=> $templateTitle));
    	file_put_contents($filename, $content);
    }

    public function generateCampaignTemplateInitializer($ProjectName, $TemplateName, $className, $filename)
    {
        $this->log(sprintf('Creating %s (%s)', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename), $className));
    	$content = "<?php \n\n";
    	$content .= $this->getPartial('generator/CampaignTemplateInitializer', array('ProjectName' => $ProjectName, 'TemplateName' => $TemplateName, 'fields' => $this->fields));
    	file_put_contents($filename, $content);
    }

	protected $fields = array();

	public function generateCampaignTemplateHtml($ProjectName, $TemplateName, $filename)
	{
		$this->log(sprintf('Creating %s', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename)));
		file_put_contents($filename, $this->getPartial('generator/html', array('ProjectName' => $ProjectName, 'TemplateName' => $TemplateName, 'fields' => $this->fields)));
	}

	public function generateCampaignTemplateText($ProjectName, $TemplateName, $filename)
	{
		$this->log(sprintf('Creating %s', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename)));
		file_put_contents($filename, $this->getPartial('generator/text', array('ProjectName' => $ProjectName, 'TemplateName' => $TemplateName, 'fields' => $this->fields)));
	}
	public function generateCampaignTemplateEdit($ProjectName, $TemplateName, $filename)
    {
        $this->log(sprintf('Creating %s', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename)));
		file_put_contents($filename, "<?php \n\n".$this->getPartial('generator/edit', array('ProjectName' => $ProjectName, 'TemplateName' => $TemplateName, 'fields' => $this->fields)));
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

        return html_entity_decode($view->render());
    }

	public function generateSubForm($className, $filename, $fields)
	{
		$this->log(sprintf('Creating %s (%s)', str_replace(sfConfig::get('sf_root_dir') . '/', '', $filename), $className));
		$content = "<?php \n\n";
		$content .= $this->getPartial('generator/SubForm', array('className' => $className, 'fields' => $fields));
		file_put_contents($filename, $content);
	}
}