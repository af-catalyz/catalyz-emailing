<?php

function thumbnail_with_border_path($source, $width, $height, $absolute = false)
{
	if (!$source) {
		return '';
	}

	$thumbnails_dir = sfConfig::get('app_sfThumbnail_thumbnails_dir', 'uploads/thumbnails');

	$width = intval($width);
	$height = intval($height);

	$is_url = false !== strpos($source, 'http');
	if ($is_url) {
		$realpath = $source;
	} else {
		if (substr($source, 0, 1) == '/') {
			$realpath = sfConfig::get('sf_web_dir') . $source;
		} else {
			$realpath = sfConfig::get('sf_web_dir') . '/images/' . $source;
		}
		if (!is_file($realpath)) {
			return '';
		}
		$imgData = getimagesize($realpath);

		if ($imgData['mime'] == 'image/x-ms-bmp') {
			$img = ImageCreateFromBmp($realpath);

			if (substr($source, 0, 1) == '/') {
				$realpath = sfConfig::get('sf_web_dir') . $source;
			} else {
				$realpath = sfConfig::get('sf_web_dir') . '/images/' . $source;
			}

			$infos = pathinfo($realpath);
			$realpath = $infos['dirname'] . '/' . $infos['filename'] . '.jpg';
			imagejpeg($img, $realpath);
		}
	}

	$real_dir = dirname($realpath);
	$thumb_dir = '/' . $thumbnails_dir . substr($real_dir, strlen(sfConfig::get('sf_web_dir')));
	$thumb_name = preg_replace('/^(.*?)(\..+)?$/', '$1_' . $width . 'x' . $height . '$2', basename($source));

	$img_from = $realpath;
	$thumb = $thumb_dir . '/' . $thumb_name;
	$img_to = sfConfig::get('sf_web_dir') . $thumb;

	if (!is_dir(dirname($img_to))) {
		if (!mkdir(dirname($img_to), 0777, true)) {
			throw new Exception('Cannot create directory for thumbnail : ' . $img_to);
		}
	}

	if (!is_file($img_to) || (!$is_url && filemtime($img_from) > filemtime($img_to))) {
		$thumbnail = new sfThumbnail($width, $height, true, false, 100, sfConfig::get('app_catalyz_image_adapter', 'sfImageMagickAdapter'));
		$thumbnail->loadFile($img_from);
		$thumbnail->save($img_to);

		$image = imagecreatefromstring($thumbnail->toString());

		imagerectangle($image, 0, 0, imagesx($image)-1, imagesy($image)-1, imagecolorallocate($image, 204, 204, 204));

		imagejpeg($image, $img_to, 100);
	}

	return image_path($thumb, $absolute);
}


?>