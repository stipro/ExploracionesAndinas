<?php
header('Content-type: application/json; charset=utf-8');

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
                $dato1 = $formRequest['datos_registro'];
                $dato2 = $formRequest['datos_turno'];
                $dato3 = $formRequest['datos_guardia'];
                $dato4 = $formRequest['datos_nvale'];
                $dato5 = $formRequest['datos_actividad'];
                $dato6 = array_key_exists('id_Labor', $formRequest) ? $formRequest['id_Labor'] : '';
                $dato7 = $formRequest['tareas_l'];
                $dato8 = $formRequest['tareas_lpv'];
                $dato9 = $formRequest['tareas_stto'];
                $dato10 = $formRequest['tareas_serv'];
                $dato11 = $formRequest['tareas_comentario'];
                $dato12 = $formRequest['avanActual_tipAvance'];
                $dato13 = $formRequest['avanActual_mt'];
                $dato14 = $formRequest['avanActual_mt3'];
                $dato15 = $formRequest['avanActual_intDisparo'];
                $dato16 = $formRequest['avanActual_resuelto'];
                $dato17 = $formRequest['limpieza_manual'];
                $dato18 = $formRequest['limpieza_pala'];
                $dato19 = $formRequest['limpieza_cantidadPala'];
                $dato20 = $formRequest['limpieza_winche'];
                $dato21 = $formRequest['limpieza_cantidadWinche'];
                $dato22 = $formRequest['limpieza_mineral'];
                $dato23 = $formRequest['limpieza_desmont'];
                if (!empty($dato1) && !empty($dato2) && !empty($dato3) && !empty($dato5) && !empty($dato6)) 
                    {
                        $rptSql = $tableManager->insert($dato1, $dato2, $dato3, $dato4, $dato5, $dato6, $dato7, $dato8, $dato9, $dato10, $dato11, $dato12, $dato13, $dato14, $dato15, $dato16, $dato17, $dato18, $dato19, $dato20, $dato21, $dato22, $dato23);
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
                if (!empty($idPrincipal) && !empty($formRequest2)) 
                {
                    // Enviando parametros Insert
                    $rptSql2 = $tableManager2->insert($idPrincipal, $formRequest2);
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
                    $rptSql3 = 'VACIO';
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
    "sql" => $rptSql,
    "rptController" => $rptController
);
echo json_encode($rptjsonControlller);
?>