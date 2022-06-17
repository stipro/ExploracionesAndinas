select
    `em`.`id_extraccionMineral` AS `id_extraccionMineral`,
    `em`.`fechaExtraccion_extraccionMineral` AS `fechaExtraccion_extraccionMineral`,
    `em`.`unidadMinera_id` AS `unidadMinera_id`,
    `ud_mn`.`nombre_unidadMinera` AS `nombre_unidadMinera`,
    `lb_zn`.`id_zona` AS `id_zona`,
    `lb_zn`.`labZona_nombre` AS `labZona_nombre`,
    `em`.`fechaDigitacion_extraccionMineral` AS `fechaDigitacion_extraccionMineral`,
    `em`.`locomotora_extraccionMineral` AS `locomotora_extraccionMineral`,
    `em`.`motorista_id` AS `motorista_id`,
    `em`.`nivel_extraccionMineral` AS `nivel_extraccionMineral`,
    `clb`.`col_apePaterno` AS `paterno_mayo`,
    `clb`.`col_apeMaterno` AS `materno_mayo`,
    `clb`.`col_nombres` AS `nombres_mayo`,
    
    `em`.`turno_extraccionMineral` AS `turno_extraccionMineral`,
    `em`.`turno_id` AS `turno_id`,
    `em`.`tolva_extraccionMineral` AS `tolva_extraccionMineral`,
    `em`.`guardia_id` AS `guardia_id`,
    
    `em`.`ayudante_id` AS `ayudante_id`,
    `clb_ay`.`col_apePaterno` AS `paterno_ayu`,
    `clb_ay`.`col_apeMaterno` AS `materno_ayu`,
    `clb_ay`.`col_nombres` AS `nombres_ayu`,
    `em`.`horasExtraccion_extraccionMineral` AS `horasExtraccion_extraccionMineral`,
    em.codigo_extraccionMineral,
    em.labor_id,
    em.ccosto_extraccionMineral,
    em.laborNombre_extraccionMineral,
    `em`.`cantidad_extraccionMineral` AS `cantidad`
from
    `extraccion_mineral` `em`
    left join `unidad_mineras` `ud_mn` on `em`.`unidadMinera_id` = `ud_mn`.`id_unidadMinera`
    left join `lab_zonas` `lb_zn` on `em`.`zona_id` = `lb_zn`.`id_zona`
    left join `colaboradores` `clb` on `em`.`motorista_id` = `clb`.`id_colaborador`
    left join `colaboradores` `clb_ay` on `em`.`ayudante_id` = `clb_ay`.`id_colaborador`
    LEFT JOIN labores lb ON em.labor_id = lb.id_labor