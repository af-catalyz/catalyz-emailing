SET AUTOCOMMIT=0;
START TRANSACTION;

INSERT INTO `campaign_template` (`id`, `slug`, `name`, `preview_filename`, `class_name`, `template`, `external_id`, `initializer`, `is_archived`, `created_at`, `updated_at`) VALUES
(NULL, 'newsletter-1', 'Newsletter 1', '/sudprojetPlugin/images/campaign01.jpg', 'sudprojetCampaign01CampaignTemplateHandler', '', NULL, 'sudprojetCampaign01TemplateInitializer', 0, '2013-02-01 12:02:23', '2013-02-01 12:02:23');

COMMIT;


