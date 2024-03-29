-- MySQL Script generated by MySQL Workbench
-- Thu Mar 30 12:52:11 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema filmy
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema filmy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `filmy` DEFAULT CHARACTER SET utf8 ;
USE `filmy` ;

-- -----------------------------------------------------
-- Table `filmy`.`Herec`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `filmy`.`Herec` (
  `idHerec` INT NOT NULL AUTO_INCREMENT,
  `jmeno` VARCHAR(45) NOT NULL,
  `prijmeni` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idHerec`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filmy`.`Film`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `filmy`.`Film` (
  `idFilm` INT NOT NULL AUTO_INCREMENT,
  `jmeno` VARCHAR(45) NOT NULL,
  `Herec_idHerec` INT NOT NULL,
  PRIMARY KEY (`idFilm`, `Herec_idHerec`),
  INDEX `fk_Film_Herec_idx` (`Herec_idHerec` ASC),
  CONSTRAINT `fk_Film_Herec`
    FOREIGN KEY (`Herec_idHerec`)
    REFERENCES `filmy`.`Herec` (`idHerec`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
