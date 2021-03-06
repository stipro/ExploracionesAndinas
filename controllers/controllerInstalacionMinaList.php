<?php
header('Content-type: application/json; charset=utf-8');
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if($_POST){
    $table = 'instalaciones_mina';
    $idTable = 'id_instalacionMina';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new InstalacionMina();
        $arrayForm = json_decode($_POST['data'],true);
        // ACCION
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "getcolumnAll":
                $column = $arrayForm['column'];
                $rptSql = $tableManager->getSelect($table, $column, $idTable);
                break;
            case "getcolumnWhere":
                $column = $arrayForm['column'];
                $parament = $arrayForm['parament'];
                $columnWhere = $arrayForm['columnWhere'];
                //$rptSql = $tableManager->getSelectWhere($table, $column, $parament, $idTable, $columnWhere);
                break;
            case "getcolumnsWhere":
                $columns = $arrayForm['columns'];
                $parament = $arrayForm['parament'];
                //$rptSql = $tableManager->getColumnsWhere($table, $parament);
                break;
            case "getLaborZona":
                $where = $arrayForm['paramentWhere'];
                $rptSql = $tableManager->getunidMedida($where);         
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
