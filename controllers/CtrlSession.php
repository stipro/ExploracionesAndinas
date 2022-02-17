<?php
$rptController = '';
// Verifico si se recibio Informacion //
if ($_GET) {
    $idUsuario = $_GET["id"];
    // Nombre del Modelo //
    $nameModel = 'login';
    //Llamamos al modelo
    require_once('../models/'.$nameModel.'.php');
    //Instanciamos
    $tableManager = new login();
    // Enviamos datos
    $result = $tableManager->update_session($idUsuario, '0');
    if($result){
        header("location:./../public/index.php");
    }
}
else{
    $rptController = 'no se recibio datos';
}
echo $rptController;
?>