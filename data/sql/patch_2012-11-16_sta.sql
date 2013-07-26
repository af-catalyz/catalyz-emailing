SET AUTOCOMMIT=0;
START TRANSACTION;

INSERT INTO `campaign_template` (`id`, `slug`, `name`, `preview_filename`, `class_name`, `template`, `external_id`, `initializer`, `is_archived`, `created_at`, `updated_at`) VALUES
(NULL, 'newsletter-1', 'Newsletter 1', '/staPlugin/images/campaign01.jpg', 'staCampaign01CampaignTemplateHandler', '', NULL, 'staCampaign01TemplateInitializer', 0, '2012-11-15 17:52:54', '2012-11-15 17:52:54');


COMMIT;


