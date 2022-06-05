<?php
    session_start();
    //var_dump($_SESSION);
    $idUsuario = $_SESSION["id"];
    // Nombre del Modelo //
    $nameModel = 'login';
    //Llamamos al modelo
    require_once('../models/'.$nameModel.'.php');
    //Instanciamos
    $tableManager = new login();
    // Enviamos datos
    $result = $tableManager->update_session($idUsuario, '0');
    
    session_unset();
    session_destroy();

    header("location:./../public/index.php");
?>