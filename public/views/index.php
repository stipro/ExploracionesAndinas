<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        //echo 'No se inicio session';
        header("location:./inicio/login.php");
    }
    else{
        header("location:./inicio/main.php");
    }
?>