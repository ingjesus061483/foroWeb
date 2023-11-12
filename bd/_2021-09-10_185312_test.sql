/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ test /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE test;

DROP TABLE IF EXISTS cursos;
CREATE TABLE `cursos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS datos;
CREATE TABLE `datos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL DEFAULT '',
  `Data` longblob NOT NULL,
  `Tipo` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS datosforo;
CREATE TABLE `datosforo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idForo` int(11) NOT NULL DEFAULT '0',
  `idDatos` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS datosmensajes;
CREATE TABLE `datosmensajes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idDatos` int(11) NOT NULL DEFAULT '0',
  `idMensaje` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS foro;
CREATE TABLE `foro` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(200) NOT NULL DEFAULT '',
  `mensaje` text,
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS modulos;
CREATE TABLE `modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL DEFAULT '',
  `Descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS perfil;
CREATE TABLE `perfil` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL DEFAULT '',
  `Descripcion` varchar(255) NOT NULL DEFAULT '',
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS permisos;
CREATE TABLE `permisos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdPerfil` int(11) NOT NULL DEFAULT '0',
  `idModulo` int(11) NOT NULL DEFAULT '0',
  `Valor` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS respuesta;
CREATE TABLE `respuesta` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `idForo` int(7) NOT NULL DEFAULT '0',
  `idUsuario` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(200) NOT NULL DEFAULT '',
  `mensaje` text,
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS respuestadatos;
CREATE TABLE `respuestadatos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idDatos` int(11) NOT NULL DEFAULT '0',
  `idRespuesta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS usuario;
CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Identificacion` varchar(50) NOT NULL DEFAULT '',
  `PrimerNombre` varchar(50) NOT NULL DEFAULT '',
  `SegundoNombre` varchar(50) DEFAULT NULL,
  `PrimerApellido` varchar(50) NOT NULL DEFAULT '',
  `SegundoApellido` varchar(50) DEFAULT NULL,
  `Direccion` varchar(50) NOT NULL DEFAULT '',
  `Telefono` varchar(50) NOT NULL DEFAULT '',
  `Email` varchar(50) NOT NULL DEFAULT '',
  `Usuario` varchar(50) NOT NULL DEFAULT '',
  `pwd` varchar(50) NOT NULL DEFAULT '',
  `IdPerfil` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS usuariocursos;
CREATE TABLE `usuariocursos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL DEFAULT '0',
  `IdCurso` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE OR REPLACE VIEW `viewperfiles` AS select `perfil`.`Id` AS `id`,`perfil`.`Nombre` AS `nombre`,`perfil`.`Descripcion` AS `descripcion`,(case `perfil`.`estado` when 0 then 'inactivo' when 1 then 'activo' end) AS `estado` from `perfil`;

CREATE OR REPLACE VIEW `viewusuarios` AS select `usuario`.`Id` AS `Id`,`usuario`.`Identificacion` AS `Identificacion`,concat(`usuario`.`PrimerNombre`,' ',`usuario`.`SegundoNombre`,' ',`usuario`.`PrimerApellido`,' ',`usuario`.`SegundoApellido`) AS `NombreCompleto`,`usuario`.`Direccion` AS `Direccion`,`usuario`.`Telefono` AS `Telefono`,`usuario`.`Email` AS `Email`,`usuario`.`Usuario` AS `Usuario`,`usuario`.`pwd` AS `pwd`,`perfil`.`Nombre` AS `Perfil` from (`usuario` join `perfil` on((`perfil`.`Id` = `usuario`.`IdPerfil`)));










DROP PROCEDURE IF EXISTS BuscarPerfil;
CREATE PROCEDURE `BuscarPerfil`(in _id int(11))
BEGIN
SELECT * from perfil WHERE id=_id;
end;

DROP PROCEDURE IF EXISTS buscarpermiso;
CREATE PROCEDURE `buscarpermiso`(in _idModulo int(11),in _valor varchar(50))
begin
     select * FROM permisos where idModulo=_idmodulo AND valor =_valor;               
end;

DROP PROCEDURE IF EXISTS BuscarUsuario;
CREATE PROCEDURE `BuscarUsuario`(in _id int(11))
BEGIN
SELECT * from usuario WHERE id=_id;
end;

DROP PROCEDURE IF EXISTS EditarUsuario;
CREATE PROCEDURE `EditarUsuario`(in _id int(11),in _Identificacion varchar(50),in _PrimerNombre varchar(50),
in _SegundoNombre varchar(50),in _PrimerApellido varchar(50),in _SegundoApellido varchar(50), in _Direccion varchar(50),
 in _Telefono varchar(50),in _idPerfil int (11))
BEGIN

     UPDATE usuario set Identificacion=_identificacion,PrimerNombre=_PrimerNombre,SegundoNombre=_SegundoNombre,
     PrimerApellido=_PrimerApellido,SegundoApellido=_SegundoApellido,Direccion=_Direccion,Telefono=_Telefono,
     idPerfil=_idPerfil WHERE id =_id;
end;

DROP PROCEDURE IF EXISTS InsertarPerfil;
CREATE PROCEDURE `InsertarPerfil`(in _nombre varchar(50),in _descripcion text)
BEGIN
     insert into perfil(nombre,descripcion)VALUES (_nombre ,_descripcion ) ;     
end;

DROP PROCEDURE IF EXISTS insertarpermiso;
CREATE PROCEDURE `insertarpermiso`(in _idPerfil int(11),in _idModulo int(11),in _valor varchar(50))
begin
     insert into permisos(IdPerfil,idModulo,Valor ) VALUES(_idPerfil ,_idmodulo,_valor);               
end;

DROP PROCEDURE IF EXISTS InsertarUsuario;
CREATE PROCEDURE `InsertarUsuario`(in _Identificacion varchar(50),in _PrimerNombre varchar(50),
in _SegundoNombre varchar(50),in _PrimerApellido varchar(50),in _SegundoApellido varchar(50),
in _Direccion varchar(50),in _Telefono varchar(50),in _Email varchar(50),in _Usuario varchar(50),
in _pwd varchar(50),in _IdPerfil int(11))
BEGIN
     INSERT into usuario(Identificacion,PrimerNombre,SegundoNombre,PrimerApellido,SegundoApellido,
     Direccion,Telefono,Email,Usuario,pwd,IdPerfil)     
     values(_Identificacion,_PrimerNombre,_SegundoNombre,_PrimerApellido,_SegundoApellido,
     _Direccion,_Telefono,_Email,_Usuario,_pwd,_IdPerfil);
end;

DROP PROCEDURE IF EXISTS login;
CREATE PROCEDURE `login`(IN _user varchar(50),in _pwd varchar(50))
begin
SELECT id from usuario WHERE Usuario=_user and pwd=_pwd;
end;

DROP PROCEDURE IF EXISTS mostroarPermisosPerfil;
CREATE PROCEDURE `mostroarPermisosPerfil`(in _idperfil int (11))
begin
SELECT  
permisos.Id ,modulos.nombre modulo ,permisos.valor 
from permisos INNER join modulos on modulos.id=permisos.idmodulo 
WHERE idperfil=_idperfil;
end;