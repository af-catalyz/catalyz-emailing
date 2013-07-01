<?php

function changeStrongTag($content)
{
	$fontTag_begin = sprintf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 22px; font-size: 18px;" size="2" color="#669933">');
	$fontTag_end = '</font>';

	//region link
	$content = str_ireplace('</strong>', $fontTag_end , $content);
	$content = str_ireplace('<strong>',  $fontTag_begin, $content);
	//endregion
	return $content;
}

function renderWysiwyg($content)
{
	$fontTag_begin_default = sprintf('<font face="%s" style="%s" size="2" color="%s">', 'Trebuchet MS, Helvetica, sans-serif', 'line-height: 18px; font-size: 14px;', '#666666');
	$fontTag_begin_a = sprintf('<font face="Trebuchet MS, Helvetica, sans-serif" style="line-height: 22px; font-size: 18px;" size="2" color="#669933">');
	$fontTag_end = '</font>';

	$formatter = new CatalyzEmailRenderer('Trebuchet MS, Helvetica, sans-serif', '#666666', 'line-height: 18px; font-size: 14px;');

	//region link
	$content = str_ireplace('</a>', $fontTag_end . "</a>", $content);
	$content = $formatter->changeTag($content, "a", $fontTag_begin_a);
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