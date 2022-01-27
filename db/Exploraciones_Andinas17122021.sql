CREATE TABLE `areas`  (
  `id_area` int NOT NULL AUTO_INCREMENT,
  `area_nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `area_descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_area`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `cargos`  (
  `id_cargo` int NOT NULL AUTO_INCREMENT,
  `cargo_nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cargo_descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_area` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_cargo`) USING BTREE,
  INDEX `fk_area`(`id_area`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `colaboradores`  (
  `id_colaborador` int NOT NULL AUTO_INCREMENT,
  `col_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `col_ccostos` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `col_dni` int NOT NULL,
  `col_guardia` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `col_situacion` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `id_cargo` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_colaborador`) USING BTREE,
  UNIQUE INDEX `cod_unicos`(`id_colaborador`, `col_dni`) USING BTREE,
  INDEX `fk_cargo`(`id_cargo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 347 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `guardias`  (
  `dni` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `codigo` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `situacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `labores`  (
  `id_labor` int NOT NULL AUTO_INCREMENT,
  `lab_ccostos` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `lab_labor` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `lab_nivel` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `id_zona` int NULL DEFAULT NULL,
  `lab_tipo` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `lab_zona` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_labor`) USING BTREE,
  UNIQUE INDEX `pk_labor`(`id_labor`) USING BTREE,
  UNIQUE INDEX `fk_labor_zona`(`id_zona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1006 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `labores_explosivos`  (
  `id_labExplosivos` int NOT NULL AUTO_INCREMENT,
  `labExplosivos_claborExplosivos` varchar(0) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `labExplosivos_tipo` int NULL DEFAULT NULL,
  `labExplosivos_nombre` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `labExplosivos_ccostos` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `labExplosivos_abrev` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_labExplosivos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3166 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `menu`  (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `id_modulo` int NULL DEFAULT NULL,
  `nombre_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link_menu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descripcion_menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE,
  UNIQUE INDEX `fk_modulo`(`id_modulo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `modulos`  (
  `id_modulo` int NOT NULL AUTO_INCREMENT,
  `codigo_modulo` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nombre_modulo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado_modulo` tinyint NULL DEFAULT NULL,
  `descripcion_modulo` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_modulo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `perfiles`  (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `codigo_perfil` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nombre_perfil` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado_perfil` tinyint NULL DEFAULT NULL,
  `descripcion_perfil` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_perfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `roles`  (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `codigo_rol` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nombre_rol` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado_rol` tinyint NULL DEFAULT NULL,
  `descripcion_rol` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `submenu`  (
  `id_submenu` int NOT NULL AUTO_INCREMENT,
  `id_menu` int NULL DEFAULT NULL,
  `id_rol` int NULL DEFAULT NULL,
  `nombre_submenu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado_submenu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link_submenu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descripcion_submenu` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_submenu`) USING BTREE,
  UNIQUE INDEX `fk_menu`(`id_menu`) USING BTREE,
  UNIQUE INDEX `fk_rol`(`id_rol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `tareos`  (
  `id_tareo` int NOT NULL AUTO_INCREMENT,
  `id_colaborador` int NULL DEFAULT NULL,
  `codigo` int NULL DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cargo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `dia` date NULL DEFAULT NULL,
  `actividad` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `turno` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ht` decimal(9, 2) NULL DEFAULT NULL,
  `ht_serv_ad` decimal(9, 2) NULL DEFAULT NULL,
  `id_labor` int NULL DEFAULT NULL,
  `ccostos` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `labor` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `nivel` int NULL DEFAULT NULL,
  `he` decimal(9, 2) NULL DEFAULT 0.00,
  `he_ser_ad` decimal(9, 2) NULL DEFAULT 0.00,
  `cc_ser_ad` decimal(9, 2) NULL DEFAULT NULL,
  `c_costos_he` decimal(9, 2) NULL DEFAULT NULL,
  `id_zona` int NULL DEFAULT NULL,
  `v_b` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `guardia` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cod_actividad` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `area` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tareo`) USING BTREE,
  UNIQUE INDEX `pk_tareo`(`id_tareo`) USING BTREE,
  INDEX `fk_tareo_colaborador`(`id_colaborador`) USING BTREE,
  INDEX `fk_tareo_labor`(`id_labor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `tsubmenu_perfil`  (
  `id_perfil_modulo` int NOT NULL AUTO_INCREMENT,
  `id_submenu` int NOT NULL,
  `id_perfil` int NOT NULL,
  PRIMARY KEY (`id_perfil_modulo`) USING BTREE,
  UNIQUE INDEX `FKIDMOD`(`id_submenu`) USING BTREE,
  UNIQUE INDEX `FKIDPER`(`id_perfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `tusu_per`  (
  `id_usuario_perfil` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_perfil` int NOT NULL,
  `usu_per_registro` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario_perfil`) USING BTREE,
  UNIQUE INDEX `FKIDUSU`(`id_usuario`) USING BTREE,
  UNIQUE INDEX `FIDPER`(`id_perfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `tvalexplosivos`  (
  `id_valexplosivo` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` int NULL DEFAULT NULL,
  `valexplosivo_fecha` datetime NULL DEFAULT NULL,
  `id_zona` int NULL DEFAULT NULL,
  `valexplosivo_nvale` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `valexplosivo_turno` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `valexplosivo_preimpresor` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `labExplosivos_ccostos` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `valexplosivo_tipDisparo` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_colaborador` int NULL DEFAULT NULL,
  `valexplosivo_tipEn` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `valexplosivo_barra` int NULL DEFAULT NULL,
  `valexplosivo_lgt` int NULL DEFAULT NULL,
  `valexplosivo_numTaladro` int NULL DEFAULT NULL,
  `valexplosivo_talVacio` int NULL DEFAULT NULL,
  `valexplosivo_piePerf` decimal(10, 8) NULL DEFAULT NULL,
  `valexplosivo_pieReal` decimal(10, 8) NULL DEFAULT NULL,
  `valexplosivo_numMaquina` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `valexplosivo_dimSemigelatinosa65` int NULL DEFAULT NULL,
  `valexplosivo_dimSemigelatinosa65_Result` decimal(10, 8) NULL DEFAULT NULL,
  `valexplosivo_dimPulverulenta65_78` int NULL DEFAULT NULL,
  `valexplosivo_dimPulverulenta65_78_Result` decimal(10, 8) NULL DEFAULT NULL,
  `valexplosivo_sumaSemiPulv` int NULL DEFAULT NULL,
  `valexplosivo_emulmil` int NULL DEFAULT NULL,
  `valexplosivo_emultresmil` int NULL DEFAULT NULL,
  `valexplosivo_mecRapidaZ18` int NULL DEFAULT NULL,
  `valexplosivo_mecha` int NULL DEFAULT NULL,
  `valexplosivo_fulN8` int NULL DEFAULT NULL,
  `valexplosivo_conMecha` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_valexplosivo`) USING BTREE,
  UNIQUE INDEX `cod_unicos`(`valexplosivo_nvale`, `id_valexplosivo`, `valexplosivo_preimpresor`) USING BTREE,
  INDEX `fk_zonas`(`id_zona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `usuarios`  (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `codigo_usuario` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombre_usuario` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `clave_usuario` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `correo_usuario` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado_usuario` tinyint NOT NULL,
  `registro_usuario` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modificacion_usuario` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_colaborador` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  INDEX `fk_col_usuarios`(`id_colaborador`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `zona_temporal`  (
  `cod_tipoZona` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipo` int NULL DEFAULT NULL,
  `labor` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ccosto` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `abrev` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `zonas`  (
  `id_zona` int NOT NULL AUTO_INCREMENT,
  `codigo` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_zona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

ALTER TABLE `cargos` ADD CONSTRAINT `fk_area` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id_area`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `colaboradores` ADD CONSTRAINT `fk_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `labores` ADD CONSTRAINT `fk_labor_zona` FOREIGN KEY (`id_zona`) REFERENCES `zonas` (`id_zona`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `menu` ADD CONSTRAINT `fk_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `submenu` ADD CONSTRAINT `fk_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `submenu` ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `tareos` ADD CONSTRAINT `fk_tareo_colaborador` FOREIGN KEY (`id_colaborador`) REFERENCES `colaboradores` (`id_colaborador`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `tareos` ADD CONSTRAINT `fk_tareo_labor` FOREIGN KEY (`id_labor`) REFERENCES `labores` (`id_labor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `tsubmenu_perfil` ADD CONSTRAINT `FKIDMOD` FOREIGN KEY (`id_submenu`) REFERENCES `submenu` (`id_submenu`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tsubmenu_perfil` ADD CONSTRAINT `FKIDPER` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tusu_per` ADD CONSTRAINT `FIDPER` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tusu_per` ADD CONSTRAINT `FKIDUSU` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tvalexplosivos` ADD CONSTRAINT `fk_zonas` FOREIGN KEY (`id_zona`) REFERENCES `zonas` (`id_zona`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `usuarios` ADD CONSTRAINT `fk_col_usuarios` FOREIGN KEY (`id_colaborador`) REFERENCES `colaboradores` (`id_colaborador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `vw_vales_explosivos` AS SELECT
	ve.id_valexplosivo, 
	ua.id_usuario, 
	ua.nombre_usuario, 
	col.id_colaborador, 
	col.col_nombre, 
	ve.valexplosivo_fecha, 
	zn.id_zona, 
	zn.codigo, 
	zn.nombre, 
	ve.valexplosivo_nvale, 
	ve.valexplosivo_turno, 
	ve.valexplosivo_preimpresor, 
	le.labExplosivos_tipo, 
	le.labExplosivos_ccostos, 
	le.labExplosivos_nombre, 
	le.labExplosivos_abrev, 
	ve.valexplosivo_tipDisparo, 
	pr.id_colaborador AS id_perforista, 
	pr.col_nombre AS nombre_perforista, 
	ve.valexplosivo_tipEn, 
	ve.valexplosivo_barra, 
	ve.valexplosivo_lgt, 
	ve.valexplosivo_numTaladro, 
	ve.valexplosivo_talVacio, 
	ve.valexplosivo_piePerf, 
	ve.valexplosivo_pieReal, 
	ve.valexplosivo_numMaquina, 
	ve.valexplosivo_dimSemigelatinosa65, 
	ve.valexplosivo_dimSemigelatinosa65_Result, 
	ve.valexplosivo_dimPulverulenta65_78, 
	ve.valexplosivo_dimPulverulenta65_78_Result, 
	ve.valexplosivo_sumaSemiPulv, 
	ve.valexplosivo_emulmil, 
	ve.valexplosivo_emultresmil, 
	ve.valexplosivo_mecRapidaZ18, 
	ve.valexplosivo_mecha, 
	ve.valexplosivo_fulN8, 
	ve.valexplosivo_conMecha
FROM
	tvalexplosivos AS ve
	LEFT JOIN
	usuarios AS ua
	ON 
		ve.id_usuario = ua.id_usuario
	LEFT JOIN
	colaboradores AS col
	ON 
		ua.id_colaborador = col.id_colaborador
	LEFT JOIN
	zonas AS zn
	ON 
		zn.id_zona = ve.id_zona
	LEFT JOIN
	labores_explosivos AS le
	ON 
		ve.labExplosivos_ccostos = le.labExplosivos_ccostos
	LEFT JOIN
	colaboradores AS pr
	ON 
		pr.id_colaborador = ve.id_colaborador;

