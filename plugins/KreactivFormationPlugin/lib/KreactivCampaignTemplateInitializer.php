<?php

class KreactivCampaignTemplateInitializer extends CampaignTemplateInitializer {
    function execute(Campaign $campaign, CampaignTemplate $template)
    {
        $url = sfConfig::get('app_newsletter_template_url');
        if (empty($url)) {
            throw new Exception('Newsletter template URL is not defined');
        }
        $content = file_get_contents($url);
        $campaign->setContent($content);

        if (preg_match('#<title>(.+)</title>#i', $content, $tokens)) {
            $title = $tokens[1];
            $campaign->setSubject($title);

            if (preg_match('#(([0-9])\s*(ème|er)\s+(trimestre)\s+([0-9]+))#', $title, $tokens)) {
                $campaign->setName($tokens[1]);
            } else {
                $campaign->setName($title);
            }
        }
    }
}

?>