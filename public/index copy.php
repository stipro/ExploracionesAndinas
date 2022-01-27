<?php
    /*
    require_once('./../Config/config.php');
    session_start();
    if (!isset($_SESSION["username"])) {
        //echo 'No se inicio session ';
        
        header("location:../index.php");
    } else {
        include_once('./../views/template/header.php');
        include_once('./../views/template/menu.php');
        $nameArchivo = basename( __FILE__ );
        $parte = explode(".", $nameArchivo);
        $nameMenu = ucfirst($parte[0]);
    }*/
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>

    <title><?php //echo $nameMenu .' | '. NOMBRE_SISTEMA ?></title>

    <!--STYLESHEET-->
    <!--=================================================-->

    <?php //echo $template_header_css; ?>
</head>
<body>
    <!--<h3>Página no encontrada</h3>-->
    <?php require_once("./controllers/CtrlMain.php");
        //header("location: ./views/");
    ?>
</body>
</html>