SET AUTOCOMMIT=0;
START TRANSACTION;

INSERT INTO `campaign_template` (`id`, `slug`, `name`, `preview_filename`, `class_name`, `template`, `external_id`, `initializer`, `is_archived`, `created_at`, `updated_at`) VALUES
(NULL, 'lancement-invitation', 'Lancement/invitation', '/newtechPlugin/images/campaign01.jpg', 'newtechCampaign01CampaignTemplateHandler', '', NULL, 'newtechCampaign01TemplateInitializer', 0, '2012-07-30 11:51:57', '2012-07-30 11:51:57');

COMMIT;


