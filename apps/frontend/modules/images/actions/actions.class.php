<?php

class imagesActions extends sfActions {
    public function executeCatalyzemailing($request)
    {
        list($email, $campaignId) = Campaign::extractKeyInformation($request->getParameter('key'));

        Campaign::LogView($campaignId, $email, $request->getHttpHeader('User-Agent'));

        $image = sfConfig::get('sf_web_dir') . '/images/spy.gif';
        sfConfig::set('sf_web_debug', false);
        $sfResponse = $this->getResponse();
        $sfResponse->setHttpHeader('Content-Type', 'image/gif');
        $sfResponse->setHttpHeader('Content-Length', filesize($image));
        $sfResponse->setContent(file_get_contents($image));
        $this->setLayout(false);
        return sfView::NONE;
    }

    public function executeForward($request)
    {
        if (preg_match('|^/images/t/([^/]+-\d+-[^/]+)(/.+)$|', $request->getPathInfo(), $tokens)) {
            $key = $tokens[1];
            $image = $tokens[2];
            try {
                list($email, $campaignId) = Campaign::extractKeyInformation($key);

                Campaign::LogView($campaignId, $email, $request->getHttpHeader('User-Agent'));
            }
            catch(Exception $e) {
            	//$this->forward404($e->getMessage());
            }

            $this->getResponse()->setStatusCode(302);
            $this->getResponse()->setHttpHeader('Location', $image);
        }

        return sfView::NONE;
    }
}