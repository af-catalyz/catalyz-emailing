SET AUTOCOMMIT=0;
START TRANSACTION;

INSERT INTO `campaign_template` (`id`, `slug`, `name`, `preview_filename`, `class_name`, `template`, `external_id`, `initializer`, `is_archived`, `created_at`, `updated_at`) VALUES
(NULL, 'newsletter-1', 'Newsletter 1', '/atp5sPlugin/images/campaign01.jpg', 'atp5sCampaign01CampaignTemplateHandler', '', NULL, 'atp5sCampaign01TemplateInitializer', 0, '2012-09-19 11:58:45', '2012-09-19 11:58:45');


COMMIT;


