SET FOREIGN_KEY_CHECKS = 0;


DROP TABLE IF EXISTS `web_visitor`;


CREATE TABLE `web_visitor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`contact_id` INTEGER,
	`uid` VARCHAR(20),
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
);

#-----------------------------------------------------------------------------
#-- web_session
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `web_session`;


CREATE TABLE `web_session`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`web_visitor_id` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `web_session_FI_1` (`web_visitor_id`),
	CONSTRAINT `web_session_FK_1`
		FOREIGN KEY (`web_visitor_id`)
		REFERENCES `web_visitor` (`id`)
		ON DELETE CASCADE
);

#-----------------------------------------------------------------------------
#-- web_page
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `web_page`;


CREATE TABLE `web_page`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`scheme` VARCHAR(10),
	`host` VARCHAR(255),
	`path` LONGTEXT,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
);

#-----------------------------------------------------------------------------
#-- web_page_access
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `web_page_access`;


CREATE TABLE `web_page_access`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`web_session_id` INTEGER,
	`web_page_id` INTEGER,
	`ip` VARCHAR(15),
	`user_agent` VARCHAR(255),
	`query` LONGTEXT,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `web_page_access_FI_1` (`web_session_id`),
	CONSTRAINT `web_page_access_FK_1`
		FOREIGN KEY (`web_session_id`)
		REFERENCES `web_session` (`id`)
		ON DELETE CASCADE,
	INDEX `web_page_access_FI_2` (`web_page_id`),
	CONSTRAINT `web_page_access_FK_2`
		FOREIGN KEY (`web_page_id`)
		REFERENCES `web_page` (`id`)
		ON DELETE CASCADE
);


SET FOREIGN_KEY_CHECKS = 1;