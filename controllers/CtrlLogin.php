<?php
header('Content-type: application/json; charset=utf-8');
// Verifico si se recibio Informacion //
if($_POST){
    // Variable para almacenar respuesta de controller //
    $rptController = 'Se recibio datos, ';
    // Nombre del Modelo //
    $nameModel = 'login';
    // Nombre del Tabla //
    $nameTable = 'usuarios';
    try {
        // Decodificamos //
        $array = json_decode($_POST['data'],true);

        //Guardamos en array
        $arraydos = $array['contenido'];

        //GUARDAMOS VALOR EN SU VARIABLE
        $user = $arraydos['usuario'];
        $password = $arraydos['clave'];

        // VALIDAMOS CONTENIDO
        if(isset($user) && isset($password)){

            //Llamamos al modelo
            require_once('../models/'.$nameModel.'.php');

            //Instanciamos
            $tableManager = new login();

            // Enviamos datos
            $result = $tableManager->validarDatos($user, $password);

            // Obtenemos la cantidad del resultado
            $cantidadResultado = count($result);
            
            // Validamos Login
            if($cantidadResultado){
                //session_start();
                $rptController = 'Se encontro Usuario';
                $sqlrpt_Estado = $tableManager->validarEstado($user, $password);
                $sqlId_User = $sqlrpt_Estado[0]['id_usuario'];
                $sqlEstado_User = $sqlrpt_Estado[0]['estado_usuario'];
                $sqlSession_User = $sqlrpt_Estado[0]['session_usuario'];
                $sqlToken_User = $sqlrpt_Estado[0]['token'];
                $tokenGenerado = '';

                if ($sqlEstado_User == 0) {
                    $rptController .= ', pero esta desactivado. ';
                } elseif ($sqlEstado_User == 1 && $sqlSession_User == 1) {
                    $rptController .= ', pero esta conectado, Desea cerrar session? ';
                } else {
                    $rptController .= ', Acceso concedido. ';
                    // Enviamos datos
                    $result = $tableManager->update_session($sqlId_User, '1');
                    session_start();
                    $hora = date('H:i');
                    $session_id = session_id();
                    $token = hash('sha256', $hora.$session_id);
                    $_SESSION['token'] = $token;
                    $tokenGenerado = $_SESSION['token'];
                    $_SESSION["id"] = $sqlrpt_Estado[0]['id_usuario'];
                    $_SESSION["username"] = $sqlrpt_Estado[0]['nombre_usuario'];
                    $_SESSION["clave"] = $sqlrpt_Estado[0]['clave_usuario'];
                    $_SESSION["name"] = $sqlrpt_Estado[0]['col_nombres'];
                    //$_SESSION["code"] = $result[0]['col_ccostos'];
                }
                $rptSql = array(
                    'Id' => $sqlId_User,
                    'Estado' => $sqlEstado_User,
                    'Sesion' => $sqlSession_User,
                    'Token' => $tokenGenerado
                );
            }
            else{
                $rptSql = 'No existe Usuario ';
                $validador = FALSE;
            }
        }
        else{
            $rptController = 'Faltan datos';
        }
        /*
        if (isset($_POST["usu"]) && isset($_POST["pass"])) {

            require_once("../models/login.php");
            $validar = new Login();
            $validar->validarDatos($_POST["usu"], $_POST["pass"]);
            echo $validar;

        } else {
            header("location:../index.php");
        }*/
    } catch (Exception $e) {
        //throw $th;
    }
}
else{
    $rptController = 'no se recibio datos';
}
$rptjsonControlller = array(
    'sql' => $rptSql,
    'rptController' => $rptController
);
echo json_encode($rptjsonControlller);
?>