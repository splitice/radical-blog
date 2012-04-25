SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `radical_blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `radical_blog` ;

-- -----------------------------------------------------
-- Table `radical_blog`.`category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `radical_blog`.`category` (
  `category_id` INT NOT NULL AUTO_INCREMENT ,
  `category_title` VARCHAR(100) NOT NULL ,
  `category_stub` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`category_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `radical_blog`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `radical_blog`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `user_username` VARCHAR(45) NOT NULL ,
  `user_password` VARCHAR(45) NOT NULL ,
  `user_admin` ENUM('yes','no') NOT NULL DEFAULT 'no' ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `radical_blog`.`post`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `radical_blog`.`post` (
  `post_id` INT NOT NULL AUTO_INCREMENT ,
  `category_id` INT NOT NULL ,
  `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `post_title` VARCHAR(200) NOT NULL ,
  `post_content` TEXT NOT NULL ,
  `post_stub` VARCHAR(200) NOT NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`post_id`) ,
  UNIQUE INDEX `post_stub_UNIQUE` (`post_stub` ASC) ,
  INDEX `fk_post_category1` (`category_id` ASC) ,
  INDEX `fk_post_user1` (`user_id` ASC) ,
  CONSTRAINT `fk_post_category1`
    FOREIGN KEY (`category_id` )
    REFERENCES `radical_blog`.`category` (`category_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `radical_blog`.`user` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `radical_blog`.`comment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `radical_blog`.`comment` (
  `comment_id` INT NOT NULL AUTO_INCREMENT ,
  `comment_name` VARCHAR(50) NULL ,
  `comment_title` VARCHAR(255) NOT NULL ,
  `comment_body` TEXT NOT NULL ,
  `comment_email` VARCHAR(255) NOT NULL ,
  `post_id` INT NOT NULL ,
  `comment_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`comment_id`) ,
  INDEX `fk_comment_post` (`post_id` ASC) ,
  CONSTRAINT `fk_comment_post`
    FOREIGN KEY (`post_id` )
    REFERENCES `radical_blog`.`post` (`post_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `radical_blog`.`tag`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `radical_blog`.`tag` (
  `tag_id` INT NOT NULL AUTO_INCREMENT ,
  `tag_title` VARCHAR(100) NOT NULL ,
  `tag_stub` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`tag_id`) ,
  UNIQUE INDEX `tag_title_UNIQUE` (`tag_title` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `radical_blog`.`post_tag`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `radical_blog`.`post_tag` (
  `post_id` INT NOT NULL ,
  `tag_id` INT NOT NULL ,
  PRIMARY KEY (`post_id`, `tag_id`) ,
  INDEX `fk_post_has_tag_tag1` (`tag_id` ASC) ,
  INDEX `fk_post_has_tag_post1` (`post_id` ASC) ,
  CONSTRAINT `fk_post_has_tag_post1`
    FOREIGN KEY (`post_id` )
    REFERENCES `radical_blog`.`post` (`post_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_has_tag_tag1`
    FOREIGN KEY (`tag_id` )
    REFERENCES `radical_blog`.`tag` (`tag_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


grant ALL on TABLE `radical_blog`.`post` to radical_blog;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `radical_blog`.`user`
-- -----------------------------------------------------
START TRANSACTION;
USE `radical_blog`;
INSERT INTO `radical_blog`.`user` (`user_id`, `user_username`, `user_password`, `user_admin`) VALUES (1, 'admin', 'admin', 'yes');

COMMIT;