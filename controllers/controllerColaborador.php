<?php
if($_POST){
    $table = 'colaboradores';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new Colaboradores();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "insert":
                $listInsert = $arrayForm['form'];
                $dato1 = $listInsert['item1'];
                $dato2 = $listInsert['item2'];
                $dato3 = $listInsert['item3'];
                $dato4 = $listInsert['item4'];
                $dato5 = $listInsert['item5'];
                $dato6 = $listInsert['item6'];
                $dato7 = $listInsert['item7'];
                $dato8 = $listInsert['item8'];
                $dato9 = $listInsert['item9'];
                $rptSql = $tableManager->insert($dato1, $dato2, $dato3, $dato4, intval($dato5), $dato6, $dato7, $dato8, intval($dato9));
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
                $rptSql = $tableManager->edit($datoid, $dato1, $dato2, $dato3, $dato4, $dato5, $dato6, $dato7);
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