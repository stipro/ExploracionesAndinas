<?php
header('Content-type: application/json; charset=utf-8');
$rptSql=''; 
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if($_POST){
    $rptController = 'Se recibio datos';
    // Nombre del Modelo //
    $table = 'extraccion_mineral';
    $idTable = 'id_extraccionMineral';
    try {
        // Requiero modelo //
        require_once '../models/extraccionMineral.php';
        $tableManager = new extraccionMineral();
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
