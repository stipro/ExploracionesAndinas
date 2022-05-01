<?php
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json; charset=utf-8');
$rptSql='';
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if($_POST){
    $table = 'consumo_madera';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new ConsumoMadera();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "table_master":
                $rptSql = $tableManager->table_master();
                break;
            case "search":
                $term = $accion['term'];
                $type = $accion['type'];
                
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
    "rptController" => $rptController
);
echo json_encode($rptjsonControlller);
