SET AUTOCOMMIT=0;
START TRANSACTION;

INSERT INTO `campaign_template` (`id`, `slug`, `name`, `preview_filename`, `class_name`, `template`, `external_id`, `initializer`, `is_archived`, `created_at`, `updated_at`) VALUES
(NULL, 'promo', 'Promo', '/fleuronsPlugin/images/promo.jpg', 'fleuronsCampaignPromoWizzardCampaignTemplateHandler', '', NULL, 'fleuronsCampaignPromoWizzardCampaignTemplateInitializer', 0, '2013-07-24 10:15:18', '2013-07-24 10:15:18'),
(NULL, 'opespecial', 'OpeSpécial', '/fleuronsPlugin/images/opespecial.jpg', 'fleuronsCampaignOpeSpecialWizzardCampaignTemplateHandler', '', NULL, 'fleuronsCampaignOpeSpecialWizzardCampaignTemplateInitializer', 0, '2013-07-24 10:15:18', '2013-07-24 10:15:18');



COMMIT;


