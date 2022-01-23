<?php
// Mostramos en formato Json
header('Content-type: application/json; charset=utf-8');
// Modo estricto
// declare (strict_types = 1);
// Requerimos conexion
require_once ('../db/conexion.php');

//Clase hereda classe conexion
class operacionMina extends Conexion
{
    private $table;
    // Constructor
    public function __construct()
    {
        parent::__construct();
    }
    // Funcion para insertar tados
    public function insert($table){
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}


?>