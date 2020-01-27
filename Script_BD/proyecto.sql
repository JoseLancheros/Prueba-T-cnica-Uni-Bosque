/*
Navicat MySQL Data Transfer

Source Server         : proyecto
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : proyecto

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-01-27 01:52:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for documentos
-- ----------------------------
DROP TABLE IF EXISTS `documentos`;
CREATE TABLE `documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(20) DEFAULT NULL,
  `tipdocumento` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `idvehiculo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of documentos
-- ----------------------------
INSERT INTO `documentos` VALUES ('1', '1235', '3', '2019-12-01', '2020-01-10', '1');
INSERT INTO `documentos` VALUES ('2', '8888', '1', '2020-01-11', '2020-01-24', '1');
INSERT INTO `documentos` VALUES ('3', '8765', '2', '2020-01-08', '2020-01-16', '1');
INSERT INTO `documentos` VALUES ('4', '1489', '1', '2121-05-12', '4444-04-05', '2');
INSERT INTO `documentos` VALUES ('5', '12222', '3', '2121-05-12', '4444-04-04', '2');
INSERT INTO `documentos` VALUES ('6', '1234', '2', '2020-01-07', '2020-01-21', '2');
INSERT INTO `documentos` VALUES ('7', '1254', '1', '2020-01-08', '2020-01-14', '3');
INSERT INTO `documentos` VALUES ('8', '1234', '3', '2020-01-09', '2020-01-09', '3');
INSERT INTO `documentos` VALUES ('9', '58974', '2', '2020-01-05', '2020-03-13', '3');

-- ----------------------------
-- Table structure for enrutamiento
-- ----------------------------
DROP TABLE IF EXISTS `enrutamiento`;
CREATE TABLE `enrutamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idruta` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of enrutamiento
-- ----------------------------
INSERT INTO `enrutamiento` VALUES ('1', '1', '1');
INSERT INTO `enrutamiento` VALUES ('2', '2', '2');

-- ----------------------------
-- Table structure for material
-- ----------------------------
DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of material
-- ----------------------------
INSERT INTO `material` VALUES ('1', 'Vigas de acero');
INSERT INTO `material` VALUES ('2', 'Arena');
INSERT INTO `material` VALUES ('3', 'Cemento');
INSERT INTO `material` VALUES ('4', 'Ladrillo');
INSERT INTO `material` VALUES ('5', 'Teja');

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `TipDoc` int(11) DEFAULT NULL,
  `NumIdent` int(11) DEFAULT NULL,
  `NumLic` int(11) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `idestado` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('1', 'Jose Durley', 'Lancheros A', '1', '1074958769', '1074958769', '1', '1234', '1');
INSERT INTO `persona` VALUES ('2', 'JUAN', 'LINARES', '1', '114', '124', '1', '1121', '1');
INSERT INTO `persona` VALUES ('3', 'Jose', '1074958769', '2', '1254', '0', '2', '1234', '2');

-- ----------------------------
-- Table structure for persona_estado
-- ----------------------------
DROP TABLE IF EXISTS `persona_estado`;
CREATE TABLE `persona_estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of persona_estado
-- ----------------------------
INSERT INTO `persona_estado` VALUES ('1', 'Activo');
INSERT INTO `persona_estado` VALUES ('2', 'Inactivo');

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES ('1', 'Usuario', null);
INSERT INTO `rol` VALUES ('2', 'Administrador', null);

-- ----------------------------
-- Table structure for rutas
-- ----------------------------
DROP TABLE IF EXISTS `rutas`;
CREATE TABLE `rutas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) DEFAULT NULL,
  `origen` varchar(255) DEFAULT NULL,
  `destino` varchar(255) DEFAULT NULL,
  `distancia` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `tipocarga` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of rutas
-- ----------------------------
INSERT INTO `rutas` VALUES ('1', 'S10', 'Bogota', 'Cali', '200', '100', '2', 'Vigas,Arena,Cemento');
INSERT INTO `rutas` VALUES ('2', 'S11', 'Bogota', 'Chia', '10', '50', '2', 'Arena,Cemento,Ladrillo,Teja');
INSERT INTO `rutas` VALUES ('3', 'S12', 'Soacha', 'Bogota', '15', '500', '1', 'Arena,Cemento,Ladrillo');

-- ----------------------------
-- Table structure for ruta_estado
-- ----------------------------
DROP TABLE IF EXISTS `ruta_estado`;
CREATE TABLE `ruta_estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of ruta_estado
-- ----------------------------
INSERT INTO `ruta_estado` VALUES ('1', 'Sin asignar', null);
INSERT INTO `ruta_estado` VALUES ('2', 'Asignada', null);
INSERT INTO `ruta_estado` VALUES ('3', 'En proceso', null);
INSERT INTO `ruta_estado` VALUES ('4', 'Finalizada', null);

-- ----------------------------
-- Table structure for tarifas
-- ----------------------------
DROP TABLE IF EXISTS `tarifas`;
CREATE TABLE `tarifas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `costo` int(255) DEFAULT NULL,
  `km` int(255) DEFAULT NULL,
  `kg` int(255) DEFAULT NULL,
  `estado` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of tarifas
-- ----------------------------
INSERT INTO `tarifas` VALUES ('1', '800000', '5', '1', '');

-- ----------------------------
-- Table structure for tipo_doc_per
-- ----------------------------
DROP TABLE IF EXISTS `tipo_doc_per`;
CREATE TABLE `tipo_doc_per` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of tipo_doc_per
-- ----------------------------
INSERT INTO `tipo_doc_per` VALUES ('1', 'Cedula Ciudadania');
INSERT INTO `tipo_doc_per` VALUES ('2', 'Pasaporte');

-- ----------------------------
-- Table structure for tip_doc_veh
-- ----------------------------
DROP TABLE IF EXISTS `tip_doc_veh`;
CREATE TABLE `tip_doc_veh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of tip_doc_veh
-- ----------------------------
INSERT INTO `tip_doc_veh` VALUES ('1', 'Soat');
INSERT INTO `tip_doc_veh` VALUES ('2', 'Tecnico Mecanica');
INSERT INTO `tip_doc_veh` VALUES ('3', 'Targeta Propiedad');

-- ----------------------------
-- Table structure for vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(255) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `modelo` int(20) DEFAULT NULL,
  `idsoat` int(11) NOT NULL,
  `idtecnicomecanica` int(11) NOT NULL,
  `idtarjeta` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of vehiculo
-- ----------------------------
INSERT INTO `vehiculo` VALUES ('1', 'DLT542', '1000', 'FORD', '2014', '8888', '8765', '1235');
INSERT INTO `vehiculo` VALUES ('2', 'DFT890', '1000', 'NISSAN', '2010', '1489', '1234', '1489');
INSERT INTO `vehiculo` VALUES ('3', 'ERT896', '1000', 'KENWORTH', '2020', '58974', '58974', '58974');
INSERT INTO `vehiculo` VALUES ('4', 'RTH256', '1000', 'KIA', '2015', '0', '58974', '0');
