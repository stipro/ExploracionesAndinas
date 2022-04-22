<?php
header('Content-type: application/json; charset=utf-8');
$rptSql=''; 
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if($_POST){
    $rptController = 'Se recibio datos';
    // Nombre del Modelo //
    $table = 'unidad_mineras';
    $idTable = 'id_unidadMinera';
    try {
        // Requiero modelo //
        require_once '../models/unidadMinera.php';
        $tableManager = new unidadMinera();
        $arrayForm = json_decode($_POST['data'],true);
        // ACCION
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "getSelect_unidadMinera":
                $rptSql = $tableManager->getSelect_unidadMinera();
                break;
            case "getSelect_colaboradores":
                $rptSql = $tableManager->getSelect_colaboradores();
                break;
            case "getSelect_zona":
                $rptSql = $tableManager->getSelect_zona();
                break;
            case "getSelect_cCosto":
                $rptSql = $tableManager->getSelect_cCosto();
                break;
            case "getIpt_laborName":
                $parament_id = $arrayForm['datos']['id'];
                $rptSql = $tableManager->getIpt_laborName($parament_id);
                break;
            case "getcolumnWhere":
                $column = $arrayForm['column'];
                $parament = $arrayForm['parament'];
                $columnWhere = $arrayForm['columnWhere'];
                //$rptSql = $tableManager->getColumnWhere($table, $column, $parament, $idTable, $columnWhere);
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
