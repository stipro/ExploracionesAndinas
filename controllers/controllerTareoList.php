<?php
header('Content-type: application/json; charset=utf-8');
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
$rptSql='';
if($_POST){
    $table = 'tareos';
    $idTable = 'id_tareo';
    $rptController = 'se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new Tareos();
        $arrayForm = json_decode($_POST['data'],true);
        // ACCION
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "getTbl-master":
                $rptSql = $tableManager->tbl_master(); 
                break;
            case "getLaborNombre":
                //$rptSql = $tableManager->getLaborNombre();
                break;
            case "getCcosto":
                //$rptSql = $tableManager->getCcosto();
                break;
            case "getUnidMinera":
                //$rptSql = $tableManager->getUnidMinera();
                break;
            case "getLaborNombre_etapa":
                //$rptSql = $tableManager->getLaborNombre_etapa();
                break;
            case "getcolumnAll":
                $column = $arrayForm['column'];
                //$rptSql = $tableManager->getSelect($table, $column, $idTable);
                break;
            case "getcolumnWhere":
                $column = $arrayForm['column'];
                $parament = $arrayForm['parament'];
                $columnWhere = $arrayForm['columnWhere'];
                //$rptSql = $tableManager->getSelectWhere($table, $column, $parament, $idTable, $columnWhere);
                break;
            case "getcolumns":

                break;
            case "getcolumnsWhere":
                $columns = $arrayForm['columns'];
                $parament = $arrayForm['parament'];
                //$rptSql = $tableManager->getColumnsWhere($parament);
                break;
            case "getLaborZona":
                $where = $arrayForm['paramentWhere'];
                //$rptSql = $tableManager->getLaborZona($where);         
                break;
            case "search":                
                break;
            case "getTable":
                $rptSql = $tableManager->getTable(); 
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
