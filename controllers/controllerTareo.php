<?php
header('Content-type: application/json; charset=utf-8');
if($_POST){
    $table = 'tareos';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new Tareos();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "insert":
                $listInsert = $arrayForm['list'];
                $nTarjeta = $listInsert['item1'];
                $idColaborador = $listInsert['item2'];
                $dia = $listInsert['item3'];
                $turno = $listInsert['item4'];
                $guardia = $listInsert['item5'];
                $nActividad = $listInsert['item6'];
                $idLabor = $listInsert['item7'];
                $he = $listInsert['item8'];
                $htSeAd = $listInsert['item9'];
                $heSeAd = $listInsert['item10'];
                $ccSeAd = $listInsert['item11'];
                $ccHe = $listInsert['item12'];
                $actTipo = $listInsert['item13'];
                $rptSql = $tableManager->insert($nTarjeta, $idColaborador, $dia, $turno, $guardia, $nActividad, $idLabor, floatval($he), floatval($htSeAd), floatval($heSeAd), floatval($ccSeAd), floatval($ccHe), $actTipo);
                break;
            case "editar":
                $listUpdate = $arrayForm['list'];
                $datoid = $listUpdate['id'];
                $codigo = $listUpdate['codigo'];
                $nombre = $listUpdate['nombre'];
                $cargo = $listUpdate['cargo'];
                $dia = $listUpdate['dia'];
                $turno = $listUpdate['turno'];
                $ht = $listUpdate['ht'];
                $htseradi = $listUpdate['htseradi'];
                $ccostos = $listUpdate['ccostos'];
                $labor = $listUpdate['labor'];
                $nivel = $listUpdate['nivel'];
                $he = $listUpdate['he'];
                $heseradi = $listUpdate['heseradi'];
                $ccostoshe = $listUpdate['ccostoshe'];
                $zona = $listUpdate['zona'];
                $guardia = $listUpdate['guardia'];
                $actividad = $listUpdate['actividad'];
                $area = $listUpdate['area'];
                $rptSql = $tableManager->edit($datoid, $codigo, $nombre, $cargo, $dia, $turno, $ht, $htseradi, $ccostos, $labor, $nivel, $he, $heseradi, $ccostoshe, $zona, $guardia, $actividad, $area);
                break;
            case "eliminar":
                $listDelete = $arrayForm['list'];
                $datoid = $listDelete;
                $rptSql = $tableManager->delete($datoid);
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