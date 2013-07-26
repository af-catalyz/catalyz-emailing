<?php $renderer = new CatalyzEmailTextRenderer();

$title = 'Newsletter Astia';
if (!empty($parameters['number'])) {
	$title .= $parameters['number'];
}
if (!empty($parameters['date'])) {
	$title .= sprintf('(%s)', $parameters['date']);
}
$renderer->renderHeader1($title);

if (!empty($parameters['edito'])) {
	$renderer->renderContent($parameters ['edito']);
}

if (!empty($parameters['zone_actu_title'])) {
	$renderer->renderHeader2($parameters ['zone_actu_title']);
}
if (!empty($parameters['zone_actu_content'])) {
	foreach ($parameters['zone_actu_content'] as $contenu){
		if (!empty($contenu['title'])) {
			$renderer->renderContent($contenu['title']);
		}
	}
}

if (!empty($parameters['zone_annexe_title'])) {
	$renderer->renderHeader2($parameters ['zone_annexe_title']);
}
if (!empty($parameters['zone_annexe_content'])) {
	$renderer->renderContent($parameters['zone_annexe_content']);
}

if (!empty($parameters['zone_experiences_title'])) {
	$renderer->renderHeader2($parameters ['zone_experiences_title']);
}
if (!empty($parameters['zone_experiences_content'])) {
	foreach ($parameters['zone_experiences_content'] as $contenu){
		if (!empty($contenu['title'])) {
			$renderer->renderContent($contenu['title']);
		}
		if (!empty($contenu['contenu'])) {
			$renderer->renderContent($contenu['contenu'].'<br/>');
		}
	}
}

if (!empty($parameters['breves'])) {
	$renderer->renderHeader2('Les brèves');
	foreach ($parameters['breves'] as $contenu){
		if (!empty($contenu['title'])) {
			$renderer->renderContent($contenu['title'].'<br/>');
		}
	}
}

if (!empty($parameters['agendas'])) {
	$renderer->renderHeader2('Agenda');
	foreach ($parameters['agendas'] as $contenu){
		if (!empty($contenu['date'])) {
			$renderer->renderContent($contenu['date']);
		}
		if (!empty($contenu['title'])) {
			$renderer->renderContent($contenu['title'].'<br/>');
		}
	}
}

if (!empty($parameters['zooms'])) {
	$renderer->renderHeader2('Zoom sur ...');
	foreach ($parameters['zooms'] as $contenu){
		if (!empty($contenu['title'])) {
			$renderer->renderContent($contenu['title'].'<br/>');
		}
	}
}

if (!empty($parameters['savoirs'])) {
	$renderer->renderHeader2('Le saviez vous ?');
	foreach ($parameters['savoirs'] as $contenu){
		if (!empty($contenu['title'])) {
			$renderer->renderContent($contenu['title'].'<br/>');
		}
	}
}

if (!empty($parameters['chiffres'])) {
	$renderer->renderHeader2('Les chiffres');
	foreach ($parameters['chiffres'] as $contenu){
		$text = '';
		if (!empty($contenu['number'])) {
			$text .= $contenu['number'];
		}
		if (!empty($contenu['title'])) {
			$text .= ' : '.$contenu['title'];
		}

		if ($text != '') {
			$renderer->renderContent($text.'<br/>');
		}
	}
}



if (
!empty($parameters['footer_title']) ||
!empty($parameters['adress']) ||
!empty($parameters['phone']) ||
!empty($parameters['fax']) ||
!empty($parameters['email'])
) {
	$renderer->renderHeader1('Nos coordonnées :');

	if (!empty($parameters['footer_title'])) {
		$renderer->renderContent($parameters ['footer_title']);
	}
	if (!empty($parameters['adress'])) {
		$renderer->renderContent($parameters ['adress']);
	}
	if (!empty($parameters['phone'])) {
		$renderer->renderContent('Tél. : '.$parameters ['phone']);
	}
	if (!empty($parameters['fax'])) {
		$renderer->renderContent('Fax : '.$parameters ['fax']);
	}
	if (!empty($parameters['email'])) {
		$renderer->renderContent('Email : '.$parameters ['email']);
	}
}


?>