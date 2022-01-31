<?php
// Mostramos en formato Json
header('Content-type: application/json; charset=utf-8');
// Modo estricto
// declare (strict_types = 1);
// Requerimos conexion
require_once ('../db/conexion.php');

// Clase hereda classe conexion
class detallSession extends Conexion
{
    protected $table;
    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->table = 'usuarios';
    }
    // Funcion para insertar datos
    public function insert_infoPhp($formInsert){
        try {
            $query = "INSERT INTO detalle_session_php (ipPublica, nombreServer, paginaProcedente, puertoConectado, agenteNavegacion, nombreHost, ipConectado) 
                            VALUES (:item1,:item2,:item3,:item4,:item5,:item6,:item7)";
            $insertValue = $this->db->prepare($query);
            $insertValue->bindParam(':item1', $formInsert['ipPublica'], PDO::PARAM_STR);
            $insertValue->bindParam(':item2', $formInsert['nombreServer'], PDO::PARAM_STR);
            $insertValue->bindParam(':item3', $formInsert['paginaProcedente'], PDO::PARAM_STR);
            $insertValue->bindParam(':item4', $formInsert['puertoConectado'], PDO::PARAM_STR);
            $insertValue->bindParam(':item5', $formInsert['agenteNavegacion'], PDO::PARAM_STR);
            $insertValue->bindParam(':item6', $formInsert['nombreHost'], PDO::PARAM_STR);
            $insertValue->bindParam(':item7', $formInsert['ipConnected'], PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamen detalle_session_php",
                    "id" => $lastcolIdsql
                ];
            }
            return $rptSql;
                
        } catch (PDOException $e) {
            
            if($e->getCode() == 23000){
                $messageUser = "Se duplico n° de Vale";
            }
            elseif ($e->getCode() == 22001) {
                $messageUser = "Tamaño excedido";
            }
            elseif ($e->getCode() == 'HY000') {
                $messageUser = "Tipo de valor incorrecto";
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
    }
    // Funcion para insertar datos
    public function insert_infoJs($formInsert2){
        try {
            if(!array_key_exists('error', $formInsert2)){
                $columnsSql = 'ip, ciudad, pais, loc, org, postal, timezone,';
                $valueSql = ':item1, :item2, :item3, :item4, :item5, :item6, :item7,';
            }
            else{
                $columnsSql = '';
                $valueSql = '';
            }          
            $query = "INSERT INTO detalle_session_js ({$columnsSql} tipoDispositivo) 
                            VALUES ({$valueSql} :item8)";
            $insertValue = $this->db->prepare($query);
            if(!array_key_exists('error', $formInsert2)){
                $insertValue->bindParam(':item1', $formInsert2['ipInfo']['ip'], PDO::PARAM_STR);
                $insertValue->bindParam(':item2', $formInsert2['ipInfo']['ciudad'], PDO::PARAM_STR);
                $insertValue->bindParam(':item3', $formInsert2['ipInfo']['pais'], PDO::PARAM_STR);
                $insertValue->bindParam(':item4', $formInsert2['ipInfo']['loc'], PDO::PARAM_STR);
                $insertValue->bindParam(':item5', $formInsert2['ipInfo']['org'], PDO::PARAM_STR);
                $insertValue->bindParam(':item6', $formInsert2['ipInfo']['postal'], PDO::PARAM_STR);
                $insertValue->bindParam(':item7', $formInsert2['ipInfo']['timezone'], PDO::PARAM_STR);
            }
            $insertValue->bindParam(':item8', $formInsert2['tipoDispositivo'], PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente detalle_session_js",
                    "id" => $lastcolIdsql
                ];
            }
            return $rptSql;
        } catch (PDOException $e) { 
            if($e->getCode() == 23000){
                $messageUser = "Se duplico n° de Vale";
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
    }
    // Funcion para insertar datos
    public function inser_UsuarioSession($id, $rptSql, $rptSql2){
        try {
            $query = "INSERT INTO usuario_session (usuario_id, detalleSession_id, tipoInfo_Session) 
                            VALUES (:item1, :item2, :item3)";
            $insertValue = $this->db->prepare($query);
            $insertValue->bindParam(':item1', $id, PDO::PARAM_STR);
            $insertValue->bindParam(':item2', $rptSql['id'], PDO::PARAM_STR);
            $insertValue->bindParam(':item3', $rptSql2['id'], PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente detalle_session_js",
                    "id" => $lastcolIdsql
                ];
            }
            return $rptSql;
        } catch (PDOException $e) { 
            if($e->getCode() == 23000){
                $messageUser = "Se duplico n° de Vale";
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
    } 

}
/*
$tableManager = new usuario();
$rpt = $tableManager->getPermisos_Usuario();
print_r($rpt);*/

?>