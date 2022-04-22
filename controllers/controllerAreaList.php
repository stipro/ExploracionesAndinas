<?php
header('Content-type: application/json; charset=utf-8');
$rptSql=''; 
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if($_POST){
    $rptController = 'Se recibio datos';
    // Nombre del Modelo //
    $table = 'areas';
    $idTable = 'id_area';
    try {
        // Requiero modelo //
        require_once '../models/area.php';
        $tableManager = new area();
        $arrayForm = json_decode($_POST['data'],true);
        // ACCION
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "getSelect_area":
                $rptSql = $tableManager->getSelect_area();
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
