
DROP TABLE IF EXISTS `web_visitor`;


CREATE TABLE `web_visitor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`contact_id` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `web_visitor_FI_1` (`contact_id`),
	CONSTRAINT `web_visitor_FK_1`
		FOREIGN KEY (`contact_id`)
		REFERENCES `contact` (`id`)
		ON DELETE CASCADE
);

#-----------------------------------------------------------------------------
#-- web_session
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `web_session`;


CREATE TABLE `web_session`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`web_visitor_id` INTEGER,
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
	`name` VARCHAR(255),
	`url` LONGTEXT,
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
	`ip` VARCHAR(15),
	`user_agent` VARCHAR(255),
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `web_page_access_FI_1` (`web_session_id`),
	CONSTRAINT `web_page_access_FK_1`
		FOREIGN KEY (`web_session_id`)
		REFERENCES `web_session` (`id`)
		ON DELETE CASCADE
);
