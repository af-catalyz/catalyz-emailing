<?php

/**
 * Skeleton subclass for representing a row from the 'campaign_link' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * jeu. 03 mai 2012 11:26:45 CEST
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package lib.model
 */
class CampaignLink extends BaseCampaignLink {
    public function getCollectorLink($position)
    {
        $key = sprintf('#EMAIL#-%d-%d', $this->getId(), $position);
        return CatalyzEmailing::getApplicationUrl() . '/campaign/link/key/' . $key;
    }

    protected function parse_query($val)
    {
        $var = html_entity_decode($val);
        $var = explode('&', $var);
        $arr = array();

        foreach($var as $val) {
            $x = explode('=', $val);
            $arr[$x[0]] = preg_replace('/\$([a-zA-Z0-9_]+)\$/', '#\1#', $x[1]) ; // "%24 = urlencode('$')
        }
        unset($val, $x, $var);
        return $arr;
    }

    public function getTrackedUrl()
    {
        $url = $this->getUrl();

        $campaign =/*(Campaign)*/ $this->getCampaign();

        if (!$campaign->getGoogleAnalyticsEnabled()) {
            return $url;
        }
        $url_parts = $this->parse_url($url);

        $possible_parameters = array();
        $possible_parameters['utm_source'] = $campaign->getGoogleAnalyticsSource();
        $possible_parameters['utm_content'] = $campaign->getGoogleAnalyticsContent();
        $possible_parameters['utm_medium'] = $campaign->getGoogleAnalyticsMedium();
        if ($campaign->getGoogleAnalyticsCampaignType() == Campaign::ANALYTICS_CAMPAIGN_NAME) {
            $possible_parameters['utm_campaign'] = $campaign->getName();
        } elseif ($campaign->getGoogleAnalyticsCampaignType() == Campaign::ANALYTICS_CAMPAIGN_SUBJECT) {
            $possible_parameters['utm_campaign'] = $campaign->getSubject();
        } else {
            $possible_parameters['utm_campaign'] = $campaign->getGoogleAnalyticsCampaignContent();
        }
        $possible_parameters['utm_term'] = $this->getGoogleAnalyticsTerm();

        foreach ($possible_parameters as $key => $value) {
            if (!empty($value)) {
                $url_parts['query'][$key] = $value;
            }
        }

        return $this->http_build_url($url_parts);
    }

    public function displayInGoogleAnalyticsTracker()
    {
        $uri = parse_url($this->getUrl(), PHP_URL_HOST);

        if (preg_match('#(w{3}\.?)(?<!www)(\w+-?)*\.([a-z]{2,4})#', $uri, $tok)) {
            foreach (sfConfig::get('app_divers_tracker_analytics_nofollow_domain', array()) as $domain) {
                if (isset($tok[2]) && $tok[2] == $domain) {
                    return false;
                }
            }
        }

        return true;
    }

    public function parse_url($url)
    {
        $result = parse_url(preg_replace('/#([a-zA-Z0-9_]+)#/', '$\1$', $url));
        $result['query'] = isset($result['query'])?$this->parse_query($result['query']):array();
        return $result;
    }

    public function http_build_url($url_parts)
    {
        if (!empty($url_parts['host'])) {
            $result = !empty($url_parts['scheme'])?$url_parts['scheme']:'http';
            $result .= '://';
            if (!empty($url_parts['user'])) {
                $result .= $url_parts['user'];
                if (!empty($url_parts['pass'])) {
                    $result .= ':' . $url_parts['pass'];
                }
                $result .= '@';
            }
            $result .= $url_parts['host'];
        } else {
            $result = '';
        }

        if (!empty($url_parts['path'])) {
            $result .= $url_parts['path'];
        }
        if (!empty($url_parts['query']) && (count($url_parts['query']) > 0)) {
            $url_parts['query'] = str_replace('%23', '#', http_build_query($url_parts['query']));

            $result .= '?' . $url_parts['query'];
        }
        if (!empty($url_parts['fragment'])) {
            $result .= '#' . $url_parts['fragment'];
        }
        return $result;
    }
} // CampaignLink