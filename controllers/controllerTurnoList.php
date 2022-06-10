<?php
header('Content-type: application/json; charset=utf-8');
$rptSql = '';
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if ($_POST) {
    $rptController = 'Se recibio datos';
    // Nombre del Modelo //
    $table = 'turnos';
    $idTable = 'id_turno';
    $column = 'nombre_turno';
    try {
        // Requiero modelo //
        require_once '../models/modalTurno.php';
        $tableManager = new turno();
        $arrayForm = json_decode($_POST['data'], true);
        // ACCION
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "getSelect":
                $rptSql = $tableManager->getSelect($idTable, $table, $column);
                break;
        }
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    } catch (PDOException $e) {
        echo json_encode($e->getMessage());
    }
} else {
    $rptController = 'no Se recibio datos';
}
$rptjsonControlller = array(
    "sql" => $rptSql,
    "rptController" => $rptController,
);
echo json_encode($rptjsonControlller);
