<?php
if($_POST){
    $table = 'madera';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new Madera();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "insert":
                $listInsert = $arrayForm['form'];
                $dato1 = $listInsert['item1'];
                $dato2 = $listInsert['item2'];
                $dato3 = $listInsert['item3'];
                $rptSql = $tableManager->create($dato1, $dato2, $dato3);
                break;
            case "editar":
                $listUpdate = $arrayForm['list'];
                $datoid = $listUpdate['id'];
                $dato1 = $listUpdate['item1'];
                $dato2 = $listUpdate['item2'];
                $dato3 = $listUpdate['item3'];
                $dato4 = $listUpdate['item4'];
                $dato5 = $listUpdate['item5'];
                $dato6 = $listUpdate['item6'];
                $dato7 = $listUpdate['item7'];
                $rptSql = $tableManager->update($datoid, $dato1, $dato2, $dato3, $dato4, $dato5, $dato6, $dato7);
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