
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- contact
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contact`;


CREATE TABLE `contact`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(255),
	`first_name` VARCHAR(255),
	`last_name` VARCHAR(255),
	`company` VARCHAR(255),
	`email` VARCHAR(255)  NOT NULL,
	`status` INTEGER,
	`external_reference` INTEGER,
	`custom1` VARCHAR(255),
	`custom2` VARCHAR(255),
	`custom3` VARCHAR(255),
	`custom4` VARCHAR(255),
	`custom5` VARCHAR(255),
	`custom6` VARCHAR(255),
	`custom7` VARCHAR(255),
	`custom8` VARCHAR(255),
	`custom9` VARCHAR(255),
	`custom10` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `contact_U_1` (`email`)
);

#-----------------------------------------------------------------------------
#-- contact_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contact_group`;


CREATE TABLE `contact_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(255),
	`name` VARCHAR(255),
	`is_test_group` TINYINT default 0,
	`legend` LONGTEXT,
	`is_archived` TINYINT default 0,
	`color` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
);

#-----------------------------------------------------------------------------
#-- contact_contact_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contact_contact_group`;


CREATE TABLE `contact_contact_group`
(
	`contact_id` INTEGER  NOT NULL,
	`contact_group_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`contact_id`,`contact_group_id`),
	CONSTRAINT `contact_contact_group_FK_1`
		FOREIGN KEY (`contact_id`)
		REFERENCES `contact` (`id`)
		ON DELETE CASCADE,
	INDEX `contact_contact_group_FI_2` (`contact_group_id`),
	CONSTRAINT `contact_contact_group_FK_2`
		FOREIGN KEY (`contact_group_id`)
		REFERENCES `contact_group` (`id`)
		ON DELETE CASCADE
);

#-----------------------------------------------------------------------------
#-- campaign
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `campaign`;


CREATE TABLE `campaign`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(255),
	`name` VARCHAR(255),
	`commentaire` LONGTEXT,
	`subject` VARCHAR(255),
	`template_id` INTEGER,
	`content` LONGTEXT,
	`prepared_content` LONGTEXT,
	`text_content` LONGTEXT,
	`prepared_text_content` LONGTEXT,
	`status` INTEGER,
	`from_name` VARCHAR(255),
	`from_email` VARCHAR(255),
	`scheduled_at` DATETIME,
	`schedule_type` INTEGER,
	`test_type` INTEGER,
	`test_user_list` TEXT,
	`target` LONGTEXT,
	`reply_to_email` VARCHAR(255),
	`return_path_email` VARCHAR(255),
	`return_path_server` VARCHAR(255),
	`return_path_login` VARCHAR(255),
	`return_path_password` VARCHAR(255),
	`is_archived` INTEGER default 0,
	`google_analytics_enabled` TINYINT default 0,
	`google_analytics_source` VARCHAR(255),
	`google_analytics_medium` VARCHAR(255),
	`google_analytics_campaign_type` INTEGER,
	`google_analytics_campaign_content` VARCHAR(255),
	`google_analytics_content` VARCHAR(255),
	`litmus_test_id` VARCHAR(255),
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `campaign_FI_1` (`template_id`),
	CONSTRAINT `campaign_FK_1`
		FOREIGN KEY (`template_id`)
		REFERENCES `campaign_template` (`id`)
		ON DELETE CASCADE,
	INDEX `campaign_FI_2` (`created_by`),
	CONSTRAINT `campaign_FK_2`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user_profile` (`id`)
		ON DELETE CASCADE
);

#-----------------------------------------------------------------------------
#-- campaign_contact_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `campaign_contact_group`;


CREATE TABLE `campaign_contact_group`
(
	`campaign_id` INTEGER  NOT NULL,
	`contact_group_id` INTEGER  NOT NULL,
	PRIMARY KEY (`campaign_id`,`contact_group_id`),
	CONSTRAINT `campaign_contact_group_FK_1`
		FOREIGN KEY (`campaign_id`)
		REFERENCES `campaign` (`id`)
		ON DELETE CASCADE,
	INDEX `campaign_contact_group_FI_2` (`contact_group_id`),
	CONSTRAINT `campaign_contact_group_FK_2`
		FOREIGN KEY (`contact_group_id`)
		REFERENCES `contact_group` (`id`)
		ON DELETE CASCADE
);

#-----------------------------------------------------------------------------
#-- campaign_contact
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `campaign_contact`;


CREATE TABLE `campaign_contact`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`campaign_id` INTEGER  NOT NULL,
	`contact_id` INTEGER  NOT NULL,
	`sent_at` DATETIME,
	`failed_sent_at` DATETIME,
	`view_at` DATETIME,
	`view_user_agent` VARCHAR(255),
	`clicked_at` DATETIME,
	`unsubscribed_at` DATETIME,
	`raison` LONGTEXT,
	`unsubscribed_lists` LONGTEXT,
	`landing_actions` LONGTEXT,
	`bounce_type` INTEGER default 1,
	PRIMARY KEY (`id`,`campaign_id`,`contact_id`),
	INDEX `campaign_contact_FI_1` (`campaign_id`),
	CONSTRAINT `campaign_contact_FK_1`
		FOREIGN KEY (`campaign_id`)
		REFERENCES `campaign` (`id`)
		ON DELETE CASCADE,
	INDEX `campaign_contact_FI_2` (`contact_id`),
	CONSTRAINT `campaign_contact_FK_2`
		FOREIGN KEY (`contact_id`)
		REFERENCES `contact` (`id`)
		ON DELETE CASCADE
);

#-----------------------------------------------------------------------------
#-- campaign_contact_element
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `campaign_contact_element`;


CREATE TABLE `campaign_contact_element`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`campaign_id` INTEGER  NOT NULL,
	`contact_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`,`campaign_id`,`contact_id`),
	INDEX `campaign_contact_element_FI_1` (`campaign_id`),
	CONSTRAINT `campaign_contact_element_FK_1`
		FOREIGN KEY (`campaign_id`)
		REFERENCES `campaign` (`id`)
		ON DELETE CASCADE,
	INDEX `campaign_contact_element_FI_2` (`contact_id`),
	CONSTRAINT `campaign_contact_element_FK_2`
		FOREIGN KEY (`contact_id`)
		REFERENCES `contact` (`id`)
		ON DELETE CASCADE
);

#-----------------------------------------------------------------------------
#-- campaign_contact_bounce
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `campaign_contact_bounce`;


CREATE TABLE `campaign_contact_bounce`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`campaign_contact_id` INTEGER,
	`error_code` VARCHAR(5),
	`address` VARCHAR(255),
	`bounce_type` INTEGER,
	`arrived_at` DATETIME,
	`message` TEXT,
	PRIMARY KEY (`id`),
	INDEX `campaign_contact_bounce_FI_1` (`campaign_contact_id`),
	CONSTRAINT `campaign_contact_bounce_FK_1`
		FOREIGN KEY (`campaign_contact_id`)
		REFERENCES `campaign_contact` (`id`)
		ON DELETE CASCADE
);

#-----------------------------------------------------------------------------
#-- campaign_template
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `campaign_template`;


CREATE TABLE `campaign_template`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(255),
	`name` VARCHAR(255),
	`preview_filename` VARCHAR(255),
	`class_name` VARCHAR(255),
	`template` LONGTEXT,
	`external_id` INTEGER,
	`initializer` VARCHAR(255),
	`is_archived` TINYINT default 0,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
);

#-----------------------------------------------------------------------------
#-- campaign_link
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `campaign_link`;


CREATE TABLE `campaign_link`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`campaign_id` INTEGER,
	`url` TEXT,
	`google_analytics_term` VARCHAR(255),
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `campaign_link_FI_1` (`campaign_id`),
	CONSTRAINT `campaign_link_FK_1`
		FOREIGN KEY (`campaign_id`)
		REFERENCES `campaign` (`id`)
		ON DELETE CASCADE
);

#-----------------------------------------------------------------------------
#-- campaign_click
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `campaign_click`;


CREATE TABLE `campaign_click`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`campaign_link_id` INTEGER,
	`campaign_contact_id` INTEGER,
	`position` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `campaign_click_FI_1` (`campaign_link_id`),
	CONSTRAINT `campaign_click_FK_1`
		FOREIGN KEY (`campaign_link_id`)
		REFERENCES `campaign_link` (`id`)
		ON DELETE CASCADE,
	INDEX `campaign_click_FI_2` (`campaign_contact_id`),
	CONSTRAINT `campaign_click_FK_2`
		FOREIGN KEY (`campaign_contact_id`)
		REFERENCES `campaign_contact` (`id`)
		ON DELETE CASCADE
);

#-----------------------------------------------------------------------------
#-- sf_guard_user_profile
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;


CREATE TABLE `sf_guard_user_profile`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`first_name` VARCHAR(20),
	`last_name` VARCHAR(20),
	`email` VARCHAR(64),
	PRIMARY KEY (`id`),
	INDEX `sf_guard_user_profile_FI_1` (`user_id`),
	CONSTRAINT `sf_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
);

#-----------------------------------------------------------------------------
#-- landing
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `landing`;


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

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
