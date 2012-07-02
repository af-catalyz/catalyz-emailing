<?php

class ContactImporterException extends Exception {
}

class ContactImporter {
    static $instance;
    /**
     *
     * @return ContactImporter
     */
    static function instance()
    {
        if (empty(self::$instance)) {
            self::$instance = new ContactImporter($fields = array(), $con = null);
        }
        return self::$instance;
    }

    const IMPORT_ALL = 1;
    const IMPORT_NEW = 2;

    protected $importedCount;
    protected $updatedCount;
    protected $inDbCount;

    protected $connexion;
    protected $groups = array();
    protected $fields = array();

    function __construct($fields = array(), $con = null)
    {
        $this->setFieldDefinition($fields);
        if ($con === null) {
            $this->connexion =/*(PropelPDO)*/ Propel::getConnection(ContactPeer::DATABASE_NAME);
        } else {
            $this->connexion = $con;
        }

        $this->connexion->beginTransaction();
    }

    public function commit()
    {
        $this->connexion->commit();
    }

    public function rollback()
    {
        $this->connexion->rollback();
    }

    public function setFieldDefinition($fields)
    {
        $this->inDbCount = 0;
        $this->importedCount = 0;
        $this->updatedCount = 0;
        $this->fields = $fields;
    }

    public function registerField($name, $required = false)
    {
        $this->fields[$name] = array(
            'position' => count($this->fields),
            'required' => $required);
    }

    protected function getEmailFieldIndex()
    {
        $result = 0;
        foreach($this->fields as $name => $fieldInfos) {
            if (strtolower($name) == 'email') {
                return $fieldInfos['position'];
            }
        }
        throw new exception('Unable to find email position');
    }

    function buildContact($values, $importType = ContactImporter::IMPORT_ALL)
    {

    	$email = trim($values[$this->getEmailFieldIndex()]);
    	$contact = ContactPeer::retreiveByEmail($email);

        if (null == $contact) {
            $contact = new Contact();
            $this->importedCount++;
        } else {
            if ($importType == ContactImporter::IMPORT_NEW) {
                return $contact;
            }
            $this->updatedCount++;
        }

        foreach($this->fields as $name => $fieldInfos) {
            $position = $fieldInfos['position'];
            if (!isset($values[$position])) {
                if ($fieldInfos['required']) {
                    throw new ContactImporterException(sprintf('Data is missing at position %d: %s', $position, implode('|', $values)));
                } else {
                    $values[$position] = '';
                }
            }

            if (preg_match("#\w#", trim($values[$fieldInfos['position']])) != 0) {
                $method = 'set' . $name;
                $contact->$method(trim($values[$position]));
            }
        }

        return $contact;
    }

    function processContact($values, $importType = ContactImporter::IMPORT_ALL)
    {
        $email = trim($values[$this->getEmailFieldIndex()]);
        if (!CatalyzEmailing::ValidateEmail($email)) {
            throw new Exception(sprintf('L\'email "%s" n\'est pas valide', $email));
        }


        $contact = ContactPeer::retreiveByEmail($email);
        $new = false;
        if ($contact == null) {
            $new = true;
        }

        $contact = $this->buildContact($values, $importType);
        $contact->save();

        if ($new) {
            foreach($this->groups as $groupId) {
                try {
                    $contactGroup = new ContactContactGroup();
                    $contactGroup->setContactId($contact->getId());
                    $contactGroup->setContactGroupId($groupId);
                    $contactGroup->save();
                }
                catch(PropelException $e) {
                }
            }
        } else {
            if ($importType == ContactImporter::IMPORT_ALL) {
                foreach($this->groups as $groupId) {
                    $group = ContactContactGroupPeer::retrieveByPK($contact->getId(), $groupId);
										if ($group == null) {
											$contactGroup = new ContactContactGroup();
											$contactGroup->setContactId($contact->getId());
											$contactGroup->setContactGroupId($groupId);
											$contactGroup->save();
                    }
                }
            }
        }

        return $contact;
    }

    public function addToGroup($group)
    {
        $this->groups[] = $group->getId();
    }

    public function addToGroupIds($groupIds)
    {
        $this->groups += $groupIds;
    }

    public function getImportedCount()
    {
        return $this->importedCount;
    }

    public function getUpdatedCount()
    {
        return $this->updatedCount;
    }

    public function getInDbCount()
    {
        return $this->inDbCount;
    }

    public function getStatusMessage()
    {
        $message = '';
        switch ($this->getImportedCount() + $this->getUpdatedCount()) {
            case 0:
                $message .= 'Aucun contact n\'a été traité. ';
                break;
            case 1:
                if ($this->getUpdatedCount()) {
                    $message .= '1 contact a été mis à jour.';
                } else {
                    $message .= '1 nouveau contact a été créé.';
                }
                break;
            default:
                switch ($this->getImportedCount()) {
                    case 0:
                        break;
                    case 1:
                        $message .= '1 nouveau contact a été créé.';
                        break;
                    default:
                        $message .= sprintf('%d nouveaux contacts ont étés créés.', $this->getImportedCount());
                } // switch
                switch ($this->getUpdatedCount()) {
                    case 0:
                        break;
                    case 1:
                        $message .= '1 contact a été mis à jour.';
                        break;
                    default:
                        $message .= sprintf('%d contacts ont étés mis à jour.', $this->getUpdatedCount());
                } // switch
        } // switch
        return $message;
    }

    public function ContactsInDb($values)
    {
        $criteria = new Criteria();
        $criteria->add(ContactPeer::EMAIL, trim($values[$this->getEmailFieldIndex()]));

        $contact = ContactPeer::doSelectOne($criteria);
        if (null != $contact) {
            $this->inDbCount++;
        }
        return true;
    }

    public function createDefaultConfiguration()
    {
        $this->registerField('FirstName', false);
        $this->registerField('LastName', false);
        $this->registerField('Company', false);
        $this->registerField('Email', true);

        for ($i = 1; $i <= sfConfig::get('app_fields_count'); $i++) {
            $this->registerField('Custom' . $i, false);
        }
    }

    public function getGroups()
    {
        return $this->groups;
    }

    public function setGroups($groups)
    {
        foreach ($groups as $group) {
            $this->groups[] = $group;
        }

        return $this->groups;
    }

    public function getFields()
    {
        return $this->fields;
    }
}

?>