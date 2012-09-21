<?php

class CatalyzEmailRenderer {
    protected $face;
    protected $color;
    protected $style;

    function __construct($face, $color, $style)
    {
        $this->face = $face;
        $this->color = $color;
        $this->style = $style;
        return true;
    }

    function setStyle($style)
    {
        $this->style = $style;
    }

    function setFace($face)
    {
        $this->face = $face;
    }

    function setColor($color)
    {
        $this->color = $color;
    }

    function renderWysiwyg($content, $link_color= FALSE)
    {
        $fontTag_begin = sprintf('<font face="%s" style="%s" size="2" color="%s">', $this->face, $this->style, $this->color);
        if ($link_color) {
        	$fontTag_begin_a = sprintf('<font face="%s" style="color:%s;text-decoration: underline;%s" size="2" color="%s">', $this->face, $link_color, $this->style, $link_color);
        }else{
        	$fontTag_begin_a = sprintf('<font face="%s" style="text-decoration: underline;%s" size="2" color="%s">', $this->face, $this->style, $this->color);
        }

			  $fontTag_end = '</font>';

        //region link
        $content = str_ireplace('</a>', $fontTag_end . "</a>", $content);
        $content = $this->changeTag($content, "a", $fontTag_begin_a);
        //endregion

        //region li
        $content = str_ireplace('</li>', $fontTag_end . "</li>", $content);
        $content = $this->changeTag($content, "li", $fontTag_begin);
        //endregion

        //region p
        $content = str_ireplace('</p>', $fontTag_end . "</p>", $content);
        $content = $this->changeTag($content, "p", $fontTag_begin);
        //endregion

    		//region ul
    		$content = $this->changeUlTag($content, $this->color);
    		//endregion

    		//region br
    		$content = str_ireplace('<br>', "<br />", $content);
    		//endregion

        echo $content;
    }

    static function changeTag($content, $tag, $fontTag_begin, $fontTag_end = '</font>')
    {
        $lastOffset = 0;
        $offset = 0;

        while ($offset < strlen($content)) {
            $tokens = array();
            $linksNumber = preg_match(sprintf('/(<%s[^>]*>)/si', $tag), substr($content, $offset), $tokens, PREG_OFFSET_CAPTURE, 0);

            if (!$linksNumber) {
                return $content;
            } else {
                $lastOffset = $offset;
                $offset = $tokens[1][1];
                $contentMatchLink = $tokens[1][0];
                $statisticPrint = $fontTag_begin;

                $position = $lastOffset + $offset + strlen($contentMatchLink);
                $offset = $position + strlen($statisticPrint);
                $content = substr_replace($content, $statisticPrint, $position, 0);
            }
        }
    }

    static function changeUlTag($content, $color)
    {
    	$doc = new DOMDocument();
    	$doc->loadHTML($content);

    	//region $a_tags
    	$ul_tags = $doc->getElementsByTagName('ul');
    	foreach ($ul_tags as/*(DOMElement)*/ $ul_tag) {
    		$style = $ul_tag->getAttribute('style');
    		$style .= 'color:'.$color;
    		$ul_tag->setAttribute('style', $style);
    	}
    	//endregion

    	$content = $doc->saveHTML();

    	$content = str_ireplace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">' . "\n<html><body>", '', $content);
    	$content = str_ireplace('</body></html>', '', $content);

    	echo $content;
    }
}

?>