-- MySQL Script generated by MySQL Workbench
-- Thu Mar 22 00:46:30 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema homewrks
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema homewrks
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `homewrks` DEFAULT CHARACTER SET utf8 ;
USE `homewrks` ;

-- -----------------------------------------------------
-- Table `homewrks`.`disciplines`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`disciplines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`id`),
  INDEX `poskey` (`name` ASC),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `role` CHAR NOT NULL,
  `login` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC));


-- -----------------------------------------------------
-- Table `homewrks`.`teachers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`teachers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `discipline_id` INT NOT NULL,
  `firstname` VARCHAR(100) NOT NULL,
  `middlename` VARCHAR(100) NULL DEFAULT NULL,
  `lastname` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `poskey` (`firstname` ASC, `lastname` ASC),
  INDEX `fk_teachers_disciplines_idx` (`discipline_id` ASC),
  INDEX `fk_teachers_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_teachers_disciplines`
    FOREIGN KEY (`discipline_id`)
    REFERENCES `homewrks`.`disciplines` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_teachers_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `homewrks`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `teacher_id` INT NOT NULL,
  `theme` TINYTEXT NULL,
  `task` TEXT NULL,
  `answer` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tasks_teachers1_idx` (`teacher_id` ASC),
  CONSTRAINT `fk_tasks_teachers1`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `homewrks`.`teachers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`tests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`tests` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `teacher_id` INT NOT NULL,
  `theme` TINYTEXT NULL,
  `task` TEXT NULL,
  `option_a` TINYTEXT NULL,
  `option_b` TINYTEXT NULL,
  `option_c` TINYTEXT NULL,
  `option_d` TINYTEXT NULL,
  `answer` CHAR(1) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tests_teachers1_idx` (`teacher_id` ASC),
  CONSTRAINT `fk_tests_teachers1`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `homewrks`.`teachers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`materials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`materials` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `teacher_id` INT NOT NULL,
  `theme` TINYTEXT NULL,
  `image` TEXT NULL,
  `title` TINYTEXT NULL,
  `body` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_study_materials_teachers1_idx` (`teacher_id` ASC),
  CONSTRAINT `fk_study_materials_teachers1`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `homewrks`.`teachers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`works`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`works` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `teacher_id` INT NOT NULL,
  `theme` TINYTEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_works_teachers1_idx` (`teacher_id` ASC),
  CONSTRAINT `fk_works_teachers1`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `homewrks`.`teachers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`grades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`grades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `num` INT NOT NULL,
  `char` CHAR NOT NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `grade_UNIQUE` (`num` ASC, `char` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`schoolkids`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`schoolkids` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `grade_id` INT NOT NULL,
  `firstname` VARCHAR(100) NOT NULL,
  `middlename` VARCHAR(100) NULL DEFAULT NULL,
  `lastname` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `poskey` (`firstname` ASC, `lastname` ASC),
  INDEX `fk_schoolkids_users1_idx` (`user_id` ASC),
  INDEX `fk_schoolkids_grades1_idx` (`grade_id` ASC),
  CONSTRAINT `fk_schoolkids_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `homewrks`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_schoolkids_grades1`
    FOREIGN KEY (`grade_id`)
    REFERENCES `homewrks`.`grades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`homeworks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`homeworks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `schoolkid_id` INT NOT NULL,
  `teacher_id` INT NULL,
  `work_id` INT NULL,
  `date_to_completion` DATE NOT NULL,
  `date_of_completion` DATE NULL DEFAULT NULL,
  `computer_mark` INT NULL,
  `teacher_comment` TEXT NULL,
  `teacher_mark` INT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_homeworks_works1_idx` (`work_id` ASC),
  INDEX `fk_homeworks_schoolkids1_idx` (`schoolkid_id` ASC),
  INDEX `date_to_completition` (`date_to_completion` ASC),
  INDEX `fk_homeworks_teachers1_idx` (`teacher_id` ASC),
  CONSTRAINT `fk_homeworks_works1`
    FOREIGN KEY (`work_id`)
    REFERENCES `homewrks`.`works` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_homeworks_schoolkids1`
    FOREIGN KEY (`schoolkid_id`)
    REFERENCES `homewrks`.`schoolkids` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_homeworks_teachers1`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `homewrks`.`teachers` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`comments` (
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
    REFERENCES `homewrks`.`homeworks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`material_work`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`material_work` (
  `work_id` INT NOT NULL,
  `material_id` INT NOT NULL,
  PRIMARY KEY (`work_id`, `material_id`),
  INDEX `fk_blocks_of_materials_study_materials1_idx` (`material_id` ASC),
  CONSTRAINT `fk_blocks_of_materials_works1`
    FOREIGN KEY (`work_id`)
    REFERENCES `homewrks`.`works` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_blocks_of_materials_study_materials1`
    FOREIGN KEY (`material_id`)
    REFERENCES `homewrks`.`materials` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`test_work`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`test_work` (
  `work_id` INT NOT NULL,
  `test_id` INT NOT NULL,
  PRIMARY KEY (`work_id`, `test_id`),
  INDEX `fk_blocks_of_tests_tests1_idx` (`test_id` ASC),
  CONSTRAINT `fk_blocks_of_tests_works1`
    FOREIGN KEY (`work_id`)
    REFERENCES `homewrks`.`works` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_blocks_of_tests_tests1`
    FOREIGN KEY (`test_id`)
    REFERENCES `homewrks`.`tests` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`task_work`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`task_work` (
  `work_id` INT NOT NULL,
  `task_id` INT NOT NULL,
  PRIMARY KEY (`work_id`, `task_id`),
  INDEX `fk_blocks_of_tasks_tasks1_idx` (`task_id` ASC),
  CONSTRAINT `fk_blocks_of_tasks_works1`
    FOREIGN KEY (`work_id`)
    REFERENCES `homewrks`.`works` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_blocks_of_tasks_tasks1`
    FOREIGN KEY (`task_id`)
    REFERENCES `homewrks`.`tasks` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`password_resets` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` USING BTREE (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`given_tests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`given_tests` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `homework_id` INT NOT NULL,
  `theme` TINYTEXT NULL,
  `task` TEXT NULL,
  `option_a` TINYTEXT NULL,
  `option_b` TINYTEXT NULL,
  `option_c` TINYTEXT NULL,
  `option_d` TINYTEXT NULL,
  `answer` CHAR(1) NULL,
  `standard` CHAR(1) NULL,
  `correct_flag` INT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_given_tests_homeworks1_idx` (`homework_id` ASC),
  CONSTRAINT `fk_given_tests_homeworks1`
    FOREIGN KEY (`homework_id`)
    REFERENCES `homewrks`.`homeworks` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homewrks`.`given_tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homewrks`.`given_tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `homework_id` INT NOT NULL,
  `theme` TINYTEXT NULL,
  `task` TEXT NULL,
  `answer` TEXT NULL,
  `standard` TEXT NULL,
  `correct_flag` INT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_given_tasks_homeworks1_idx` (`homework_id` ASC),
  CONSTRAINT `fk_given_tasks_homeworks1`
    FOREIGN KEY (`homework_id`)
    REFERENCES `homewrks`.`homeworks` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
