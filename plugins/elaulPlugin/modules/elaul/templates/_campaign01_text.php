<?php $renderer = new CatalyzEmailTextRenderer();

$parameters = unEscape($parameters);
$renderer->renderHeader1('Newsletter ELAUL');

if (!empty($parameters['edito'])) {
	$renderer->renderContent($parameters ['edito']);
}

if (!empty($parameters['products_subform'])) {
	$renderer->renderHeader1('Nos produits');

	foreach ($parameters['products_subform'] as $product){
		if (!empty($product['title'])) {
			$renderer->renderHeader2($product['title']);
		}
		if (!empty($product['content'])) {
			$renderer->renderContent($product['content']);
		}
	}
}

if (!empty($parameters['atouts'])) {
	if (!empty($product['atouts_title'])) {
		$renderer->renderHeader1($product['atouts_title']);
	}

	$renderer->renderContent($parameters['atouts']);
}

if (!empty($parameters['references_content'])) {
	if (!empty($product['references_title'])) {
		$renderer->renderHeader1($product['references_title']);
	}

	$renderer->renderContent($parameters['references_content']);
}


if (!empty($parameters['references_subform'])) {
	$renderer->renderHeader2('Exemples :');

	foreach ($parameters['references_subform'] as $reference){
		if (!empty($reference['title'])) {
			$renderer->renderHeader2($reference['title']);
		}
		if (!empty($reference['content'])) {
			$renderer->renderContent($reference['content']);
		}
	}
}

if (!empty($parameters['bottom_introduction']) || !empty($parameters['bottom_content'])) {
	$renderer->renderHeader1('Nos autres produits');
	$renderer->renderContent($parameters['bottom_introduction']);

	foreach ($parameters['bottom_content'] as $product){
		if (!empty($product['title'])) {
			$renderer->renderHeader2($product['title']);
		}
		if (!empty($product['content'])) {
			$renderer->renderContent($product['content']);
		}
	}
}


if (!empty($parameters['footer'])) {
	$renderer->renderHeader1('Nos coordonnées :');
	$renderer->renderContent($parameters['footer'], FALSE);
}


?>