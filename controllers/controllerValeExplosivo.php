<?php
header('Content-type: application/json; charset=utf-8');
// Verifico si se recibio Informacion
if($_POST){
    $rptSqlGeneral='';
    $nametable = 'tvalexplosivos';
    $rptSql= '';
    $rptController = 'Se recibio datos';
    /* $datoemulMil = 0;
    $datoemulTresmil = 0;
    $datoDinaPulv = 0;
    $datCarmexsiete = 0;
    $datCarmexocho = 0;
    $datomechaRapida = 0;
    $datomechaLenta = 0;
    $datofulmOcho = 0;
    $datoconecMecha = 0;
    $datoBlockSegacion = 0;
    $datoCarCortrece = 0;
    $datoDinaSemi = 0; */
    try{
        // Requiero Modelo ()
        require_once '../models/'.$nametable.'.php';

        // Instancio Clase
        $table = new ValeExplosivos();

        // Descodifico Formulario
        $arrayForm = json_decode($_POST['data'],true);

        // Almaceno Accion
        $accion = $arrayForm['accion'];

        // Verfico que accion hacer
        switch ($accion) {
            case "insertar":
                $formRequest = $arrayForm['list'];                
                $id_unidadMinera = $formRequest['unidadMinera'];
                $idDigitador = $formRequest['id_digitador'];
                $datoRegistro = $formRequest['fechRegistro'];
                if (array_key_exists('id_zona', $formRequest)) {
                    $idZona = $formRequest['id_zona'];
                }
                else{
                    $rptController = 'Falta seleccionar Zona';
                }
                $datonVale = $formRequest['n_vale'];
                $datoTurno = $formRequest['turno'];
                $turno_id = $formRequest['turno_id'];
                $guardia_id = $formRequest['guardia_id'];
                $datopreImpreso = $formRequest['pre_impreso'];

                //$idLabor = array_key_exists('id_labor', $formRequest) ? $formRequest['id_labor'] : '';
                if (array_key_exists('id_labor', $formRequest)) {
                    $idLabor = $formRequest['id_labor'];
                }
                else{
                    $rptController = 'Falta seleccionar Labor';
                }

                //$idLabor = $formRequest['id_labor'];
                $datoTipDisparo = $formRequest['tip_disparo'];
                $idPerforista = $formRequest['id_Perforista'];
                $datotipEn = $formRequest['tip_en'];
                
                if (array_key_exists('barra', $formRequest)) {
                    $datoBarra = $formRequest['barra'];
                }
                else{
                    $rptController = 'Falta seleccionar barra';
                }
                $datoLgt = $formRequest['lgt'];
                $datonTaladro = $formRequest['ntaladro'];
                $datotalVacio = $formRequest['tal_vacio'];
                $datopiePerf = $formRequest['pies_perf'];
                $datopieReal = $formRequest['pies_real'];
                $datonnMaquinas = $formRequest['n_maquinas'];
                $datocalDinaSemi = $formRequest['cal_dina_semi'];
                $datocalDinaPulv = $formRequest['cal_dina_pulv'];
                $datosumSemiPulv = $formRequest['suma_pulv_sumi'];
                $datoDEmulnorMil = $formRequest['totalKilos_DEmulnorMil'];
                $datoDEmulnorTresmil = $formRequest['totalKilos_DEmulnorTresmil'];

                
                if (!empty($idDigitador) && !empty($datoRegistro) && !empty($idZona) && !empty($datonVale) && !empty($idLabor)) 
                    {
                        $detail = $formRequest['detail'];
                        foreach ($detail as &$valor) {
                            $datoemulMil = $valor['id'] = 1 ? $valor['cantidad'] : 0;
                            echo $datoemulMil;
                            $datoemulTresmil = $valor['id'] = 2 ? $valor['cantidad'] : 0;
                            $datoDinaPulv = $valor['id'] = 3 ? $valor['cantidad'] : 0;
                            $datCarmexsiete = $valor['id'] = 4 ? $valor['cantidad'] : 0;
                            $datCarmexocho = $valor['id'] = 5 ? $valor['cantidad'] : 0;
                            $datomechaRapida = $valor['id'] = 6 ? $valor['cantidad'] : 0;
                            $datomechaLenta = $valor['id'] = 7 ? $valor['cantidad'] : 0;
                            $datofulmOcho = $valor['id'] = 8 ? $valor['cantidad'] : 0;
                            $datoconecMecha = $valor['id'] = 9 ? $valor['cantidad'] : 0;
                            $datoBlockSegacion = $valor['id'] = 10 ? $valor['cantidad'] : 0;
                            $datoCarCortrece = $valor['id'] = 11 ? $valor['cantidad'] : 0;
                            $datoDinaSemi = $valor['id'] = 12 ? $valor['cantidad'] : 0;
                        }
                        echo 'Afuera';
                        echo $datoemulMil;
                        $rptSql = $table->insert(
                            $id_unidadMinera,
                            $idDigitador, 
                            $datoRegistro,
                            $idZona,
                            $datonVale,
                            $datoTurno,
                            $turno_id,
                            $guardia_id,
                            $datopreImpreso,
                            $idLabor,
                            $datoTipDisparo,
                            $idPerforista,
                            $datotipEn,
                            $datoBarra,
                            $datoLgt,
                            $datonTaladro,
                            $datotalVacio,
                            $datopiePerf,
                            $datopieReal,
                            $datonnMaquinas,
                            $datoemulMil,
                            $datoemulTresmil,
                            $datoDinaSemi,
                            $datocalDinaSemi,
                            $datoDinaPulv,
                            $datocalDinaPulv,
                            $datosumSemiPulv,                    
                            $datCarmexsiete,
                            $datCarmexocho,
                            $datomechaRapida,
                            $datomechaLenta,
                            $datofulmOcho,
                            $datoconecMecha,
                            $datoBlockSegacion,
                            $datoCarCortrece,
                            $datoDEmulnorMil,
                            $datoDEmulnorTresmil);
                            $rptSql;
                        $rptController = [
                            "estado" => 1,
                            "mensaje" => "No hay variables vacios",
                        ];
                        if($rptSql['estado'] == 1){
                            $id = $rptSql['id'];
                            $detail = $formRequest['detail'];
                            if(sizeof($detail) > 0){
                                $rptSql2 = $table->createDetalle($id, $detail);
                                
                                
                            }else{
                                $rptSql2 = [
                                    "estado" => 0,
                                    "mensaje" => "No hay detalle que registrar",
                                ];
                                $rptSql2 = 0;
                            }
                        }
                        $rptSqlGeneral = array(
                            "sql1" => $rptSql,
                            /* "sql2" => $rptSql2 */
                        );
                    }
                    else{
                        $rptController = [
                            "estado" => 0,
                            "mensaje" => "Falta varios campos",
                        ];

                    }
                
                break;
            case "edit":
                $formRequest = $arrayForm['form'];
                $rptSql = $table->edit($formRequest);
                break;
            case "delete":
                $idEliminar = $arrayForm['id'];
                $rptSql = $table->delete($idEliminar);
                break;
        }
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        $rptController = [
            "estado" => 0,
            "mensaje" => "Se encontro un error",
        ];
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