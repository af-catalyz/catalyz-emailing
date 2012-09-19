<?php

function thumbnail_with_mask($src, $absolute = false) {
	$sourceFilename = sfConfig::get('sf_web_dir') . $src;
	$infos = pathinfo($sourceFilename);

	$path = sprintf('%s.%s', $infos['filename'], $infos['extension']);
	$targetFilename = sfConfig::get('sf_web_dir') . '/uploads/custom/edito/' . $path;

	if (!is_dir(dirname($targetFilename))) {
		if (!mkdir(dirname($targetFilename), 0777, true)) {
			throw new Exception('Cannot create directory for thumbnail : ' . $targetFilename);
		}
	}

	if (empty($infos['extension'])) {
		return FALSE;
	}

	if (!is_file($sourceFilename)) { return ''; }

	if (!is_file($targetFilename) /*|| (filemtime($sourceFilename) > filemtime($targetFilename))*/) {
		createImage($src, $targetFilename);
	}

	$target=str_replace(sfConfig::get('sf_web_dir'), '', $targetFilename);

	if ($absolute) {
		return CatalyzEmailing::getApplicationUrl().$target;
	}else{
		return $target;
	}

}

function createImage($src, $targetFilename){

	$sourceFilename = sfConfig::get('sf_web_dir') . $src;

	$masque_path = sprintf('%s/atp5sPlugin/images/campaign01/masque.png', sfConfig::get('sf_web_dir'));

	if (!is_file($masque_path)) {
		return FALSE;
	}

	$corners = imagecreatefrompng($masque_path);

	$thumbnail = new sfThumbnail(305);
	$thumbnail->loadFile($sourceFilename);
	$cleanImage = $thumbnail->toResource();

	$image = imagecreatetruecolor(305, 106);

	$srcW = imagesx($cleanImage);
	$srcH = imagesy($cleanImage);

	$white = imagecolorallocate($image, 255, 255, 255);
	imagefilledrectangle  ($image, 0, 0 ,305, 106, $white);

	if ($srcW < 305) {
		$srcW = 305;
	}

	if ($srcH < 106) {
		$srcH = 106;
	}

	imagecopymerge_alpha($image, $cleanImage, 0, 0, 0, 0, $srcW, $srcH, 100);

	imagecopymerge_alpha($image, $corners, 0, 0, 0, 0, 305, 106, 100);

	$folder = dirname($targetFilename);
	if (!is_dir($folder)) {
		mkdir($folder, 0777, true);
	}

	$tokens = explode('.', $src);
	switch (strtolower(array_pop($tokens))) {
		case 'jpeg':
		case 'jpg':
			imagejpeg($image, $targetFilename, 100);
			break;
		case 'png':
			imagepng($image, $targetFilename);
			break;
		case 'gif':
			imagegif($image, $targetFilename);
			break;
	}

}

?>