<?php
header('Content-type: application/json; charset=utf-8');
$rptSql = '';
$rptSql2 = '';
$rptSql3 = '';
// Verifico si se recibio Informacion
if($_POST){
    $table = 'operacion_mina';
    $rptSql= '';
    $rptController = 'Se recibio datos';
    try{
        // Requiero Modelo ()
        require_once '../models/'.$table.'.php';

        // Instancio Clase
        $tableManager = new operacionMina();

        // Descodifico Formulario
        $arrayForm = json_decode($_POST['data'],true);

        // Almaceno Accion
        $accion = $arrayForm['accion'];

        // Verfico que accion hacer
        switch ($accion) {
            case "insert":
                
                $formRequest = $arrayForm['list'];
                //var_dump($formRequest);
                $dato1 = $formRequest['unidadMinera'];
                $dato2 = $formRequest['datos_registro'];
                $dato3 = $formRequest['datos_turno'];
                $turno_id = $formRequest['turno_id'];
                $dato4 = $formRequest['datos_guardia'];
                $guardia_id = $formRequest['guardia_id'];
                $dato5 = $formRequest['datos_nvale'];
                $dato6 = $formRequest['datos_actividad'];
                $dato7 = array_key_exists('id_Labor', $formRequest) ? $formRequest['id_Labor'] : '';
                $dato8 = $formRequest['tareas_l'] ? $formRequest['tareas_l'] : number_format('0.00');
                $dato9 = $formRequest['tareas_lpv'] ? $formRequest['tareas_lpv'] : number_format('0.00');
                $dato10 = $formRequest['tareas_stto'] ? $formRequest['tareas_stto'] : number_format('0.00');
                $dato11 = $formRequest['tareas_serv'] ? $formRequest['tareas_serv'] : number_format('0.00');
                $dato12 = $formRequest['tareas_comentario'];
                $dato13 = $formRequest['avanActual_tipAvance'];
                $dato14 = $formRequest['avanActual_mt'] ? $formRequest['avanActual_mt'] : 0;
                $dato15 = $formRequest['avanActual_mt3'] ? $formRequest['avanActual_mt3'] : 0;
                $dato16 = $formRequest['avanActual_intDisparo'];
                $dato17 = $formRequest['avanActual_resuelto'];
                $dato18 = $formRequest['limpieza_manual'] ? $formRequest['limpieza_manual'] : 0;
                $dato19 = $formRequest['limpieza_pala'];
                $dato20 = $formRequest['limpieza_cantidadPala'] ? $formRequest['limpieza_cantidadPala'] : 0;
                $dato21 = $formRequest['limpieza_winche'];
                $dato22 = $formRequest['limpieza_cantidadWinche'] ? $formRequest['limpieza_cantidadWinche'] : 0;
                $dato23 = $formRequest['limpieza_mineral'] ? $formRequest['limpieza_mineral'] : 0;
                $dato24 = $formRequest['limpieza_desmont']? $formRequest['limpieza_desmont'] : 0;
                if (!empty($dato1) && !empty($dato2) && !empty($dato3) && !empty($dato6)) 
                    {
                        $rptSql = $tableManager->insert($turno_id, $guardia_id, $dato1, $dato2, $dato3, $dato4, $dato5, $dato6, $dato7, $dato8, $dato9, $dato10, $dato11, $dato12, $dato13, $dato14, $dato15, $dato16, $dato17, $dato18, $dato19, $dato20, $dato21, $dato22, $dato23, $dato24);
                        $rptController = [
                            "estado" => 1,
                            "mensaje" => "No hay variables vacios",
                        ];
                    } 
                else 
                    {
                        $rptController = [
                            "estado" => 0,
                            "mensaje" => "Falta varios campos",
                        ];
                    }
                if (!empty($rptSql)) {
                    $idPrincipal = $rptSql['id'];
                }
                //  Modelo ()
                require_once '../models/oper_tareas.php';
                // Instancio Clase
                $tableManager2 = new operTareas();
                // Almacena Array en variable
                $formRequest2 = $formRequest['tareas'];
                // Id Operacion Mina
                
                // Resultado operacion Mina
                //var_dump($formRequest2);
                
                if (!empty($idPrincipal) && !empty($formRequest2)) 
                {
                    if(array_key_exists('id', $formRequest2[1])){
                        // Enviando parametros Insert
                        $rptSql2 = $tableManager2->insert($idPrincipal, $formRequest2);
                    }
                    else{
                        $rptSql2 = [
                            "estado" => 0,
                            "mensaje" => "No hay datos en Tareas",
                        ];
                    }
                } 
                else 
                {
                    $rptSql2 = 'VACIO';
                }
                // Trae Modelo ()
                require_once '../models/instalaciones_mina.php';
                // Instancio Clase
                $tableManager3 = new InstalacionMina();
                // Almacena Array en variable
                $formRequest3 = $formRequest['list_instalaciones'];

                if (!empty($idPrincipal) && !empty($formRequest3)) 
                {
                    // Enviando parametros Insert
                    $rptSql3 = $tableManager3->insert($idPrincipal, $formRequest3);
                } 
                else 
                {
                    $rptSql3 = [
                        "estado" => 0,
                        "mensaje" => "No hay datos en Instalaciones",
                    ];
                }
                $rptSqlGeneral = array(
                    "sql1" => $rptSql,
                    "sql2" => $rptSql2,
                    "sql3" => $rptSql3,
                );             
                break;
            case "edit":
                $formRequest = $arrayForm['datos'];
                $datoidLabor = $formRequest['id'];
                $datoZona = $formRequest['zona'];
                $datoCCosto = $formRequest['ccosto'];
                $datoNivel = $formRequest['nivel'];
                $datoLabor = $formRequest['labor'];
                //$rptSql = $table->edit($datoidLabor, $datoZona, $datoCCosto, $datoNivel, $datoLabor);
                break;
            case "delet":
                $idEliminar = $arrayForm['id'];
                $rptSql = $tableManager->delete($idEliminar);
                $rptSql2 = $tableManager->delete_instalaciones($idEliminar);
                $rptSql3 = $tableManager->delete_tareas($idEliminar);
                $rptSqlGeneral = array(
                    "sql1" => $rptSql,
                    "sql2" => $rptSql2,
                    "sql3" => $rptSql3,
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