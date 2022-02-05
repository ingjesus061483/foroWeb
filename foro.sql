/*
SQLyog Enterprise - MySQL GUI v5.22
Host - 5.5.5-10.1.13-MariaDB : Database - foro
*********************************************************************
Server version : 5.5.5-10.1.13-MariaDB
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `foro`;

USE `foro`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `foro` */

DROP TABLE IF EXISTS `foro`;

CREATE TABLE `foro` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `idAdministrador` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(200) NOT NULL DEFAULT '',
  `mensaje` text,
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `respuestas` int(11) NOT NULL DEFAULT '0',
  `identificador` int(7) NOT NULL DEFAULT '0',
  `ult_respuesta` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `foro` */

insert  into `foro`(`id`,`idAdministrador`,`titulo`,`mensaje`,`fecha`,`respuestas`,`identificador`,`ult_respuesta`) values (1,1,'hardware','bienvenidos','2016-09-03 00:00:00',0,0,NULL),(2,1,'software','logica de sistema','2016-09-05 00:00:00',0,0,NULL),(3,1,'historia de los computadores','dejen su mensajes','2016-09-06 00:00:00',0,0,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
