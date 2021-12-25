<?php
if($_POST){
    $table = 'zonas';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new Zonas();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "insertar":
                $listInsert = $arrayForm['list'];
                $dato1 = $listInsert['item1'];
                $dato2 = $listInsert['item2'];
                $rptSql = $tableManager->insert($dato1, $dato2);
                break;
            case "editar":
                $listUpdate = $arrayForm['list'];
                $datoid = $listUpdate['id'];
                $dato1 = $listUpdate['item1'];
                $dato2 = $listUpdate['item2'];
                $rptSql = $tableManager->edit($datoid, $dato1, $dato2);
                break;
            case "eliminar":
                $listDelete = $arrayForm['list'];
                $datoid = $listDelete;
                $rptSql = $tableManager->delete($datoid);
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
?>