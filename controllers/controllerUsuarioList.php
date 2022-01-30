<?php
header('Content-type: application/json; charset=utf-8');
// Verifico si se recibio Informacion //
if($_POST){
    // Variable para almacenar respuesta de controller //
    $rptController = 'Se recibio datos';
    // Nombre del Modelo //
    $nameModel = 'usuarios';
    // Nombre del Tabla //
    $nameTable = 'usuarios';
    // Varible almacenar respuesta Sql //
    $rptSql='';
    // Capturamos posibles errores //
    try {
        // Requiero modelo //
        require_once '../models/'.$nameModel.'.php';
        // Instanciamos la clase //
        $tableManager = new Usuarios();
        // Decodificamos //
        $arrayForm = json_decode($_POST['data'],true);
        // Almaceno Accion //
        $accion = $arrayForm['accion'];
        // Verfico que Accion //
        switch ($variable) {
            case 'value':
                # code...
                break;
            
            default:
                # code...
                break;
        }
    } catch (Exception $e) {
        //throw $th;
    }
}
else{
    $rptController = 'no Se recibio datos';
}
$rptjsonControlller = array(
    "sql" => $rptSql,
    "rptController" => $rptController,
);
echo json_encode($rptjsonControlller);

?>