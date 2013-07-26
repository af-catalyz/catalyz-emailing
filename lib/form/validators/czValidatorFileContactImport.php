<?php

class czValidatorFileContactImport extends sfValidatorFile {
    protected function configure($options = array(), $messages = array())
    {
        parent::configure($options, $messages);
        $this->addMessage('invalid_column_count', sprintf('Le fichier ne comporte pas entre 4 et %d colonnes (#count# trouvés)', 4 + sfConfig::get('app_fields_count')));
        $this->addMessage('invalid_tab_count', 'Le fichier comporte plusieurs onglets (il ne doit en comporter qu\'un)');
        // $this->addMessage('mime_types', '');
        if (empty($options['validated_file_class'])) {
            $this->setOption('validated_file_class', 'sfValidatedFileContactImport');
        }
    }

    protected function doClean($value)
    {
        try {
            $validatedFile = parent::doClean($value);
        }
        catch(Exception $e) {
            throw new sfValidatorError($this, $e->getMessage());
        }

    		$customFields = CatalyzEmailing::getCustomFields();
    		if (empty($customFields) && $validatedFile->numCols < 4) {
    				throw new sfValidatorError($this,
    				    sprintf('Le fichier ne comporte pas 4 colonnes (%d trouvés)', $validatedFile->numCols));
    		}else{
    			$max = 4 + count($customFields);
    			if (($validatedFile->numCols < 4) || ($validatedFile->numCols > $max)) {
    				throw new sfValidatorError($this,
    				    sprintf('Le fichier ne comporte pas entre 4 et %d colonnes (%d trouvés)', $max, $validatedFile->numCols));
    			}
    		}
        return $validatedFile;
    }
}

class sfValidatedFileContactImport extends sfValidatedFile {
    public $datas = null;
    public $numRows = null;
    public $numCols = null;
    public function __construct($originalName, $type, $tempName, $size)
    {
        parent::__construct($originalName, $type, $tempName, $size);

        $path = $this->doSave();
        if (preg_match('/^text\/plain;/', $this->getType())) {
						$importer = new CsvImporter($path);
        } else {
            $importer = new ExcelImporter($tempName);
        }

        $this->datas = $importer->datas;
        $this->numRows = $importer->numRows;
        $this->numCols = $importer->numCols;
    }

    function doSave()
    {
        $path = sfConfig::get('sf_data_dir') . '/import/' . $this->getOriginalName();
        $this->save($path, 0777, true, 0777);

        return $this->getSavedName();
    }
}

class ExcelImporter {
    public $numRows = null;
    public $datas = array();
    public $numCols = null;
    public $importerClass = 'ExcelImporter';

    function __construct($filename)
    {
        $data = new Spreadsheet_Excel_Reader();
        $data->setRowColOffset(0);
        $data->read($filename);

        if (count($data->sheets) > 1) {
            throw new Exception('Le fichier comporte plusieurs onglets (il ne doit en comporter qu\'un).');
        }

        $datas = $data->sheets[0]['cells'];

        array_shift($datas); // removing header
        $rowCount = 0;
        foreach($datas as $rowIndex => $col) {
            $a = array();
            foreach($col as $colIndex => $cell) {
                $a[$colIndex] = utf8_encode($cell);
            }
            $datas[$rowIndex] = $a;
            $this->numCols = max($this->numCols, $colIndex + 1);
            $rowCount++;
            // var_dump($a);
            // var_dump($this->datas[$rowIndex]);
        }
        $this->numRows = $rowCount; // removed header
        $this->datas = $datas; // removed header
    }
}

class CsvImporter {
    public $numRows = null;
    public $datas = array();
    public $numCols = null;
    public $importerClass = 'CsvImporter';

    function __construct($path)
    {
        $datas = $this->getDatas($path);
        array_shift($datas); // removing header
        $rowCount = 0;
        foreach($datas as $rowIndex => $col) {
            $a = array();

            if (count($col) > 1) {
                foreach($col as $colIndex => $cell) {
                    $a[$colIndex] = utf8_encode($cell);
                }

                $datas[$rowIndex] = $a;
                $this->numCols = max($this->numCols, $colIndex + 1);
                $rowCount++;
            } else {
                unset($datas[$rowIndex]);
            }
        }
        $this->numRows = $rowCount;
        $this->datas = $datas;
    }

    function getDatas($path, $sep = ';')
    {
        if (!is_file($path)) {
            return false;
        }

        $content = file_get_contents($path);
        $content = str_ireplace("\r", "", $content);
        $tokens = explode("\n", $content);

        $return = array();
        foreach ($tokens as $tok) {
            $cells = explode($sep, $tok);
            foreach ($cells as $k => $value) {
                if (substr($value, 0, 1) == '"') {
                    $value = substr_replace($value, '', 0, 1);
                }
                if (substr($value, - 1, 1) == '"') {
                    $value = substr_replace($value, '', - 1, 1);
                }
                $cells[$k] = $value;
            }
            $return[] = $cells;
        }

        return $return;
    }
}

?>
