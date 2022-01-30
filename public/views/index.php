<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        //echo 'No se inicio session';
        header("location:./../index.php");
    }
    else{
        header("location:./inicio/main.php");
    }
?>