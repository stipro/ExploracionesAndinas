<?php
    if (isset($_SESSION["username"])) {
        
        require_once("./models/Validar.php");
        $validar = new Validar();
        $validar->validarDatos();

        header("location:./views/tareo.php");
        
    } else {

        if (isset($_SESSION["error"])) {            
            echo '<div class="alert alert-warning">
                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                <strong>Warning!</strong> <p>Usuario y/o contraseña incorrecto</p>
            </div>';
            unset($_SESSION["error"]);
    
        }

        include_once("./views/login.php");
    }
/*
    if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {
        
        require_once("models/Validar.php");
        $validar = new Validar();
        $validar->validarDatos();

        header("location:./views/tareo.php");
        
    } else {

        if (isset($_SESSION["error"])) {            
            echo '<div class="alert alert-warning">
                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                <strong>Warning!</strong> <p>Usuario y/o contraseña incorrecto</p>
            </div>';
            unset($_SESSION["error"]);
    
        }

        include_once("views/login.php");
    }
    */
?>