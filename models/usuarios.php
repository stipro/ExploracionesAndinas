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
    public function insert(string $dato1, string $dato2, string $dato3, string $dato4, string $dato5, $dato6, $dato7, int $dato8)
    {
        try 
        {
            $query = "INSERT INTO usuarios (codigo_usuario, nombre_usuario, clave_usuario, usuario_tipo, correo_usuario, estado_usuario, usuario_fechaRegistro, colaborador_id) 
                            VALUES (:item1, :item2, :item3, :item4, :item5, :item6, :item7, :item8)";
            $result = $this->db->prepare($query);
            $result->bindParam(':item1', $dato1, PDO::PARAM_STR);
            $result->bindParam(':item2', $dato2, PDO::PARAM_STR);
            $result->bindParam(':item3', $dato3, PDO::PARAM_STR);
            $result->bindParam(':item4', $dato4, PDO::PARAM_STR);
            $result->bindParam(':item5', $dato5, PDO::PARAM_STR);
            $result->bindParam(':item6', $dato6, PDO::PARAM_STR);
            $result->bindParam(':item7', $dato7, PDO::PARAM_STR);
            $result->bindParam(':item8', $dato8, PDO::PARAM_STR);
            $sqlrpt = $result->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente Usuario",
                    "id" => $lastcolIdsql
                ];
            }
            else{
                echo "\nPDO::errorInfo():\n";
                print_r($result->errorInfo());
            }
            return $rptSql;

        } catch (PDOException $e) {
            //$this->db->rollback();
            
            if($e->getCode() == 23000){
                $messageUser = "Usuario ya registrado";
            }
            elseif($e->getCode() == '21S01'){
                $messageUser = "Los parametros no coinciden";
            }
            elseif ($e->getCode() == 'HY000') {
                $messageUser = "Tipo de valor incorrecto";
            }
            elseif ($e->getCode() == 'HY093') {
                $messageUser = "Los token son incorrectos";
            }
            else{
                $messageUser = "";
            }
            $rptSql = [
                "estado" => 0,
                "messageDeveloper" => "Se encontro ERROR ".$e->getMessage(),
                "messageUser" => $messageUser,
                "codigo" => $e->getCode(),
                "string" => $e->__toString(),
            ];
            return $rptSql;
        }
        finally {
            //print_r($this->db->errorInfo());
        }
    }
}/* 
$tableManager = new usuarios();
$rpt = $tableManager->getPermisos_Usuario();
print_r($rpt); */
?>