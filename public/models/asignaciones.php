<?php
// Mostramos en formato Json
header('Content-type: application/json; charset=utf-8');
// Modo estricto
// declare (strict_types = 1);
// Requerimos conexion
require_once ('../db/conexion.php');

// Clase hereda classe conexion
class usuario extends Conexion
{
    protected $table;
    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->table = 'asignaciones';
    }
    // Funcion para insertar datos
    public function getAll(){
        $query = "SELECT * FROM {$this->table} WHERE usuario_id ='1'";
        return $this->ConsultaSimple($query);
    }
}
$tableManager = new usuario();
$rpt = $tableManager->getAll();
print_r($rpt);

?>