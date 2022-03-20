<?php
header('Content-type: application/json; charset=utf-8');
// Verifico si se recibio Informacion
if($_POST){
    $nametable = 'tvalexplosivos';
    $rptSql= '';
    $rptController = 'Se recibio datos';
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
                $datoemulMil = $formRequest['emulno_mil'];
                $datoemulTresmil = $formRequest['emulno_tresmil'];
                $datoDinaSemi = $formRequest['me_dina_semi'];
                $datocalDinaSemi = $formRequest['cal_dina_semi'];
                $datoDinaPulv = $formRequest['me_dina_pulv'];
                $datocalDinaPulv = $formRequest['cal_dina_pulv'];
                $datosumSemiPulv = $formRequest['suma_pulv_sumi'];
                $datCarmexsiete = $formRequest['me_carmen_siete'];
                $datCarmexocho = $formRequest['me_carmen_ocho'];
                $datomechaRapida = $formRequest['me_mecha_rapida'];
                $datomechaLenta = $formRequest['me_mecha_lenta'];
                $datofulmOcho = $formRequest['me_fulminante_ocho'];
                $datoconecMecha = $formRequest['me_conector_mecha'];
                $datoBlockSegacion = $formRequest['me_BlockSegecion'];
                $datoCarCortrece = $formRequest['me_Carcortadotrece'];
                $datoDEmulnorMil = $formRequest['totalKilos_DEmulnorMil'];
                $datoDEmulnorTresmil = $formRequest['totalKilos_DEmulnorTresmil'];
                if (!empty($idDigitador) && !empty($datoRegistro) && !empty($idZona) && !empty($datonVale) && !empty($idLabor)) 
                    {
                        $rptSql = $table->insert(
                            $idDigitador, 
                            $datoRegistro,
                            $idZona,
                            $datonVale,
                            $datoTurno,
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
                    }
                    else{
                        $rptController = [
                            "estado" => 0,
                            "mensaje" => "Falta varios campos",
                        ];

                    }
                
                break;
            case "editar":
                $formRequest = $arrayForm['datos'];
                $datoidLabor = $formRequest['id'];
                $datoZona = $formRequest['zona'];
                $datoCCosto = $formRequest['ccosto'];
                $datoNivel = $formRequest['nivel'];
                $datoLabor = $formRequest['labor'];
                //$rptSql = $table->edit($datoidLabor, $datoZona, $datoCCosto, $datoNivel, $datoLabor);
                break;
            case "delete":
                $idEliminar = $arrayForm['id'];
                $rptSql = $table->delete($idEliminar);
                break;
        }
    } catch (Exception $e) {
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
    "sql" => $rptSql,
    "rptController" => $rptController
);
echo json_encode($rptjsonControlller);
?>