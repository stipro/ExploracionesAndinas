<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    if ($_GET) {
        # Obtenemos nombre Tabla
        $table = $_GET['table'];
        include_once './../models/excelGenerator.php';

        # Se instancia Consulta
        $exportExcel = new ExportExcel();
    
        # Se envia Parametro
        $getTable = $exportExcel->getData($table);

        $fila = $getTable->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($fila);
        /* if($itemCount > 0){
            
            $employeeArr = array();
            $employeeArr["body"] = array();
            $employeeArr["itemCount"] = $itemCount;
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $e = array(
                    "id" => $id,
                    "name" => $name,
                    "email" => $email,
                    "age" => $age,
                    "designation" => $designation,
                    "created" => $created
                );
    
                array_push($employeeArr["body"], $e);
            }
            echo json_encode($employeeArr);
        }
    
        else{
            http_response_code(404);
            echo json_encode(
                array("message" => "Ningun record fue encontrado.")
            );
        } */
    }
    else{
        echo json_encode(
            array("message" => "No se recibio parametro.")
        );
    }

?>