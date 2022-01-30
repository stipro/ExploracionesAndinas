<?php
header('Content-type: application/json; charset=utf-8');
// Verifico si se recibio Informacion
if($_POST){
    $rptSql= '';
    $rptController = 'Se recibio datos';
    try {
        // Requiero Modelo ()
        require_once ('./../models/nav.php');
        // Instancio Clase
        $tableManager = new Nav();
        if(array_key_exists('data', $_POST)){
            $arrayForm = json_decode($_POST['data'],true);
            
        }
        else{
            $arrayForm = json_decode($_POST['id_Usuario'],true);
        }
        // Descodifico Formulario
        

        $rptSql = $tableManager->getAll($arrayForm);
        echo json_encode($rptSql);

    } catch (Exception $e) {
        //throw $th;
    }

}
?>