<?php
if($_POST){
    $table = 'usuarios';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new Usuarios();
        $arrayForm = json_decode($_POST['data'],true);
        $accion = $arrayForm['accion'];
        switch ($accion) {
            case "insert":
                $listInsert = $arrayForm['form'];
                // Generando codigo Usuario
                $fullName = $listInsert['colaboradorNombre'];
                $Names = explode(" ", $fullName);
                $paterno = $Names[0];
                $materno = $Names[1];
                $nombre = $Names[2];
                $codUser = $paterno[0].$materno[0].$nombre[0];
                /* Secure password hash, Hash de contraseña segura */
                $dato3 = password_hash($listInsert['clave'], PASSWORD_DEFAULT);
                // Obteniendo Fecha
                $fechaRegistro = date("Y-m-d H:i:s");
                // listando
                $dato1 = $codUser;
                $dato2 = $listInsert['usuario'];
                $dato3 = $dato3;
                $dato4 = $listInsert['tipo'];
                $dato5 = $listInsert['correo'];
                $dato6 = $listInsert['estado'];
                $dato7 = $fechaRegistro;
                $dato8 = $listInsert['colaboradorId'];
                $rptSql = $tableManager->insert($dato1, $dato2, $dato3, $dato4, $dato5, $dato6, $dato7, intval($dato8));
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
                //$rptSql = $tableManager->edit($datoid, $dato1, $dato2, $dato3, $dato4, $dato5, $dato6, $dato7);
                break;
            case "eliminar":
                $listDelete = $arrayForm['list'];
                $datoid = $listDelete;
                //$rptSql = $tableManager->delete($datoid);
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