<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    if ($_GET) {       
        # $table = array_key_exists('table', $_GET) ? $_GET['table'] : ($condicion2 ? 'verdadero2' : json_encode(array("message" => "No se recibio parametro.")));
        if (!array_key_exists('tipoUsuario', $_GET)){
            http_response_code(404);
            echo json_encode(
                array("message" => "No se recibio el tipo de usuario.")
            );
        }
        elseif (!array_key_exists('table', $_GET)){
            http_response_code(404);
            echo json_encode(
                array("message" => "No se recibio el nombre de Tabla")
            );
        }
        else {
            if (!$_GET['tipoUsuario']) {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No hay dato en tipo Usuario.")
                );
            }
            elseif (!$_GET['table']){
                http_response_code(404);
                echo json_encode(
                    array("message" => "No hay dato en tabla.")
                );
            }
            else {
                # Obtenemos nombre Tipo Usuario
                $tipUsuario = $_GET['tipoUsuario'];

                if($tipUsuario == 'dev'){
                    # Obtenemos nombre Tabla
                    $table = $_GET['table'];

                    # Requiero Modelo ()
                    include_once './../models/excelGenerator.php';

                    # Se instancia Consulta
                    $exportExcel = new ExportExcel();

                    # Se envia Parametro
                    $getTable = $exportExcel->getData($table);

                    # Obtiene datos
                    $fila = $getTable->fetchAll(PDO::FETCH_ASSOC);
                    if($fila > 0) {
                        echo json_encode($fila);
                    }
                    else {
                        http_response_code(404);
                        echo json_encode(
                            array("message" => "Ningun record fue encontrado.")
                        );
                    }
                }
                else{
                    # Obtenemos nombre Tabla
                    $table = $_GET['table'];
                    
                    # Requiero Modelo ()
                    include_once './../models/excelGenerator.php';

                    # Se instancia Consulta
                    $exportExcel = new ExportExcel();
                
                    # Se envia Parametro
                    $getTable = $exportExcel->getData($table);
            
                    # Obtiene datos
                    $fila = $getTable->fetchAll(PDO::FETCH_ASSOC);
                    if($fila > 0) {
                        echo json_encode($fila);
                    }
                    else {
                        http_response_code(404);
                        echo json_encode(
                            array("message" => "Ningun record fue encontrado.")
                        );
                    }
                }
            }
        }
    }
    else {
        http_response_code(404);
        echo json_encode(
            array("message" => "No se recibio parametro.")
        );
    }

?>