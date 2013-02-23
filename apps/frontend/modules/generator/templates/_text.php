$renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

<?php
if (count($fields)) {
	foreach($fields as $fieldName => $fieldInfos) {
		switch($fieldInfos['type']){
			case 'url':
				printf("if (!empty(\$parameters['%s'])) {\n", $fieldName);
				printf("\techo \"\\n\";\n");
				printf("\techo czWidgetFormLink::displayLink(\$parameters ['%s']);\n", $fieldName);
				printf("}\n", $fieldName);
				break;
			case 'subform':
				printf("// SubForm: %s\n", $fieldName);
				break;
			default:
				printf("if (!empty(\$parameters['%s'])) {\n", $fieldName);
				printf("\techo \"\\n\";\n");
				printf("\techo \$renderer->renderContent(\$parameters['%s']);\n", $fieldName);
				printf("}\n", $fieldName);
				break;
		}
	}
} else {
	printf("Render your TEXT campaign template here\n");
}
?>
