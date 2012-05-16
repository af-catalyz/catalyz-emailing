<?php
// ./symfony catalyz-emailing:create-sl

class catalyzCreateSlugsTask extends sfBaseTask {
	protected function configure()
	{
		$this->namespace = 'catalyz-emailing';
		$this->name = 'create-slugs';
		$this->briefDescription = 'Create slug field for Contact, ContactGroup, Campaign, CampaignTemplate';
		$this->detailedDescription = <<<EOF
The [catalyz-emailing:create-slugs|INFO] Create slug field for Contact, ContactGroup, Campaign, CampaignTemplate.
Call it with:

  [php symfony catalyz-emailing:create-slugs|INFO]
EOF;
		$this->addArgument('application', sfCommandArgument::OPTIONAL, 'The application name', 'frontend');
		// add other arguments here
		$this->addOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'af');
		$this->addOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel');
	}

	protected function execute($arguments = array(), $options = array()) {
		$databaseManager = new sfDatabaseManager($this->configuration);
		$connection = $databaseManager->getDatabase($options['connection'])->getConnection();


		foreach (array('Campaign', 'CampaignTemplate', 'Contact', 'ContactGroup') as $tableName){
			$this->logSection('Slugs', sprintf('Creating slugs for %s Table.', $tableName), null, 'NOTICE');

			$peer = sprintf('%sPeer', $tableName);

			$criteria = new Criteria();
				$criteria->add($peer::SLUG, null, Criteria::ISNULL);
				$elements = $peer::doSelect($criteria);

			foreach ($elements as $element){
				$element->save();
			}
		}

		return TRUE;
	}
}

?>
