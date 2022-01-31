<?php
    header('Content-type: application/json; charset=utf-8');
    // Comprobamos si recibio Informacion //
    if($_POST){
        // Variable para almacenar respuesta de controller //
        $rptController = 'Se recibio datos';
        // Nombre del Modelo //
        $nameModels = 'detalleSession';
        // Varible almacenar respuesta Sql //
        $rptSql='';
        try {
            // Requermimo modelo //
            require_once ('../models/'.$nameModels.'.php');
            // Instanciamos la clase //
            $tableManager = new detallSession();
            // Decodificamos //
            $arrayForm = json_decode($_POST['data'],true);
            // Almaceno Accion
            $formRequest = $arrayForm['data'];
            // Almacenamos accion
            $accion = $arrayForm['accion'];
            
            switch ($accion) {
                case 'insert':
                    $id = $formRequest['id_usuario'];
                    $formInsert = $formRequest['infoPhp'];
                    $rptSql = $tableManager->insert_infoPhp($formInsert);
                    $formInsert2 = $formRequest['infoJs'];
                    $rptSql2 = $tableManager->insert_infoJs($formInsert2);
                    if ($rptSql && $rptSql2) {
                        $rptSql_index = $tableManager->inser_UsuarioSession($id, $rptSql, $rptSql2);
                    }
                    
                    break;
                case 'edit':
                    # code...
                    break;
                case 'delet':
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
            /*
            
            $tableManager->insertipInfo();
            $tableManager->infoPhp();
            // Verfico Accion
            
            switch ($accion) {
                // Insertar Dato //
                case "insert":
                    
                    $formRequest = $arrayForm['list'];
                    //var_dump($formRequest);
                    $dato1 = $formRequest['datos_registro'];
                    $dato6 = array_key_exists('id_Labor', $formRequest) ? $formRequest['id_Labor'] : '';

                    if (!empty($dato1) && !empty($dato2) && !empty($dato3) && !empty($dato4) && !empty($dato5) && !empty($dato6) && !empty($dato7)&& !empty($dato8) && !empty($dato9) && !empty($dato10) && !empty($dato11) && !empty($dato12) && !empty($dato13)&& !empty($dato14) && !empty($dato15) && !empty($dato16)&& !empty($dato17) && !empty($dato18) && !empty($dato19) && !empty($dato20) && !empty($dato21) && !empty($dato22)&& !empty($dato23)) 
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
                // Editar dato //
                case "edit":
                    $formRequest = $arrayForm['datos'];
                    $datoidLabor = $formRequest['id'];
                    $datoZona = $formRequest['zona'];
                    $datoCCosto = $formRequest['ccosto'];
                    $datoNivel = $formRequest['nivel'];
                    $datoLabor = $formRequest['labor'];
                    //$rptSql = $table->edit($datoidLabor, $datoZona, $datoCCosto, $datoNivel, $datoLabor);
                    break;
                // Eliminar dato //
                case "eliminar":
                    $idEliminar = $arrayForm['datos'];
                    $rptSql = $tableManager->delete($idEliminar);
                    break;
            }*/

        } catch (Exception $e) {
            //throw $th;
        }
    }else{
        $rptController = 'no se recibio datos';
    }
    $rptjsonControlller = array(
        "sql" => $rptSql,
        "rptController" => $rptController,
    );
    echo json_encode($rptjsonControlller);

?>