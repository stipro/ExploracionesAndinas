<?php
    //Decodificamos
    $array = json_decode($_POST['data'],true);

    //Guardamos en array
    $arraydos = $array['contenido'];

    //GUARDAMOS VALOR EN SU VARIABLE
    $user = $arraydos['usuario'];
    $password = $arraydos['clave'];

    // VALIDAMOS CONTENIDO
    if(isset($user) && isset($password)){
        $rptController = '';

        //Llamamos al modelo
        require_once('../models/login.php');

        //Instanciamos
        $validar = new login();

        // Enviamos datos
        $result = $validar->validarDatos($user, $password);
        
        // Obtenemos la cantidad del resultado
        
        $cantidadResultado = count($result);
        session_start();
        // Validamos Login
        if($cantidadResultado){
            $validador = TRUE;
            $rptController = 'Se encontro Usuario ';
            $_SESSION["id"] = $result[0]['id_usuario'];
            $_SESSION["username"] = $result[0]['nombre_usuario'];
            $_SESSION["clave"] = $result[0]['clave_usuario'];
            $_SESSION["name"] = $result[0]['col_nombres'];
            //$_SESSION["code"] = $result[0]['col_ccostos'];
        }
        else{
            $validador = FALSE;
            $rptController = 'No existe Usuario ';
        }
        // Preparamos array
        $rptSql = array(
            "rpt" => $result,
            'val' => $validador,
        );
    }
    else{
        $rptController = 'No se recibio datos';
    }
    
    $rptjsonControlller = array(
        "sql" => $rptSql,
        "rptController" => $rptController
    );
    echo json_encode($rptjsonControlller);
    /*
    if (isset($_POST["usu"]) && isset($_POST["pass"])) {

        require_once("../models/login.php");
        $validar = new Login();
        $validar->validarDatos($_POST["usu"], $_POST["pass"]);
        echo $validar;

    } else {
        header("location:../index.php");
    }*/
?>