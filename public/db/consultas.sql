SELECT labores.lab_ccostos, COUNT(lab_ccostos) cantidad FROM labores GROUP BY lab_ccostos HAVING cantidad >1;
SELECT * FROM labores RIGHT JOIN labores_hoja1 ON labores_hoja1.ccosto = labores.lab_ccostos WHERE labores.lab_ccostos = '11101D';
SELECT * FROM labores RIGHT JOIN labores_hoja1 ON labores_hoja1.ccosto = labores.lab_ccostos WHERE labores_hoja1.CCosto = '5E7551';
SELECT * FROM labores RIGHT JOIN zona_temporal ON zona_temporal.ccosto = labores.lab_ccostos;
SELECT * FROM colaboradores RIGHT JOIN usuarios ON usuarios.id_colaborador = colaboradores.id_colaborador;
SELECT labores_explosivos., COUNT(CCosto) cantidad FROM labores_hoja1 GROUP BY CCosto HAVING cantidad >1;
