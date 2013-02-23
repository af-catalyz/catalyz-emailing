$formatter = new CatalyzFormFormatter3($form);

$formatter->startTabs('Tab 1', '...');
<?php
if (count($fields)) {
    foreach($fields as $fieldName => $fieldInfos) {
        printf("\$formatter->renderField('%s');\n", $fieldName);
    }
} else {
    printf("//\$formatter->renderField('field1');\n");
}
?>

$formatter->nextTab();
// move fields here

$formatter->endTabs();
