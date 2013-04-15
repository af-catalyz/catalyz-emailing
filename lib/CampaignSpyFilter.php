<?php

class CampaignSpyFilter {
    protected $CampaignLinkSerializer;
    protected $root_url;
    function __construct($CampaignLinkSerializer, $root_url)
    {
        $this->CampaignLinkSerializer = $CampaignLinkSerializer;
        $this->root_url = $root_url;
    }

    protected $links = array();
    protected function getSpyLink($url)
    {
        if (!isset($this->links[$url])) {
            $this->links[$url] = 1;
        }
        return sprintf('%s/campaign/link/key/#EMAIL#-%d-%d', $this->root_url, $this->getCampaignLinkId($url), $this->links[$url]++);
    }

    protected function getCampaignLinkId($url)
    {
        return $this->CampaignLinkSerializer->getCampaignLinkId($url);
    }

    public function execute($content)
    {
        $this->links = array();

        $links = $this->getLinkList($content);
        $serialized_map = $this->CampaignLinkSerializer->serialize($links);
        $result = '';
        $currentOffset = 0;
   // 	print_r($links);
        foreach($links as $linkOffset => $linkUrl) {
            $result .= substr($content, $currentOffset, $linkOffset - $currentOffset);
            $result .= $this->getSpyLink($linkUrl);
            $currentOffset = $linkOffset + strlen($linkUrl);
        }
        $result .= substr($content, $currentOffset);

        return $result;
    }
    protected function cleanUrl($url)
    {
        $result = str_replace('&amp;', '&', $url);
        // $result = preg_replace('/(#[^#]+)?$/s', '', $result);
        // printf('cleanUrl: %s - %s<br />', $url, $result);
        return $result;
    }

    public function getLinkList($content)
    {
        if (preg_match_all("/<a[^>]*href=\"([^\"]+)\"[^>]*>/", $content, $tokens, PREG_OFFSET_CAPTURE)) {
            $result = array();
            foreach ($tokens[1] as $element) {
                $result[$element[1]] = $this->cleanUrl($element[0]);
            }

            foreach($result as $resultKey => $resultItem) {
                if ((0 === strpos($resultItem, 'javascript:')) || (0 === strpos($resultItem, 'skype:')) || (0 === strpos($resultItem, 'mailto:')) || in_array($resultItem, array('#VIEW_ONLINE#', '#UNSUBSCRIBE#'))) {
                    unset($result[$resultKey]);
                }elseif (preg_match('|^(/?uploads/repository.+)$|', $resultItem) || preg_match('|^(/?uploads/assets.+)$|', $resultItem)) {
            		if ($resultItem[1] != '/') {
            			$result[$resultKey] = /*$this->root_url . */$resultItem;
            		} else {
            			$result[$resultKey] = /*$this->root_url . */substr($resultItem, 1);
            		}
            	}
            }
            return $result;
        }
        return array();
    }
}

?>