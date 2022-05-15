<?php
header('Content-type: application/json; charset=utf-8');

//declare (strict_types = 1);
require_once '../db/conexion.php';

class extraccionMineral extends Conexion
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
    public function getAll(): array
    {
        //$query = "SELECT * FROM tareos LIMIT {$empezarDesde}, {$filasPage}";
        $query = "SELECT oper_mine.id_operacionMina, oper_mine.operacionMina_registro, oper_mine.operacionMina_turno, oper_mine.operacionMina_guardia, oper_mine.operacionMina_nVale, oper_mine.operacionMina_actividad, oper_mine.operacionMina_l, oper_mine.operacionMina_lpv, oper_mine.operacionMina_stto, oper_mine.operacionMina_serv, oper_mine.operacionMina_comentario, oper_mine.operacionMina_tipAvance, oper_mine.operacionMina_avanceMt, oper_mine.operacionMina_avanceMt3, oper_mine.operacionMina_intDisparo, oper_mine.operacionMina_Resuelto, oper_mine.operacionMina_manualCantidad, oper_mine.operacionMina_palaNombre, oper_mine.operacionMina_palaCantidad, oper_mine.operacionMina_wincheNombre, oper_mine.operacionMina_wincheCantidad, oper_mine.operacionMina_mineralCantidad, oper_mine.operacionMina_desmonCantidad FROM operacion_mina AS oper_mine;";
        return $this->ConsultaSimple($query);
    }
    public function getSelect_unidadMinera(): array
    {
        $query = "SELECT und_mn.nombre_unidadMinera, und_mn.id_unidadMinera FROM unidad_mineras AS und_mn;";
        return $this->ConsultaSimple($query);
    }
    public function getSelect_colaboradores(): array
    {
        $query = "SELECT crs.col_nombres, crs.col_apePaterno, crs.col_apeMaterno, crs.id_colaborador FROM colaboradores AS crs;";
        return $this->ConsultaSimple($query);
    }
    public function getSelect_zona(): array
    {
        $query = "SELECT lb_zn.labZona_nombre, lb_zn.id_zona FROM lab_zonas AS lb_zn;";
        return $this->ConsultaSimple($query);
    }
    public function getSelect_cCosto(): array
    {
        $query = "SELECT lb.lab_ccostos, lb.id_labor FROM labores AS lb;";
        return $this->ConsultaSimple($query);
    }
    public function getIpt_laborName($parament_id){
        $query = "SELECT lb_nm.labNombre_nombre, lb.id_labor FROM labores AS lb LEFT JOIN lab_nombres AS lb_nm ON lb.id_labNombre = lb_nm.id_labNombre WHERE lb.id_labor = '{$parament_id}'";
        return $this->ConsultaSimple($query);
    }
    public function getRecord($parament_id)
    {
        $query = "SELECT op_mn.operacionMina_registro, op_mn.operacionMina_turno, op_mn.operacionMina_guardia, op_mn.operacionMina_nVale FROM operacion_mina AS op_mn WHERE op_mn.id_operacionMina = '{$parament_id}'";
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
            fechaDigitacion_extraccionMineral,
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
            echo $e->getMessage();
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
/*
$columns = ['id_zona', 'nombre'];

$tableManager = new ValeExplosivos();
$result = $tableManager->getSelectNormal('zonas', $columns);
//print_r($result);
echo json_encode($result);
*/