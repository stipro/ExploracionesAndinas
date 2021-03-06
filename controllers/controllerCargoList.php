<?php
header('Content-type: application/json; charset=utf-8');
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if($_POST){
    $rptController = 'Se recibio datos';
    // Nombre del Modelo //
    $table = 'cargos';
    $idTable = 'id_cargo';
    $rptSql='';    
    try {
        // Requiero modelo //
        require_once '../models/'.$table.'.php';
        $tableManager = new Cargos();
        $arrayForm = json_decode($_POST['data'],true);
        // ACCION
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "getSelect_cargo":
                $where = $arrayForm['where'];
                $rptSql = $tableManager->getSelect_cargo($where);
                break;
            case "getcolumnAll":
                $column = $arrayForm['column'];
                $rptSql = $tableManager->getSelect($table, $column, $idTable);
                break;
            case "getcolumnWhere":
                $column = $arrayForm['column'];
                $parament = $arrayForm['parament'];
                $columnWhere = $arrayForm['columnWhere'];
                $rptSql = $tableManager->getColumnWhere($table, $column, $parament, $idTable, $columnWhere);
                break;
            case "getcolumnsWhere":
                $columns = $arrayForm['columns'];
                $parament = $arrayForm['parament'];
                //$rptSql = $tableManager->getColumnsWhere($table, $parament);
                break;
            case "search":                
                break;
            case "table":
                break;
            default:
                echo "ola";
                break;
        }

    } catch (Exception $e) {
        //throw $th;
    }
}
else{
    $rptController = 'no Se recibio datos';
}
$rptjsonControlller = array(
    "sql" => $rptSql,
    "rptController" => $rptController,
);
echo json_encode($rptjsonControlller);
