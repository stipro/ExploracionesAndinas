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
                $data1 = $laborList['turno'];
                $data2 = $laborList['jefeGuardia'];
                $data3 = $laborList['fecha'];
                $data4 = $laborList['nvale'];
                $data5_detalles = $laborList['detalles'];
                $rptSql = $tableManager->create($data1, $data2, $data3, $data4);
                $idPrincipal = $rptSql['id'];
                $rptSql2 = $tableManager->createDetails($idPrincipal, $data5_detalles);
                $rptSqlGeneral = array(
                    "sql1" => $rptSql,
                    "sql2" => $rptSql2,
                );
                break;
            case "editar":
                $laborList = $arrayForm['datos'];
                $datoidLabor = $laborList['id'];
                $datoZona = $laborList['zona'];
                $datoCCosto = $laborList['ccosto'];
                $datoNivel = $laborList['nivel'];
                $datoLabor = $laborList['labor'];
                $rptSql = $tableManager->update($datoidLabor, $datoZona, $datoCCosto, $datoNivel, $datoLabor);
                break;
            case "eliminar":
                $idEliminar = $arrayForm['datos'];
                $rptSql = $tableManager->delete($idEliminar);
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