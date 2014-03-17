SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `autokosten` DEFAULT CHARACTER SET utf8 ;
USE `autokosten` ;

-- -----------------------------------------------------
-- Table `autokosten`.`tbl_vergoeding`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `autokosten`.`tbl_vergoeding` (
  `idtbl_vergoeding` INT NOT NULL AUTO_INCREMENT,
  `datum` DATE NULL,
  `omschrijving` VARCHAR(45) NULL,
  `vergoeding` FLOAT NULL,
  `tbl_auto_idtbl_auto` INT NOT NULL,
  PRIMARY KEY (`idtbl_vergoeding`),
  INDEX `fk_tbl_vergoeding_tbl_auto1_idx` (`tbl_auto_idtbl_auto` ASC),
  CONSTRAINT `fk_tbl_vergoeding_tbl_auto1`
    FOREIGN KEY (`tbl_auto_idtbl_auto`)
    REFERENCES `autokosten`.`tbl_auto` (`idtbl_auto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
