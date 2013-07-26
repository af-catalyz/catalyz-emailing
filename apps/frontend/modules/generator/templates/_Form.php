class <?php echo $className; ?> extends czForm {

	public function configure()
	{
		parent::configure();

<?php
$fields = $fields->getRawValue();
if (count($fields)) {
    foreach($fields as $fieldName => $fieldInfos) {
   		echo "\t\t//$fieldName - ".get_class($fieldInfos['mapper'])."\n";
   		echo "\t\t".$fieldInfos['mapper']->getFormCode()."\n";
    }
}
?>
	}
}