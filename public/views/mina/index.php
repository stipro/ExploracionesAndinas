<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        //echo 'No se inicio session';
        header("location:./../login.php");
    }
    else{
        header("location:./operacion_mina.php");
    }
?>