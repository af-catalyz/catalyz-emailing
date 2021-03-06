<?php

class catalyzemailingCronTask extends sfPropelBaseTask {
    protected function configure()
    {
        $this->namespace = 'catalyz-emailing';
        $this->name = 'cron';
        $this->briefDescription = 'Prepare, send and get bounces for your campaigns';
        $this->detailedDescription = <<<EOF
The [catalyz-emailing:cron|INFO] task does things.
Call it with:

  [php symfony catalyz-emailing:cron|INFO]
EOF;
        // $this->addArgument('application', sfCommandArgument::OPTIONAL, 'The application name', 'frontend');
        // add other arguments here
        $this->addOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev');
        $this->addOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel');
        // add other options here
    }

    protected function execute($arguments = array(), $options = array())
    {
        // Database initialization
        $configuration = $this->configuration->getApplicationConfiguration('frontend', $options['env'], true);
        $databaseManager = new sfDatabaseManager($configuration);
        $connection = Propel::getConnection($options['connection'] ? $options['connection'] : '');
        sfContext::createInstance($configuration, 'default');
        // add code here
        $lockFilename = sfConfig::get('sf_data_dir') . 'cron.lock';
        if (file_exists($lockFilename)) {
            printf('Un fichier de lock est présent (%s), l\'execution de cette tâche va être interrompue; une autre tâche est probablement en cours d\'execution');
        } else {
            file_put_contents($lockFilename, date('d/m/Y H:i:s'));
            try {
                $prepareTask = new catalyzemailingPrepareTask($this->dispatcher, $this->formatter);
                $subOptions = array('--env=' . $options['env'], '--connection=' . $options['connection']);
                $prepareTask->run(array('application' => 'frontend'), $subOptions);

                $sendTask = new catalyzemailingSendTask($this->dispatcher, $this->formatter);
                $sendTask->run(array('application' => 'frontend'), $subOptions);

                $checkTask = new catalyzemailingHandlebouncesTask($this->dispatcher, $this->formatter);
                $checkTask->run(array('application' => 'frontend'), $subOptions);
            }
            catch(Exception $e) {
            }
            unlink($lockFilename);
        }
    }
}