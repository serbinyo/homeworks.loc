-- MySQL Script generated by MySQL Workbench
-- Mon Dec 25 15:06:57 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`disciplines`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`disciplines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`id`),
  INDEX `poskey` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`teachers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`teachers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(100) NOT NULL,
  `middlename` VARCHAR(100) NULL,
  `lastname` VARCHAR(100) NOT NULL,
  `tel` TINYTEXT NULL,
  `qualification` TEXT NULL,
  `date_of_employment` DATE NULL,
  `disciplines_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `poskey` (`firstname` ASC, `lastname` ASC),
  INDEX `fk_teachers_disciplines_idx` (`disciplines_id` ASC),
  CONSTRAINT `fk_teachers_disciplines`
    FOREIGN KEY (`disciplines_id`)
    REFERENCES `mydb`.`disciplines` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `theme` TINYTEXT NULL,
  `task` TEXT NULL,
  `answer` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `teachers_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tasks_teachers1_idx` (`teachers_id` ASC),
  CONSTRAINT `fk_tasks_teachers1`
    FOREIGN KEY (`teachers_id`)
    REFERENCES `mydb`.`teachers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tests` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `teachers_id` INT NOT NULL,
  `theme` TINYTEXT NULL,
  `task` TEXT NULL,
  `option_A` TINYTEXT NULL,
  `option_B` TINYTEXT NULL,
  `option_C` TINYTEXT NULL,
  `option_D` TINYTEXT NULL,
  `answer` TINYINT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tests_teachers1_idx` (`teachers_id` ASC),
  CONSTRAINT `fk_tests_teachers1`
    FOREIGN KEY (`teachers_id`)
    REFERENCES `mydb`.`teachers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`study_materials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`study_materials` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `theme` TINYTEXT NULL,
  `image` TEXT NULL,
  `title` TINYTEXT NULL,
  `body` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `teachers_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_study_materials_teachers1_idx` (`teachers_id` ASC),
  CONSTRAINT `fk_study_materials_teachers1`
    FOREIGN KEY (`teachers_id`)
    REFERENCES `mydb`.`teachers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`works`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`works` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `theme` TINYTEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `teachers_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_works_teachers1_idx` (`teachers_id` ASC),
  CONSTRAINT `fk_works_teachers1`
    FOREIGN KEY (`teachers_id`)
    REFERENCES `mydb`.`teachers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`schoolkids`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`schoolkids` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(100) NOT NULL,
  `middlename` VARCHAR(100) NULL,
  `lastname` VARCHAR(100) NOT NULL,
  `class` VARCHAR(45) NULL,
  `parants_contacts` TEXT NULL,
  PRIMARY KEY (`id`),
  INDEX `poskey` (`firstname` ASC, `lastname` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`homeworks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`homeworks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `schoolkids_id` INT NOT NULL,
  `works_id` INT NOT NULL,
  `date_to_completion` DATE NOT NULL,
  `body` TEXT NULL,
  `mark` INT NULL,
  `date_of_completition` DATE NULL,
  `techer_comment` TEXT NULL,
  `teacher_mark` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_homeworks_works1_idx` (`works_id` ASC),
  INDEX `fk_homeworks_schoolkids1_idx` (`schoolkids_id` ASC),
  INDEX `date_to_completition` (`date_to_completion` ASC),
  CONSTRAINT `fk_homeworks_works1`
    FOREIGN KEY (`works_id`)
    REFERENCES `mydb`.`works` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_homeworks_schoolkids1`
    FOREIGN KEY (`schoolkids_id`)
    REFERENCES `mydb`.`schoolkids` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `homeworks_id` INT NOT NULL,
  `author` INT NULL,
  `body` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comments_homeworks1_idx` (`homeworks_id` ASC),
  CONSTRAINT `fk_comments_homeworks1`
    FOREIGN KEY (`homeworks_id`)
    REFERENCES `mydb`.`homeworks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`blocks_of_materials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`blocks_of_materials` (
  `works_id` INT NOT NULL,
  `study_materials_id` INT NOT NULL,
  PRIMARY KEY (`works_id`, `study_materials_id`),
  INDEX `fk_blocks_of_materials_study_materials1_idx` (`study_materials_id` ASC),
  CONSTRAINT `fk_blocks_of_materials_works1`
    FOREIGN KEY (`works_id`)
    REFERENCES `mydb`.`works` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_blocks_of_materials_study_materials1`
    FOREIGN KEY (`study_materials_id`)
    REFERENCES `mydb`.`study_materials` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`blocks_of_tests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`blocks_of_tests` (
  `works_id` INT NOT NULL,
  `tests_id` INT NOT NULL,
  PRIMARY KEY (`works_id`, `tests_id`),
  INDEX `fk_blocks_of_tests_tests1_idx` (`tests_id` ASC),
  CONSTRAINT `fk_blocks_of_tests_works1`
    FOREIGN KEY (`works_id`)
    REFERENCES `mydb`.`works` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_blocks_of_tests_tests1`
    FOREIGN KEY (`tests_id`)
    REFERENCES `mydb`.`tests` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`blocks_of_tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`blocks_of_tasks` (
  `works_id` INT NOT NULL,
  `tasks_id` INT NOT NULL,
  PRIMARY KEY (`works_id`, `tasks_id`),
  INDEX `fk_blocks_of_tasks_tasks1_idx` (`tasks_id` ASC),
  CONSTRAINT `fk_blocks_of_tasks_works1`
    FOREIGN KEY (`works_id`)
    REFERENCES `mydb`.`works` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_blocks_of_tasks_tasks1`
    FOREIGN KEY (`tasks_id`)
    REFERENCES `mydb`.`tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
