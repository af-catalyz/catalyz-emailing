<?php
// ./symfony fleurons:import ./data/fleurons/exported_data

class fleuronsImportTask extends sfBaseTask {

	const CREATE_CONTACT = 1;
	const UPDATE_CONTACT = 2;
	const OUT_OF_DATE_STEP = 365;

	private $groups = array();

	protected function configure()
	{
		$this->namespace = 'fleurons';
		$this->name = 'import';
		$this->briefDescription = 'Import contacts from excels files';
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
		$this->addOption('cells_to_parse', null, sfCommandOption::PARAMETER_OPTIONAL, 'Cells we use', 'ID|Contact - Nom|Contact - Prénom|Société|Contact - Email 1|Type Contact|Type de Tiers|Contact - Date de naissance|Contact - N°Téléphone');
		$this->addOption('emails', null, sfCommandOption::PARAMETER_OPTIONAL, 'emails to sent report', 'af@catalyz.fr');
	}

	protected function execute($arguments = array(), $options = array()) {
		$databaseManager = new sfDatabaseManager($this->configuration);
		$connection = $databaseManager->getDatabase($options['connection'])->getConnection();

		$configuration = $this->configuration->getApplicationConfiguration('frontend', $options['env'], true);
		sfContext::createInstance($configuration, 'default');

		$path = $arguments['path'];
		$report_details = array();

		$this->initGroupList();

		if (!is_dir($path)) { // envoyer un mail d'erreur ?
			$this->logSection('Email', sprintf("%s is not a dir", $path), null, ERROR);
			return FALSE;
		}

		$excels = $this->getExcelsFiles($path);
		if (count($excels) == 0) { // envoyer un mail d'erreur
			$this->sendNoFileToParseEmail($options['emails']);
			$this->logSection('Email', sprintf("0 file found"), null, ERROR);
			return FALSE;
		}

		foreach ($excels as $excel_path){
			$this->logSection('processing', 'processing '.$excel_path);
			if (!is_readable($excel_path)) { // envoyer un mail d'erreur
				$this->sendIsNotReadableEmail($options['emails'], $excel_path);
				$this->logSection('Email', sprintf("Can not read file"), null, ERROR);
				return FALSE;
			}else{
				$return = $this->ReadFile($excel_path, $options['cells_to_parse'], $options['emails']);

				if ($return) {
					$report_details[$excel_path] = $return;
				}
			}
		}

		if (!empty($report_details)) {
			$this->sendReportEmail($options['emails'], $report_details);
		}


		return TRUE;
	}

	private function getExcelsFiles($dir_path){
		$infos = pathinfo($dir_path);

		$excelFiles = array();

		foreach(glob($dir_path.'/*.xls') as $element){
			$excelFiles[] = $element;
		}

		return $excelFiles;
	}

	private function getInfosFromPath($dir_path){
		$infos = pathinfo($dir_path);

		$filename = $infos['filename'];
		if (preg_match('/(?P<first>[^_]*)_(?P<city>[^_]*)_(?P<date>[0-9]{8})_(?P<fourth>[0-9]{8})_E/', $filename, $tokens)) {
			$city = $tokens['city'];
			$date = strtotime(sprintf('%s-%s-%s', substr($tokens['date'], 6) , substr($tokens['date'], 4, 2) , substr($tokens['date'], 0, 4))) ;
			return array('city' => $city, 'date' => $date);
		}

		return false;
	}

	private function createOrUpdateContact($data){
		$action = self::UPDATE_CONTACT;
		$criteria = new Criteria();
		$criteria->add(ContactPeer::EXTERNAL_REFERENCE, $data['ID']);
		$contact = ContactPeer::doSelectOne($criteria);

		if ($contact == NULL ) {
		 	$action = self::CREATE_CONTACT;
			$contact= new Contact();
			$contact->setStatus(Contact::STATUS_NEW);
		}

		//region default cze fields
		$contact->setEmail($data['Contact - Email 1']);
		$contact->setExternalReference($data['ID']);

		if (!empty($data['Contact - Nom'])) {
			$contact->setLastName($data['Contact - Nom']);
		}

		if (!empty($data['Contact - Prénom'])) {
			$contact->setFirstName($data['Contact - Prénom']);
		}

		if (!empty($data['Société'])) {
			$contact->setCompany($data['Société']);
		}
		//endregion

		//region custom cze fields
		if (!empty($data['city'])) {
			$contact->setCustom1($data['city']);
		}

		if (!empty($data['Type Contact'])) {
			$contact->setCustom2($data['Type Contact']);
		}

		if (!empty($data['Type de Tiers'])) {
			$contact->setCustom3($data['Type de Tiers']);
		}

		if (!empty($data['Contact - Date de naissance'])) {
			$contact->setCustom4($data['Contact - Date de naissance']);
		}

		if (!empty($data['Contact - N°Téléphone'])) {
			$contact->setCustom5($data['Contact - N°Téléphone']);
		}
		//endregion

		try {
			$contact->save();

			//create group if not exist
			$group_name = array();
			if (trim($contact->getCustom1()) != '') {
				$group_name[] = trim($contact->getCustom1());
			}
			if (trim($contact->getCustom2()) != '') {
				$group_name[] = trim($contact->getCustom2());
			}
			if (trim($contact->getCustom3()) != '') {
				$group_name[] = trim($contact->getCustom3());
			}

		if (!empty($group_name)) {
			$group_name = implode(' ', $group_name);

			if (empty($this->groups[$group_name])) {
				$group = new ContactGroup();
				$group->setName($group_name);
				$group->setIsArchived(false);
				$group->setIsTestGroup(false);
				$group->save();

				$this->groups[$group_name] = $group->getId();
			}


			//find contact and check if is in group
			$criteria = new Criteria();
			$criteria->add(ContactContactGroupPeer::CONTACT_GROUP_ID, $this->groups[$group_name]);
			$criteria->add(ContactContactGroupPeer::CONTACT_ID, $contact->getId());
			$is_linked = ContactContactGroupPeer::doSelectOne($criteria);

			if ($is_linked == NULL) {
				$link = new ContactContactGroup();
				$link->setContactId($contact->getId());
				$link->setContactGroupId($this->groups[$group_name]);
				$link->save();
			}

		}


			return $action;
		}
		catch(Exception $e) {
			//var_dump($e->getMessage());
//			die();
			return FALSE;
		}

		return FALSE;
	}

	private function ReadFile($path, $required_cells, $emails){
		$excel_file = new Spreadsheet_Excel_Reader();
		$excel_file->setOutputEncoding('UTF-8');
		$excel_file->read($path);

		$row_whithout_email = 0;
		$updated_contact = 0;
		$created_contact = 0;
		$duplicate_email = array();
		$invalid_email = array();
		$infos = pathinfo($path);
		$cells = array();

		$file_infos = $this->getInfosFromPath($path);
		if (!$file_infos) { // envoyer un mail d'erreur can't read infos from fileName
			$this->logSection('Import', 'Can not read infos from fileName', null, ERROR);
			return FALSE;
		}

		if ($file_infos['date'] < strtotime(sprintf('- %s days', self::OUT_OF_DATE_STEP))) { // envoyer un mail d'erreur file out of date
			$this->sendOutOfDateEmail($emails, $file_infos, $path);
			$this->logSection('Import', sprintf('This file is out of date (%s)', date('d/m/Y', $file_infos['date'])), null, ERROR);
			return FALSE;
		}

		foreach ($excel_file->sheets as $sheet){
			$header = array_shift($sheet['cells']); // remove header

			foreach ($header as $cell_id =>$caption){
				$cells[trim(utf8_encode($caption))] = $cell_id;
			}

			//verifier ici si l'ensemble des colonnes necessaires sont présentent
			$mapping = array();
			$required_cells = explode('|', $required_cells);

			if (!in_array("Contact - Email 1", $required_cells)) { // envoyer un mail d'erreur email required in CZE
				$this->logSection('Import', 'Email is required in CatalyzEmailing to create/update contacts please select \'Contact - Email 1\' in cells_to_parse option', null, ERROR);
				return FALSE;
			}
			if (!in_array("ID", $required_cells)) { // envoyer un mail d'erreur email required in CZE
				$this->logSection('Import', 'ID is required in CatalyzEmailing to create/update contacts please select \'ID\' in cells_to_parse option', null, ERROR);
				return FALSE;
			}

			foreach ($required_cells as $cell_title){
				if (empty($cells[$cell_title]) ) { // envoyer un mail d'erreur structure invalide
					$this->logSection('Import', sprintf('A required field can not be found in file (%s)', $cell_title), null, ERROR);
					$this->sendStructureInvalidEmail($emails, $path, $cell_title);
					return FALSE;
				}else{
					$mapping[$cell_title] = $cells[$cell_title];
				}
			}

			foreach ($sheet['cells'] as $index => $row) {
				array_walk($row, 'trim');

				$contact_data = array();

				if (empty($row[$mapping['Contact - Email 1']]) || trim($row[$mapping['Contact - Email 1']]) == '') {
					$row_whithout_email ++;
				}else{
					foreach ($mapping as $caption => $id){
						if (trim($row[$id]) != '') {
							$contact_data[$caption] =trim($row[$id]);
						}
					}

					$contact_data['city'] = $file_infos['city'];

					if (czValidatorEmail::ValidateEmail($contact_data['Contact - Email 1'], false)) {
						$return = $this->createOrUpdateContact($contact_data);

						if ($return == self::CREATE_CONTACT) {
							$created_contact++;
						}elseif($return == self::UPDATE_CONTACT){
							$updated_contact++;
						}else{
							$duplicate_email[] = sprintf('Ligne %s : %s', $index + 2, $contact_data['Contact - Email 1']) ;
						}
					}else{
						$invalid_email[] = sprintf('Ligne %s : %s', $index + 2, $contact_data['Contact - Email 1']) ;
					}
				}
			}
		}



		$parsed_path = $infos['dirname'] . '/parsed';

		if (!is_dir($parsed_path)) {
			mkdir($parsed_path, 0777, true);
		}

		if (copy($path, $parsed_path . '/' . $infos['basename'])) {
			unlink($path);
		}

		return array('created_contact' => $created_contact, 'updated_contact' => $updated_contact, 'row_whithout_email' => $row_whithout_email, 'duplicate_email' => $duplicate_email, 'invalid_email' => $invalid_email);
	}

	private function sendReportEmail($emails, $report_details){
		$content = '';
		foreach ($report_details as $path => $details){
			$infos = pathinfo($path);
			$content .=  sprintf("Rapport pour le fichier : \"%s\"\n", $infos['basename']);
			$content .=  sprintf("Nombre de contacts créés : %s\n", $details['created_contact']);
			$content .=  sprintf("Nombre de contacts mis à jour : %s\n", $details['updated_contact']);
			$content .=  sprintf("Nombre de sans email : %s\n", $details['row_whithout_email']);
			$content .=  sprintf("Email deja présent dans la base de donnée avec un Identifiant différent : \n");
			if (count($details['duplicate_email']) > 0) {
				foreach ($details['duplicate_email'] as $caption){
					$content .=  sprintf("\t%s\n", $caption);
				}
			}else{
				$content .=  sprintf("\tAucun\n");
			}

			$content .=  sprintf("Email invalide présent dans le fichier : \n");
			if (count($details['invalid_email']) > 0) {
				foreach ($details['invalid_email'] as $caption){
					$content .=  sprintf("\t%s\n", $caption);
				}
			}else{
				$content .=  sprintf("\tAucun\n");
			}
			$content .=  sprintf("\n\n");
		}

		echo $content;

		$sent = $this->sendEmail($emails, 'Un import a été réalisé', $content);
		return $sent;
	}

	private function sendNoFileToParseEmail($emails){
		$sent = $this->sendEmail($emails, 'Erreur : L\'import n\'a pas eu lieu', 'Aucun fichier n\'a été trouvé');
		return $sent;
	}

	private function sendOutOfDateEmail($emails, $file_infos, $path){
		$infos = pathinfo($path);
		$sent = $this->sendEmail($emails, 'Erreur : L\'import n\'a pas eu lieu', sprintf('Le fichier %s est trop ancien (%s)', $infos['basename'], date('d/m/Y', $file_infos['date'])));
		return $sent;
	}

	private function sendIsNotReadableEmail($emails, $path){
		$infos = pathinfo($path);
		$sent = $this->sendEmail($emails, 'Erreur : L\'import n\'a pas eu lieu', sprintf('Le fichier %s n\'est lisible (probable manque de droits)', $infos['basename']));
		return $sent;
	}

	private function sendStructureInvalidEmail($emails, $path, $required_field){
		$infos = pathinfo($path);
		$sent = $this->sendEmail($emails, 'Erreur : L\'import n\'a pas eu lieu', sprintf('La structure du fichier %s est invalide (le champ "%s" n\'est pas présent)', $infos['basename'], $required_field));
		return $sent;
	}

	private function sendEmail($emails, $subject, $content){
		try {
			$emailList = explode('|', $emails);
			$emailMessage = Swift_Message::newInstance()
                	->setFrom(array('no-reply@catalyz-emailing.fr' => 'Catalyz Emailing'))
                	->setTo(array_shift($emailList))
                	->setSubject($subject)
                	->setBody($content, 'text/plain', 'UTF-8');

			if (is_array($emailList) && count($emailList) > 0) {
				foreach ($emailList as $email){
					$emailMessage->setBcc($email);
				}
			}
			$this->getMailer()->send($emailMessage);
		}
		catch(Exception $e) {
			$this->logSection('Email', sprintf("'Can not send email : \n\t%s'", $e->getMessage()), null, ERROR);
			return FALSE;
		}
		return true;
	}

	private function initGroupList(){
		$criteria = new Criteria();
		$criteria->add(ContactGroupPeer::IS_ARCHIVED, 0);
		$groups = ContactGroupPeer::doSelect($criteria);

		$return = array();
		foreach ($groups as /*(ContactGroup)*/$group){
			$return[$group->getName()] =  $group->getId();
		}

		$this->groups = $return;

		return count($this->groups);
	}
}

?>