SET AUTOCOMMIT=0;
START TRANSACTION;

ALTER TABLE `contact_group`
	ADD `is_archived` BOOLEAN NOT NULL DEFAULT '0' AFTER `legend` ,
	ADD `color` VARCHAR( 255 ) NULL AFTER `is_archived` ;

ALTER TABLE `campaign`
	ADD `slug` VARCHAR( 255 ) NULL AFTER `id`;

ALTER TABLE `contact`
	ADD `slug` VARCHAR( 255 ) NULL AFTER `id` ;

ALTER TABLE `contact_group`
	ADD `slug` VARCHAR( 255 ) NULL AFTER `id` ;

ALTER TABLE `campaign_template`
	ADD `slug` VARCHAR( 255 ) NULL AFTER `id` ;

COMMIT;


