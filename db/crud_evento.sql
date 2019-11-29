-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.6-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema crud_evento
--

CREATE DATABASE IF NOT EXISTS crud_evento;
USE crud_evento;

--
-- Definition of table `inscricao`
--

DROP TABLE IF EXISTS `inscricao`;
CREATE TABLE `inscricao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL,
  `id_palestra` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inscricao`
--

/*!40000 ALTER TABLE `inscricao` DISABLE KEYS */;
INSERT INTO `inscricao` (`id`,`id_pessoa`,`id_palestra`) VALUES 
 (1,13,10),
 (2,13,10);
/*!40000 ALTER TABLE `inscricao` ENABLE KEYS */;


--
-- Definition of table `palestra`
--

DROP TABLE IF EXISTS `palestra`;
CREATE TABLE `palestra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_palestra` varchar(255) NOT NULL,
  `palestrante` varchar(255) NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `palestra`
--

/*!40000 ALTER TABLE `palestra` DISABLE KEYS */;
INSERT INTO `palestra` (`id`,`nome_palestra`,`palestrante`,`inicio`,`fim`) VALUES 
 (3,'Palestra2','Gabriel ','2019-09-13 18:00:00','2019-09-13 22:00:00'),
 (4,'Palestra4','Gabriel Schunck','2019-09-13 22:00:00','2019-09-14 22:31:00'),
 (5,'Palestra','Gabriel Schunckkkkkkkkk','2019-09-13 22:00:00','2019-09-14 22:31:00'),
 (6,'Palestra555','Gabriel 33','2019-09-13 18:00:00','2019-09-13 22:00:00'),
 (7,'PalestraTeste555','Gabriel 33363636','2019-09-15 18:00:00','2019-09-16 22:00:00'),
 (9,'Palestra','Gabriel Schunckkkkkkkkk','2019-09-13 22:00:00','2019-09-14 22:31:00'),
 (10,'Palestra','Gabriel Schunckkkkkkkkk','2019-09-13 22:00:00','2019-09-14 22:31:00'),
 (11,'Palestra66','Gabriel 33','2019-09-13 18:00:00','2019-09-13 22:00:00'),
 (14,'Palestra Apresentacao','ApresentaÃ§Ã£o','2019-09-13 18:00:00','2019-09-13 22:00:00'),
 (15,'Palestra Apresentacao','ApresentaÃ§Ã£o','2019-09-13 18:00:00','2019-09-13 22:00:00'),
 (16,'Palestra Apresentacao','ApresentaÃ§Ã£o','2019-09-13 18:00:00','2019-09-13 22:00:00'),
 (17,'Palestra Apresentacao','ApresentaÃ§Ã£o','2019-09-13 18:00:00','2019-09-13 22:00:00'),
 (18,'Palestra Apresentacao','ApresentaÃ§Ã£o','2019-09-13 18:00:00','2019-09-13 22:00:00'),
 (19,'testeform','testpalestran','1980-11-17 20:00:00','1980-11-17 21:00:00');
/*!40000 ALTER TABLE `palestra` ENABLE KEYS */;


--
-- Definition of table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  PRIMARY KEY (`id`,`cpf`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pessoa`
--

/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`id`,`nome`,`cpf`,`cidade`,`tipo`) VALUES 
 (3,'Gabriel Schunck','95065750025','JoÃ£o Pessoa','palestrante'),
 (13,'Gabriel Schunck','95065750025','JoÃ£o Pessoa','palestrante'),
 (17,'Gabriel Schunck','95065750025','JoÃ£o Pessoa','teste4'),
 (18,'Gabriel Schunck','95065750025','JoÃ£o Pessoa','teste4'),
 (19,'Gabriel Schunck','95065750025','JoÃ£o Pessoa','teste4'),
 (20,'Gabriel Schunck','95065750025','JoÃ£o Pessoa','teste4'),
 (21,'Gabriel Schunck','95065750025','JoÃ£o Pessoa','teste4'),
 (22,'Gabriel Schunck','95065750025','JoÃ£o Pessoa','teste4'),
 (23,'Gabriel Schunck','95065750025','JoÃ£o Pessoa','palestrante'),
 (33,'sfsfsdfsdf','sfsdfs','sfdsd','palestrante'),
 (34,'Gabriel','95065750025','Porto Alegre','palestrante');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `LOGIN` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`,`nome`,`login`,`senha`,`tipo`) VALUES 
 (3,'gabriel','schuncka','1234','teste'),
 (6,'gabriel3','schunckaaaaaaaaaaaaaaaaaaaaa','1234','teste3'),
 (7,'gabriels','gs','1234','teste');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
