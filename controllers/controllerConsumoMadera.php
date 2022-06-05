<?php
$rptSqlGeneral = '';
$rptSql = '';
$rptSql2 = '';
if($_POST){
    $table = 'consumo_madera';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new ConsumoMadera();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "insert":
                $laborList = $arrayForm['form'];
                $data1 = $laborList['unidadMinera'];
                $data2 = $laborList['turno'];
                $data3 = $laborList['guardia'];
                $data4 = $laborList['jefeGuardia'];
                $data5 = $laborList['fecha'];
                $data6 = $laborList['nvale'];
                $data6_detalles = $laborList['detalles'];
                $rptSql = $tableManager->create($data1, $data2, $data3, $data4, $data5, $data6);
                $idPrincipal = $rptSql['id'];
                $rptSql2 = $tableManager->createDetails($idPrincipal, $data6_detalles);
                $rptSqlGeneral = array(
                    "sql1" => $rptSql,
                    "sql2" => $rptSql2,
                );
                break;
            case "edit":
                $laborList = $arrayForm['form'];
                $datoId = $laborList['id'];
                $data1 = $laborList['turno'];
                $data2 = $laborList['guardia'];
                $data3 = $laborList['jefeGuardia'];
                $data4 = $laborList['fecha'];
                $data5 = $laborList['nvale'];
                $data6_detalles = $laborList['detalles'];
                $rptSql2 = $tableManager->updateDetails($datoId, $data6_detalles);
                $rptSql = $tableManager->update($datoId, $data1, $data2, $data3, $data4, $data5);
                
                $rptSqlGeneral = array(
                    "sql1" => $rptSql,
                    "sql2" => $rptSql2,
                );
                break;
            case "delete":
                $idEliminar = $arrayForm['id'];
                $rptSql2 = $tableManager->deleteDetails($idEliminar);
                $rptSql = $tableManager->delete($idEliminar);
                $rptSqlGeneral = array(
                    "sql1" => $rptSql,
                    "sql2" => $rptSql2,
                );
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
    "sql" => $rptSqlGeneral,
    "rptController" => $rptController
);
echo json_encode($rptjsonControlller);
?>