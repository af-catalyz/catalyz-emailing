<?php

function thumbnail_with_border_path($source, $width, $height, $is_new = false)
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

	//if (!is_file($img_to) || (!$is_url && filemtime($img_from) > filemtime($img_to))) {
		$thumbnail = new sfThumbnail($width, $height, true, false, 100, sfConfig::get('app_catalyz_image_adapter', 'sfImageMagickAdapter'));
		$thumbnail->loadFile($img_from);
		$thumbnail->save($img_to);

		$image = imagecreatefromstring($thumbnail->toString());

		imagerectangle($image, 0, 0, imagesx($image)-1, imagesy($image)-1, imagecolorallocate($image, 230, 230, 230));

		if ($is_new) {
			$masque = sfConfig::get('sf_web_dir') . '/elaulPlugin/images/campaign01/ribbon.png';
			$corners = imagecreatefrompng($masque);

			imagecopymerge_alpha($image, $corners, 0, 0, 0, 0, imagesx($image), imagesy($image), 100);
		}


	imagejpeg($image, $img_to, 100);

	//}

	return image_path($thumb, FALSE);
}
/*
function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct) {
	if (!isset($pct)) {
		return false;
	}
	$pct /= 100;
	// Get image width and height
	$w = imagesx($src_im);
	$h = imagesy($src_im);
	// Turn alpha blending off
	imagealphablending($src_im, false);
	// Find the most opaque pixel in the image (the one with the smallest alpha value)
	$minalpha = 127;
	for($x = 0; $x < $w; $x++)
		for($y = 0; $y < $h; $y++) {
			$alpha = (imagecolorat($src_im, $x, $y) >> 24) &0xFF;
			if ($alpha < $minalpha) {
				$minalpha = $alpha;
			}
		}
	// loop through image pixels and modify alpha for each
	for($x = 0; $x < $w; $x++) {
		for($y = 0; $y < $h; $y++) {
			// get current alpha value (represents the TANSPARENCY!)
			$colorxy = imagecolorat($src_im, $x, $y);
			$alpha = ($colorxy >> 24) &0xFF;
			// calculate new alpha
			if ($minalpha !== 127) {
				$alpha = 127 + 127 * $pct * ($alpha - 127) / (127 - $minalpha);
			} else {
				$alpha += 127 * $pct;
			}
			// get the color index with new alpha
			$alphacolorxy = imagecolorallocatealpha($src_im, ($colorxy >> 16) &0xFF, ($colorxy >> 8) &0xFF, $colorxy &0xFF, $alpha);
			// set pixel with the new color + opacity
			if (!imagesetpixel($src_im, $x, $y, $alphacolorxy)) {
				return false;
			}
		}
	}
	// The image copy
	imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);
}
*/
function renderWysiwyg($content)
{

	$fontTag_begin_default = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Arial', 'line-height: 16px; font-size: 12px;', '#FFFFFF');
	$fontTag_begin_a = sprintf('<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#FFFFFF">');
	$fontTag_end = '</font>';

	$formatter = new CatalyzEmailRenderer('Arial', '#FFFFFF', 'line-height: 16px; font-size: 12px;');

	//region link
	$content = str_ireplace('</a>', $fontTag_end . "</a>", $content);
	$content = $formatter->changeTag($content, "a", $fontTag_begin_a);
	$content = str_ireplace('<a', '<a style="color: #FFFFFF"', $content);
	//endregion

	//region li
	$content = str_ireplace('</li>', $fontTag_end . "</li>", $content);
	$content = $formatter->changeTag($content, "li", $fontTag_begin_default);
	//endregion

	//region p
	$content = str_ireplace('</p>', $fontTag_end . "</p>", $content);
	$content = $formatter->changeTag($content, "p", $fontTag_begin_default);
	//endregion

	//region ul
	$content = $formatter->changeUlTag($content, '#666666');
	//endregion

	//region br
	$content = str_ireplace('<br>', "<br />", $content);
	$content = str_ireplace('<p>', "<p style=\"margin:0;padding:0;\">", $content);
	//endregion

	echo $content;
}

function renderAtouts($content)
{

	$fontTag_begin_default = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Arial', 'line-height: 16px; font-size: 12px;', '#102b44');
	$fontTag_begin_a = sprintf('<font face="Arial" style="line-height: 16px; font-size: 12px;" size="2" color="#102b44">');
	$fontTag_end = '</font>';

	$formatter = new CatalyzEmailRenderer('Arial', '#102b44', 'line-height: 16px; font-size: 12px;');

	//region link
	$content = str_ireplace('</a>', $fontTag_end . "</a>", $content);
	$content = $formatter->changeTag($content, "a", $fontTag_begin_default);
	//endregion

	//region li
	$content = str_ireplace('</li>', $fontTag_end . "</li>", $content);
	$content = $formatter->changeTag($content, "li", $fontTag_begin_default);
	//endregion

	//region p
	$content = str_ireplace('</p>', $fontTag_end . "</p>", $content);
	$content = $formatter->changeTag($content, "p", $fontTag_begin_default);
	//endregion

	//region ul
	$doc = new DOMDocument('1.0', 'UTF-8');
	$doc->loadHTML($content);

	$ul_tags = $doc->getElementsByTagName('ul');
	foreach ($ul_tags as/*(DOMElement)*/ $ul_tag) {
		$style = $ul_tag->getAttribute('style');
		$style .= 'color: #102b44; ';
		$style .= "padding-left: 10px; ";
		$ul_tag->setAttribute('style', $style);
	}


	$content = $doc->saveHTML();

	$content = str_ireplace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">' . "\n<html><body>", '', $content);
	$content = str_ireplace('</body></html>', '', $content);

	//endregion

	//region br
	$content = str_ireplace('<br>', "<br />", $content);
	$content = str_ireplace('<p>', "<p style=\"margin:0;padding:0;\">", $content);
	//endregion

	echo $content;
}

function renderQuestionBox($content)
{
	$fontTag_begin_default = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Arial', 'line-height: 22px; font-size: 18px;font-weight: bold;', '#ff8700');
	$fontTag_begin_a = sprintf('<font face="Arial" style="line-height: 22px; font-size: 18px; font-weight: bold;" size="2" color="#ff8700">');
	$fontTag_end = '</font>';

	$formatter = new CatalyzEmailRenderer('Arial', '#ff8700', 'line-height: 22px; font-size: 18px;font-weight: bold;');

	//region link
	$content = str_ireplace('</a>', $fontTag_end . "</a>", $content);
	$content = $formatter->changeTag($content, "a", $fontTag_begin_a);
	$content = str_ireplace('<a', '<a style="color: #ff8700"', $content);
	//endregion

	//region li
	$content = str_ireplace('</li>', $fontTag_end . "</li>", $content);
	$content = $formatter->changeTag($content, "li", $fontTag_begin_default);
	//endregion

	//region p
	$content = str_ireplace('</p>', $fontTag_end . "</p>", $content);
	$content = $formatter->changeTag($content, "p", $fontTag_begin_default);
	//endregion

	//region ul
	$content = $formatter->changeUlTag($content, '#666666');
	//endregion

	//region br
	$content = str_ireplace('<br>', "<br />", $content);
	$content = str_ireplace('<p>', "<p style=\"margin:0;padding:0;\">", $content);
	//endregion

	echo $content;
}

?>