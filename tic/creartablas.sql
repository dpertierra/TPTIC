SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `tic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `tic` ;

-- -----------------------------------------------------
-- Table `tic`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tic`.`Usuarios` (
  `idUsuarios` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(100) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `apellido` VARCHAR(100) NOT NULL,
  `mail` VARCHAR(100) NOT NULL,
  `Foto` TEXT NOT NULL,
  `birthday` DATE NOT NULL,
  `sexo` TINYINT NOT NULL,
  `Bio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  UNIQUE INDEX `Username_UNIQUE` (`user` ASC),
  UNIQUE INDEX `idUsuarios_UNIQUE` (`idUsuarios` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tic`.`Mensajes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tic`.`Mensajes` (
  `idMensajes` INT NOT NULL AUTO_INCREMENT,
  `idEnvia` INT NOT NULL,
  `mensaje` VARCHAR(255) NOT NULL,
  `idRecibe` INT NOT NULL,
  `fechayhora` DATETIME NOT NULL,
  PRIMARY KEY (`idMensajes`),
  UNIQUE INDEX `idUsuario_UNIQUE` (`idEnvia` ASC),
  UNIQUE INDEX `idMensajes_UNIQUE` (`idMensajes` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
