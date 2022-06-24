select
    `cm`.`id_consumoMadera` AS `id consumo madera`,
    `cm`.`consumoMadera_fecha` AS `Fecha`,
    `cm`.`consumoMadera_nvale` AS `N° Vale`,
    `cm`.`consumoMadera_turno` AS `Turno`,
    concat(
        `cl`.`col_apePaterno`,
        ' ',
        `cl`.`col_apeMaterno`,
        '',
        `cl`.`col_nombres`
    ) AS `Autorizado por`,
    `lb`.`id_labor` AS `id Labor`,
    `lb`.`lab_ccostos` AS `Ccostos`,
    `lb_nm`.`id_labNombre` AS `id nombre labor`,
    `lb_nm`.`labNombre_nombre` AS `Labor`,
    `m`.`id_madera` AS `id madera`,
    concat(
        `m`.`madera_tipo`,
        ' ',
        `m`.`madera_codigo`,
        ' ',
        `m`.`madera_dimension`
    ) AS `Descripcion de Madera`,
    `cm_dt`.`consumoMaderaDetalle_cantidad` AS `Cantidad`
from
    `consumo_madera` `cm`
    left join `consumo_madera_detalle` `cm_dt` on `cm`.`id_consumoMadera` = `cm_dt`.`consumoMadera_id`
    left join `colaboradores` `cl` on `cm`.`colaborador_id_jefeGuardia` = `cl`.`id_colaborador`
    left join `labores` `lb` on `cm_dt`.`labor_id` = `lb`.`id_labor`
    left join `lab_nombres` `lb_nm` on `lb`.`id_labNombre` = `lb_nm`.`id_labNombre`
    left join `maderas` `m` on `cm_dt`.`madera_id` = `m`.`id_madera`