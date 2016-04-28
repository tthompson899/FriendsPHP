-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema beltexam2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema beltexam2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `beltexam2` DEFAULT CHARACTER SET utf8 ;
USE `beltexam2` ;

-- -----------------------------------------------------
-- Table `beltexam2`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beltexam2`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(245) NULL DEFAULT NULL,
  `alias` VARCHAR(245) NULL DEFAULT NULL,
  `email` VARCHAR(245) NULL DEFAULT NULL,
  `password` VARCHAR(245) NULL DEFAULT NULL,
  `dob` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `beltexam2`.`users_friends`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beltexam2`.`users_friends` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `added_friend_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_friends_users1_idx` (`user_id` ASC),
  INDEX `fk_users_friends_users2_idx` (`added_friend_id` ASC),
  CONSTRAINT `fk_users_friends_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `beltexam2`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_friends_users2`
    FOREIGN KEY (`added_friend_id`)
    REFERENCES `beltexam2`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
