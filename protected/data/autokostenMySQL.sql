CREATE DATABASE autokosten;

USE autokosten; 

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `autokosten`.`tbl_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `autokosten`.`tbl_user` (
  `idtbl_user` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(128) NULL ,
  `password` VARCHAR(128) NULL ,
  `salt` VARCHAR(128) NULL ,
  `email` VARCHAR(128) NULL ,
  PRIMARY KEY (`idtbl_user`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autokosten`.`tbl_auto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `autokosten`.`tbl_auto` (
  `idtbl_auto` INT NOT NULL AUTO_INCREMENT ,
  `merk` VARCHAR(45) NULL ,
  `type` VARCHAR(45) NULL ,
  `brandstof` VARCHAR(45) NULL ,
  `beginstand` INT NULL ,
  `kenteken` VARCHAR(45) NULL ,
  `bouwjaar` INT NULL ,
  `aanschafprijs` FLOAT NULL ,
  `wegenbelasting` FLOAT NULL ,
  `verzekering` FLOAT NULL ,
  `afschrijving` FLOAT NULL ,
  `tbl_user_idtbl_user` INT NOT NULL ,
  `aanschaf` DATE NULL ,
  PRIMARY KEY (`idtbl_auto`) ,
  INDEX `fk_tbl_auto_tbl_user` (`tbl_user_idtbl_user` ASC) ,
  CONSTRAINT `fk_tbl_auto_tbl_user`
    FOREIGN KEY (`tbl_user_idtbl_user` )
    REFERENCES `autokosten`.`tbl_user` (`idtbl_user` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autokosten`.`tbl_tankbeurt`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `autokosten`.`tbl_tankbeurt` (
  `idtbl_tankbeurt` INT NOT NULL AUTO_INCREMENT ,
  `datum` DATE NULL ,
  `liters` FLOAT NULL ,
  `literprijs` FLOAT NULL ,
  `kmstand` INT NULL ,
  `tbl_auto_idtbl_auto` INT NOT NULL ,
  `totaal` FLOAT NULL ,
  PRIMARY KEY (`idtbl_tankbeurt`) ,
  INDEX `fk_tbl_tankbeurt_tbl_auto1` (`tbl_auto_idtbl_auto` ASC) ,
  CONSTRAINT `fk_tbl_tankbeurt_tbl_auto1`
    FOREIGN KEY (`tbl_auto_idtbl_auto` )
    REFERENCES `autokosten`.`tbl_auto` (`idtbl_auto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autokosten`.`tbl_onderhoud`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `autokosten`.`tbl_onderhoud` (
  `idtbl_onderhoud` INT NOT NULL AUTO_INCREMENT ,
  `omschrijving` VARCHAR(128) NULL ,
  `datum` DATE NULL ,
  `kosten` FLOAT NULL ,
  `tbl_auto_idtbl_auto` INT NOT NULL ,
  `kmstand` INT NULL ,
  PRIMARY KEY (`idtbl_onderhoud`) ,
  INDEX `fk_tbl_onderhoud_tbl_auto1` (`tbl_auto_idtbl_auto` ASC) ,
  CONSTRAINT `fk_tbl_onderhoud_tbl_auto1`
    FOREIGN KEY (`tbl_auto_idtbl_auto` )
    REFERENCES `autokosten`.`tbl_auto` (`idtbl_auto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

GRANT ALL PRIVILEGES 
       ON autokosten.* 
       TO 'www-data'@'localhost'
       IDENTIFIED BY '1234HvP' 
       WITH GRANT OPTION;
