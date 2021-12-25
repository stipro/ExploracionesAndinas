<?php
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
            case "insertar":
                $listInsert = $arrayForm['list'];
                $tarjeta = $listInsert['item1'];
                $idColaborador = $listInsert['idColaborador'];
                $dia = $listInsert['item5'];
                $turno = $listInsert['item6'];
                $guardia = $listInsert['item7'];
                $nActividad = $listInsert['item8'];
                $idLabor = $listInsert['idLabor'];
                $codZona = $listInsert['item9'];
                $idZona = $listInsert['idZona'];
                $Actividad = $listInsert['item14'];
                $porciones = explode(" ", $Actividad);
                $cod_actividad = $porciones[0]; // porción1
                $HE = $listInsert['item15'];
                $HTSer_Ad = $listInsert['item16'];
                $HESer_Ad = $listInsert['item17'];
                $HT = $listInsert['ht'];
                $CCSer_Ad = $listInsert['item18'];
                $CCostosHe = $listInsert['item19'];
                $rptSql = $tableManager->insert($idColaborador, $dia, $turno, $HT, $guardia, $idLabor, $Actividad, $cod_actividad, floatval($HE), floatval($HTSer_Ad), floatval($HESer_Ad), floatval($CCSer_Ad), floatval($CCostosHe));
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