<?php
if($_POST){
    $table = 'labores';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $labor = new Labores();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "insertar":
                $laborList = $arrayForm['datos'];
                $datoidLabor = $laborList['id'];
                $datoZona = $laborList['zona'];
                $datoCCosto = $laborList['ccosto'];
                $datoNivel = $laborList['nivel'];
                $datoLabor = $laborList['labor'];
                $rptSql = $labor->insert($datoZona, $datoCCosto, $datoNivel, $datoLabor);
                break;
            case "editar":
                $laborList = $arrayForm['datos'];
                $datoidLabor = $laborList['id'];
                $datoZona = $laborList['zona'];
                $datoCCosto = $laborList['ccosto'];
                $datoNivel = $laborList['nivel'];
                $datoLabor = $laborList['labor'];
                $rptSql = $labor->edit($datoidLabor, $datoZona, $datoCCosto, $datoNivel, $datoLabor);
                break;
            case "eliminar":
                $idEliminar = $arrayForm['datos'];
                $rptSql = $labor->delete($idEliminar);
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
?>