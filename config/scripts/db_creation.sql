-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema kartina
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema kartina
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `kartina` DEFAULT CHARACTER SET utf8 ;
USE `kartina` ;

-- -----------------------------------------------------
-- Table `kartina`.`orientation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`orientation` (
  `idorientation` INT NOT NULL AUTO_INCREMENT,
  `orientation_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idorientation`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`theme`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`theme` (
  `idtheme` INT NOT NULL AUTO_INCREMENT,
  `theme_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtheme`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`format`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`format` (
  `idformat` INT NOT NULL AUTO_INCREMENT,
  `format_name` VARCHAR(45) NOT NULL,
  `cost` INT NOT NULL,
  PRIMARY KEY (`idformat`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`artist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`artist` (
  `idartiste` INT NOT NULL AUTO_INCREMENT,
  `lastname` VARCHAR(255) NOT NULL,
  `firstname` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `networks` TEXT NULL,
  PRIMARY KEY (`idartiste`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`picture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`picture` (
  `idpicture` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `creation_date` DATE NOT NULL,
  `price` INT NOT NULL,
  `quantity` INT NOT NULL,
  `format_idformat` INT NOT NULL,
  `artist_idartiste` INT NOT NULL,
  `orientation_idorientation` INT NOT NULL,
  PRIMARY KEY (`idpicture`),
  INDEX `fk_picture_format1_idx` (`format_idformat` ASC),
  INDEX `fk_picture_artist1_idx` (`artist_idartiste` ASC),
  INDEX `fk_picture_orientation1_idx` (`orientation_idorientation` ASC),
  CONSTRAINT `fk_picture_format1`
    FOREIGN KEY (`format_idformat`)
    REFERENCES `kartina`.`format` (`idformat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_picture_artist1`
    FOREIGN KEY (`artist_idartiste`)
    REFERENCES `kartina`.`artist` (`idartiste`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_picture_orientation1`
    FOREIGN KEY (`orientation_idorientation`)
    REFERENCES `kartina`.`orientation` (`idorientation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`client` (
  `idclient` INT NOT NULL AUTO_INCREMENT,
  `lastname` VARCHAR(255) NOT NULL,
  `firstname` VARCHAR(255) NOT NULL,
  `address` TEXT NULL,
  `zip` INT NULL,
  `email` VARCHAR(45) NULL,
  `clientcol` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idclient`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`keyword`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`keyword` (
  `idkeyword` INT NOT NULL AUTO_INCREMENT,
  `keyword_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idkeyword`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`keyword_has_picture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`keyword_has_picture` (
  `keyword_idkeyword` INT NOT NULL,
  `picture_idpicture` INT NOT NULL,
  PRIMARY KEY (`keyword_idkeyword`, `picture_idpicture`),
  INDEX `fk_keyword_has_picture_picture1_idx` (`picture_idpicture` ASC),
  INDEX `fk_keyword_has_picture_keyword_idx` (`keyword_idkeyword` ASC),
  CONSTRAINT `fk_keyword_has_picture_keyword`
    FOREIGN KEY (`keyword_idkeyword`)
    REFERENCES `kartina`.`keyword` (`idkeyword`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_keyword_has_picture_picture1`
    FOREIGN KEY (`picture_idpicture`)
    REFERENCES `kartina`.`picture` (`idpicture`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`theme_has_picture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`theme_has_picture` (
  `theme_idtheme` INT NOT NULL,
  `picture_idpicture` INT NOT NULL,
  PRIMARY KEY (`theme_idtheme`, `picture_idpicture`),
  INDEX `fk_theme_has_picture_picture1_idx` (`picture_idpicture` ASC),
  INDEX `fk_theme_has_picture_theme1_idx` (`theme_idtheme` ASC),
  CONSTRAINT `fk_theme_has_picture_theme1`
    FOREIGN KEY (`theme_idtheme`)
    REFERENCES `kartina`.`theme` (`idtheme`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_theme_has_picture_picture1`
    FOREIGN KEY (`picture_idpicture`)
    REFERENCES `kartina`.`picture` (`idpicture`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`facture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`facture` (
  `idfacture` INT NOT NULL AUTO_INCREMENT,
  `quantity` INT NOT NULL,
  `facture_name` VARCHAR(255) NOT NULL,
  `picture_idpicture` INT NOT NULL,
  PRIMARY KEY (`idfacture`, `quantity`),
  INDEX `fk_facture_picture1_idx` (`picture_idpicture` ASC),
  CONSTRAINT `fk_facture_picture1`
    FOREIGN KEY (`picture_idpicture`)
    REFERENCES `kartina`.`picture` (`idpicture`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`facture_has_client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`facture_has_client` (
  `facture_idfacture` INT NOT NULL,
  `facture_quantity` INT NOT NULL,
  `client_idclient` INT NOT NULL,
  PRIMARY KEY (`facture_idfacture`, `facture_quantity`, `client_idclient`),
  INDEX `fk_facture_has_client_client1_idx` (`client_idclient` ASC),
  INDEX `fk_facture_has_client_facture1_idx` (`facture_idfacture` ASC, `facture_quantity` ASC),
  CONSTRAINT `fk_facture_has_client_facture1`
    FOREIGN KEY (`facture_idfacture` , `facture_quantity`)
    REFERENCES `kartina`.`facture` (`idfacture` , `quantity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_facture_has_client_client1`
    FOREIGN KEY (`client_idclient`)
    REFERENCES `kartina`.`client` (`idclient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
