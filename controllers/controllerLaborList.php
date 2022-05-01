<?php
header('Content-type: application/json; charset=utf-8');
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
$rptSql='';
if($_POST){
    $table = 'labores';
    $idTable = 'id_labor';
    $rptController = 'se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new Labores();
        $arrayForm = json_decode($_POST['data'],true);
        // ACCION
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "getDatalistAll_zonaNombre":
                $rptSql = $tableManager->getDatalistAll_zonaNombre();
                break;
            case "getDatalistAll_ccosto":
                $rptSql = $tableManager->getDatalistAll_ccosto();
                break;
            case "getDt_labZonas_nombre":
                $rptSql = $tableManager->getDt_labZonas_nombre();
                break;
            case "getLaborNombre":
                $rptSql = $tableManager->getLaborNombre();
                break;
            case "getCcosto":
                $rptSql = $tableManager->getCcosto();
                break;
            case "getUnidMinera":
                $rptSql = $tableManager->getUnidMinera();
                break;
            case "getLaborZona":
                $where = $arrayForm['paramentWhere'];
                $rptSql = $tableManager->getLaborZona($where);         
                break;
            case "getAll_zona":
                $rptSql = $tableManager->getAll_zona();
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
            case "dtl-ccosto-labor":
                $rptSql = $tableManager->getColumn_cCostos();
                break;
            case "getcolumnsWhere":
                $columns = $arrayForm['columns'];
                $parament = $arrayForm['parament'];
                $rptSql = $tableManager->getColumnsWhere($parament);
                break;
            
            case "search":                
                break;
            case "getTable":
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
