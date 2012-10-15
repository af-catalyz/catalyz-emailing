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

function renderAtp5sWysiwyg($content, $style, $color)
{

	$fontTag_begin_default = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Arial', $style, $color);

	$fontTag_begin_a = sprintf('<font face="Arial" style="color:%s;text-decoration: underline;%s" size="2" color="%s">', $color, $style, $color);
	$fontTag_end = '</font>';

	$fontTag_begin_li = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Arial', $style, $color);

	$formatter = new CatalyzEmailRenderer('Arial',$color,$style);

	//region link
	$content = str_ireplace('</a>', $fontTag_end . "</a>", $content);
	$content = $formatter->changeTag($content, "a", $fontTag_begin_a);
	//endregion

	//region strong
	$content = str_ireplace('</strong>', $fontTag_end . "</strong>", $content);
	$content = $formatter->changeTag($content, "strong", $fontTag_begin_li);
	//endregion

	//region p
	$content = str_ireplace('</p>', $fontTag_end . "</p>", $content);
	$content = $formatter->changeTag($content, "p", $fontTag_begin_default);
	//endregion

	//region br
	$content = str_ireplace('<br>', "<br />", $content);
	$content = str_ireplace('<p>', "<p style=\"margin:0;padding:0;\">", $content);
	//endregion

	$content = updateLi($content, $style, $color);
	$content = str_ireplace('<ul>', '<br/><table width="100%" cellspacing="0" cellpadding="0" border="0">', $content);
	$content = str_ireplace('</ul>', "</table><br/>", $content);

	echo $content;
}

function updateLi($content, $style, $color)
{
	$appli_url = CatalyzEmailing::getApplicationUrl();

	if (preg_match_all('#(?P<tag><li(?P<attr>.*)>(?P<cont>.+)</li>)#sU', $content, $matches)) {
		if (!empty($matches['tag']) && 0 < count($matches['tag'])) {
			foreach ($matches['tag'] as $index => $tag) {


					$inside_contenu = $matches['cont'][$index];

						$new_tag = sprintf('
						<tr valign="top">
							<td style="line-height: 0px; font-size: 0px;" width="20">
							<img src="%1$s/atp5sPlugin/images/campaign01/bullet_02.gif" width="16" height="15" alt="" border="0" style="display: block;" />
							</td>
							<td>
								<font face="Arial" style="%3$s" size="2" color="%4$s">%2$s
								</font>
							</td>
						</tr>
					',$appli_url, $inside_contenu, $style, $color);

					$content = str_replace($tag, $new_tag, $content);
			}
		}
	}
	return $content;
}


?>