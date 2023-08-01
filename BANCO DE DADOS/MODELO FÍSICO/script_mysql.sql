-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`tb_fotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_fotos` (
  `id_fot` INT NOT NULL,
  `fot_link` VARCHAR(255) NULL,
  PRIMARY KEY (`id_fot`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_categorias` (
  `id_cat` INT NOT NULL,
  `cat_nome` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_cat`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_produtos` (
  `tb_produtos` INT NOT NULL,
  `prod_atv` CHAR NOT NULL,
  `prod_vlr` FLOAT(5,2) NOT NULL,
  `prod_nome` VARCHAR(150) NOT NULL,
  `tb_fotos_id_fot` INT NOT NULL,
  `tb_categorias_id_cat` INT NOT NULL,
  PRIMARY KEY (`tb_produtos`, `tb_fotos_id_fot`, `tb_categorias_id_cat`),
  CONSTRAINT `fk_tb_produtos_tb_fotos`
    FOREIGN KEY (`tb_fotos_id_fot`)
    REFERENCES `mydb`.`tb_fotos` (`id_fot`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_produtos_tb_categorias1`
    FOREIGN KEY (`tb_categorias_id_cat`)
    REFERENCES `mydb`.`tb_categorias` (`id_cat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tb_produtos_tb_fotos_idx` ON `mydb`.`tb_produtos` (`tb_fotos_id_fot` ASC) VISIBLE;

CREATE INDEX `fk_tb_produtos_tb_categorias1_idx` ON `mydb`.`tb_produtos` (`tb_categorias_id_cat` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `mydb`.`tb_cidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_cidades` (
  `id_cid` INT NOT NULL,
  `cid_cid` VARCHAR(70) NOT NULL,
  `cid_est` CHAR(2) NOT NULL,
  PRIMARY KEY (`id_cid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_clientes` (
  `id_clientes` INT NOT NULL,
  `cli_nome` VARCHAR(70) NOT NULL,
  `cli_rua` VARCHAR(70) NOT NULL,
  `cli_tipo` CHAR NOT NULL,
  `cli_atv` CHAR NOT NULL,
  `cli_cpf` BIGINT(11) NOT NULL,
  `cli_sen` VARCHAR(25) NOT NULL,
  `cli_ema` VARCHAR(75) NOT NULL,
  `cli_tel` BIGINT(11) NOT NULL,
  `cli_num` VARCHAR(10) NOT NULL,
  `cli_obs` VARCHAR(100) NOT NULL,
  `cli_comp` VARCHAR(50) NOT NULL,
  `cli_cep` VARCHAR(25) NOT NULL,
  `tb_cidades_id_cid` INT NOT NULL,
  PRIMARY KEY (`id_clientes`, `tb_cidades_id_cid`),
  CONSTRAINT `fk_tb_clientes_tb_cidades1`
    FOREIGN KEY (`tb_cidades_id_cid`)
    REFERENCES `mydb`.`tb_cidades` (`id_cid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tb_clientes_tb_cidades1_idx` ON `mydb`.`tb_clientes` (`tb_cidades_id_cid` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `mydb`.`tb_pagamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_pagamentos` (
  `id_pagamenos` INT NOT NULL,
  `pag_met` VARCHAR(2) NOT NULL,
  `pag_status` VARCHAR(15) NOT NULL,
  `pag_num` VARCHAR(255) NOT NULL,
  `pag_vecimento` TIMESTAMP NOT NULL,
  `pag_data` DATE NOT NULL,
  PRIMARY KEY (`id_pagamenos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_compras` (
  `id_compras` INT NOT NULL,
  `comp_datacli` TIMESTAMP NOT NULL,
  `comp_valorent` FLOAT NOT NULL,
  `comp_tipoent` CHAR NOT NULL,
  `compr_stts` CHAR NOT NULL,
  `comp_data` DATE NOT NULL,
  `id_clientes` INT NOT NULL,
  `id_pagamentos` INT NOT NULL,
  PRIMARY KEY (`id_compras`, `id_clientes`, `id_pagamentos`),
  CONSTRAINT `fk_tb_compras_tb_clientes1`
    FOREIGN KEY (`id_clientes`)
    REFERENCES `mydb`.`tb_clientes` (`id_clientes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_compras_tb_pagamentos1`
    FOREIGN KEY (`id_pagamentos`)
    REFERENCES `mydb`.`tb_pagamentos` (`id_pagamenos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tb_compras_tb_clientes1_idx` ON `mydb`.`tb_compras` (`id_clientes` ASC) VISIBLE;

CREATE INDEX `fk_tb_compras_tb_pagamentos1_idx` ON `mydb`.`tb_compras` (`id_pagamentos` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `mydb`.`tb_compras_itens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_compras_itens` (
  `id_comprod` INT NOT NULL,
  `comprod_vlt` FLOAT(5,2) NOT NULL,
  `comprod _qtd` INT NOT NULL,
  `tb_produtos_tb_produtos` INT NOT NULL,
  `tb_compras_id_compras` INT NOT NULL,
  PRIMARY KEY (`id_comprod`, `tb_produtos_tb_produtos`, `tb_compras_id_compras`),
  CONSTRAINT `fk_tb_compras_itens_tb_produtos1`
    FOREIGN KEY (`tb_produtos_tb_produtos`)
    REFERENCES `mydb`.`tb_produtos` (`tb_produtos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_compras_itens_tb_compras1`
    FOREIGN KEY (`tb_compras_id_compras`)
    REFERENCES `mydb`.`tb_compras` (`id_compras`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tb_compras_itens_tb_produtos1_idx` ON `mydb`.`tb_compras_itens` (`tb_produtos_tb_produtos` ASC) VISIBLE;

CREATE INDEX `fk_tb_compras_itens_tb_compras1_idx` ON `mydb`.`tb_compras_itens` (`tb_compras_id_compras` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `mydb`.`tb_logisticas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_logisticas` (
  `id_log` INT NOT NULL,
  `log_rastr` VARCHAR(70) NULL,
  `log_trns` VARCHAR(70) NULL,
  `tb_compras_id_compras` INT NOT NULL,
  `tb_compras_id_clientes` INT NOT NULL,
  PRIMARY KEY (`id_log`),
  CONSTRAINT `fk_tb_logisticas_tb_compras1`
    FOREIGN KEY (`tb_compras_id_compras` , `tb_compras_id_clientes`)
    REFERENCES `mydb`.`tb_compras` (`id_compras` , `id_clientes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tb_logisticas_tb_compras1_idx` ON `mydb`.`tb_logisticas` (`tb_compras_id_compras` ASC, `tb_compras_id_clientes` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `mydb`.`tb_feedbacks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_feedbacks` (
  `id_feed` INT NOT NULL,
  `feed_nome` VARCHAR(255) NOT NULL,
  `feed_email` VARCHAR(255) NOT NULL,
  `feed_coment` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_feed`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
