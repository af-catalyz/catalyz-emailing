<?php

class catalyzemailingInitializeTask extends sfPropelBaseTask {
    protected function configure()
    {
        $this->namespace = 'catalyz-emailing';
        $this->name = 'initialize';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [catalyz-emailing:initialize|INFO] task does things.
Call it with:

  [php symfony catalyz-emailing:initialize|INFO]
EOF;
        $this->addArgument('application', sfCommandArgument::OPTIONAL, 'The application name', 'frontend');
        $this->addOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev');
        $this->addOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel');
        // add other options here
    }

    protected function execute($arguments = array(), $options = array())
    {
        // Database initialization
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = Propel::getConnection($options['connection'] ? $options['connection'] : '');
        sfContext::createInstance($this->configuration, 'default');
        // add code here
        // CampaignTemplatePeer::doDeleteAll();
        switch (sfConfig::get('sf_environment')) {
            case 'ot':
                $template = new CampaignTemplate();
                $template->setName('Escale Pratique');
                $template->setPreviewFilename('/OfficeTourismeMontauban/images/escale.jpg');
                $template->setTemplate($this->getPartial('OfficeTourismeMontauban/escale'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Agenda Pratique');
                $template->setPreviewFilename('/OfficeTourismeMontauban/images/agenda.jpg');
                $template->setTemplate($this->getPartial('OfficeTourismeMontauban/agenda'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('NewsLetter');
                $template->setPreviewFilename('/OfficeTourismeMontauban/images/newsletter2011.jpg');
                $template->setTemplate($this->getPartial('OfficeTourismeMontauban/newsletter2011'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Voeux 2012');
                $template->setPreviewFilename('/OfficeTourismeMontauban/images/voeux2012.jpg');
                $template->setTemplate($this->getPartial('OfficeTourismeMontauban/voeux2012'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('NewsLetter (avec assistant)');
                $template->setPreviewFilename('/OfficeTourismeMontauban/images/newsletter2012.jpg');
                $template->setInitializer('OtNewsletter2012CampaignTemplateInitializer');
                $template->setClassName('OtNewsletter2012CampaignTemplateHandler');
                $template->save();
                break;
            case 'kreactiv':
                $template = new CampaignTemplate();
                $template->setName('Kreactiv Formation');
                $template->setPreviewFilename('/KreactivFormation/images/newsletter.jpg');
                $template->setTemplate($this->getPartial('KreactivFormation/newsletter'));
                $template->setInitializer('KreactivCampaignTemplateInitializer');
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Newsletter Agence');
                $template->setPreviewFilename('/KreactivFormation/images/agence.jpg');
                $template->setTemplate($this->getPartial('KreactivFormation/agence'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Newsletter Agence2010');
                $template->setPreviewFilename('/KreactivFormation/images/agence2010.jpg');
                $template->setTemplate($this->getPartial('KreactivFormation/agence2010'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Newsletter Agence Mai 2011');
                $template->setClassName('KreactivNewsletter20110511CampaignTemplateHandler');
                $template->setPreviewFilename('/KreactivFormation/images/newsletter20110511.jpg');
                $template->setTemplate(false);
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Newsletter Anniversaire');
                $template->setPreviewFilename('/KreactivFormation/images/newsletter20110517.jpg');
                $template->setTemplate($this->getPartial('KreactivFormation/newsletter20110517'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Zen attitude');
                $template->setPreviewFilename('/KreactivFormation/images/zen.jpg');
                $template->setTemplate($this->getPartial('KreactivFormation/zen'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Newsletter "Croissant"');
                $template->setClassName('KreactivNewsletter20111020CampaignTemplateHandler');
                $template->setPreviewFilename('/KreactivFormation/images/newsletter20111020.jpg');
                $template->setTemplate(false);
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('INVITATION - Catalyz e-mailing (avec assistant)');
                $template->setClassName('KreactivNewsletter20120109CampaignTemplateHandler');
                $template->setPreviewFilename('/KreactivFormation/images/invitation20110718.jpg');
                $template->setTemplate(false);
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Voeux 2012');
                $template->setPreviewFilename('/KreactivFormation/images/voeux2012.jpg');
                $template->setTemplate($this->getPartial('KreactivFormation/voeux2012'));
                $template->save();


	            	$template = new CampaignTemplate();
	            	$template->setName('INVITATION 2 - Catalyz e-mailing (avec assistant)');
	            	$template->setClassName('KreactivNewsletter20120510CampaignTemplateHandler');
	            	$template->setPreviewFilename('/KreactivFormation/images/invitation20120510.jpg');
	            	$template->setTemplate(false);
	            	$template->save();

	            	$template = new CampaignTemplate();
	            	$template->setName('Déménagement');
	            	$template->setPreviewFilename('/KreactivFormation/images/demenagement.jpg');
	            	$template->setTemplate($this->getPartial('KreactivFormation/demenagement'));
	            	$template->save();


                break;

            case 'waterproof':
                $template = new CampaignTemplate();
                $template->setName('PHPEdit Monthly Newsletter');
                $template->setPreviewFilename('/WaterProof/images/monthly.jpg');
                $template->setTemplate($this->getPartial('WaterProof/monthly'));
                // $template->setInitializer('KreactivCampaignTemplateInitializer');
                $template->save();

	            	$template = new CampaignTemplate();
	            	$template->setName('PHPEdit Newsletter (assisté)');
	            	$template->setClassName('waterproofCampaign01CampaignTemplateHandler');
	            	$template->setPreviewFilename('/WaterProof/images/campaign01.jpg');
	            	//$template->setInitializer('waterproofCampaign01TemplateInitializer');
	            	$template->setTemplate(false);
	            	$template->save();
                break;
            case 'marcom':
                $template = new CampaignTemplate();
                $template->setName('EUKP');
                $template->setPreviewFilename('/marcom/images/eukp.jpg');
                $template->setTemplate($this->getPartial('marcom/eukp'));
                // $template->setInitializer('KreactivCampaignTemplateInitializer');
                $template->save();
                break;
            case 'kogys':
                $template = new CampaignTemplate();
                $template->setName('Actualités');
                $template->setPreviewFilename('/Kogys/images/news.jpg');
                $template->setTemplate($this->getPartial('Kogys/news'));
                // $template->setInitializer('KreactivCampaignTemplateInitializer');
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Prix');
                $template->setPreviewFilename('/Kogys/images/prices.jpg');
                $template->setTemplate($this->getPartial('Kogys/prices'));
                // $template->setInitializer('KreactivCampaignTemplateInitializer');
                $template->save();
                break;
            case 'asfo':
                $template = new CampaignTemplate();
                $template->setName('Modele 1');
                $template->setPreviewFilename('/asfo/images/campaign01.jpg');
                $template->setTemplate($this->getPartial('asfo/campaign01'));
                // $template->setInitializer('KreactivCampaignTemplateInitializer');
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Modele 2');
                $template->setPreviewFilename('/asfo/images/campaign02.jpg');
                $template->setTemplate($this->getPartial('asfo/campaign02'));
                // $template->setInitializer('KreactivCampaignTemplateInitializer');
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Newsletter "Développement panier client"');
                $template->setClassName('AsfoDeveloppementCampaignTemplateHandler');
                $template->setPreviewFilename('/asfo/images/asfoDeveloppement.jpg');
                $template->setTemplate(false);
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Newsletter "Promotion"');
                $template->setClassName('AsfoPromotionCampaignTemplateHandler');
                $template->setPreviewFilename('/asfo/images/asfoPromotion.jpg');
                $template->setTemplate(false);
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Newsletter "Calendrier"');
                $template->setClassName('AsfoCalendrierCampaignTemplateHandler');
                $template->setPreviewFilename('/asfo/images/asfoCalendrier.jpg');
                $template->setTemplate(false);
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Newsletter "Calendrier 2"');
                $template->setClassName('AsfoCalendrier2CampaignTemplateHandler');
                $template->setPreviewFilename('/asfo/images/asfoCalendrier2.jpg');
                $template->setTemplate(false);
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Voeux 2012');
                $template->setClassName('AsfoVoeux2012CampaignTemplateHandler');
                $template->setPreviewFilename('/asfo/images/asfoVoeux2012.jpg');
                $template->setTemplate(false);
                $template->save();

                break;
            case 'entreprunners':
                $template = new CampaignTemplate();
                $template->setName('Newsletter Entrep\'Runners');
                $template->setPreviewFilename('/EntrepRunners/images/monthly.jpg');
                // $template->setTemplate($this->getPartial('EntrepRunners/monthly'));
                $template->setInitializer('EntreprunnersCampaignTemplateInitializer');
                $template->save();
                break;
            case 'anovo':
                $template = new CampaignTemplate();
                $template->setName('Anovo - Facebook');
                $template->setPreviewFilename('/anovo/images/facebook.jpg');
                $template->setTemplate($this->getPartial('anovo/facebook'));
                // $template->setInitializer('EntreprunnersCampaignTemplateInitializer');
                $template->save();
                break;
            case 'nutritis':
                $template = new CampaignTemplate();
                $template->setName('Voeux 2011 - Français');
                $template->setPreviewFilename('/nutritis/images/voeux2011.jpg');
                $template->setTemplate($this->getPartial('nutritis/voeux2011'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Voeux 2011 - Anglais');
                $template->setPreviewFilename('/nutritis/images/wishes2011.jpg');
                $template->setTemplate($this->getPartial('nutritis/wishes2011'));
                $template->save();
                break;
            case 'irfa':
                $template = new CampaignTemplate();
                $template->setName('Voeux 2011');
                $template->setPreviewFilename('/irfa/images/voeux2011.jpg');
                $template->setTemplate($this->getPartial('irfa/voeux2011'));
                $template->save();
                break;

            case 'free':
                $template = new CampaignTemplate();
                $template->setName('Vierge');
                $template->setPreviewFilename('/czEmailingEmptyTemplatePlugin/images/empty.jpg');
                $template->setTemplate($this->getPartial('czEmailingEmptyTemplate/empty'));
                $template->save();
                break;

            case 'catalyz':
                $template = new CampaignTemplate();
                $template->setName('Modele 1');
                $template->setPreviewFilename('/catalyz/images/campaign01.jpg');
                $template->setTemplate($this->getPartial('catalyz/campaign01'));
                $template->save();
                break;

            case 'semAutomation':
                $template = new CampaignTemplate();
                $template->setName('Modèle 1');
                $template->setPreviewFilename('/SemAutomation/images/campaign01.jpg');
                $template->setTemplate($this->getPartial('SemAutomation/campaign01'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Modèle vierge');
                $template->setClassName('SemAutomationViergeCampaignTemplateHandler');
                $template->setPreviewFilename('/SemAutomation/images/semAutomationVierge.jpg');
                $template->setInitializer('SemAutomationCampaignTemplateInitializer');
                $template->setTemplate(false);

                $template->save();
                break;

            case 'astia':
                $template = new CampaignTemplate();
                $template->setName('Modèle 1');
                $template->setPreviewFilename('/astia/images/campaign01.jpg');
                $template->setTemplate($this->getPartial('astia/campaign01'));
                $template->save();

	            	$template = new CampaignTemplate();
	            	$template->setName('Newsletter Astia (assistée)');
	            	$template->setClassName('astiaNewsletter2012CampaignTemplateHandler');
	            	$template->setPreviewFilename('/astia/images/newsletter2012.jpg');
	            	$template->setInitializer('astiaNewsletter2012TemplateInitializer');
	            	$template->setTemplate(false);
	            	$template->save();
                break;

            case 'vigouroux':
                $template = new CampaignTemplate();
                $template->setName('Modèle 1');
                $template->setClassName('VigourouxCampaign01CampaignTemplateHandler');
                $template->setPreviewFilename('/vigouroux/images/campaign01.jpg');
                $template->setTemplate(false);
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Modèle 2');
                $template->setClassName('VigourouxCampaign02CampaignTemplateHandler');
                $template->setPreviewFilename('/vigouroux/images/campaign02.jpg');
                $template->setTemplate(false);
                $template->save();

                break;

            case 'be3c':
                $template = new CampaignTemplate();
                $template->setName('Voeux 2012');
                $template->setPreviewFilename('/be3c/images/be3cVoeux2012.jpg');
                $template->setTemplate($this->getPartial('be3c/be3cVoeux2012'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Invitation');
                $template->setClassName('be3cCampaign01CampaignTemplateHandler');
                $template->setPreviewFilename('/be3c/images/campaign01.jpg');
                $template->setInitializer('be3cCampaign01TemplateInitializer');
                $template->setTemplate(false);
                $template->save();

                break;

            case 'cimlec':
                $template = new CampaignTemplate();
                $template->setName('Voeux 2012');
                $template->setClassName('CimlecCampaign01CampaignTemplateHandler');
                $template->setPreviewFilename('/cimlec/images/campaign01.jpg');
                $template->setTemplate(false);
                $template->save();

                break;

            case 'visTaLomagne':
                $template = new CampaignTemplate();
                $template->setName('Modèle 1');
                $template->setClassName('VisTaLomagneCampaign01CampaignTemplateHandler');
                $template->setPreviewFilename('/VisTaLomagne/images/campaign01.jpg');
                $template->setInitializer('VisTaLomagneCampaign01TemplateInitializer');
                $template->setTemplate(false);
                $template->save();
                break;
            case 'elaul':
                $template = new CampaignTemplate();
                $template->setName('Campagne 1');
                $template->setPreviewFilename('/elaulPlugin/images/campaign02.jpg');
                $template->setTemplate($this->getPartial('elaul/campaign02'));
                $template->save();

                $template = new CampaignTemplate();
                $template->setName('Campagne 1 (assistée)');
                $template->setClassName('elaulCampaign01CampaignTemplateHandler');
                $template->setPreviewFilename('/elaulPlugin/images/campaign01.jpg');
                $template->setInitializer('elaulCampaign01TemplateInitializer');
                $template->setTemplate(false);
                $template->save();

                break;
        		case 'newtech':
                $template = new CampaignTemplate();
                $template->setName('Lancement/invitation');
                $template->setClassName('newtechCampaign01CampaignTemplateHandler');
                $template->setPreviewFilename('/newtechPlugin/images/campaign01.jpg');
                $template->setInitializer('newtechCampaign01TemplateInitializer');
                $template->setTemplate(false);
                $template->save();


	        			$template = new CampaignTemplate();
	        			$template->setName('Invitation Salon E-Commerce');
	        			$template->setClassName('newtechCampaign02CampaignTemplateHandler');
	        			$template->setPreviewFilename('/newtechPlugin/images/campaign02.jpg');
	        			$template->setInitializer('newtechCampaign01TemplateInitializer');
	        			$template->setTemplate(false);
	        			$template->save();
                break;

        		case 'atp5s':
                $template = new CampaignTemplate();
                $template->setName('Newsletter 1');
                $template->setClassName('atp5sCampaign01CampaignTemplateHandler');
                $template->setPreviewFilename('/atp5sPlugin/images/campaign01.jpg');
                $template->setInitializer('atp5sCampaign01TemplateInitializer');
                $template->setTemplate(false);
                $template->save();
                break;

        	 	case 'luxhedge':
                $template = new CampaignTemplate();
                $template->setName('Newsletter');
                $template->setPreviewFilename('/luxhedgePlugin/images/campaign01.jpg');
                $template->setTemplate($this->getPartial('luxhedge/campaign01'));
                $template->save();
                break;

        	  case 'sta':
                $template = new CampaignTemplate();
                $template->setName('Newsletter 1');
                $template->setClassName('staCampaign01CampaignTemplateHandler');
                $template->setPreviewFilename('/staPlugin/images/campaign01.jpg');
                $template->setInitializer('staCampaign01TemplateInitializer');
                $template->setTemplate(false);
                $template->save();
                break;
        	case 'sudprojet':
                $template = new CampaignTemplate();
                $template->setName('Newsletter 1');
                $template->setClassName('sudprojetCampaign01CampaignTemplateHandler');
                $template->setPreviewFilename('/sudprojetPlugin/images/campaign01.jpg');
                $template->setInitializer('sudprojetCampaign01TemplateInitializer');
                $template->setTemplate(false);
                $template->save();

		        		$template = new CampaignTemplate();
		        		$template->setName('Invitation');
		        		$template->setClassName('sudprojetInvitationCampaignTemplateHandler');
		        		$template->setPreviewFilename('/sudprojetPlugin/images/invitation.jpg');
		        		$template->setInitializer('sudprojetInvitationTemplateInitializer');
		        		$template->setTemplate(false);
		        		$template->save();
        				break;
        	case 'comparex':
        		$template = new CampaignTemplate();
        		$template->setName('Newsletter 1');
        		$template->setClassName('comparexCampaign01CampaignTemplateHandler');
        		$template->setPreviewFilename('/comparexPlugin/images/campaign01.jpg');
        		$template->setInitializer('comparexCampaign01TemplateInitializer');
        		$template->setTemplate(false);
        		$template->save();
        		break;

        	case 'cciFormation':
        		$template = new CampaignTemplate();
        		$template->setName('Calendrier');
        		$template->setClassName('cciFormationCalendrierCampaignTemplateHandler');
        		$template->setPreviewFilename('/cciFormationPlugin/images/calendrier.jpg');
        		$template->setInitializer('cciFormationCalendrierTemplateInitializer');
        		$template->setTemplate(false);
        		$template->save();

        		$template = new CampaignTemplate();
        		$template->setName('Calendrier');
        		$template->setPreviewFilename('/cciFormationPlugin/images/calendrier.jpg');
        		$template->setTemplate($this->getPartial('cciFormation/calendrier2'));
        		$template->save();

        		$template = new CampaignTemplate();
        		$template->setName('Invitation');
        		$template->setClassName('cciFormationInvitationCampaignTemplateHandler');
        		$template->setPreviewFilename('/cciFormationPlugin/images/invitation.jpg');
        		$template->setInitializer('cciFormationInvitationTemplateInitializer');
        		$template->setTemplate(false);
        		$template->save();

        		$template = new CampaignTemplate();
        		$template->setName('Invitation');
        		$template->setPreviewFilename('/cciFormationPlugin/images/invitation.jpg');
        		$template->setTemplate($this->getPartial('cciFormation/invitation2'));
        		$template->save();

        		$template = new CampaignTemplate();
        		$template->setName('Newsletter 1');
        		$template->setClassName('cciFormationCampaign01CampaignTemplateHandler');
        		$template->setPreviewFilename('/cciFormationPlugin/images/campaign01.jpg');
        		$template->setInitializer('cciFormationCampaign01TemplateInitializer');
        		$template->setTemplate(false);
        		$template->save();

        		$template = new CampaignTemplate();
        		$template->setName('Newsletter 1');
        		$template->setPreviewFilename('/cciFormationPlugin/images/campaign01.jpg');
        		$template->setTemplate($this->getPartial('cciFormation/campaign01_2'));
        		$template->save();
        		break;

        	case 'dpi':
        		$template = new CampaignTemplate();
        		$template->setName('Newsletter 1 (avec assistant)');
        		$template->setClassName('dpiCampaign01WizzardCampaignTemplateHandler');
        		$template->setPreviewFilename('/dpiPlugin/images/campaign01Wizzard.jpg');
        		$template->setInitializer('dpiCampaign01WizzardCampaignTemplateInitializer');
        		$template->setTemplate(false);
        		$template->save();

        		$template = new CampaignTemplate();
        		$template->setName('Newsletter 1');
        		$template->setPreviewFilename('/dpiPlugin/images/campaign01.jpg');
        		$template->setTemplate($this->getPartial('dpi/campaign01'));
        		$template->save();
        		break;

        } // switch
    }

    protected function getPartial($templateName, $vars = array())
    {
        $context = sfContext::getInstance();
        // partial is in another module?
        if (false !== $sep = strpos($templateName, '/')) {
            $moduleName = substr($templateName, 0, $sep);
            $templateName = substr($templateName, $sep + 1);
        } else {
            $moduleName = $context->getActionStack()->getLastEntry()->getModuleName();
        }
        $actionName = '_' . $templateName;

        $view = new sfPartialView($context, $moduleName, $actionName, '');
        $view->setPartialVars($vars);

        return $view->render();
    }
}