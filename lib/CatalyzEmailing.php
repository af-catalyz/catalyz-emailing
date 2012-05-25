<?php

class CatalyzEmailing {
    static function getApplicationUrl()
    {
        $result = sfConfig::get('app_app_url');
        if (empty($result)) {
            throw new Exception('Application URL is not configured');
        }
        return $result;
    }

    static function ValidateEmail($email, $sender = null)
    {
        $atom = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]'; // caractères autorisés avant l'arobase
        $domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)

        $regex = '/^' . $atom . '+' . // Une ou plusieurs fois les caractères autorisés avant l'arobase
        '(\.' . $atom . '+)*' . // Suivis par zéro point ou plus
        // séparés par des caractères autorisés avant l'arobase
        '@' . // Suivis d'un arobase
        '(' . $domain . '{1,63}\.)+' . // Suivis par 1 à 63 caractères autorisés pour le nom de domaine
        // séparés par des points
        $domain . '{2,63}$/i'; // Suivi de 2 à 63 caractères autorisés pour le nom de domaine
        if (!preg_match($regex, $email)) {
            return false;
        }
        if (!sfConfig::get('app_options_email_validation')) {
            return true;
        }
        if (function_exists('checkdnsrr')) {
            $tokens = explode('@', $email);
            if (!checkdnsrr($tokens[1], 'MX') && !checkdnsrr($tokens[1], 'A')) {
                return false;
            }
        }
        // if ($sender == null) {
        // $sender = sfConfig::get('app_mail_from_email');
        // }
        // $SMTP_Validator = new SMTP_validateEmail();
        // $SMTP_Validator->debug = true;
        // $results = $SMTP_Validator->validate(array($email), $sender);
        // if (empty($results[$email])) {
        // return false;
        // }
        return true;
    }

    static function addStatisticsToLinks($content, $CampaignUrls, $clickedLinksPos)
    {
       	//$content = preg_replace('|(</head>)|i', sprintf('<link rel="stylesheet" href="%1$s/css/popover.css" /><link rel="stylesheet" href="%1$s/css/bootstrap-responsive.css" /><script type="text/javascript" src="%1$s/js/jquery.js"></script><script type="text/javascript" src="%1$s/js/bootstrap-tooltip.js"></script><script type="text/javascript" src="%1$s/js/bootstrap-popover.js"></script>\1', sfConfig::get('app_app_url')), $content);
       	$content = preg_replace('|(</head>)|i', sprintf('<link rel="stylesheet" href="%1$s/css/popover.css" /><link rel="stylesheet" href="%1$s/css/bootstrap-responsive.css" /><script type="text/javascript" src="%1$s/js/jquery.js"></script><script type="text/javascript" src="%1$s/js/bootstrap-tooltip.js"></script><script type="text/javascript" src="%1$s/js/bootstrap-popover.js"></script>\1', sfConfig::get('app_app_url')), $content);
    	 	$content = preg_replace('|(</body>)|i', '<script type="text/javascript">$(".add_popover").popover({trigger: "hover", delay: { show: 10, hide: 500 }}); </script>\1', $content);

        $content = str_replace('<a ', sprintf('<a style="position:relative;" '), $content);
        $content = self::addStats($content, $CampaignUrls, $clickedLinksPos);
        return $content;
    }

    static function addStats($content, $CampaignUrls, $clickedLinksPos)
    {
        $lastOffset = 0;
        $offset = 0;

        while ($offset < strlen($content)) {
            $tokens = array();
            $linksNumber = preg_match('/(<a.[^>]*.)/si', substr($content, $offset), $tokens, PREG_OFFSET_CAPTURE, 0);

            if (!$linksNumber) {
                return $content;
            } else {
                $lastOffset = $offset;
                $offset = $tokens[1][1];
                $contentMatchLink = $tokens[1][0];

                $url = array();
                $match = preg_match('/href="(?P<href>[^"]*)"/i', $contentMatchLink, $url);

                $href = false;
                if (isset($url['href'])) {
                    $href = $url['href'];
                }
                // si le lien appartient au liens de la campagne--------------------------------------
                if ($href && array_key_exists($href, $CampaignUrls)) {
                    $target = $href;

                    $curentPos = self::getUrlPosition($content, $target, $lastOffset);
                    $count = 0;
                    if (!empty($clickedLinksPos[$target]) && !empty($clickedLinksPos[$target][$curentPos])) {
                        $count = $clickedLinksPos[$target][$curentPos];
                    }

                    $rand = rand();
                    if ($count != 0) {
                        $number = $CampaignUrls[$href] / array_sum($CampaignUrls);
                        $number *= 100;

                        $numberLien = $count / array_sum($CampaignUrls);
                        $numberLien *= 100;
                    } else {
                        $number = 0;
                        $numberLien = 0;
                    }

                    $clicks = $count != 0?$CampaignUrls[$href]:0;
                    $clicksLien = $count;

                    if (empty($clickedLinksPos[$target]) || count($clickedLinksPos[$target]) <= 1) {
                        $statisticPrint = sprintf('
								<font face="Verdana, Geneva, sans-serif" style="font-size: 12px;font-weight:normal; " size="1" color="#000000">



								<a class="add_popover" rel="popover" style="position:absolute;" href="%s" target="_blank" data-content="<b>Nombre de clics :</b><br /><b>sur ce lien : </b>%d /%d (%d%%)<br />" data-original-title="%s">
										<span style="z-index:10;position:absolute;bottom:-35px;left:0;height:15px;width:50px;border:1px solid blue;background: white;">

										<span style="z-index:10;position:relative;height:15px;width:50px;float:left;">
												<span style="z-index:10;position:absolute;left:0;height:15px;width:
												%dpx;background: red;">&nbsp;</span>
												<span style="z-index:10;position:absolute;top: 7px;left:0;height:10px;width:20px;font-size: 10px">
												%d%%</span>
										</span>
									</span>
								</a>
							</font>
							', $target, $clicksLien, array_sum($CampaignUrls), $numberLien, $target, ceil($numberLien) / 2, $numberLien);
                    } else {
                        $statisticPrint = sprintf('
								<font face="Verdana, Geneva, sans-serif" style="font-size: 12px;font-weight:normal; " size="1" color="#000000">
								<a class="add_popover" rel="popover" style="position:absolute;" href="%s" target="_blank" data-content="<b>Nombre de clics :</b><br /><b>sur ce lien : </b>%d /%d (%d%%)<br /><b>&nbsp;&nbsp;&nbsp;&nbsp;pour cette url : </b>%d /%d (%d%%)<br />" data-original-title="%s">
										<span style="z-index:10;position:absolute;bottom:-35px;left:0;height:15px;width:50px;border:1px solid blue;background: white;">

										<span style="z-index:10;position:relative;height:15px;width:50px;float:left;">
												<span style="z-index:10;position:absolute;left:0;height:15px;width:
												%dpx;background: red;">&nbsp;</span>
												<span style="z-index:10;position:absolute;top: 7px;left:0;height:10px;width:20px;font-size: 10px">
												%d%%</span>
										</span>
									</span>
								</a>
							</font>
							', $target, $clicksLien, array_sum($CampaignUrls), $numberLien, $clicks, array_sum($CampaignUrls), $number, $target, ceil($numberLien) / 2, $numberLien);
                    }
                    $position = $lastOffset + $offset + strlen($contentMatchLink);
                    $offset = $position + strlen($statisticPrint);
                    $content = substr_replace($content, $statisticPrint, $position, 0);
                } else {
                    $position = $lastOffset + $offset + strlen($contentMatchLink);
                    $offset = $position;
                }
            }
        }
    }

    static function getUrlPosition($content, $url, $pos)
    {
        $newUrl = sprintf('<a style="position:relative;" href="%s"', $url);
        $count = substr_count($content, $newUrl);
        if ($count == 1) {
            return 1;
        } else {
            $count = substr_count(substr($content, 0 , $pos), $newUrl);
            return ++$count;
        }
    }

    static public function browscapEnable()
    {
        $filename = ini_get('browscap');
        if (!empty($filename) && file_exists($filename)) {
            return true;
        }

        return false;
    }

    static function slug($text, $default = '-')
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        if (function_exists('iconv')) {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }
        $text = strtolower($text);
        $text = preg_replace('~[^-a-zA-Z0-9]+~', '', $text);
        if (empty($text) || ('-' == $text)) {
            $text = $default;
        }
        return $text;
    }

    static function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir") self::rrmdir($dir . "/" . $object);
                    else unlink($dir . "/" . $object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    static protected function exploreZip($dir, $tokens, $root)
    {
        $dir_handle = opendir($dir);
        while ($file = readdir($dir_handle)) {
            if ($file != '.' && $file != '..' && $file != 'Thumbs.db') {
                $infos = pathinfo($dir . '/' . $file);
                if (!is_dir($dir . '/' . $file)) {
                    $part = str_ireplace($root, '', $infos['dirname']);
                    if (!empty($part)) {
                        $part .= '/';
                    }
                    $tokens[$part . $infos['basename']] = $dir . '/' . $file;
                } else {
                    $tokens = self::exploreZip($dir . '/' . $file, $tokens, $root);
                }
            }
        }

        closedir($dir_handle);

        return $tokens;
    }

    static function validateZip($dir, $path)
    {
        $thumb = false;

        $tokens = self::exploreZip($dir, array(), str_ireplace('.zip', '', $path));

        $error = array();
        //region compter le nombre de de fichier .html si > 1 return FALSE;
        $htmlCnt = array();
        foreach ($tokens as $name => $path) {
            if (preg_match('/html$/', $name)) {
                $htmlCnt[] = $path;
            }

            $title = sfConfig::get('app_thumbnail_name', 'preview.jpg');
            if (preg_match('/' . $title . '$/', $name)) {
                $thumb = $dir . '/' . $title;
            }
        }
        if (count($htmlCnt) != 1) {
            // mettre un message si 0 ou si >1
            if (count($htmlCnt) == 0) {
                sfContext::getInstance()->getUser()->setFlash('error', 'Aucun fichier html trouvé dans l\'archive');
            } else {
                sfContext::getInstance()->getUser()->setFlash('error', 'L\'archive ne doit contenir qu\'un seul fichier html');
            }
            return false;
        }
        //endregion

        //region verifier que les ressources locales sont présentes
        $htmlFile = array_shift($htmlCnt);

        $prefix = str_replace($dir, '', dirname($htmlFile)) . DIRECTORY_SEPARATOR;

        $content = file_get_contents($htmlFile);
        if (preg_match_all('|src="(?P<src>[^"]*)"|si', $content, $matchElements)) {
            foreach ($matchElements['src'] as $ressource) {
                if (empty($tokens[$prefix . $ressource])) {
                    // mettre un message il manque des ressources dans l'archive
                    $error[] = $ressource;
                }
            }
        }

        if (!empty($error)) {
            sfContext::getInstance()->getUser()->setFlash('error', sprintf('Certaines ressources necessaires ne sont pas présentes (%s).', implode(' ,', $error)));
            return false;
        }
        //endregion

        return array('html' => $htmlFile, 'image' => $thumb);
    }

    static function extractZip($src, $defaultPath = null)
    {
        $error = array();

        if ($defaultPath == null) {
            $defaultPath = sfConfig::get('sf_data_dir') . '/createFromZip';
        }

        $fileinfo = pathinfo($src);
        $rootPath = sprintf('%s/%s', $defaultPath, $fileinfo['filename']);
        if (!is_dir($rootPath)) {
            mkdir($rootPath, 0777, true);
        }

        $zip = new ZipArchive();

        if ($zip->open($src) === true) {
            for($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);
                $fileinfo = pathinfo($filename);
                if (empty($fileinfo['extension']) || in_array($fileinfo['extension'], array('jpg', 'gif', 'png', 'css', 'html'))) {
                    $zip->extractTo($rootPath, array($zip->getNameIndex($i)));
                } else {
                    $error[] = $fileinfo['basename'];
                }
                // here you can run a custom function for the particular extracted file
            }

            $zip->close();
        }
        // unlink($src);
        return array('error' => $error, 'zipLocation' => $rootPath);
    }

    public static function updateHtml($content)
    {
        $title = false;
        if (preg_match('/<title[^>]*>(.*?)<\/title>/is', $content, $tokens)) {
            $title = $tokens[1];
            $content = str_ireplace($tokens[0], '<title>#SUBJECT#</title>', $content);
        }

        return array('title' => $title, 'content' => $content);
    }

    static function smartCopy($source, $dest, $options = array('folderPermission' => 0755, 'filePermission' => 0755))
    {
        $result = false;

        if (is_file($source)) {
            if ($dest[strlen($dest) - 1] == '/') {
                if (!file_exists($dest)) {
                    cmfcDirectory::makeAll($dest, $options['folderPermission'], true);
                }
                $__dest = $dest . "/" . basename($source);
            } else {
                $__dest = $dest;
            }
            $result = copy($source, $__dest);
            chmod($__dest, $options['filePermission']);
        } elseif (is_dir($source)) {
            if ($dest[strlen($dest) - 1] == '/') {
                if ($source[strlen($source) - 1] == '/') {
                    // Copy only contents
                } else {
                    // Change parent itself and its contents
                    $dest = $dest . basename($source);
                    @mkdir($dest);
                    chmod($dest, $options['filePermission']);
                }
            } else {
                if ($source[strlen($source) - 1] == '/') {
                    // Copy parent directory with new name and all its content
                    @mkdir($dest, $options['folderPermission']);
                    chmod($dest, $options['filePermission']);
                } else {
                    // Copy parent directory with new name and all its content
                    if (!is_dir($dest)) {
                        mkdir($dest, $options['folderPermission'], true);
                    }
                    @mkdir($dest, $options['folderPermission']);
                    chmod($dest, $options['filePermission']);
                }
            }

            $dirHandle = opendir($source);
            while ($file = readdir($dirHandle)) {
                if ($file != "." && $file != "..") {
                    if (!is_dir($source . "/" . $file)) {
                        $__dest = $dest . "/" . $file;
                    } else {
                        $__dest = $dest . "/" . $file;
                    }
                    // echo "$source/$file ||| $__dest<br />";
                    $result = self::smartCopy($source . "/" . $file, $__dest, $options);
                }
            }
            closedir($dirHandle);
        } else {
            $result = false;
        }
        return $result;
    }

    static function getImages($content, $url, $dest)
    {
        $urlParts = parse_url($url);
        $rootUrl = sprintf('%s://%s', $urlParts['scheme'], $urlParts['host']);

        if (preg_match_all('|src="(?P<src>[^"]*)"|si', $content, $matchElements)) {
            foreach ($matchElements['src'] as $image) {
                if (preg_match('/(jpg|gif|png)$/', strtolower($image))) {
                    $path = $image;
                    if (preg_match('/^\//', $image)) {
                        $path = $rootUrl . $image;
                    }

                    $infos = pathinfo($path);
                    $newDest = sprintf('%s/%s', $dest, $infos['basename']);

                    if (!is_dir($dest)) {
                        mkdir($dest, 0777, true);
                    }

                    if (!is_file($newDest)) {
                        $bool = copy($path, $newDest);
                    }
                }
            }
        }

        if (preg_match_all('|href="(?P<target>[^"]*)"|si', $content, $matchElements)) {
            foreach ($matchElements['target'] as $target) {
                if (preg_match('/(css|pdf)$/', strtolower($target))) {
                    $path = $target;

                    if (preg_match('/^\//', $image)) {
                        $path = $rootUrl . $image;
                    }

                    $infos = pathinfo($path);
                    $newDest = sprintf('%s/%s', $dest, $infos['basename']);

                    if (!is_dir($dest)) {
                        mkdir($dest, 0777, true);
                    }

                    if (!is_file($newDest)) {
                        $bool = copy($path, $newDest);
                    }
                }
            }
        }
        return true;
    }

    static function extractFromUrl($url)
    {
        $content = file_get_contents($url);

        $updatedContent = self::updateHtml($content);
        $content = $updatedContent['content'];

        $ct = new CampaignTemplate();
        $ct->setTemplate($content);
        $ct->setName($updatedContent['title']);
        $ct->setPreviewFilename('/images/default_image.jpg');
        $ct->setIsArchived(0);
        $ct->save();

        $newPath = sprintf('%s/campaign-templates/%s', sfConfig::get('sf_upload_dir'), $ct->getId());

        self::getImages($content, $url, $newPath);

        $ct->updateImageUrl(false);

        return $ct;
    }

    static function getContactProviders()
    {
        $disabledProviders = sfConfig::get('app_providers_disabled', array());

        $additionnalProviders = sfConfig::get('app_providers_additionnal', array());
        if (!is_array($additionnalProviders)) {
            $additionnalProviders = array();
        }

        $defaultProviders = $additionnalProviders;
        $defaultProviders[] = 'ContactGroup';
        $defaultProviders[] = 'FromDatabase';
        $defaultProviders[] = 'FromEmail';
        $defaultProviders[] = 'CampaignOpen';
        $defaultProviders[] = 'CampaignNotOpen';

        $availableProviders = array();

        foreach($defaultProviders as $provider) {
            if (!in_array($provider, $disabledProviders)) {
                $availableProviders[$provider] = true;
            }
        }

        $availableProviders = array_keys($availableProviders);

        $result = array();
        foreach($availableProviders as $availableProvider) {
            $result[$availableProvider] = self::getProviderInstance($availableProvider);
        }
        return $result;
    }

    static function getProviderInstance($providerName)
    {
        $providerClassName = 'ContactProvider_' . $providerName;
        return new $providerClassName();
    }

    static function makeAbsoluteLink($link)
    {
        if ('/' == substr($link, 0, 1)) {
            return CatalyzEmailing::getApplicationUrl() . $link;
        }
        return $link;
    }

    static function getCustomFields()
    {
        $czSettings =/*(CatalyzSettings)*/ CatalyzSettings::instance();
        return $czSettings->get('contact.customsField', array());
    }

    static function getContactListDefaultColumns()
    {
        $default = array();
        $default['STATUS'] = true;
        $default['FULL_NAME'] = true;
        $default['COMPANY'] = true;
        $default['CREATED_AT'] = true;
        $default['GROUPS'] = true;

        $customFields = CatalyzEmailing::getCustomFields();
        foreach ($customFields as $key => $value) {
            $default[mb_strtoupper($key)] = false;
        }
        return $default;
    }

    static function createContactImportErrorLogExcel($errorRows)
    {
        $spreadsheet = new sfPhpExcel();

        $spreadsheet->getProperties()->setDescription('Exporté via Catalyz Emailing - www.catalyz.fr');

        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();
        $activeSheet->setTitle('Contacts');

        $activeSheet->setCellValue('A1', 'Prénom');
        $activeSheet->setCellValue('B1', 'Nom');
        $activeSheet->setCellValue('C1', 'Société');
        $activeSheet->setCellValue('D1', 'Email');

        $mapping = range('A', 'Z');

        $row = 2;
        foreach ($errorRows as $errorRow) {
            foreach ($errorRow as $cellPosition => $content) {
                $activeSheet->setCellValue($mapping[$cellPosition] . $row, $content);
            }
            $row++;
        }

        if (!is_dir(sfConfig::get("sf_web_dir") . '/temp/importContactErrors')) {
            mkdir(sfConfig::get("sf_web_dir") . '/temp/importContactErrors', 0777, true);
        }

        $filename = sprintf('/temp/importContactErrors/%s.xls', date('Ymd_His'));
        $long_filename = sfConfig::get("sf_web_dir") . $filename;

        $objWriter = new PHPExcel_Writer_Excel5($spreadsheet);
        $objWriter->save($long_filename);

        return $filename;
    }

		static function getCampaignsMenu(){
			$return = sprintf('<ul class="dropdown-menu"><li><a href="%s">%s</a></li>',url_for('@campaigns_do_create'),__('Créer une campagne'));

			//region $last3_prepared
			$criteria = new Criteria();
			$criteria->addDescendingOrderByColumn(CampaignPeer::UPDATED_AT);
			$criteria->add(CampaignTemplatePeer::IS_ARCHIVED,0);
			$criteria->add(CampaignPeer::IS_ARCHIVED, 0);
			$criteria->add(CampaignPeer::STATUS, Campaign::STATUS_SENDING, Criteria::LESS_THAN);
			$criteria->addDescendingOrderByColumn(CampaignPeer::UPDATED_AT);
			$criteria->setLimit(3);
			$criteria->setDistinct();

			$last3_prepared = CampaignPeer::doSelect($criteria);
			if (!empty($last3_prepared)) {
				$return .= sprintf('<li><a href="%s" class="nav-header">%s</a></li>',url_for('@campaigns'),__('Campagnes en préparation') );
				foreach ($last3_prepared as /*(Campaign)*/ $campaign){
					$return .= sprintf('<li><a href="%s">&nbsp;%s</a></li>', $campaign->getCatalyzUrl(), $campaign->getName());
				}
			}
			//endregion

			//region $last3_send
			$criteria = new Criteria();
			$criteria->addDescendingOrderByColumn(CampaignPeer::UPDATED_AT);
			$criteria->add(CampaignTemplatePeer::IS_ARCHIVED,0);
			$criteria->add(CampaignPeer::IS_ARCHIVED, 0);
			$criteria->add(CampaignPeer::STATUS, Campaign::STATUS_SENDING, Criteria::GREATER_EQUAL);
			$criteria->addDescendingOrderByColumn(CampaignPeer::UPDATED_AT);
			$criteria->setLimit(3);
			$criteria->setDistinct();

			$last3_send = CampaignPeer::doSelect($criteria);
			if (!empty($last3_send)) {
				$return .= sprintf('<li><a href="%s" class="nav-header">%s</a></li>', url_for('@campaigns?type=2'),__('Campagnes envoyées'));

				foreach ($last3_send as /*(Campaign)*/ $campaign){
					$return .= sprintf('<li><a href="%s">&nbsp;%s</a></li>', $campaign->getCatalyzUrl(), $campaign->getName());
				}
			}
			//endregion

			//region archived
			$criteria = new Criteria();
			$criteria->addDescendingOrderByColumn(CampaignPeer::UPDATED_AT);
			$criteria->add(CampaignTemplatePeer::IS_ARCHIVED,0);
			$criteria->add(CampaignPeer::IS_ARCHIVED, 1);
			$criteria->addDescendingOrderByColumn(CampaignPeer::UPDATED_AT);
			$criteria->setLimit(1);
			$criteria->setDistinct();

			$archived = CampaignPeer::doSelect($criteria);
			if (!empty($archived)) {
				$return .= sprintf('<li><a href="%s" class="nav-header">%s</a></li>', url_for('@campaigns?type=3'),__('Campagnes archivées'));
			}
			//endregion

			$return .= '<li class="divider"></li><li><a href="#">Gestion des modèles de campagnes</a></li></ul>';

			return $return;
		}
}

?>
