SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `library` ;
CREATE SCHEMA IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `library` ;

-- -----------------------------------------------------
-- Table `library`.`tbl_book`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `library`.`tbl_book` ;

CREATE  TABLE IF NOT EXISTS `library`.`tbl_book` (
  `id_book` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NULL ,
  `description` TEXT NULL ,
  `current_count` INT NULL ,
  `total_count` INT NULL ,
  `file_link` VARCHAR(45) NULL DEFAULT 'NONE' ,
  `year` INT NULL ,
  `image_link` VARCHAR(45) NULL DEFAULT 'NONE' ,
  PRIMARY KEY (`id_book`) ,
  UNIQUE INDEX `idBook_UNIQUE` (`id_book` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`tbl_author`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `library`.`tbl_author` ;

CREATE  TABLE IF NOT EXISTS `library`.`tbl_author` (
  `id_author` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_author`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`tbl_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `library`.`tbl_type` ;

CREATE  TABLE IF NOT EXISTS `library`.`tbl_type` (
  `id_type` INT NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_type`) ,
  UNIQUE INDEX `idType_UNIQUE` (`id_type` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`tbl_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `library`.`tbl_user` ;

CREATE  TABLE IF NOT EXISTS `library`.`tbl_user` (
  `id_user` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `surname` VARCHAR(45) NOT NULL ,
  `parentname` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(45) NOT NULL ,
  `role` VARCHAR(45) NULL ,
  `check_hash` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_user`) ,
  UNIQUE INDEX `idUser_UNIQUE` (`id_user` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`tbl_query`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `library`.`tbl_query` ;

CREATE  TABLE IF NOT EXISTS `library`.`tbl_query` (
  `id_query` INT NOT NULL AUTO_INCREMENT ,
  `creation_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `status` VARCHAR(45) NULL ,
  `book_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  `comment` TEXT NULL ,
  PRIMARY KEY (`id_query`) ,
  INDEX `fk_Query_Book1` (`book_id` ASC) ,
  INDEX `fk_Query_User1` (`user_id` ASC) ,
  CONSTRAINT `fk_Query_Book1`
    FOREIGN KEY (`book_id` )
    REFERENCES `library`.`tbl_book` (`id_book` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Query_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `library`.`tbl_user` (`id_user` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`tbl_recommendation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `library`.`tbl_recommendation` ;

CREATE  TABLE IF NOT EXISTS `library`.`tbl_recommendation` (
  `id_recommendation` INT NOT NULL AUTO_INCREMENT ,
  `reason` VARCHAR(45) NULL ,
  `book_id` INT NOT NULL ,
  `target_user_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`id_recommendation`) ,
  UNIQUE INDEX `idRecommenadation_UNIQUE` (`id_recommendation` ASC) ,
  INDEX `fk_Recommenadation_Book1` (`book_id` ASC) ,
  INDEX `fk_Recommenadation_User1` (`target_user_id` ASC) ,
  INDEX `fk_Recommenadation_User2` (`user_id` ASC) ,
  CONSTRAINT `fk_Recommenadation_Book1`
    FOREIGN KEY (`book_id` )
    REFERENCES `library`.`tbl_book` (`id_book` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recommenadation_User1`
    FOREIGN KEY (`target_user_id` )
    REFERENCES `library`.`tbl_user` (`id_user` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recommenadation_User2`
    FOREIGN KEY (`user_id` )
    REFERENCES `library`.`tbl_user` (`id_user` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`tbl_keyword`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `library`.`tbl_keyword` ;

CREATE  TABLE IF NOT EXISTS `library`.`tbl_keyword` (
  `id_keyword` INT NOT NULL AUTO_INCREMENT ,
  `word` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_keyword`) ,
  UNIQUE INDEX `word_UNIQUE` (`word` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`tbl_book_has_author`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `library`.`tbl_book_has_author` ;

CREATE  TABLE IF NOT EXISTS `library`.`tbl_book_has_author` (
  `book_id` INT NOT NULL ,
  `author_id` INT NOT NULL ,
  PRIMARY KEY (`book_id`, `author_id`) ,
  INDEX `fk_Book_has_Author_Author1` (`author_id` ASC) ,
  INDEX `fk_Book_has_Author_Book` (`book_id` ASC) ,
  CONSTRAINT `fk_Book_has_Author_Book`
    FOREIGN KEY (`book_id` )
    REFERENCES `library`.`tbl_book` (`id_book` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Book_has_Author_Author1`
    FOREIGN KEY (`author_id` )
    REFERENCES `library`.`tbl_author` (`id_author` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`tbl_book_has_keyword`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `library`.`tbl_book_has_keyword` ;

CREATE  TABLE IF NOT EXISTS `library`.`tbl_book_has_keyword` (
  `book_id` INT NOT NULL ,
  `keyword_id` INT NOT NULL ,
  PRIMARY KEY (`book_id`, `keyword_id`) ,
  INDEX `fk_Book_has_Key_word_Key_word1` (`keyword_id` ASC) ,
  INDEX `fk_Book_has_Key_word_Book1` (`book_id` ASC) ,
  CONSTRAINT `fk_Book_has_Key_word_Book1`
    FOREIGN KEY (`book_id` )
    REFERENCES `library`.`tbl_book` (`id_book` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Book_has_Key_word_Key_word1`
    FOREIGN KEY (`keyword_id` )
    REFERENCES `library`.`tbl_keyword` (`id_keyword` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`tbl_book_has_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `library`.`tbl_book_has_type` ;

CREATE  TABLE IF NOT EXISTS `library`.`tbl_book_has_type` (
  `book_id` INT NOT NULL ,
  `type_id` INT NOT NULL ,
  PRIMARY KEY (`book_id`, `type_id`) ,
  INDEX `fk_Book_has_Type_Type1` (`type_id` ASC) ,
  INDEX `fk_Book_has_Type_Book1` (`book_id` ASC) ,
  CONSTRAINT `fk_Book_has_Type_Book1`
    FOREIGN KEY (`book_id` )
    REFERENCES `library`.`tbl_book` (`id_book` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Book_has_Type_Type1`
    FOREIGN KEY (`type_id` )
    REFERENCES `library`.`tbl_type` (`id_type` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
