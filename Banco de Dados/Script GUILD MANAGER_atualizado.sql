-- MySQL Workbench Synchronization
-- Generated: 2017-06-08 11:08
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: GlauberGomes

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `BDBD_GuildManager_AULA` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `BDBD_GuildManager_AULA`.`usuario` (
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `nick` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nick`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `BDBD_GuildManager_AULA`.`personagem` (
  `nome` VARCHAR(45) NOT NULL,
  `dinheiro` DOUBLE NOT NULL,
  `raca` VARCHAR(45) NOT NULL,
  `usuario_nick` VARCHAR(45) NOT NULL,
  `classe_nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nome`, `usuario_nick`),
  INDEX `fk_personagem_usuario1_idx` (`usuario_nick` ASC),
  INDEX `fk_personagem_classe1_idx` (`classe_nome` ASC),
  CONSTRAINT `fk_personagem_usuario1`
    FOREIGN KEY (`usuario_nick`)
    REFERENCES `BDBD_GuildManager_AULA`.`usuario` (`nick`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personagem_classe1`
    FOREIGN KEY (`classe_nome`)
    REFERENCES `BDBD_GuildManager_AULA`.`classe` (`nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `BDBD_GuildManager_AULA`.`classe` (
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nome`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `BDBD_GuildManager_AULA`.`item` (
  `nome` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `valor` VARCHAR(45) NOT NULL,
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `posse` VARCHAR(20) NOT NULL,
  `personagem_nome` VARCHAR(45) NOT NULL,
  `personagem_usuario_nick` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `posse`),
  INDEX `fk_item_personagem1_idx` (`personagem_nome` ASC, `personagem_usuario_nick` ASC),
  CONSTRAINT `fk_item_personagem1`
    FOREIGN KEY (`personagem_nome` , `personagem_usuario_nick`)
    REFERENCES `BDBD_GuildManager_AULA`.`personagem` (`nome` , `usuario_nick`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `BDBD_GuildManager_AULA`.`evento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `usuario_nick` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NULL DEFAULT NULL,
  `data` DATETIME NOT NULL,
  PRIMARY KEY (`id`, `usuario_nick`),
  INDEX `fk_evento_usuario1_idx` (`usuario_nick` ASC),
  CONSTRAINT `fk_evento_usuario1`
    FOREIGN KEY (`usuario_nick`)
    REFERENCES `BDBD_GuildManager_AULA`.`usuario` (`nick`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
