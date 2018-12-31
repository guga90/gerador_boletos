/*
SQLyog Community v12.4.1 (64 bit)
MySQL - 5.1.50-community : Database - db_boleto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_boleto` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `db_boleto`;

/*Table structure for table `banco` */

DROP TABLE IF EXISTS `banco`;

CREATE TABLE `banco` (
  `banco_id` int(11) NOT NULL AUTO_INCREMENT,
  `banco_codigo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banco_nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`banco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `banco` */

/*Table structure for table `cedente` */

DROP TABLE IF EXISTS `cedente`;

CREATE TABLE `cedente` (
  `cedente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cedente_nomerazao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedente_cpfcnpj` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedente_telefone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedente_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedente_cep` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedente_logradouro` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedente_status` enum('A','I') COLLATE utf8_unicode_ci DEFAULT 'A',
  `cedente_cidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedente_estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedente_setor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedente_tipopessoa` enum('J','F') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cedente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cedente` */

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nomerazao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_cpfcnpj` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_telefone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_cep` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_endereco` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_status` enum('A','I') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cliente` */

/*Table structure for table `conta` */

DROP TABLE IF EXISTS `conta`;

CREATE TABLE `conta` (
  `conta_id` int(11) NOT NULL AUTO_INCREMENT,
  `cedente_id` int(11) NOT NULL,
  `conta_agencia` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta_numero` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta_nome` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta_status` enum('A','I') COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta_carteira` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta_agenciadigito` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta_numerodigito` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta_contrato` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta_convenio` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta_obscaixa` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta_taxajurosmes` double DEFAULT NULL,
  `conta_taxamulta` double DEFAULT NULL,
  `conta_taxadesconto` double DEFAULT NULL,
  `conta_diasprotesto` int(11) DEFAULT NULL,
  `banco_id` int(11) DEFAULT NULL,
  `conta_moeda` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`conta_id`),
  KEY `idx_conta` (`cedente_id`),
  KEY `idx_conta_0` (`banco_id`),
  CONSTRAINT `fk_conta_0` FOREIGN KEY (`banco_id`) REFERENCES `banco` (`banco_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_conta` FOREIGN KEY (`cedente_id`) REFERENCES `cedente` (`cedente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `conta` */

/*Table structure for table `lancamento` */

DROP TABLE IF EXISTS `lancamento`;

CREATE TABLE `lancamento` (
  `lancamento_id` int(11) NOT NULL AUTO_INCREMENT,
  `sacado_id` int(11) NOT NULL,
  `cedente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `lancamento_dthemissao` datetime DEFAULT NULL,
  `lancamento_valor` double DEFAULT NULL,
  `lancamento_demonstrativo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lancamento_status` enum('E','P','R','C') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '[E] emitido [P] pago [R] remessa [C] cancelado',
  `lancamento_dtvenc` date DEFAULT NULL,
  `conta_id` int(11) NOT NULL,
  PRIMARY KEY (`lancamento_id`),
  KEY `idx_boleto` (`sacado_id`),
  KEY `idx_boleto_0` (`usuario_id`),
  KEY `idx_boleto_1` (`cedente_id`),
  KEY `idx_lancamento` (`conta_id`),
  CONSTRAINT `fk_lancamento` FOREIGN KEY (`conta_id`) REFERENCES `conta` (`conta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_boleto` FOREIGN KEY (`sacado_id`) REFERENCES `sacado` (`sacado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_boleto_0` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_boleto_1` FOREIGN KEY (`cedente_id`) REFERENCES `cedente` (`cedente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `lancamento` */

/*Table structure for table `sacado` */

DROP TABLE IF EXISTS `sacado`;

CREATE TABLE `sacado` (
  `sacado_id` int(11) NOT NULL AUTO_INCREMENT,
  `sacado_nomerazao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sacado_cpfcnpj` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sacado_telefone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sacado_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sacado_cep` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sacado_logradouro` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sacado_status` enum('A','I') COLLATE utf8_unicode_ci DEFAULT 'A',
  `sacado_cidade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sacado_estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sacado_setor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sacado_tipopessoa` enum('F','J') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sacado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sacado` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_telefone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_senha` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_dtnasc` date DEFAULT NULL,
  `usuario_logradouro` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_cep` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_status` enum('A','I') COLLATE utf8_unicode_ci DEFAULT 'A',
  `usuario_cidade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_setor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`usuario_id`,`usuario_nome`,`usuario_cpf`,`usuario_telefone`,`usuario_senha`,`usuario_dtnasc`,`usuario_logradouro`,`usuario_cep`,`usuario_status`,`usuario_cidade`,`usuario_estado`,`usuario_setor`) values 
(1,'Gustavo Mendanha','017.132.381-52','(62) 9831-4134','356a192b7913b04c54574d18c28d46e6395428ab','1990-11-08','RUA','74890-721','A','GOIANIA','GO','GOIAS');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
