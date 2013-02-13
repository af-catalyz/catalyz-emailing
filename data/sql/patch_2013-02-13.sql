UPDATE `sf_guard_group` SET `description` = 'Administrateurs' WHERE `sf_guard_group`.`id` =1;
INSERT INTO `sf_guard_group` (`id` ,`name` ,`description`)VALUES (NULL , 'readers', 'Consultation des statistiques');
INSERT INTO `sf_guard_permission` (`id` ,`name` ,`description`)VALUES (NULL , 'campaign-statistics', NULL);
INSERT INTO `sf_guard_group_permission` (`group_id` ,`permission_id`)VALUES ('1', '2'), ('2', '2');
UPDATE `sf_guard_permission` SET `description` = 'Consultation des statistiques des campagnes' WHERE `sf_guard_permission`.`id` =2;
