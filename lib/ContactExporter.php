<?php

class ContactExporter {
    var $exportedCount = 0;
    function __construct($fields = array())
    {
        $this->setFieldDefinition($fields);
        $this->exportedCount = 0;
    }

    protected $fields = array();
    public function setFieldDefinition($fields)
    {
        $this->exportedCount = 0;
        $this->fields = $fields;
    }

    protected $spreadsheet;
    protected $activeSheet;
    public function start()
    {
        $this->spreadsheet = new sfPhpExcel();
        // $objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
        $this->spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

        $this->spreadsheet->setActiveSheetIndex(0);
        $this->activeSheet = $this->spreadsheet->getActiveSheet();
        $this->activeSheet->setTitle('Contacts');

        $this->activeSheet->setCellValueExplicit('A1', 'Prénom');
        $this->activeSheet->setCellValueExplicit('B1', 'Nom');
        $this->activeSheet->setCellValueExplicit('C1', 'Société');
        $this->activeSheet->setCellValueExplicit('D1', 'Email');
        $this->activeSheet->setCellValueExplicit('E1', 'Statut');

        for ($i = 1; $i <= sfConfig::get('app_fields_count'); $i++) {
            $cellName = chr(ord('E') + $i) . '1';
            $this->activeSheet->setCellValueExplicit($cellName, ContactPeer::getfieldLabel('CUSTOM' . $i));
        }

        $groupCriteria = new Criteria();
        $groupCriteria->addAscendingOrderByColumn(ContactGroupPeer::NAME);
        $groups = ContactGroupPeer::doSelect($groupCriteria);
        if ($groups) {
            $letter = 'K';
            foreach ($groups as $group) {
                $this->activeSheet->setCellValueExplicit($letter . '1', $group->getName());
                $letter = $this->plus($letter);
            }
        }
        if (count($this->fields) == 0) {
            throw new Exception('Fields have not been initialized');
        }
    }
    public function addContact(Contact $contact)
    {
        $groupCriteria = new Criteria();
        $groupCriteria->addAscendingOrderByColumn(ContactGroupPeer::NAME);
        $groups = ContactGroupPeer::doSelect($groupCriteria);
        $ContactGroups = array();

        foreach ($contact->getGroups() as $value) {
            $ContactGroups[$value->getId()] = $value->getId();
        }

        $letter = 'A';
        foreach($this->fields as $name => $position) {
            $this->activeSheet->setCellValueExplicitByColumnAndRow($position, $this->exportedCount + 2, $contact-> {
                    'get' . $name}
                ());
            $letter = $this->plus($letter);
        }

        $row = $this->exportedCount + 2;
        foreach ($groups as $group) {
            if (!empty($ContactGroups[$group->getId()])) {
                $this->activeSheet->setCellValueExplicit($letter . $row, ' X ');
            }else {
                $this->activeSheet->setCellValueExplicit($letter . $row, ' ');
            }
            $letter = $this->plus($letter);
        }
        $this->exportedCount++;
    }

    public function saveAsExcel2007($filename)
    {
        $objWriter = new PHPExcel_Writer_Excel2007($this->spreadsheet);
        $objWriter->save($filename);
    }

    public function saveAsExcel5($filename)
    {
        $objWriter = new PHPExcel_Writer_Excel5($this->spreadsheet);
        $objWriter->save($filename);
    }
    // function getExportFilename(){
    // return sprintf('export_catalyz_emailing_%s.xlsx', date('Ymd'));
    // }
    private function plus($letter)
    {
        $derniere_lettre = substr($letter, - 1, strlen($letter));
        $debut_de_la_chaine = substr($letter, 0, - 1);

        if ($derniere_lettre < 'Z') {
            return $debut_de_la_chaine . chr(ord($derniere_lettre) + 1);
        }else {
            $premiere_position_du_z = stripos($letter, 'Z');
            if ($premiere_position_du_z == 0) {
                return 'A' . str_ireplace('Z', 'A', $letter);
            }else {
                $letter = substr_replace($letter, chr(ord(substr($letter, $premiere_position_du_z - 1, 1)) + 1), $premiere_position_du_z - 1, 1);
                $letter = str_ireplace('Z', 'A', $letter);
                return $letter;
            }
        }
    }
}

?>