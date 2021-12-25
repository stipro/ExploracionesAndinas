<?php
require_once './db/conexion.php';

class ExportExcel extends Conexion{

    public function __construct()
    {
        parent::__construct();
    }
    public function getData(string $table){
        # Preparamos la consulta
        $consulta = "SELECT * FROM {$table}";
        # Ejecutamos la consulta
        $resultExcel = $this->db->query($consulta);
        # $resultExcel->execute(); SOLO CON QUERY
        return $resultExcel;
    }
}
?>