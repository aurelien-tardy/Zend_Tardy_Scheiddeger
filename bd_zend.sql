-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema zend
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema zend
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `zend` DEFAULT CHARACTER SET latin1 ;
USE `zend` ;

-- -----------------------------------------------------
-- Table `zend`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zend`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(100) NOT NULL,
  `pass_word` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `zend`.`album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zend`.`album` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `artist` VARCHAR(100) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_album_users_idx` (`users_id` ASC),
  CONSTRAINT `fk_album_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `zend`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `zend`.`book`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zend`.`book` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NULL DEFAULT NULL,
  `author` VARCHAR(100) NULL DEFAULT NULL,
  `year` VARCHAR(4) NULL DEFAULT NULL,
  `type` VARCHAR(100) NULL DEFAULT NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_book_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_book_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `zend`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `zend`.`movie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zend`.`movie` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NULL DEFAULT NULL,
  `director` VARCHAR(100) NULL DEFAULT NULL,
  `year` VARCHAR(4) NULL DEFAULT NULL,
  `genre` VARCHAR(100) NULL DEFAULT NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_movie_users_idx` (`users_id` ASC),
  CONSTRAINT `fk_movie_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `zend`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
