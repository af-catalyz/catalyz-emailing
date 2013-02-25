ALTER TABLE `campaign_contact` ADD `landing_actions` LONGTEXT NOT NULL AFTER `unsubscribed_lists`;

CREATE TABLE `landing`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`slug` VARCHAR(255),
	`template_class` VARCHAR(255),
	`content` LONGTEXT,
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `landing_FI_1` (`created_by`),
	CONSTRAINT `landing_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user_profile` (`id`)
		ON DELETE CASCADE
);