<?php
header('Content-type: application/json; charset=utf-8');
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if($_POST){
    $table = 'labores';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new Labores();
        $arrayForm = json_decode($_POST['data'],true);
        // ACCION
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "getcolumnAll":
                $column = $arrayForm['column'];
                $rptSql = $tableManager->getSelect($column);
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
