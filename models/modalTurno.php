<?php
header('Content-type: application/json; charset=utf-8');

//declare (strict_types = 1);
require_once '../db/conexion.php';

class turno extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getidTable(string $table, string $column)
    {
        $query = "SELECT MAX({$column}) AS id FROM {$table}";
        return $this->ConsultaSimple($query);
    }
    public function getSelect(string $idTable, string $table, string $column)
    {
        $query = "SELECT {$idTable}, {$column} FROM {$table}";
        return $this->ConsultaSimple($query);
    }
    /*  EJEMPLO OBTENER UNA LISTA SEGUN SOLICITADO
    public function getCustom_Select(string $table, array $columns): array
    {

        $query = "SELECT ";
        foreach($columns as $name)
        {
            $query .= $table.'.'.$name.' ';
        };
        $query .= "FROM {$table}";
        return $this->ConsultaSimple($query);
    }*/
}