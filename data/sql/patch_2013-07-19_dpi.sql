SET AUTOCOMMIT=0;
START TRANSACTION;

UPDATE `campaign_template` SET `slug` = 'push-promo', `name` = 'Push Promo' WHERE `campaign_template`.`id` =3;
UPDATE `campaign_template` SET `slug` = 'push-promo-1', `name` = 'Push Promo' WHERE `campaign_template`.`id` =4;


COMMIT;


