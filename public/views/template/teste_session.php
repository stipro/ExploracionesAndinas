<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        echo 'No se inicio session ';
    } else {
        echo 'Si inicio session ';
    }
?>