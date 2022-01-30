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
                $idZona = $formRequest['id_zona'];
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
                $datoBarra = $formRequest['barra'];
                $datoLgt = $formRequest['lgt'];
                $datonTaladro = $formRequest['ntaladro'];
                $datotalVacio = $formRequest['tal_vacio'];
                $datopiePerf = $formRequest['pies_perf'];
                $datopieReal = $formRequest['pies_real'];
                $datonnMaquinas = $formRequest['n_maquinas'];
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
                if (!empty($idDigitador) && !empty($datoRegistro) && !empty($idZona) && !empty($datonVale) && !empty($datoTurno) && !empty($datopreImpreso) && !empty($idLabor)&& !empty($datoTipDisparo) && !empty($idPerforista) && !empty($datotipEn) && !empty($datoBarra) && !empty($datoLgt) && !empty($datonTaladro)&& !empty($datotalVacio) && !empty($datopiePerf) && !empty($datopieReal)&& !empty($datonnMaquinas) && !empty($datoemulTresmil) && !empty($datoDinaSemi) && !empty($datocalDinaSemi) && !empty($datoDinaPulv) && !empty($datocalDinaPulv)&& !empty($datosumSemiPulv)) 
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
                            $datoCarCortrece);
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
            case "eliminar":
                $idEliminar = $arrayForm['datos'];
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