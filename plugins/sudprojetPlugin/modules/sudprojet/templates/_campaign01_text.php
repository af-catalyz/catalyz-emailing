<?php $renderer = new CatalyzEmailTextRenderer();

$parameters = unEscape($parameters);
$renderer->renderHeader1('Newsletter Sud Projet');

if (!empty($parameters['number'])) {
	$renderer->renderHeader2(utf8_decode($parameters['number']));
}

if (!empty($parameters['edito'])) {
	$renderer->renderContent(utf8_decode($parameters['edito']));
}

if (!empty($parameters['main_content'])) {

	foreach ($parameters['main_content'] as $main){
		if (!empty($main['title'])) {
			$renderer->renderHeader2(utf8_decode($main['title']));
		}
		if (!empty($main['introduction'])) {
			$renderer->renderContent(utf8_decode($main['introduction']));
		}
	}
}


if (!empty($parameters['grey_title'])) {
	$renderer->renderHeader2(utf8_decode($parameters['grey_title']));
}
if (!empty($main['grey_content'])) {
	$renderer->renderContent(utf8_decode($main['grey_content']));
}

if (!empty($parameters['other_articles'])) {

	foreach ($parameters['other_articles'] as $main){
		if (!empty($main['title'])) {
			$renderer->renderHeader2(utf8_decode($main['title']));
		}
		if (!empty($main['introduction'])) {
			$renderer->renderContent(utf8_decode($main['introduction']));
		}
	}

}

$renderer->renderHeader2('Contactez nous');
if (!empty($parameters['adress'])) {
	$renderer->renderContent($parameters['adress']);
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