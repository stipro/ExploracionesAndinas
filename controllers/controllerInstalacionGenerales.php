<?php
$rptSqlGeneral = '';
$rptSql = '';
$rptSql2 = '';
if($_POST){
    $table = 'instalaciones_generales';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new instalacionGenerales();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "insert":
                $laborList = $arrayForm['form'];
                $data1 = $laborList['unidadMinera'];
                $data2 = $laborList['Fecha'];
                $data3 = $laborList['NReporte'];
                $data3 = ltrim($data3, "0");
                $data3_detalles = $laborList['detalles'];
                $rptSql = $tableManager->insert($data1, $data2, intval($data3));
                if (sizeof($data3_detalles) > 0) {
                    if($rptSql){
                        $id = $rptSql['id'];
                        $rptSql2 = $tableManager->insertDetails($data3_detalles, intval($id),);
                    }
                }
                else{
                    $rptSql2 = [
                        "estado" => 0,
                        "mensaje" => "No hay detalle Instalación Generales",
                    ];
                }
                

                $rptSqlGeneral = array(
                    "sql1" => $rptSql,
                    "sql2" => $rptSql2
                );
                break;
            case "editar":
                $laborList = $arrayForm['datos'];
                $datoidLabor = $laborList['id'];
                $datoZona = $laborList['zona'];
                $datoCCosto = $laborList['ccosto'];
                $datoNivel = $laborList['nivel'];
                $datoLabor = $laborList['labor'];
                $rptSql = $tableManager->edit($datoidLabor, $datoZona, $datoCCosto, $datoNivel, $datoLabor);
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