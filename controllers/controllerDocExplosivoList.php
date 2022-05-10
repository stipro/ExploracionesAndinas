<?php
header('Content-type: application/json; charset=utf-8');
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if($_POST){
    $table = 'docExplosivo';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new DocExplosivo();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "table_master_docExplosivos":
                $rptSql = $tableManager->table_master();
                break;
            case 'readRow':
                $rptSql = $tableManager->readRow($id);
                break;
            case 'getRow':
                $parament = $arrayForm['id'];
                $rptSql = $tableManager->getRow($parament);
                break;
            case 'dtl-getNombre-getCodigo_explosivo';
                $rptSql = $tableManager->get_NombreCodigo();
                break;
            case 'getColumnWhere':
                $column = $arrayForm['column'];
                $where = $arrayForm['paramentWhere'];
                $rptSql = $tableManager->getColumnWhere($column, $where);
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
    "rptController" => $rptController
);
echo json_encode($rptjsonControlller);
