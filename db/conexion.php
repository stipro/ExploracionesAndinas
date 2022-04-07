<?php
//declare (strict_types = 1);
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
            //var_dump($ubicaciones);
            if($ubicaciones[2] == 'localhost'){

                $HOST   = '127.0.0.1';
                $DBNAME = 'explore_andina';
                $USER   = 'root';
                $PASS   = '';
                $con    = new PDO("mysql:host={$HOST}; dbname={$DBNAME}", $USER, $PASS);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $con->exec('SET CHARACTER SET UTF8');
            }
            elseif($ubicaciones[2] == '179.43.97.31'){
                $HOST   = '127.0.0.1';
                $DBNAME = 'explore_andina';
                $USER   = 'root';
                $PASS   = 'misterio1';
                $con    = new PDO("mysql:host={$HOST}; dbname={$DBNAME}", $USER, $PASS);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $con->exec('SET CHARACTER SET UTF8');
            }
            else{
                $HOST   = '127.0.0.1';
                $DBNAME = 'corpm4en_explore_andina';
                $USER   = 'corpm4en';
                $PASS   = 'temporal2022';
                $con    = new PDO("mysql:host={$HOST}; dbname={$DBNAME}", $USER, $PASS);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $con->exec('SET CHARACTER SET UTF8');
            }
            return $con;
        }
        catch (PDOException $e)
        {
            $rptController.='No se pudo conectar a la BD: ' . $e->getMessage();
            //echo "No se pudo conectar a la BD: " . $e->getMessage();
        }
        finally {
        
            
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
