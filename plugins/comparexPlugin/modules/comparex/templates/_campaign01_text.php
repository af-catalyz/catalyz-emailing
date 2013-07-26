<?php $renderer = new CatalyzEmailTextRenderer();
$parameters = unEscape($parameters);

//print_r($parameters);

if (!empty($parameters['edito'])) {
    $renderer->renderContent($parameters ['edito']);
}

if (!empty($parameters['video_url'])) {
	echo "\n";

    echo czWidgetFormLink::displayLink($parameters ['video_url']);
}

if (!empty($parameters['video_promo_url'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['video_promo_url']);
}

if (isset($parameters['articles']) && is_array($parameters['articles'])) {
    foreach($parameters['articles'] as $article) {
    	echo "\n";
        $renderer->renderHeader2($article['title']);
        $renderer->renderContent($article['content']);
    	echo "\n";
        echo czWidgetFormLink::displayLink($article['button_url']);
    }
}

if (!empty($parameters['bottom_text'])) {
    $renderer->renderContent($parameters['fbooter']);
}
if (!empty($parameters['footer'])) {
	echo "\n";
    echo $parameters['footer'];
}

if (!empty($parameters['footer_email'])) {
	echo "\n";
	echo trim($parameters['footer_email']);
}

if (!empty($parameters['footer_url'])) {
	echo "\n";
	echo czWidgetFormLink::displayLink($parameters ['footer_url']);
}

?>