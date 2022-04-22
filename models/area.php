<?php
header('Content-type: application/json; charset=utf-8');

//declare (strict_types = 1);
require_once '../db/conexion.php';

class area extends Conexion
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
    public function getSelectNormal(string $table, array $columns):array
    {
        $query = "SELECT {$columns[0]}, {$columns[1]} FROM {$table}";
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
    
    //OBTIENE TODA LA TABLA
    public function getSelect_area(): array
    {
        $query = "SELECT area.area_nombre, area.id_area FROM areas AS area;";
        return $this->ConsultaSimple($query);
    }
    public function insert($formRequest)
    {
        try 
        {
            $sqlrpt = '';
            $rptSql = '';
            $lastcolIdsql = '';
            $query = "INSERT INTO extraccion_mineral (
            fechaRegistro_extraccionMineral,
            fechaExtraccion_extraccionMineral,
            horasExtraccion_extraccionMineral,
            locomotora_extraccionMineral,
            tolva_extraccionMineral, 
            nivel_extraccionMineral,
            unidadMineral_id, 
            motorista_id, 
            ayudante_id, 
            zona_id,
            turno_extraccionMineral)
            VALUES (
            :item1,
            :item2,
            :item3,
            :item4,
            :item5,
            :item6,
            :item7,
            :item8,
            :item9,
            :item10, 
            :item11)";
            $insertValue = $this->db->prepare($query);
            foreach ($formRequest as $clave) {
                $insertValue->bindParam(':item1', $clave['fech_extraccion'], PDO::PARAM_STR);
                $insertValue->bindParam(':item2', $clave['fech_extraccion'], PDO::PARAM_STR);
                $insertValue->bindParam(':item3', $clave['hora'], PDO::PARAM_STR);
                $insertValue->bindParam(':item4', $clave['Locomotora'], PDO::PARAM_STR);
                $insertValue->bindParam(':item5', $clave['tolva'], PDO::PARAM_STR);
                $insertValue->bindParam(':item6', $clave['nivel'], PDO::PARAM_STR);
                $insertValue->bindParam(':item7', $clave['id_unidadMinera'], PDO::PARAM_STR);
                $insertValue->bindParam(':item8', $clave['id_motorista'], PDO::PARAM_STR);
                $insertValue->bindParam(':item9', $clave['id_ayudante'], PDO::PARAM_STR);
                $insertValue->bindParam(':item10', $clave['id_zona'], PDO::PARAM_STR);
                $insertValue->bindParam(':item11', $clave['turno'], PDO::PARAM_STR);
                $sqlrpt = $insertValue->execute();
                $lastcolIdsql = $this->db->lastInsertId();
            }
            /**
             * 
             * 
             * @author
             * 
             * 
             */
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente Extraccion Mineral",
                    "id" => $lastcolIdsql
                ];
            }
            else{
                echo "\nPDO::errorInfo():\n";
                print_r($insertValue->errorInfo());
            }
            return $rptSql;
        }
        catch (PDOException $e)
        {
            //$this->db->rollback();
            
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
        finally {
            //print_r($this->db->errorInfo());
        }
    }

    public function delete(int $id)
    {
        //error_reporting(0);
        try {
            $query  = "DELETE FROM operacion_mina WHERE id_operacionMina=:id;";
            $result = $this->db->prepare($query);
            $result->execute(array(':id' => $id));
            return 'Se elimino correctamente.';
        } catch (PDOException $e) {
            return 'Ocurrio un ERROR al eliminar a'. $e->getMessage();
        }
    }
    public function edit(int $datoid, string $codigo, string $nombre, string $cargo, string $dia, string $turno, int  $ht, int $htseradi, string $ccostos, string $labor, int $nivel, int $he, int  $heseradi, int  $ccostoshe, string $zona, string $guardia, string  $actividad, string $area)
    {
        //error_reporting(0);
        try {
            $query  = "UPDATE tareos SET codigo=:codigo, nombre=:nombre, cargo=:cargo, dia=:dia turno=:turno, ht=:ht, h_serv_ad=:htseradi, ccostos=:ccostos labor=:labor, nivel=:nivel, he=:he, heSer_Ad=:heseradi cCostosHe=:ccostoshe, vB=:zona, guardia=:guardia, Cod_Actividad=:actividad area=:area WHERE id_tareo=:datoid;";
            $result = $this->db->prepare($query);
            $result->execute(array(':datoid' => $datoid, 
            ':codigo' => $codigo, 
            ':nombre' => $nombre, 
            ':cargo' => $cargo, 
            ':dia' => $dia,
            ':turno' => $turno, 
            ':ht' => $ht, 
            ':htseradi' => $htseradi, 
            ':ccostos' => $ccostos,
            ':labor' => $labor, 
            ':nivel' => $nivel, 
            ':he' => $he, 
            ':heseradi' => $heseradi,
            ':ccostoshe' => $ccostoshe, 
            ':zona' => $zona, 
            ':guardia' => $guardia, 
            ':actividad' => $actividad,
            ':area' => $area
        ));
            if ($result->rowCount()) {
                return 'Se edito correctamente.';
            } else {
                return 'IGUAL';
            }
        } catch (PDOException $e) {
            return 'ERROR';
        }

    }

    public function getSearch(string $table, string $termiCol, string $termino): array
    {
        //$where = "WHERE " . $termiCol . " LIKE :termino ORDER BY ccostos ASC";
        $where = "WHERE " . $termiCol . " LIKE :termino ORDER BY id_labExplosivos ASC";
        $array = array(':termino' => '%' . $termino . '%');
        //$this->getPagination($where, $array);
        //return $array;
        //return $array;
        return $this->ConsultaCompleja($table, $where, $array);
    }

    public function getPaginationSearch(string $where, array $array): array
    {
        $query = "SELECT COUNT(*) FROM tareos {$where}";
        $result = $this->db->prepare($query);
        $result->execute($array);
        return array(
            'filasTotal'  => intval($result->fetch(PDO::FETCH_BOTH)[0]),
            'filasPagina' => 3,
        );
    }

    public function getPaginationAll(): array
    {
        $query = "SELECT COUNT(*) FROM tareos;";
        return array(
            'filasTotal'  => intval($this->db->query($query)->fetch(PDO::FETCH_BOTH)[0]),
            'filasPagina' => 3,
        );
    }


}