<?php 

    require_once("conexion.php");

    class Validar {

        public function validarDatos() {

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
                $resultado->execute(array(":USU"=>$_SESSION["usu"], ":PASS"=>$_SESSION["pass"]));

                $cantidad_resultado = $resultado->rowCount();

                if ($cantidad_resultado == 0) {

                   header("location:controllers/CtrlSalir.php");

                } 

                
            } catch (Exception $e) {


            } finally {
                $con = null;
                $sql = null;
                $resultado = null;
                $cantidad_resultado = null;
            }
        }

    }
?>