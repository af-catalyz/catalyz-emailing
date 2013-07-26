<?php

class smti82ExterneCampaignTemplateInitializer extends CampaignTemplateInitializer {
    function execute(Campaign $campaign, CampaignTemplate $template)
    {
        $result = array();

        $result['title'] = 'Info Prévention Santé';
        $result['edition'] = sprintf('#X // %s %s', CatalyzDate::getFrenchMonth(date('m')), date('Y'));
        // $result['book'] = '';
        // $result['picture'] = '';
        $result['main_title'] = 'Dossier spécial';
        // $result['content'] = '';
        // $result['read_picture'] = '';
        $result['read_title'] = 'Lu pour vous';
        // $result['informations'] = '';
        $result['infos_title'] = 'Infos pratiques';
        $result['footer'] = 'Votre médecin du travail #PRENOM# #NOM#';
        // $result['fb_page'] = '';
        // $result['unsubscribe_email'] = '';
        $xml = czWidgetFormWizard::asXml($result);
        $campaign->setContent($xml);
    }
}