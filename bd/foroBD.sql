-- MySQL Script generated by MySQL Workbench
-- Mon Jun 24 12:59:13 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Foro
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Foro` ;

-- -----------------------------------------------------
-- Schema Foro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Foro` DEFAULT CHARACTER SET utf8 ;
USE `Foro` ;

-- -----------------------------------------------------
-- Table `Foro`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Foro`.`usuario` ;

CREATE TABLE IF NOT EXISTS `Foro`.`usuario` (
  `codigo` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NULL,
  `contrasenia` VARCHAR(40) NULL,
  `foto` VARCHAR(40) NULL,
  `descripcion` VARCHAR(180) NULL,
  `fecha` DATETIME NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Foro`.`etiqueta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Foro`.`etiqueta` ;

CREATE TABLE IF NOT EXISTS `Foro`.`etiqueta` (
  `codigo` INT NOT NULL,
  `nombre` VARCHAR(20) NULL,
  `tema` VARCHAR(20) NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Foro`.`publicacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Foro`.`publicacion` ;

CREATE TABLE IF NOT EXISTS `Foro`.`publicacion` (
  `codigo` INT NOT NULL,
  `fecha` DATETIME NOT NULL,
  `tema` VARCHAR(200) NULL,
  `usuario_codigo` INT NOT NULL,
  `etiqueta_codigo` INT NOT NULL,
  PRIMARY KEY (`codigo`, `usuario_codigo`, `etiqueta_codigo`),
  INDEX `fk_publicacion_usuario_idx` (`usuario_codigo` ASC) VISIBLE,
  INDEX `fk_publicacion_etiqueta1_idx` (`etiqueta_codigo` ASC) VISIBLE,
  CONSTRAINT `fk_publicacion_usuario`
    FOREIGN KEY (`usuario_codigo`)
    REFERENCES `Foro`.`usuario` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_publicacion_etiqueta1`
    FOREIGN KEY (`etiqueta_codigo`)
    REFERENCES `Foro`.`etiqueta` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Foro`.`respuesta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Foro`.`respuesta` ;

CREATE TABLE IF NOT EXISTS `Foro`.`respuesta` (
  `codigo` INT NOT NULL,
  `fecha` DATETIME NOT NULL,
  `tema` VARCHAR(200) NULL,
  `publicacion_codigo` INT NOT NULL,
  `usuario_codigo` INT NOT NULL,
  PRIMARY KEY (`codigo`, `publicacion_codigo`, `usuario_codigo`),
  INDEX `fk_respuesta_publicacion1_idx` (`publicacion_codigo` ASC) VISIBLE,
  INDEX `fk_respuesta_usuario1_idx` (`usuario_codigo` ASC) VISIBLE,
  CONSTRAINT `fk_respuesta_publicacion1`
    FOREIGN KEY (`publicacion_codigo`)
    REFERENCES `Foro`.`publicacion` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_respuesta_usuario1`
    FOREIGN KEY (`usuario_codigo`)
    REFERENCES `Foro`.`usuario` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Foro`.`reacciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Foro`.`reacciones` ;

CREATE TABLE IF NOT EXISTS `Foro`.`reacciones` (
  `codigo` INT NOT NULL,
  `like` INT NOT NULL,
  `dislike` INT NOT NULL,
  `respuesta` INT NOT NULL,
  `publicacion_codigo` INT NOT NULL,
  `publicacion_usuario_codigo` INT NOT NULL,
  PRIMARY KEY (`codigo`, `publicacion_codigo`, `publicacion_usuario_codigo`),
  INDEX `fk_reacciones_publicacion1_idx` (`publicacion_codigo` ASC, `publicacion_usuario_codigo` ASC) VISIBLE,
  CONSTRAINT `fk_reacciones_publicacion1`
    FOREIGN KEY (`publicacion_codigo` , `publicacion_usuario_codigo`)
    REFERENCES `Foro`.`publicacion` (`codigo` , `usuario_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Foro`.`foro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Foro`.`foro` ;

CREATE TABLE IF NOT EXISTS `Foro`.`foro` (
  `codigo` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `fecha` DATETIME NULL,
  `tema` VARCHAR(40) NULL,
  `descripcion` VARCHAR(200) NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Foro`.`imagen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Foro`.`imagen`;

CREATE TABLE IF NOT EXISTS `Foro`.`imagen` (
  `codigo` INT NOT NULL,
  `origen` VARCHAR(45) NULL,
  `imagen` VARCHAR(40) NULL,
  `respuesta_codigo` INT NOT NULL,
  `respuesta_publicacion_codigo` INT NOT NULL,
  `foro_codigo` INT NOT NULL,
  `usuario_codigo` INT NOT NULL,
  PRIMARY KEY (`codigo`, `respuesta_codigo`, `respuesta_publicacion_codigo`, `foro_codigo`, `usuario_codigo`),
  INDEX `fk_imagen_respuesta1_idx` (`respuesta_codigo` ASC, `respuesta_publicacion_codigo` ASC) VISIBLE,
  INDEX `fk_imagen_foro1_idx` (`foro_codigo` ASC) VISIBLE,
  INDEX `fk_imagen_usuario1_idx` (`usuario_codigo` ASC) VISIBLE,
  CONSTRAINT `fk_imagen_respuesta1`
    FOREIGN KEY (`respuesta_codigo` , `respuesta_publicacion_codigo`)
    REFERENCES `Foro`.`respuesta` (`codigo` , `publicacion_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagen_foro1`
    FOREIGN KEY (`foro_codigo`)
    REFERENCES `Foro`.`foro` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagen_usuario1`
    FOREIGN KEY (`usuario_codigo`)
    REFERENCES `Foro`.`usuario` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Foro`.`miembros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Foro`.`miembros` ;

CREATE TABLE IF NOT EXISTS `Foro`.`miembros` (
  `codigo` INT NOT NULL,
  `fecha` DATETIME NULL,
  `foro_codigo` INT NOT NULL,
  `usuario_codigo` INT NOT NULL,
  INDEX `fk_usuario_has_foro_foro1_idx` (`foro_codigo` ASC) VISIBLE,
  INDEX `fk_usuario_has_foro_usuario1_idx` (`usuario_codigo` ASC) VISIBLE,
  PRIMARY KEY (`codigo`),
  CONSTRAINT `fk_usuario_has_foro_usuario1`
    FOREIGN KEY (`usuario_codigo`)
    REFERENCES `Foro`.`usuario` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_foro_foro1`
    FOREIGN KEY (`foro_codigo`)
    REFERENCES `Foro`.`foro` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



-- CAMBIE DESDE MYSQL usuario.codigo AHORA SE AUTOINCREMENTA
