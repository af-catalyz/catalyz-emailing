SET AUTOCOMMIT=0;
START TRANSACTION;

ALTER TABLE `contact` CHANGE `external_reference` `external_reference` VARCHAR( 22 ) NULL DEFAULT NULL ;

COMMIT;


