CREATE TABLE `areas`  (
  `id_area` int NOT NULL AUTO_INCREMENT,
  `area_nombre` varchar(50) NULL,
  `area_descripcion` varchar(255) NULL,
  PRIMARY KEY (`id_area`)
);

CREATE TABLE `barras`  ();

CREATE TABLE `cargos`  (
  `id_cargo` int NOT NULL AUTO_INCREMENT,
  `cargo_nombre` varchar(50) NULL,
  `cargo_descripcion` varchar(255) NULL,
  `id_area` int NULL,
  PRIMARY KEY (`id_cargo`)
);

CREATE TABLE `colaboradores`  (
  `id_colaborador` int NOT NULL AUTO_INCREMENT,
  `col_ccostos` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `col_dni` int NOT NULL,
  `col_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `col_guardia` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `col_situacion` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `id_cargo` int NULL,
  PRIMARY KEY (`id_colaborador`) USING BTREE,
  UNIQUE INDEX `pk_colaborador`(`id_colaborador`, `col_dni`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 347 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `guardias`  (
  `dni` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `codigo` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `situacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

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

CREATE TABLE `menu`  (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `id_modulo` int NULL,
  `nombre_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link_menu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descripcion_menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  UNIQUE INDEX `fk_modulo`(`id_modulo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `modulos`  (
  `id_modulo` int NOT NULL AUTO_INCREMENT,
  `codigo_modulo` varchar(10) NULL,
  `nombre_modulo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado_modulo` tinyint NULL DEFAULT NULL,
  `descripcion_modulo` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `perfiles`  (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `codigo_perfil` varchar(20) NULL,
  `nombre_perfil` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado_perfil` tinyint NULL DEFAULT NULL,
  `descripcion_perfil` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `roles`  (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `codigo_rol` varchar(30) NULL DEFAULT NULL,
  `nombre_rol` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `estado_rol` tinyint NULL DEFAULT NULL,
  `descripcion_rol` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `submenu`  (
  `id_submenu` int NOT NULL AUTO_INCREMENT,
  `id_menu` int NULL,
  `id_rol` int NULL,
  `nombre_submenu` varchar(50) NULL,
  `estado_submenu` varchar(255) NULL,
  `link_submenu` varchar(255) NULL,
  `descripcion_submenu` varchar(150) NULL,
  PRIMARY KEY (`id_submenu`),
  UNIQUE INDEX `fk_menu`(`id_menu`) USING BTREE,
  UNIQUE INDEX `fk_rol`(`id_rol`) USING BTREE
);

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
) ENGINE = InnoDB AUTO_INCREMENT = 128 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

CREATE TABLE `tsubmenu_perfil`  (
  `id_perfil_modulo` int NOT NULL AUTO_INCREMENT,
  `id_submenu` int NOT NULL,
  `id_perfil` int NOT NULL,
  PRIMARY KEY (`id_perfil_modulo`),
  UNIQUE INDEX `FKIDMOD`(`id_submenu`) USING BTREE,
  UNIQUE INDEX `FKIDPER`(`id_perfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `tusu_per`  (
  `id_usuario_perfil` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_perfil` int NOT NULL,
  `usu_per_registro` datetime(0) NULL,
  PRIMARY KEY (`id_usuario_perfil`),
  UNIQUE INDEX `FKIDUSU`(`id_usuario`) USING BTREE,
  UNIQUE INDEX `FIDPER`(`id_perfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `tvalexplosivos`  (
  `valexplosivos_fecha` datetime(0) NULL,
  `id_zona` int NULL,
  `valexplosivos_turno` varchar(20) NULL,
  `valexplosivos_nvale` int NULL,
  `valexplosivos_tipo` varchar(20) NULL,
  `id_centrocostos` int NULL
);

CREATE TABLE `usuarios`  (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `codigo_usuario` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombre_usuario` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `clave_usuario` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `correo_usuario` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado_usuario` tinyint NOT NULL,
  `registro_usuario` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modificacion_usuario` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_colaborador` int NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

CREATE TABLE `zonas`  (
  `id_zona` int NOT NULL AUTO_INCREMENT,
  `codigo` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_zona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

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

