SET AUTOCOMMIT=0;
START TRANSACTION;

INSERT INTO `campaign_template` (`id`, `slug`, `name`, `preview_filename`, `class_name`, `template`, `external_id`, `initializer`, `is_archived`, `created_at`, `updated_at`) VALUES
(NULL, 'anniversaire', 'Anniversaire', '/fleuronsPlugin/images/anniversaire.jpg', 'fleuronsCampaignAnniversaireWizzardCampaignTemplateHandler', '', NULL, 'fleuronsCampaignAnniversaireWizzardCampaignTemplateInitializer', 0, '2013-07-17 10:43:19', '2013-07-17 10:43:19');


COMMIT;


