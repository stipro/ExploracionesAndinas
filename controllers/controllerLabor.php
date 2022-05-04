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
            case "insert-labor":
                $items = $arrayForm['datos'];
                $rptSql = $labor->insertPrincipal($items);
                break;
            case "insert-laborName":
                //$items = $arrayForm['datos'];   
                $datonombreLabor = ( !empty( $arrayForm['datos']['nombreLabor'] ) ? ( $arrayForm['datos']['nombreLabor'] ) : false );
                $datoid_laborName = ( !empty( $arrayForm['datos']['id_laborName_etapa'] ) ? ( $arrayForm['datos']['id_laborName_etapa'] ) : false );
                $datoprefijoLabor = ( !empty( $arrayForm['datos']['prefijoLabor'] ) ? ( $arrayForm['datos']['prefijoLabor'] ) : false );
                $datotipoLabor = ( !empty( $arrayForm['datos']['tipoLabor'] ) ? ( $arrayForm['datos']['tipoLabor'] ) : false );
                if($datonombreLabor && $datoid_laborName && $datoprefijoLabor && $datotipoLabor){
                    $rptSql = $labor->insert_selectUno($datonombreLabor, intval($datoid_laborName), $datoprefijoLabor, $datotipoLabor);
                }
                else{
                    if(empty( $arrayForm['datos']['id_laborName'] )){
                        $datoFalte = "seleccionar o volver a seleccionar Labor";
                    }
                    $rptSql = [
                        "estado" => 0,
                        "mensaje" => " Falta informacion,  " . $datoFalte,
                    ];
                }
                break;
            case "insert-laborNameEtapa":
                if ($arrayForm['datos']['nombre_etapa']) {
                    $items = $arrayForm['datos'];
                    $rptSql = $labor->insert_selectUno_selectUno($items);
                }else{
                    $rptSql = [
                        "estado" => 0,
                        "mensaje" => "Falta datos",
                        "id" => $lastcolIdsql
                    ];
                }
                
                break;
            case "insert-laborZone":
                $rptSqlGeneral = array();
                $items = $arrayForm['datos'];
                foreach ($items as $clave => $valor) {
                    if(!$items[$clave]){
                        $porciones = explode("_", $clave);
                        $rptSql = [
                            "estado" => 0,
                            "mensaje" => " Falta informacion,  " . $porciones[1],
                        ];
                        array_push($rptSqlGeneral, $rptSql);
                    }
                }
                if(!$rptSqlGeneral){
                    $rptSql = $labor->insert_labor_zona($items);
                }
                break;
            case "insert-unidMinera":
                $rptSqlGeneral = array();
                $items = $arrayForm['datos'];
                foreach ($items as $clave => $valor) {
                    if(!$items[$clave]){
                        $porciones = explode("_", $clave);
                        $rptSql = [
                            "estado" => 0,
                            "mensaje" => " Falta informacion,  " . $porciones[1],
                        ];
                        array_push($rptSqlGeneral, $rptSql);
                    }
                }
                if(!$rptSqlGeneral){
                    $rptSql = $labor->insert_selectdos($items);
                }
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