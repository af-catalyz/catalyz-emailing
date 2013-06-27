<?php
// ./symfony migration:setUTF8 ./migration/file.sql
// ./symfony migration:setUTF8 ./migration/data_emailing_asfo.sql

class migrationSetUTF8Task extends sfBaseTask {

	protected function configure()
	{
		$this->namespace = 'migration';
		$this->name = 'setUTF8';
		$this->briefDescription = 'Change encoding to UTF8';
		$this->detailedDescription = <<<EOF
The [catalyz-emailing:create-slugs|INFO] Change encoding to UTF8.

Call it with:

  [php symfony migration:setUTF8|INFO]
EOF;
		$this->addArgument('path', sfCommandArgument::REQUIRED, 'Path to the file');
		$this->addArgument('application', sfCommandArgument::OPTIONAL, 'The application name', 'frontend');

		// add other arguments here
		$this->addOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'af');
		$this->addOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel');
	}

	protected function execute($arguments = array(), $options = array()) {
		$databaseManager = new sfDatabaseManager($this->configuration);
		$connection = $databaseManager->getDatabase($options['connection'])->getConnection();

		$configuration = $this->configuration->getApplicationConfiguration('frontend', $options['env'], true);
		sfContext::createInstance($configuration, 'default');

		$path = $arguments['path'];

		if (!is_file($path)) { // envoyer un mail d'erreur ?
			$this->logSection('ERROR', sprintf("%s is not a file", $path), null, ERROR);
			return FALSE;
		}



		return file_put_contents($path, utf8_decode(file_get_contents($path)));
	}
}

?>