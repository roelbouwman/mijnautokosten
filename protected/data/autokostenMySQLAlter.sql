SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

ALTER SCHEMA `autokosten`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

USE `autokosten`;

ALTER TABLE `autokosten`.`tbl_user` CHARACTER SET = utf8 , COLLATE = utf8_general_ci , ADD COLUMN `roles` VARCHAR(128) NULL DEFAULT NULL  AFTER `email` ;

ALTER TABLE `autokosten`.`tbl_tankbeurt` CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `autokosten`.`tbl_auto` CHARACTER SET = utf8 , COLLATE = utf8_general_ci , ADD COLUMN `hoofdauto` INT(11) NULL DEFAULT 0  AFTER `aanschaf` ;

ALTER TABLE `autokosten`.`tbl_onderhoud` CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
