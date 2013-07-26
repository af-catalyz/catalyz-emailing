<?php
// ./symfony catalyz-emailing:createSmallerFiles ./data/astia/original.xls

class importCreateSmallerFilesTask extends sfBaseTask {

	protected function configure()
	{
		$this->namespace = 'catalyz-emailing';
		$this->name = 'createSmallerFilesTask';
		$this->briefDescription = 'Create smaller files from a huge one';
		$this->detailedDescription = <<<EOF
The [catalyz-emailing:create-slugs|INFO] Import contacts from excels files in dir.

add cells in "cells_to_parse" option and change createOrUpdateContact function

Call it with:

  [php symfony catalyz-emailing:create-slugs|INFO]
EOF;
		$this->addArgument('path', sfCommandArgument::REQUIRED, 'Path to the file');
		$this->addArgument('application', sfCommandArgument::OPTIONAL, 'The application name', 'frontend');

		// add other arguments here
		$this->addOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'af');
		$this->addOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel');
		$this->addOption('file_limit', null, sfCommandOption::PARAMETER_OPTIONAL, 'file limit', 250);
	}

	protected function execute($arguments = array(), $options = array()) {
		$databaseManager = new sfDatabaseManager($this->configuration);
		$connection = $databaseManager->getDatabase($options['connection'])->getConnection();

		$configuration = $this->configuration->getApplicationConfiguration($arguments['application'], $options['env'], true);
		sfContext::createInstance($configuration, 'default');

		$path = $arguments['path'];

		if (!is_file($path)) { // envoyer un mail d'erreur ?
			$this->logSection('Import', sprintf("can not read \"%s\" file", $path), null, ERROR);
			return FALSE;
		}

		$return = $this->ReadFile($path, $options['file_limit']);
		$this->logSection('Import', sprintf("%s file(s) created", $return), null, INFO);
		return TRUE;
	}

	private function ReadFile($path, $file_limit){
		$excel_file = new Spreadsheet_Excel_Reader();
		$excel_file->setOutputEncoding('UTF-8');
		$excel_file->read($path);

		$infos = pathinfo($path);
//		$limit = $file_limit-1;

		foreach ($excel_file->sheets as $sheet){
			$header = array_shift($sheet['cells']); // remove header

			$file_cnt = 1;
			$row_level = 1;
			$mini_row_cnt = 2;
			foreach ($sheet['cells'] as $index => $row) {
				array_walk($row, 'trim');

				if ($row_level == 1) {
					$sheetTitle = sprintf('mini fichier d\'import' . $file_cnt);
					$this->spreadsheet = new sfPhpExcel();
					$this->spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

					$this->spreadsheet->setActiveSheetIndex(0);
					$this->activeSheet = $this->spreadsheet->getActiveSheet();
					$this->activeSheet->setTitle($sheetTitle);

					$letter = 'A';
					foreach ($header as $fieldName => $caption){
						$this->activeSheet->setCellValueExplicit($letter.'1', trim(utf8_encode($caption)));
						$letter =  chr(ord($letter)+1);
					}

				}

				$letter = 'A';
				foreach ($header as $cell_id => $content){
					if (!empty($row[$cell_id])) {
						$this->activeSheet->setCellValueExplicit($letter.$mini_row_cnt,  trim(utf8_encode($row[$cell_id])));
					}
					$letter =  chr(ord($letter)+1);
				}
				$mini_row_cnt++;

				$row_level++;
				if ($row_level > $file_limit) {
					$row_level = 1;
					$mini_row_cnt = 2;
					$objWriter = new PHPExcel_Writer_Excel5($this->spreadsheet);

					$smallFilename = sprintf('%s/%s_(mini_%s).xls', $infos['dirname'], $infos['filename'], $file_cnt);
					$objWriter->save($smallFilename);
					$file_cnt++;
				}
			}
		}

		//last_one if nb of row < $file_limit
		$objWriter = new PHPExcel_Writer_Excel5($this->spreadsheet);

		$smallFilename = sprintf('%s/%s_(mini_%s).xls', $infos['dirname'], $infos['filename'], $file_cnt);
		$objWriter->save($smallFilename);


		return $file_cnt;

	}
}

?>