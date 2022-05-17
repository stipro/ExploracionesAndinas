<?php
header('Content-type: application/json; charset=utf-8');
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if($_POST){
    $table = 'colaboradores';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new Colaboradores();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            // No se envia parametro por que esta concatenado
            case 'getColumn_fullname':
                $column = 'explosivo_codigo';
                $rptSql = $tableManager->getColumn();
                break;
            // FIN
            case "table-master":
                $rptSql = $tableManager->table_master();
                break;
            case "getcolumnAll":
                $column = $arrayForm['column'];
                $rptSql = $tableManager->getColumnAll($column);
                break;
                // Tareo
            case "getNameCargoArea_dni":
                $paramentWhere = $arrayForm['paramentWhere'];
                $rptSql = $tableManager->getNameCargoArea_dni($paramentWhere);
                break;
            case "getPerforista":
                $whereId = $arrayForm['parament'];
                $column1 = 'col_apePaterno';
                $column2 = 'col_apePaterno';
                $column3 = 'col_nombres';
                $column4 = 'col_dni';
                $rptSql = $tableManager->perforista($whereId, $column1, $column2, $column3, $column4);
                break;
            case "col_dni":
                $rptSql = $tableManager->getSelec_dni_fullname();
                break;
            case "getSelec_dni_fullname":
                $rptSql = $tableManager->getSelec_dni_fullname();
                break;
            case "getDni_colaboradorNombre":
                $where = $arrayForm['where'];
                $rptSql = $tableManager->getDni_colaboradorNombre($where);
                break;
            case "getNombre_colaboradorDni":
                $where = $arrayForm['where'];
                $rptSql = $tableManager->getNombre_colaboradorDni($where);
                break;
            case "search":
                $term = $accion['term'];
                $type = $accion['type'];
                break;
            case "dtl-colaboradores-all":
                $rptSql = $tableManager->getColaborador_all();
                break;
            case "getDatalistAll_nombres_perforista":
                $rptSql = $tableManager->getDatalistAll_nombres_perforista();
                break;
        }

    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        //throw $th;
    }
}
else{
    $rptController = 'no Se recibio datos';
}
$rptjsonControlller = array(
    "sql" => $rptSql,
    "rptController" => $rptController
);
echo json_encode($rptjsonControlller);
