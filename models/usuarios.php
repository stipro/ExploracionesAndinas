<?php
// Mostramos en formato Json
header('Content-type: application/json; charset=utf-8');
// Modo estricto
// declare (strict_types = 1);
// Requerimos conexion
require_once ('../db/conexion.php');

// Clase hereda classe conexion
class usuarios extends Conexion
{
    protected $table;
    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->table = 'usuarios';
    }
    // Funcion para insertar datos
    public function getAll(){
        $query = "SELECT * FROM {$this->table}";
        return $this->ConsultaSimple($query);
    }
    public function getPermisos_Usuario(){
        $query = "SELECT * FROM {$this->table} INNER JOIN asignaciones ON id_usuario = usuario_id WHERE id_usuario ='1'";
        return $this->ConsultasPesadas($query);
    }
}
$tableManager = new usuarios();
$rpt = $tableManager->getPermisos_Usuario();
print_r($rpt);

?>