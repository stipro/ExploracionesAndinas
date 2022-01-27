<?php
declare (strict_types = 1);
require_once('./../Config/config.php');
class Conexion
{
    protected $db;
    public function __construct()
    {
        $this->db = $this->conectar();
    }
    private function conectar()
    {
        try
        {

            $url_actual = $this->get_url();
            $separador = "/"; // Usar una cadena
            $ubicaciones = explode($separador, $url_actual);
            if($ubicaciones[2] == 'localhost'){

                $HOST   = '127.0.0.1';
                $DBNAME = 'explore_andina';
                $USER   = 'root';
                $PASS   = '';
                $con    = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASSWORD);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $con->exec('SET CHARACTER SET UTF8');
            }else{
                $HOST   = '127.0.0.1';
                $DBNAME = 'explore_andina';
                $USER   = 'root';
                $PASS   = '';
                $con    = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASSWORD);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $con->exec('SET CHARACTER SET UTF8');
            }
        }
        catch (PDOException $e)
        {
            echo "No se pudo conectar a la BD: " . $e->getMessage();
        }
        finally {
        
            return $con;
        }
    }
    public function get_url(){
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $url = "https://"; 
        }
        else{
            $url = "http://"; 
        }
        return $url . $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];
        //return $_SERVER['REQUEST_URI'];
    }

    //  Es el método recomendado cuando se esperan pocos datos.
    protected function ConsultaSimple(string $query): array
    {
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    //  Es el método recomendado cuando se esperan muchos datos.
    protected function ConsultasPesadas(string $query): array
    {
        return $this->db->query($query)->fetch(PDO::FETCH_ASSOC);
    }

    protected function ConsultaCompleja(string $table, string $where, array $array): array
    {
        $query  = "SELECT * FROM {$table} {$where}";
        $result = $this->db->prepare($query);
        $result->execute($array);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
