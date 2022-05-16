<?php
header('Content-type: application/json; charset=utf-8');
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
$rptSql='';
if($_POST){
    $table = 'operacion_mina';
    $idTable = 'id_operacionMina';
    $rptController = 'se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new operacionMina();
        $arrayForm = json_decode($_POST['data'],true);
        // ACCION
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "getcolumnAll":
                $column = $arrayForm['column'];
                $rptSql = $tableManager->getColumnAll($table, $column, $idTable);
                break;
            case "getRow":
                $parament_id = $arrayForm['whereParament'];
                $rptSql = $tableManager->getRow($parament_id);
                break;
            case "getRow_update":
                $parament_id = $arrayForm['whereParament'];
                $rptSql = $tableManager->getRow_update($parament_id);
                break;
            case "record":
                $parament_id = $arrayForm['id'];
                $rptSql = $tableManager->getRecord($parament_id);
                break;
            case "getLaborNombre":
                $rptSql = $tableManager->getLaborNombre();
                break;
            case "getLaborZona":
                $rptSql = $tableManager->getLaborZona();
                break;
            case "getUnidMinera":
                $rptSql = $tableManager->getUnidMinera();
                break;
            case "getLaborNombre_etapa":
                $rptSql = $tableManager->getLaborNombre_etapa();
                break;
            case "getcolumnAll":
                $column = $arrayForm['column'];
                $rptSql = $tableManager->getSelect($table, $column, $idTable);
                break;
            case "getcolumnWhere":
                $column = $arrayForm['column'];
                $parament = $arrayForm['parament'];
                $columnWhere = $arrayForm['columnWhere'];
                $rptSql = $tableManager->getSelectWhere($table, $column, $parament, $idTable, $columnWhere);
                break;
            case "getcolumns":

                break;
            case "getcolumnsWhere":
                $columns = $arrayForm['columns'];
                $parament = $arrayForm['parament'];
                $rptSql = $tableManager->getColumnsWhere($table, $parament);
                break;
            case "getLaborZona":
                $where = $arrayForm['paramentWhere'];
                $rptSql = $tableManager->getLaborZona($where);         
                break;
            case "search":                
                break;
            case "table":
                $rptSql = $tableManager->getAll(); 
                break;
            default:
                break;
        }

    } catch (Exception $e) {
        //throw $th;
    }
}
else{
    $rptController = 'no se recibio datos';
}
$rptjsonControlller = array(
    "sql" => $rptSql,
    "rptController" => $rptController,
);
echo json_encode($rptjsonControlller);
