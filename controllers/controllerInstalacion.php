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
                $dato1 = $formRequest['datos_registro'];
                $dato2 = $formRequest['datos_turno'];
                $dato3 = $formRequest['datos_guardia'];
                $dato4 = $formRequest['datos_nvale'];
                $dato5 = $formRequest['datos_tipDisparo'];
                $dato6 = $formRequest['ccostos_codLabor'];
                $dato7 = $formRequest['tareas_l'];
                $dato8 = $formRequest['tareas_lpv'];
                $dato9 = $formRequest['tareas_stto'];
                $dato10 = $formRequest['tareas_serv'];
                $dato11 = $formRequest['tareas_comentario'];
                $rptSql = $tableManager->insert($dato1, $dato2, $dato3, $dato4, $dato5, $dato6, $dato7, $dato8, $dato9, $dato10, $dato11);
                echo "Instalaciones lista";
                $formRequest3 = $formRequest['list_instalaciones'];
                var_dump($formRequest3);
                // Requiero Modelo ()
                require_once '../models/oper_tareas.php';

                // Instancio Clase
                $tableManager2 = new operTareas();

                $formRequest2 = $formRequest['tareas'];

                // Id Operacion Mina
                $dato1 = $rptSql['id'];
                $rptSql2 = $tableManager2->insert($dato1, $formRequest2);
                //var_dump($rptSql2);
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