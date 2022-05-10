<?php
$rptSqlGeneral = '';
$rptSql = '';
$rptSql2 = '';
if($_POST){
    $table = 'docExplosivo';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new DocExplosivo();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "insert":
                $laborList = $arrayForm['form'];
                // Falta Nomralizar Tabla
                $data1 = $laborList['nDoc'];
                $data2 = $laborList['viaTipo_dPa'];
                $data3 = $laborList['viaNombre_dPa'];
                $data4 = $laborList['n_dPa'];
                $data5 = $laborList['int_dPa'];
                $data6 = $laborList['zona_dPa'];
                $data7 = $laborList['dis_dPa'];
                $data8 = $laborList['pro_dPa'];
                $data9 = $laborList['dep_dPa'];
                $data10 = $laborList['RazonSocial_rem'];
                $data11 = $laborList['ruc_rem'];
                $data12 = $laborList['viaTipo_dLL'];
                $data13 = $laborList['viaNombre_dLL'];
                $data14 = $laborList['n_dLL'];
                $data15 = $laborList['int_dLL'];
                $data16 = $laborList['zona_dLL'];
                $data17 = $laborList['dis_dLL'];
                $data18 = $laborList['pro_dL'];
                $data19 = $laborList['dep_dL'];
                $data20 = $laborList['RazonSocial_de'];
                $data21 = $laborList['ruc_de'];
                $data22 = $laborList['detalles'];
                $data23_detail = $laborList['detalles'];
                $rptSql = $tableManager->create($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11,
                $data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21);
                $idPrincipal = $rptSql['id'];
                $rptSql2 = $tableManager->createDetail($idPrincipal, $data23_detail);
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
                /* $rptSql = $tableManager->update($datoId, $data1, $data2, $data3, $data4, $data5);
                $rptSql2 = $tableManager->updateDetails($datoId, $data6_detalles); */
                $rptSqlGeneral = array(
                    "sql1" => $rptSql,
                    "sql2" => $rptSql2,
                );
                break;
            case "delete":
                $idEliminar = $arrayForm['id'];
                $rptSql = $tableManager->delete($idEliminar);
                $rptSql2 = $tableManager->deleteDetail($idEliminar);
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