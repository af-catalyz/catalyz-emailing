SET AUTOCOMMIT=0;
START TRANSACTION;

UPDATE `campaign_template` SET `initializer` = 'sudprojetInvitationTemplateInitializer' WHERE `campaign_template`.`id` =2;

COMMIT;


