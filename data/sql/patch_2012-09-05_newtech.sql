SET AUTOCOMMIT=0;
START TRANSACTION;

INSERT INTO `campaign_template` (`id`, `slug`, `name`, `preview_filename`, `class_name`, `template`, `external_id`, `initializer`, `is_archived`, `created_at`, `updated_at`) VALUES
(NULL, 'invitation-salon-e-commerce', 'Invitation Salon E-Commerce', '/newtechPlugin/images/campaign02.jpg', 'newtechCampaign02CampaignTemplateHandler', '', NULL, NUll, 0, '2012-09-05 14:55:02', '2012-09-05 14:55:02');

COMMIT;


