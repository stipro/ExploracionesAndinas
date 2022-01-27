-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.31-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para explore_mine_prueba
CREATE DATABASE IF NOT EXISTS `explore_mine_prueba` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `explore_mine_prueba`;

-- Volcando estructura para tabla explore_mine_prueba.colaboradores
CREATE TABLE IF NOT EXISTS `colaboradores` (
  `id_colaborador` int(11) NOT NULL AUTO_INCREMENT,
  `col_ccostos` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `col_dni` int(11) NOT NULL,
  `col_nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `col_cargo_actual` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `col_area` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `col_guardia` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `col_situacion` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_colaborador`) USING BTREE,
  UNIQUE KEY `pk_colaborador` (`id_colaborador`,`col_dni`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.colaboradores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `colaboradores` DISABLE KEYS */;
/*!40000 ALTER TABLE `colaboradores` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.guardias
CREATE TABLE IF NOT EXISTS `guardias` (
  `dni` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `situacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.guardias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `guardias` DISABLE KEYS */;
/*!40000 ALTER TABLE `guardias` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.labores
CREATE TABLE IF NOT EXISTS `labores` (
  `id_labor` int(11) NOT NULL AUTO_INCREMENT,
  `lab_ccostos` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `lab_labor` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lab_nivel` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_zona` int(11) DEFAULT NULL,
  `lab_tipo` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lab_zona` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_labor`) USING BTREE,
  UNIQUE KEY `pk_labor` (`id_labor`) USING BTREE,
  UNIQUE KEY `fk_labor_zona` (`id_zona`) USING BTREE,
  CONSTRAINT `fk_labor_zona` FOREIGN KEY (`id_zona`) REFERENCES `zonas` (`id_zona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.labores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `labores` DISABLE KEYS */;
/*!40000 ALTER TABLE `labores` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulos` int(11) NOT NULL,
  `nombre_menu` varchar(50) DEFAULT NULL,
  `link_menu` varchar(255) DEFAULT NULL,
  `descripcion_menu` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `FKIDMODMEN` (`id_modulos`) USING BTREE,
  CONSTRAINT `FKIDMODMEN` FOREIGN KEY (`id_modulos`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.menu: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id_menu`, `id_modulos`, `nombre_menu`, `link_menu`, `descripcion_menu`) VALUES
	(1, 1, 'Personal', '/trabajador.php', NULL),
	(2, 1, 'Labor', '/labor.php', NULL),
	(3, 1, 'Tareo', '/tareo.php', NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.modulos
CREATE TABLE IF NOT EXISTS `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_modulo` varchar(10) DEFAULT NULL,
  `nombre_modulo` varchar(50) NOT NULL,
  `estado_modulo` tinyint(4) DEFAULT NULL,
  `descripcion_modulo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.modulos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` (`id_modulo`, `codigo_modulo`, `nombre_modulo`, `estado_modulo`, `descripcion_modulo`) VALUES
	(1, 'TAR', 'Tareo', 1, 'Modulo Gestiona horas trabajos');
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.perfiles
CREATE TABLE IF NOT EXISTS `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_perfil` varchar(20) DEFAULT NULL,
  `nombre_perfil` varchar(50) NOT NULL,
  `estado_perfil` tinyint(4) DEFAULT NULL,
  `descripcion_perfil` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.perfiles: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` (`id_perfil`, `codigo_perfil`, `nombre_perfil`, `estado_perfil`, `descripcion_perfil`) VALUES
	(1, 'ADM001', 'Admin', 1, '\Usuarios Administradores.');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `codigo_rol` varchar(50) DEFAULT NULL,
  `nombre_rol` varchar(50) DEFAULT NULL,
  `estado_rol` tinyint(4) DEFAULT NULL,
  `descripcion_rol` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_rol`),
  KEY `FKIDMODROL` (`id_menu`) USING BTREE,
  CONSTRAINT `FKIDMODROL` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.roles: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id_rol`, `id_menu`, `codigo_rol`, `nombre_rol`, `estado_rol`, `descripcion_rol`) VALUES
	(1, 3, 'CREATE', 'crear', 1, '"Crear datos"'),
	(2, 3, 'READ', 'leer', 1, '"Leer Datos"'),
	(3, 3, 'UPDATE', 'actalizar', 1, '"Actualizar datos"'),
	(4, 3, 'DELETE', 'eliminar', 1, '"Eliminar Datos"');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.tareos
CREATE TABLE IF NOT EXISTS `tareos` (
  `id_tareo` int(11) NOT NULL AUTO_INCREMENT,
  `id_colaborador` int(11) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `actividad` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `turno` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ht` decimal(9,2) DEFAULT NULL,
  `ht_serv_ad` decimal(9,2) DEFAULT NULL,
  `id_labor` int(11) DEFAULT NULL,
  `ccostos` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `labor` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `he` decimal(9,2) DEFAULT NULL,
  `he_ser_ad` decimal(9,2) DEFAULT NULL,
  `cc_ser_ad` decimal(9,2) DEFAULT NULL,
  `c_costos_he` decimal(9,2) DEFAULT NULL,
  `id_zona` int(11) DEFAULT NULL,
  `v.b` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `guardia` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_actividad` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `area` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tareo`) USING BTREE,
  UNIQUE KEY `pk_tareo` (`id_tareo`) USING BTREE,
  KEY `fk_tareo_colaborador` (`id_colaborador`) USING BTREE,
  KEY `fk_tareo_labor` (`id_labor`) USING BTREE,
  CONSTRAINT `fk_tareo_colaborador` FOREIGN KEY (`id_colaborador`) REFERENCES `colaboradores` (`id_colaborador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tareo_labor` FOREIGN KEY (`id_labor`) REFERENCES `labores` (`id_labor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.tareos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareos` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.tmod_per
CREATE TABLE IF NOT EXISTS `tmod_per` (
  `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  PRIMARY KEY (`id_perfil_modulo`),
  KEY `FKIDMOD` (`id_modulo`) USING BTREE,
  KEY `FKIDPER` (`id_perfil`) USING BTREE,
  CONSTRAINT `FKIDMOD` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDPER` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.tmod_per: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tmod_per` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmod_per` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.tusu_per
CREATE TABLE IF NOT EXISTS `tusu_per` (
  `id_usuario_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_perfil`),
  KEY `FKIDUSU` (`id_usuario`) USING BTREE,
  KEY `FIDPER` (`id_perfil`) USING BTREE,
  CONSTRAINT `FIDPER` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDUSU` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.tusu_per: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tusu_per` DISABLE KEYS */;
/*!40000 ALTER TABLE `tusu_per` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.tusu_rol
CREATE TABLE IF NOT EXISTS `tusu_rol` (
  `id_usuario_rol` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_rol`),
  KEY `FKIDUSU_ROL` (`id_usuario`) USING BTREE,
  KEY `FKIDROL_USU` (`id_rol`) USING BTREE,
  CONSTRAINT `FKIDROL_USU` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDUSU_ROL` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.tusu_rol: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tusu_rol` DISABLE KEYS */;
INSERT INTO `tusu_rol` (`id_usuario_rol`, `id_usuario`, `id_rol`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 2, 2);
/*!40000 ALTER TABLE `tusu_rol` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` char(5) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `clave_usuario` varchar(20) NOT NULL,
  `correo_usuario` varchar(50) NOT NULL,
  `estado_usuario` tinyint(4) NOT NULL,
  `registro_usuario` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modificacion_usuario` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.usuarios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `codigo_usuario`, `nombre_usuario`, `clave_usuario`, `correo_usuario`, `estado_usuario`, `registro_usuario`, `modificacion_usuario`) VALUES
	(1, '', 'fynga', '12345', 'stipro150197@gmail.com', 1, '2021-10-09 10:26:48', '2021-10-09 10:26:49'),
	(2, '', 'prueba', '123', 'prueba@gmail.com', 1, '2021-10-09 10:55:44', '2021-10-09 10:55:44'),
	(3, '', 'smuñoz', 'hhernan', '', 1, '2021-10-18 10:23:22', '2021-10-18 10:23:23');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla explore_mine_prueba.zonas
CREATE TABLE IF NOT EXISTS `zonas` (
  `id_zona` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_zona`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla explore_mine_prueba.zonas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `zonas` DISABLE KEYS */;
/*!40000 ALTER TABLE `zonas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
