<?php

function renderFleuronsAnniversaireWysiwyg($content, $style, $color)
{
	$fontTag_begin_default = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Times New Roman, Georgia', $style, $color);

	$fontTag_begin_a = sprintf('<font face="Times New Roman, Georgia" style="color:%s;text-decoration: underline;%s" size="2" color="%s">', $color, $style, $color);
	$fontTag_end = '</font>';

	$fontTag_begin_li = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Times New Roman, Georgia', $style, $color);

	$formatter = new CatalyzEmailRenderer('Times New Roman, Georgia',$color,$style);

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
	$content =  changePTag($content, $fontTag_begin_default);
	//endregion

	//region br
	$content = str_ireplace('<br>', "<br />", $content);
	//endregion

	$content = str_ireplace('</span>', '</font></span>', $content);
	$content = str_ireplace('<span class="titre">', '<span class="titre"><font face="Times New Roman, Georgia" style="line-height:21px;	font-size:21px;" size="2" color="#36292c">', $content);
	$content = str_ireplace('<span class="texte-blanc">', '<span class="texte-blanc"><font face="Times New Roman, Georgia" style="line-height:20px;font-size:13px;font-style: italic;	" size="2" color="#FFFFFF">', $content);

	echo $content;
}


function changePTag($content, $fontTag_begin, $fontTag_end = '</font>')
{
	$lastOffset = 0;
	$offset = 0;

	while ($offset < strlen($content)) {
		$tokens = array();
		$linksNumber = preg_match(sprintf('/(<%s[^>]*>)/si', 'p'), substr($content, $offset), $tokens, PREG_OFFSET_CAPTURE, 0);

		if (!$linksNumber) {
			return $content;
		} else {
			if (preg_match('/titre/', $tokens[1][0])) {
				$fontTag_b = '<font face="Times New Roman, Georgia" style="line-height:21px;	font-size:21px;" size="2" color="#36292c">';
			}elseif(preg_match('/texte-blanc/', $tokens[1][0])){
				$fontTag_b = '<font face="Times New Roman, Georgia" style="line-height:20px;font-size:13px;font-style: italic;	" size="2" color="#FFFFFF">';
			}else{
				$fontTag_b = $fontTag_begin;
			}

			$lastOffset = $offset;
			$offset = $tokens[1][1];
			$contentMatchLink = $tokens[1][0];
			$statisticPrint = $fontTag_b;

			$position = $lastOffset + $offset + strlen($contentMatchLink);
			$offset = $position + strlen($statisticPrint);
			$content = substr_replace($content, $statisticPrint, $position, 0);
		}
	}
}

?>