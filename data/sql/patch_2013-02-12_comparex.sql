SET AUTOCOMMIT=0;
START TRANSACTION;

INSERT INTO `campaign_template` (`id`, `slug`, `name`, `preview_filename`, `class_name`, `template`, `external_id`, `initializer`, `is_archived`, `created_at`, `updated_at`) VALUES
(NULL, 'comparex-campaign01', 'Modèle 1', '/comparexPlugin/images/campaign01.jpg', 'comparexCampaign01CampaignTemplateHandler', '', NULL, NUll, 0, now(), now());

COMMIT;


