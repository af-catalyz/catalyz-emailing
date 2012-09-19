<?php

function shortNumberFormat($number,$decimal=0){
	if ($number != 0) {
		return number_format($number,$decimal,',',' ');
	}
	return "-";
}

function number_format_catalyz($number,$color=false,$decimalNumber=2,$mirror=false){
	if ($number > 0) {
		if ($mirror) {
			$return = '+'.number_format($number,$decimalNumber,',',' ').'%';
			if ($color) {
				$return = '<span style="color:#C40000">'.$return.'</span>';
			}
			return $return;
		}
		else{
			$return = '+'.number_format($number,$decimalNumber,',',' ').'%';
			if ($color) {
				$return = '<span style="color:#4EAD00">'.$return.'</span>';
			}
			return $return;
		}
	}
	elseif($number<0){
		if ($mirror) {
			$return = number_format($number,$decimalNumber,',',' ').'%';
			if ($color) {
				$return = '<span style="color:#4EAD00">'.$return.'</span>';
			}
			return $return;
		}
		else{
			$return = number_format($number,$decimalNumber,',',' ').'%';
			if ($color) {
				$return = '<span style="color:#C40000">'.$return.'</span>';
			}
			return $return;
		}
	}
	else{
		return "-";
	}
}

function date_diff_catalyz($date1, $date2 = false)
{
	if ($date2 == false) {
		$date2 = strtotime('now');
	}

	$s = $date2-$date1;
	$d = intval($s/86400);
	return "$d";
}

function getEvolution($result,$result_older){
	return $result_older!=0 ?100 * ($result-$result_older)/$result_older:0;
}

function formatPosition($value)
{
    if (0 == $value) {
        return '<span style="font-size: small; color: #CACACA;">&gt; 100</span>';
    }
    if ($value > 10) {
        return '<span style="font-size: small; color: #FF0000;">' . $value . '</span>';
    }
    if ($value > 3) {
        return '<span style="font-size: small; color: #0000FF;">' . $value . '</span>';
    }
    return '<span style="font-size: small; color: #00FF00;">' . $value . '</span>';
}

function displayEvolutionMark($evolution, $importantChange = 10,$mirror=false)
{
    if (!$evolution) {
        return "&nbsp;";
    }

    if ($evolution > $importantChange) {
        $filename = $mirror?'arrow-double-down-red.png':'arrow-double-up-green.png';
    } elseif ($evolution > 0) {
        $filename = $mirror?'arrow-single-down-red.png':'arrow-single-up-green.png';
    } elseif ($evolution < - $importantChange) {
        $filename = $mirror?'arrow-double-up-green.png':'arrow-double-down-red.png';
    } elseif ($evolution < 0) {
        $filename = $mirror?'arrow-single-up-green.png':'arrow-single-down-red.png';
    }

    return image_tag($filename, array('title' => number_format_catalyz($evolution,false,0)));
}

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

function thumbnail_path($source, $width, $height, $absolute = false)
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
	}

	return image_path($thumb, $absolute);
}

function thumbnail_tag($source, $width, $height, $options = array())
{
	if (empty($options['alt'])) {
		$info = pathinfo($source);
		$options['alt'] = basename($source, '.' . @$info['extension']);
	}

	$img_src = thumbnail_path($source, $width, $height, false);
	return image_tag($img_src, $options);
}

function cz_image_tag($source, $options = array())
{
	if (!$source) {
		return '';
	}

	$options = _parse_attributes($options);

	$absolute = false;
	if (isset($options['absolute'])) {
		unset($options['absolute']);
		$absolute = true;
	}

	if (!isset($options['raw_name'])) {
		$options['src'] = image_path($source, $absolute);
	}else {
		$options['src'] = $source;
		unset($options['raw_name']);
	}

	if (isset($options['alt_title'])) {
		// set as alt and title but do not overwrite explicitly set
		if (!isset($options['alt'])) {
			$options['alt'] = $options['alt_title'];
		}
		if (!isset($options['title'])) {
			$options['title'] = $options['alt_title'];
		}
		unset($options['alt_title']);
	}

	if (isset($options['size'])) {
		list($options['width'], $options['height']) = explode('x', $options['size'], 2);
		unset($options['size']);
	}

	if (empty($options['alt'])) {
		$info = pathinfo($source);
		$options['alt'] = basename($source, '.' . $info['extension']);
	}

	return tag('img', $options);
}

function getThumbnailForced($src, $width, $height)
{
	$sfThumbnail1 = new sfThumbnail($width, $height);
	sfContext::getInstance()->getConfiguration()->loadHelpers(array('Asset', 'sfThumbnail', 'roundies', 'Tag'));

	$infos = pathinfo(sfConfig::get('sf_web_dir') . $src);

	$newImage = sfConfig::get('sf_web_dir') . '/uploads/thumbnails/uploads/assets/' . $infos['filename'] . '_' . $width . '_' . $height . '.' . $infos['extension'];

	if (!is_file($newImage)) {
		thumbnail_tag_forced(sfConfig::get('sf_web_dir') . $src, $newImage, $height, $width);
		if (is_readable($newImage)) {
			$sfThumbnail1->loadFile($newImage);
			$sfThumbnail1->save($newImage);
		}
	}

	return sprintf('<img alt="%s" src="%s" />', $infos['filename'], str_replace(sfConfig::get('sf_web_dir'), '', $newImage));
}

function bmp2gd($src, $dest = false)
{
	/**
	 * ** try to open the file for reading **
	 */
	if (!($src_f = fopen($src, "rb"))) {
		return false;
	}

	/**
	 * ** try to open the destination file for writing **
	 */
	if (!($dest_f = fopen($dest, "wb"))) {
		return false;
	}

	/**
	 * ** grab the header **
	 */
	$header = unpack("vtype/Vsize/v2reserved/Voffset", fread($src_f, 14));

	/**
	 * ** grab the rest of the image **
	 */
	$info = unpack("Vsize/Vwidth/Vheight/vplanes/vbits/Vcompression/Vimagesize/Vxres/Vyres/Vncolor/Vimportant",
	    fread($src_f, 40));

	/**
	 * ** extract the header and info into varibles **
	 */
	extract($info);
	extract($header);

	/**
	 * ** check for BMP signature **
	 */
	if ($type != 0x4D42) {
		return false;
	}

	/**
	 * ** set the pallete **
	 */
	$palette_size = $offset - 54;
	$ncolor = $palette_size / 4;
	$gd_header = "";

	/**
	 * ** true-color vs. palette **
	 */
	$gd_header .= ($palette_size == 0) ? "\xFF\xFE" : "\xFF\xFF";
	$gd_header .= pack("n2", $width, $height);
	$gd_header .= ($palette_size == 0) ? "\x01" : "\x00";
	if ($palette_size) {
		$gd_header .= pack("n", $ncolor);
	}
	/**
	 * ** we do not allow transparency **
	 */
	$gd_header .= "\xFF\xFF\xFF\xFF";

	/**
	 * ** write the destination headers **
	 */
	fwrite($dest_f, $gd_header);

	/**
	 * ** if we have a valid palette **
	 */
	if ($palette_size) {
		/**
		 * ** read the palette **
		 */
		$palette = fread($src_f, $palette_size);
		/**
		 * ** begin the gd palette **
		 */
		$gd_palette = "";
		$j = 0;
		/**
		 * ** loop of the palette **
		 */
		while ($j < $palette_size) {
			$b = $palette {
				$j++} ;
			$g = $palette {
				$j++} ;
			$r = $palette {
				$j++} ;
			$a = $palette {
				$j++} ;
			/**
			 * ** assemble the gd palette **
			 */
			$gd_palette .= "$r$g$b$a";
		}
		/**
		 * ** finish the palette **
		 */
		$gd_palette .= str_repeat("\x00\x00\x00\x00", 256 - $ncolor);
		/**
		 * ** write the gd palette **
		 */
		fwrite($dest_f, $gd_palette);
	}

	/**
	 * ** scan line size and alignment **
	 */
	$scan_line_size = (($bits * $width) + 7) >> 3;
	$scan_line_align = ($scan_line_size &0x03) ? 4 - ($scan_line_size &0x03) : 0;

	/**
	 * ** this is where the work is done **
	 */
	for($i = 0, $l = $height - 1; $i < $height; $i++, $l--) {
		/**
		 * ** create scan lines starting from bottom **
		 */
		fseek($src_f, $offset + (($scan_line_size + $scan_line_align) * $l));
		$scan_line = fread($src_f, $scan_line_size);
		if ($bits == 24) {
			$gd_scan_line = "";
			$j = 0;
			while ($j < $scan_line_size) {
				$b = $scan_line {
					$j++} ;
				$g = $scan_line {
					$j++} ;
				$r = $scan_line {
					$j++} ;
				$gd_scan_line .= "\x00$r$g$b";
			}
		}elseif ($bits == 8) {
			$gd_scan_line = $scan_line;
		}elseif ($bits == 4) {
			$gd_scan_line = "";
			$j = 0;
			while ($j < $scan_line_size) {
				$byte = ord($scan_line {
					$j++}
				);
				$p1 = chr($byte >> 4);
				$p2 = chr($byte &0x0F);
				$gd_scan_line .= "$p1$p2";
			}
			$gd_scan_line = substr($gd_scan_line, 0, $width);
		}elseif ($bits == 1) {
			$gd_scan_line = "";
			$j = 0;
			while ($j < $scan_line_size) {
				$byte = ord($scan_line {
					$j++}
				);
				$p1 = chr((int) (($byte &0x80) != 0));
				$p2 = chr((int) (($byte &0x40) != 0));
				$p3 = chr((int) (($byte &0x20) != 0));
				$p4 = chr((int) (($byte &0x10) != 0));
				$p5 = chr((int) (($byte &0x08) != 0));
				$p6 = chr((int) (($byte &0x04) != 0));
				$p7 = chr((int) (($byte &0x02) != 0));
				$p8 = chr((int) (($byte &0x01) != 0));
				$gd_scan_line .= "$p1$p2$p3$p4$p5$p6$p7$p8";
			}
			/**
			 * ** put the gd scan lines together **
			 */
			$gd_scan_line = substr($gd_scan_line, 0, $width);
		}
		/**
		 * ** write the gd scan lines **
		 */
		fwrite($dest_f, $gd_scan_line);
	}
	/**
	 * ** close the source file **
	 */
	fclose($src_f);
	/**
	 * ** close the destination file **
	 */
	fclose($dest_f);

	return true;
}

function ImageCreateFromBmp($filename)
{
	/**
	 * ** create a temp file **
	 */
	$tmp_name = tempnam("/tmp", "GD");
	/**
	 * ** convert to gd **
	 */
	if (bmp2gd($filename, $tmp_name)) {
		/**
		 * ** create new image **
		 */
		$img = imagecreatefromgd($tmp_name);
		/**
		 * ** remove temp file **
		 */
		unlink($tmp_name);
		/**
		 * ** return the image **
		 */
		return $img;
	}
	return false;
}

function uncamel($content, $separator = '_')
{
	$content = preg_replace('#(?<=[a-zA-Z])([A-Z])(?=[a-zA-Z])#e', "'$separator' . strtolower('$1')", $content);
	$content {
		0} = strtolower($content {
			0}
	);

	return $content;
}

function createDateStr($date){
	return mktime(0,0,0,date('n', strtotime($date)) , date('j', strtotime($date)), date('Y', strtotime($date)));;
}


function displaySortIcon($sens,$colonne,$parameter_sort,$parameter_column){
	if ($sens=='A') {
		if ($colonne==$parameter_column && $parameter_sort=="A") {
			return '<br/><i class="icon-chevron-up icon-grey"></i>';
		}
		else{
			return link_to('<br/><i class="icon-chevron-up"></i>','contacts/index?sort=A&column='.$colonne);
		}
	}
	else{
		if ($colonne==$parameter_column && $parameter_sort=="De") {
			return '<i class="icon-chevron-down icon-grey"></i>';
		}
		else{
			return link_to('<i class="icon-chevron-down"></i>','contacts/index?sort=De&column='.$colonne);
		}
	}
}



function unEscape($element){
	if ($element instanceof sfOutputEscaperArrayDecorator) {
		$element = $element->getRawValue();
	}

	return $element;
}