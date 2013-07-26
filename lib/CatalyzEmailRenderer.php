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

    protected $rules = array();
    public function addRule($name, $face, $style, $color, $size = false)
    {
        $this->rules[$name] = array(
            'face' => $face,
            'style' => $style,
            'color' => $color,
            'size' => $size
            );
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

    function renderWysiwyg($content, $link_color = false)
    {
    	foreach($this->rules as $name => $style) {
    		if($style['size']){
    			$replacement = sprintf('<font face="%s" style="%s" color="%s" size="%s">\1</font>', $style['face'], $style['style'], $style['color'], $style['size']);
    		}else{
    			$replacement = sprintf('<font face="%s" style="%s" color="%s">\1</font>', $style['face'], $style['style'], $style['color']);
    		}
    		$content = preg_replace(sprintf('|<[a-z]+ class="%s">([^<]+)</[a-z]+>|', $name), $replacement, $content);
    	}

		$fontTag_begin = sprintf('<font face="%s" style="%s" size="2" color="%s">', $this->face, $this->style, $this->color);
        if ($link_color) {
            $fontTag_begin_a = sprintf('<font face="%s" style="color:%s;text-decoration: underline;%s" size="2" color="%s">', $this->face, $link_color, $this->style, $link_color);
        } else {
            $fontTag_begin_a = sprintf('<font face="%s" style="text-decoration: underline;%s" size="2" color="%s">', $this->face, $this->style, $this->color);
        }

        $fontTag_end = '</font>';

        $content = $this->updateImageTag($content);

        //region link
        $content = str_ireplace('</a>', $fontTag_end . "</a>", $content);
        $content = $this->changeTag($content, "a", $fontTag_begin_a);
        //endregion

        //region li
        $content = str_ireplace('</li>', $fontTag_end . "</li>", $content);
        $content = $this->changeTag($content, "li", $fontTag_begin);
        //endregion

        //region td
        $content = str_ireplace('</td>', $fontTag_end . "</td>", $content);
        $content = $this->changeTag($content, "td", $fontTag_begin);
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
        $doc = new DOMDocument('1.0', 'UTF-8');
    		if (function_exists('mb_convert_encoding')) {
    			$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
    		}
        @$doc->loadHTML($content);

        //region $a_tags
        $ul_tags = $doc->getElementsByTagName('ul');
        foreach ($ul_tags as/*(DOMElement)*/ $ul_tag) {
            $style = $ul_tag->getAttribute('style');
            $style .= 'color:' . $color;
            $ul_tag->setAttribute('style', $style);
        }
        //endregion

        $content = $doc->saveHTML();

        $content = str_ireplace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">' . "\n<html><body>", '', $content);
        $content = str_ireplace('</body></html>', '', $content);

        echo $content;
    }

    function updateImageTag($content)
    {
        if (preg_match_all('/(?P<tag><img(?P<attr>[^>]*)\/>)/si', $content, $matches)) {
            if (!empty($matches['tag']) && 0 < count($matches['tag'])) {
                foreach ($matches['tag'] as $index => $tag) {
                    $attr = $matches['attr'][$index];
                    if (!preg_match('/border="/', $attr)) {
                        $attr .= ' border="0" ';
                    }
                    $content = str_replace($tag, sprintf('<img %s/>', $attr), $content);
                }
            }
        }
        return $content;
    }
}

?>