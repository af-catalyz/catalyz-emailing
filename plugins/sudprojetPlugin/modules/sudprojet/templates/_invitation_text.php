<?php $renderer = new CatalyzEmailTextRenderer();

$parameters = unEscape($parameters);
$renderer->renderHeader1('Invitation Sud Projet');

if (!empty($parameters['title'])) {
	$renderer->renderContent(utf8_decode($parameters['title']));
}
if (!empty($parameters['date'])) {
	$renderer->renderContent(utf8_decode($parameters['date']));
}
if (!empty($parameters['content'])) {
	$renderer->renderContent(utf8_decode($parameters['content']));
}


if(!empty($parameters['programme'])){
	$renderer->renderHeader2('Programme');
	foreach($parameters['programme'] as $programme){
		if(isset($programme['time'])){
			echo $programme['time'].' ';
		}
		if(isset($programme['title'])){
			echo $programme['title'].' ';
		}
		if(isset($programme['subtitle'])){
			echo $programme['subtitle'];
		}
		echo "\n";
	}
}

if(!empty($parameters['articles'])){
	foreach($parameters['articles'] as $article){
		$renderer->renderHeader2(utf8_decode($article['title']));
		$renderer->renderContent(utf8_decode($article['content']));
	}
}

$renderer->renderHeader2('Contactez nous');
if (!empty($parameters['adress'])) {
	$renderer->renderContent(utf8_decode($parameters['adress']));
}

if (!empty($parameters['zip'])) {
	$renderer->renderContent(utf8_decode($parameters['zip']));
}

if (!empty($parameters['city'])) {
	$renderer->renderContent(utf8_decode($parameters['city']));
}

if (!empty($parameters['phone'])) {
	$renderer->renderContent('Tel. : '.utf8_decode($parameters['phone']));
}

if (!empty($parameters['fax'])) {
	$renderer->renderContent('Fax  : '.utf8_decode($parameters['fax']));
}

if (!empty($parameters['email'])) {
	$renderer->renderContent('E-mail  : '.utf8_decode($parameters['email']));
}

if (!empty($parameters['website_adress'])) {
	$renderer->renderContent('Site web  : '.$parameters['website_adress']);
}

?>