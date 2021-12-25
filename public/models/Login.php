<?php
//declare (strict_types = 1);
require_once('./../db/conexion.php');

class Login extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }
    public function validarDatos(string $user, string $password)
    {
        try {
            //Declaramos Variables
            $sql = null;
            $resultado = null;
            $validador = FALSE;

            // Consulta
            $sql = "SELECT colaboradores.col_nombres, colaboradores.col_ccostos, usuarios.id_usuario, usuarios.nombre_usuario, usuarios.clave_usuario, usuarios.estado_usuario FROM colaboradores RIGHT JOIN usuarios ON usuarios.id_colaborador = colaboradores.id_colaborador WHERE nombre_usuario = '{$user}' AND clave_usuario = '{$password}'";

            // Resultado
            $resultado = $this->ConsultaSimple($sql);

            //Retornamos Resultado
            return $resultado;
        } 
        catch (PDOException $e) {
            //throw $th;
        }
    }
}
    /*
    require_once("Conexion.php");

    class Login {

        public function validarDatos($usu, $pass) {

            try {
                $con = null;
                $sql = null;
                $resultado = null;
                $cantidad_resultado = null;

                // Recuperamos la conexión
                $con = Conexion::getConection();

                // Validación de error
                if ($con == "ERROR") {
                    header("location:CtrlSalir.php");
                }

                // Consulta
                $sql = "SELECT * FROM usuarios WHERE nombre_usuario = :USU AND clave_usuario = :PASS";

                $resultado = $con->prepare($sql);
                $resultado->execute(array(":USU"=>$usu, ":PASS"=>$pass));
                echo $resultado->fetchAll();
                $cantidad_resultado = $resultado->rowCount();

                session_start();

                if ($cantidad_resultado == 1) {
                    $_SESSION["usu"] = $usu;
                    $_SESSION["pass"] = $pass;  

                } else {
                    $_SESSION["error"] = "ERROR";

                }

                
            } catch (Exception $e) {


            } finally {

                $con = null;
                $sql = null;
                $resultado = null;
                $cantidad_resultado = null;

                header("location:../index.php");

            }

        }

    }
    */
?>