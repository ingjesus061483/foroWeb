/*
SQLyog Community
MySQL - 8.0.32 : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`foroWeb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `foroWeb`;

/*Table structure for table `cursos` */

DROP TABLE IF EXISTS `cursos`;

CREATE TABLE `cursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descripcion` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cursos` */

/*Table structure for table `dato_foros` */

DROP TABLE IF EXISTS `dato_foros`;

CREATE TABLE `dato_foros` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `foro_id` int NOT NULL,
  `datos_id` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `foro_id` (`foro_id`),
  KEY `datos_id` (`datos_id`),
  CONSTRAINT `dato_foros_ibfk_1` FOREIGN KEY (`foro_id`) REFERENCES `foros` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `dato_foros_ibfk_2` FOREIGN KEY (`datos_id`) REFERENCES `datos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dato_foros` */

/*Table structure for table `dato_mensajes` */

DROP TABLE IF EXISTS `dato_mensajes`;

CREATE TABLE `dato_mensajes` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `dato_id` int NOT NULL,
  `mensaje_id` int NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dato_mensajes` */

/*Table structure for table `datos` */

DROP TABLE IF EXISTS `datos`;

CREATE TABLE `datos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `data` longblob NOT NULL,
  `tipo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `datos` */

/*Table structure for table `foros` */

DROP TABLE IF EXISTS `foros`;

CREATE TABLE `foros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mensaje` text,
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `foros_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `foros` */

/*Table structure for table `modulos` */

DROP TABLE IF EXISTS `modulos`;

CREATE TABLE `modulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `modulos` */

/*Table structure for table `perfiles` */

DROP TABLE IF EXISTS `perfiles`;

CREATE TABLE `perfiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `perfiles` */

/*Table structure for table `permisos` */

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `perfil_id` int NOT NULL,
  `modulo_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfil_id` (`perfil_id`),
  KEY `modulo_id` (`modulo_id`),
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `permisos` */

/*Table structure for table `respuesta_datos` */

DROP TABLE IF EXISTS `respuesta_datos`;

CREATE TABLE `respuesta_datos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `dato_id` int NOT NULL,
  `respuesta_id` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `dato_id` (`dato_id`),
  KEY `respuesta_id` (`respuesta_id`),
  CONSTRAINT `respuesta_datos_ibfk_1` FOREIGN KEY (`dato_id`) REFERENCES `datos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `respuesta_datos_ibfk_2` FOREIGN KEY (`respuesta_id`) REFERENCES `respuestas` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `respuesta_datos` */

/*Table structure for table `respuestas` */

DROP TABLE IF EXISTS `respuestas`;

CREATE TABLE `respuestas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mensaje` text,
  `fecha` datetime NOT NULL,
  `foro_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `foro_id` (`foro_id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`foro_id`) REFERENCES `foros` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `respuestas` */

/*Table structure for table `usuario_cursos` */

DROP TABLE IF EXISTS `usuario_cursos`;

CREATE TABLE `usuario_cursos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `curso_id` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `curso_id` (`curso_id`),
  CONSTRAINT `usuario_cursos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `usuario_cursos_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario_cursos` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `direccion` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefono` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usuario` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `perfil_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfil_id` (`perfil_id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

/*Table structure for table `viewperfiles` */

DROP TABLE IF EXISTS `viewperfiles`;

/*!50001 DROP VIEW IF EXISTS `viewperfiles` */;
/*!50001 DROP TABLE IF EXISTS `viewperfiles` */;

/*!50001 CREATE TABLE  `viewperfiles`(
 `id` int ,
 `nombre` varchar(50) ,
 `descripcion` varchar(255) 
)*/;

/*Table structure for table `viewusuarios` */

DROP TABLE IF EXISTS `viewusuarios`;

/*!50001 DROP VIEW IF EXISTS `viewusuarios` */;
/*!50001 DROP TABLE IF EXISTS `viewusuarios` */;

/*!50001 CREATE TABLE  `viewusuarios`(
 `Id` int ,
 `Identificacion` varchar(50) ,
 `NombreCompleto` varchar(101) ,
 `Direccion` varchar(50) ,
 `Telefono` varchar(50) ,
 `Email` varchar(50) ,
 `Usuario` varchar(50) ,
 `password` varchar(100) ,
 `Perfil_id` int ,
 `Perfil` varchar(50) 
)*/;

/*View structure for view viewperfiles */

/*!50001 DROP TABLE IF EXISTS `viewperfiles` */;
/*!50001 DROP VIEW IF EXISTS `viewperfiles` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`jmora`@`%` SQL SECURITY DEFINER VIEW `viewperfiles` AS select `perfiles`.`id` AS `id`,`perfiles`.`nombre` AS `nombre`,`perfiles`.`descripcion` AS `descripcion` from `perfiles` */;

/*View structure for view viewusuarios */

/*!50001 DROP TABLE IF EXISTS `viewusuarios` */;
/*!50001 DROP VIEW IF EXISTS `viewusuarios` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`jmora`@`%` SQL SECURITY DEFINER VIEW `viewusuarios` AS select `usuarios`.`id` AS `Id`,`usuarios`.`identificacion` AS `Identificacion`,concat(`usuarios`.`nombre`,' ',`usuarios`.`apellido`) AS `NombreCompleto`,`usuarios`.`direccion` AS `Direccion`,`usuarios`.`telefono` AS `Telefono`,`usuarios`.`email` AS `Email`,`usuarios`.`usuario` AS `Usuario`,`usuarios`.`password` AS `password`,`perfiles`.`id` AS `Perfil_id`,`perfiles`.`nombre` AS `Perfil` from (`usuarios` join `perfiles` on((`perfiles`.`id` = `usuarios`.`perfil_id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
