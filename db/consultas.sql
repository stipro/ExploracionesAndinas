SELECT labores.lab_ccostos, COUNT(lab_ccostos) cantidad FROM labores GROUP BY lab_ccostos HAVING cantidad >1;
SELECT * FROM labores RIGHT JOIN labores_hoja1 ON labores_hoja1.ccosto = labores.lab_ccostos WHERE labores.lab_ccostos = '11101D';
SELECT * FROM labores RIGHT JOIN labores_hoja1 ON labores_hoja1.ccosto = labores.lab_ccostos WHERE labores_hoja1.CCosto = '5E7551';
SELECT * FROM labores RIGHT JOIN zona_temporal ON zona_temporal.ccosto = labores.lab_ccostos;
SELECT * FROM colaboradores RIGHT JOIN usuarios ON usuarios.id_colaborador = colaboradores.id_colaborador;
SELECT labores_explosivos., COUNT(CCosto) cantidad FROM labores_hoja1 GROUP BY CCosto HAVING cantidad >1;
/*SELECT * FROM `dcarmen`.`ventas` WHERE docu LIKE '%27395%';
SELECT * FROM `dcarmen`.`ventas` WHERE clie='20558059118' AND tdoc='01' AND seri LIKE '%4' AND docu LIKE '%27395%';
SELECT if(COUNT(*)>0,'true','false') AS busqueda FROM `dcarmen`.`ventas` WHERE clie='20558059118' AND tdoc='01'  AND seri='F001' AND docu LIKE '%78366%' AND tdoc='01';
SELECT * FROM `dcarmen`.`ventas` WHERE docu LIKE '%78366%';
SELECT * FROM `dcarmen`.`ventas` WHERE clie='20558059118' AND tdoc='01' AND seri='004' AND docu LIKE '%78366%';
SELECT * FROM labor LIMIT 0,10;
SELECT COUNT(*) FROM labor;
SELECT * FROM colaboradores WHERE dni='19700744';
SELECT * FROM labores WHERE ccostos LIKE '_l%';
#SELECT * FROM labores WHERE lab_ccostos LIKE '_Z%';
SELECT * FROM labores WHERE ccostos LIKE '3L52DP';
SELECT * FROM tareos LEFT JOIN colaboradores ON tareos.id_colaborador = colaboradores.id_colaborador;
SELECT * FROM tareos LEFT JOIN labores ON tareos.id_labor = labores.id_labor;
SELECT * FROM tareos LEFT JOIN colaboradores ON tareos.id_colaborador = colaboradores.id_colaborador LEFT JOIN labores ON tareos.id_labor = labores.id_labor;
SELECT ll.id_laborLetra, ll.letra_laborLetra FROM labor_letra AS ll WHERE ll.letra_laborLetra LIKE 'A%' ORDER BY ll.letra_laborLetra LIMIT 0,10;
SELECT ll.id_laborLetra, ll.letra_laborLetra FROM labor_letra AS ll ORDER BY ll.letra_laborLetra LIMIT 0,15;
SELECT lbN.labNombre_nombre FROM lab_nombres AS lbN WHERE lbN.id_labNombre = '441'*/

# DISPARADOR
/** OBTENE EL VALOR INGRESADO DE UNA TABLA Y HACE UNA OPERACION SEGUN EL TIPO DE MOVIMIENTO **/
CREATE DEFINER=`root`@`localhost` TRIGGER `actualizacion_entrada` AFTER INSERT ON `entrada` FOR EACH ROW BEGIN

SET @ID:= (SELECT MAX(id) FROM stock);
SET @SALDO_ULT:= (SELECT IFNULL(saldo, 0) FROM stock WHERE id = @ID);
/*SET @SALDO_ULT:= (SELECT IF( (SELECT IFNULL(saldo, 0) AS comp FROM stock WHERE id = @ID) = '', (SELECT IFNULL(saldo, 0) AS comp FROM stock WHERE id = @ID), 0));*/
/*SET @SALDO_ULT:= (SELECT IF((SELECT IFNULL(saldo, 0) AS comp FROM stock WHERE id = @ID) = '',(SELECT IFNULL(saldo, 0) FROM stock WHERE id = @ID), NEW.cantidad));*/
/*SET @SALDO_ULT:= (SELECT IF( (SELECT IFNULL(saldo, 0) AS comp FROM stock WHERE id = @ID) = '', (SELECT IFNULL(saldo, 0) AS comp FROM stock WHERE id = @ID), 0));*/
/*SET @SALDO_ULT:= (SELECT IFNULL(saldo, 0) AS comp FROM stock WHERE id = @ID);*/
/*SELECT MAX(id) FROM stock
/*(SELECT cantidad, IF(NEW.tipMov ='01-INGRESO',(NEW.cantidad+cantidad),(NEW.cantidad-cantidad)) FROM stock)*/

INSERT INTO stock SET item = NEW.item , articulo = NEW.articulo, tipMov = NEW.tipMov, cantidad = NEW.cantidad, 
saldo = IF((SELECT IFNULL(@ID, 0)) = '',NEW.cantidad ,IF(NEW.tipMov ='01-INGRESO',(@SALDO_ULT+NEW.cantidad),(@SALDO_ULT-NEW.cantidad)));


/*INSERT INTO stock SET item = NEW.item , articulo = NEW.articulo, tipMov = NEW.tipMov, cantidad = NEW.cantidad, saldo = IF(NEW.tipMov ='01-INGRESO',(@SALDO_ULT+NEW.cantidad),(@SALDO_ULT-NEW.cantidad));*/


END