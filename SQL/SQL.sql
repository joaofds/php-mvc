
-- CRIA BANCO "crud_produtos" ----------------------------------
CREATE DATABASE IF NOT EXISTS `crud_produtos` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `crud_produtos`;
-- -------------------------------------------------------------

-- CRIA TABELA "produtos" -------------------------------------
CREATE TABLE IF NOT EXISTS `produtos`( 
	`IDPROD` Int(11) NOT NULL AUTO_INCREMENT,
	`NOME` VarChar(255) NULL DEFAULT NULL,
	`COR` Enum( 'AMARELO', 'AZUL', 'VERMELHO' ) NULL DEFAULT NULL,
	PRIMARY KEY (`IDPROD`))
    ENGINE = InnoDB;
-- -------------------------------------------------------------

-- CRIA TABELA "precos" ---------------------------------------
CREATE TABLE IF NOT EXISTS`precos`( 
	`IDPRECO` Int(11) NOT NULL AUTO_INCREMENT,
	`PRECO` decimal(10,2) NULL DEFAULT NULL,
	`IDPROD` INT(11) NOT NULL,
	FOREIGN KEY(`IDPROD`) REFERENCES `produtos`(`IDPROD`) ON DELETE CASCADE,
	PRIMARY KEY (`IDPRECO`))
	ENGINE = InnoDB;
-- -------------------------------------------------------------
