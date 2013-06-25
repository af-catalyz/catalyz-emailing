<?php

function renderLeft($content)
{
	$fontTag_begin_default = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Arial', 'line-height: 22px; font-size: 12px;', '#333333');

	$fontTag_begin_a = sprintf('<font face="Arial" style="line-height: 22px; font-size: 12px;" size="2" color="#336699">');
	$fontTag_end = '</font>';

	$fontTag_begin_li = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Arial', 'line-height: 22px; font-size: 12px;', '#336699');

	$formatter = new CatalyzEmailRenderer('Arial', '#333333', 'line-height: 22px; font-size: 12px;');

	//region link
	$content = str_ireplace('</a>', $fontTag_end . "</a>", $content);
	$content = $formatter->changeTag($content, "a", $fontTag_begin_a);
	//endregion

	//region li
	$content = str_ireplace('</li>', $fontTag_end . "</li>", $content);
	$content = $formatter->changeTag($content, "li", $fontTag_begin_li);
	//endregion

	//region strong
	$content = str_ireplace('</strong>', $fontTag_end . "</strong>", $content);
	$content = $formatter->changeTag($content, "strong", $fontTag_begin_li);
	//endregion

	//region p
	$content = str_ireplace('</p>', $fontTag_end . "</p>", $content);
	$content = $formatter->changeTag($content, "p", $fontTag_begin_default);
	//endregion

	//region ul
	$doc = new DOMDocument();
	$doc->loadHTML($content);

	$ul_tags = $doc->getElementsByTagName('ul');
	foreach ($ul_tags as/*(DOMElement)*/ $ul_tag) {
		$style = $ul_tag->getAttribute('style');
		$style .= 'color: #336699; ';
		$style .= "padding-left: 25px; ";
		$ul_tag->setAttribute('style', $style);
	}

	$content = $doc->saveHTML();

	$content = str_ireplace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">' . "\n<html><body>", '', $content);
	$content = str_ireplace('</body></html>', '', $content);

	//endregion

	//region br
	$content = str_ireplace('<br>', "<br />", $content);
	//$content = str_ireplace('<p>', "<p style=\"margin:0;padding:0;\">", $content);
	//endregion

	$content = updateImages($content, 206);

	echo $content;
}

function renderRight($content)
{
	$fontTag_begin_default = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Arial', 'line-height: 14px; font-size: 12px;', '#3b3b3b');

	$fontTag_begin_a = sprintf('<font face="Arial" style="line-height: 14px;" size="2" color="#990033">');
	$fontTag_end = '</font>';

	$fontTag_begin_li = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Arial', 'line-height: 14px; font-size: 12px;', '#990033');
	$fontTag_begin_h1 = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Arial', 'line-height: 17px; font-size: 15px; font-weight: bold;', '#3b3b3b');

	$formatter = new CatalyzEmailRenderer('Arial', '#3b3b3b', 'line-height: 14px; font-size: 12px;');

	//region link
	$content = str_ireplace('</a>', $fontTag_end . "</a>", $content);
	$content = $formatter->changeTag($content, "a", $fontTag_begin_a);
	//endregion

	//region li
	$content = str_ireplace('</li>', $fontTag_end . "</li>", $content);
	$content = $formatter->changeTag($content, "li", $fontTag_begin_default);
	//endregion

	//region strong
	$content = str_ireplace('</strong>', $fontTag_end . "</strong>", $content);
	$content = $formatter->changeTag($content, "strong", $fontTag_begin_li);
	//endregion

	//region p
	$content = str_ireplace('</p>', $fontTag_end . "</p>", $content);
	$content = $formatter->changeTag($content, "p", $fontTag_begin_default);
	//endregion

	//region h1
	$content = str_ireplace('</h1>', $fontTag_end . "</h1>", $content);
	$content = $formatter->changeTag($content, "h1", $fontTag_begin_h1);
	//endregion

	//region ul
	$doc = new DOMDocument();
	$doc->loadHTML($content);

	$ul_tags = $doc->getElementsByTagName('ul');
	foreach ($ul_tags as/*(DOMElement)*/ $ul_tag) {
		$style = $ul_tag->getAttribute('style');
		$style .= "padding-left: 25px; ";
		$ul_tag->setAttribute('style', $style);
	}

	$h1_tags = $doc->getElementsByTagName('h1');
	foreach ($h1_tags as/*(DOMElement)*/ $h1_tag) {
		$style = $h1_tag->getAttribute('style');
		$style .= sprintf('background-image: url(%s/SemAutomationplugin/images/campaign02/bullet.gif); background-repeat: no-repeat; margin-top: 0; margin-bottom: 0; border-top: 2px solid #c80a2e; padding-left: 26px; padding-right: 16px; padding-top: 5px;', CatalyzEmailing::getApplicationUrl());
		$h1_tag->setAttribute('style', $style);
	}

	$content = $doc->saveHTML();

	$content = str_ireplace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">' . "\n<html><body>", '', $content);
	$content = str_ireplace('</body></html>', '', $content);

	//endregion

	//region br
	$content = str_ireplace('<br>', "<br />", $content);
	$content = str_ireplace('<p>', "<p style=\"padding-left: 10px; padding-right: 10px;\">", $content);
	//endregion

	$content = updateImages($content);

	echo $content;
}

function updateImages($content, $maxWidth = 359)
{

	if (preg_match_all('|(?P<tag><img( class="(?P<class>[^"]+)")? src="(?P<src>[^"]*)"(?P<reste>[^>]*)[^>]*>)|si', $content, $matches)) {
		if (!empty($matches['tag']) && 0 < count($matches['tag'])) {
			foreach ($matches['tag'] as $index => $tag) {
				if (!empty($matches['src'][$index])) {
					$image = $matches['src'][$index];


						$imageSize = getimagesize($image);
						$src = $matches['src'][$index];
						$infos = pathinfo($image);

						$extractWidth = $imageSize[0];
						$extractHeight = $imageSize[1];

						if (preg_match('/width="(?P<width>\d+)"/si', $matches['reste'][$index], $tag_matches)) {
							$extractWidth = $tag_matches['width'];
						}
						if (preg_match('/height="(?P<height>\d+)"/si', $matches['reste'][$index], $tag_matches)) {
							$extractHeight = $tag_matches['height'];
						}

						if ($extractWidth > $maxWidth) {
							$content = str_replace($tag, thumbnail_tag($src, $maxWidth, 9999, array('absolute' => true)), $content);
						}
				}
			}
		}
	}
	return $content;
}

function updateBoxes($content, $maxWidth)
{
	$appli_url = CatalyzEmailing::getApplicationUrl();

	$box_orange = $maxWidth - 31;
	$box_grey = $maxWidth - 42;

	if (preg_match_all('#(?P<tag><p(?P<attr>.*)>(?P<cont>.+)</p>)#sU', $content, $matches)) {
		if (!empty($matches['tag']) && 0 < count($matches['tag'])) {
			foreach ($matches['tag'] as $index => $tag) {
				if (!empty($matches['attr'][$index])) {
					$attr = $matches['attr'][$index];
					$inside_contenu = $matches['cont'][$index];

					if (preg_match('/class="box_orange"/si', $attr, $tag_matches)) {
						$new_tag = sprintf('
					<table width="%3$s" bgcolor="#ff9900" cellspacing="0" cellpadding="0" border="0">
						<tr style="line-height: 0px; font-size: 0px;" valign="top">
							<td width="17" align="left"><img src="%1$s/SemAutomationplugin/images/campaign03/box_orange_1.gif" width="9" height="8" alt="" style="display: block;"  border="0" /></td>
							<td width="%4$s"><img src="%1$s/SemAutomationplugin/images/campaign03/sep_ff.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
							<td width="14" align="right"><img src="%1$s/SemAutomationplugin/images/campaign03/box_orange_2.gif" width="9" height="8" alt="" style="display: block;"  border="0" /></td>
						</tr>
						<tr>
							<td style="line-height: 0px; font-size: 0px;" width="17"><img src="%1$s/SemAutomationplugin/images/campaign03/sep_ff.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
							<td width="%4$s">
								<font face="Arial" style="line-height: 19px; font-size: 15px;font-weight: bold;" size="2" color="#FFFFFF">%2$s
								</font>
							</td>
							<td style="line-height: 0px; font-size: 0px;" width="14"><img src="%1$s/SemAutomationplugin/images/campaign03/sep_ff.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
						</tr>
						<tr style="line-height: 0px; font-size: 0px;" valign="bottom">
							<td width="17" align="left"><img src="%1$s/SemAutomationplugin/images/campaign03/box_orange_3.gif" width="9" height="8" alt="" style="display: block;"  border="0" /></td>
							<td width="%4$s"><img src="%1$s/SemAutomationplugin/images/campaign03/sep_ff.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
							<td width="14" align="right"><img src="%1$s/SemAutomationplugin/images/campaign03/box_orange_4.gif" width="9" height="8" alt="" style="display: block;"  border="0" /></td>
						</tr>
					</table>',$appli_url, $inside_contenu, $maxWidth, $box_orange);


						$content = str_replace($tag, $new_tag, $content);
					}

					if (preg_match('/class="box_grey"/si', $attr, $tag_matches)) {

						$new_tag = sprintf('
					<table width="%3$s" bgcolor="#cccccc" cellspacing="0" cellpadding="0" border="0">
						<tr style="line-height: 0px; font-size: 0px;" valign="top">
							<td width="21" align="left"><img src="%1$s/SemAutomationplugin/images/campaign03/box_grey_1.gif" width="6" height="9" alt="" style="display: block;"  border="0" /></td>
							<td width="%4$s"><img src="%1$s/SemAutomationplugin/images/campaign03/sep_cc.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
							<td width="21" align="right"><img src="%1$s/SemAutomationplugin/images/campaign03/box_grey_2.gif" width="6" height="9" alt="" style="display: block;"  border="0" /></td>
						</tr>
						<tr>
							<td style="line-height: 0px; font-size: 0px;" width="21"><img src="%1$s/SemAutomationplugin/images/campaign03/sep_cc.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
							<td width="%4$s">
								<font face="Arial" style="line-height: 15px; font-size: 12px;" size="2" color="#333333">%2$s
								</font>
							</td>
							<td style="line-height: 0px; font-size: 0px;" width="21"><img src="%1$s/SemAutomationplugin/images/campaign03/sep_cc.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
						</tr>
						<tr style="line-height: 0px; font-size: 0px;" valign="bottom">
							<td width="21" align="left"><img src="%1$s/SemAutomationplugin/images/campaign03/box_grey_3.gif" width="9" height="9" alt="" style="display: block;"  border="0" /></td>
							<td width="%4$s"><img src="%1$s/SemAutomationplugin/images/campaign03/sep_cc.gif" width="1" height="1" alt="" style="display: block;"  border="0" /></td>
							<td width="21" align="right"><img src="%1$s/SemAutomationplugin/images/campaign03/box_grey_4.gif" width="9" height="9" alt="" style="display: block;"  border="0" /></td>
						</tr>
					</table>',$appli_url, $inside_contenu, $maxWidth, $box_grey);


						$content = str_replace($tag, $new_tag, $content);
					}

				}
			}
		}
	}
	return $content;
}

function updateAMore($content, $maxWidth)
{
	$appli_url = CatalyzEmailing::getApplicationUrl();

	$a_width = $maxWidth-16;

	if (preg_match_all('#(?P<tag><a(?P<attr>.*)>(?P<cont>.+)</a>)#sU', $content, $matches)) {
		if (!empty($matches['tag']) && 0 < count($matches['tag'])) {
			foreach ($matches['tag'] as $index => $tag) {



				if (!empty($matches['attr'][$index])) {
					$attr = $matches['attr'][$index];
					$inside_contenu = $matches['cont'][$index];

					if (preg_match('/class="more"/si', $attr, $tag_matches)) {

						$copy = str_ireplace('<font face="Arial" style="line-height: 14px; font-size: 12px;color: #333333;" size="2" color="#333333">', '<font face="Arial" style="line-height: 18px; font-size: 12px;font-weight:bold;" size="2" color="#006666">', $tag);
						$copy = str_ireplace('#333333', '#006666', $copy);

						$new_tag = sprintf('<table width="%3$s" cellspacing="0" cellpadding="0" border="0">
						<tr valign="top">
							<td style="line-height: 0px; font-size: 0px;" width="16"><img src="%1$s/SemAutomationplugin/images/campaign03/bullet_a.gif" width="16" height="15" alt="" style="display: block;"  border="0" /></td>
							<td width="%4$s"><font face="Arial" style="line-height: 18px; font-size: 12px;font-weight:bold;" size="2" color="#006666">%2$s</font></td>
						</tr>
					</table>
					',$appli_url, $copy, $maxWidth, $a_width);


						$content = str_replace($tag, $new_tag, $content);
					}
				}
			}
		}
	}
	return $content;
}

function renderCampaign03($content, $column){

	if ($column == 'left') {
		$maxWidth = 225;
	}else{
		$maxWidth = 334;
	}

	$fontTag_begin_default = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Arial', 'line-height: 18px; font-size: 12px;', '#333333');
	$fontTag_begin_a = sprintf('<font face="%s" style="%" size="2" color="%s">', 'Arial', 'line-height: 18px; font-size: 12px;color: #333333', '#333333');
	$fontTag_end = '</font>';

	$fontTag_begin_h1 = sprintf('<font face="Arial" style="line-height: 20px; font-size: 17px;font-weight:bold;" size="2" color="#006666">');
	$fontTag_begin_h2 = sprintf('<font face="Arial" style="line-height: 17px; font-size: 14px;font-weight:bold;" size="2" color="#3b3b3b">');

	$formatter = new CatalyzEmailRenderer('Arial', '#333333', 'line-height: 18px; font-size: 12px;');

	//region link
	$content = str_ireplace('</a>', $fontTag_end . "</a>", $content);
	$content = $formatter->changeTag($content, "a", $fontTag_begin_a);
	//endregion

	//region li
	$content = str_ireplace('</li>', $fontTag_end . "</li>", $content);
	$content = $formatter->changeTag($content, "li", $fontTag_begin_default);
	//endregion

	$content = updateBoxes($content, $maxWidth);
	$content = updateAMore($content, $maxWidth);

	//region p
	$content = str_ireplace('</p>', $fontTag_end . "</p>", $content);
	$content = $formatter->changeTag($content, "p", $fontTag_begin_default);
	//endregion

	//region h1
	$content = str_ireplace('</h1>', $fontTag_end . "</h1>", $content);
	$content = $formatter->changeTag($content, "h1", $fontTag_begin_h1);
	//endregion

	//region h2
	$content = str_ireplace('</h2>', $fontTag_end . "</h2>", $content);
	$content = $formatter->changeTag($content, "h2", $fontTag_begin_h2);
	//endregion

	$content = str_ireplace('<ul>', '<ul style="margin-top: 10px; padding-left: 25px;">', $content);

	//region br
	$content = str_ireplace('<br>', "<br />", $content);
	//$content = str_ireplace('<p>', "<p style=\"padding-left: 10px; padding-right: 10px;\">", $content);
	//endregion

	$content = updateImages($content, $maxWidth);

	echo $content;
}

?>