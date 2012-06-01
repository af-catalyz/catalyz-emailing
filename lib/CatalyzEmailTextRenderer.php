<?php

class CatalyzEmailTextRenderer {
    protected $width;
    function __construct($width = 60)
    {
        $this->width = $width;
    }

    function renderFooter($content, $withSpacePrefix = true)
    {
        if (!empty($content)) {
        	if ($withSpacePrefix) {
        		echo "\n";
        	}echo "--\n" . $content; ;
        }
    }
    function renderHeader1($content, $withSpacePrefix = true)
    {
    	if (!empty($content)) {
    		if ($withSpacePrefix) {
    			echo "\n";
    		}
    		echo ' ** ' . wordwrap($content, $this->width, "\n ** ") . " ** \n";
    	}
    }
    function renderHeader2($content, $withSpacePrefix = true)
    {
        if (!empty($content)) {
            if ($withSpacePrefix) {
                echo "\n";
            }
            echo ' * ' . wordwrap($content, $this->width, "\n * ") . "\n";
        }
    }
    function renderContent($content, $withSpacePrefix = true)
    {
        if ($withSpacePrefix) {
        //    echo "\n";
        }
    	$converter = new html2text($content);
    	$converter->width = $this->width;

        echo $converter->get_text()."\n";
    }

    public function renderSubitems($items, $formating = array())
    {
        if (is_array($items)) {
            foreach($items as $item) {
                foreach($formating as $key => $methodName) {
                    $methodName = 'render' . $methodName;
                    $this->$methodName($item[$key]);
                }
            }
        }
    }
}

?>