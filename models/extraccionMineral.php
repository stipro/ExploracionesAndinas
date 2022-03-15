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
        $query = "SELECT oper_mine.id_operacionMina, oper_mine.operacionMina_registro, oper_mine.operacionMina_turno, oper_mine.operacionMina_guardia, oper_mine.operacionMina_nVale, oper_mine.operacionMina_actividad, oper_mine.operacionMina_l, oper_mine.operacionMina_lpv, oper_mine.operacionMina_stto, oper_mine.operacionMina_serv, oper_mine.operacionMina_comentario, oper_mine.operacionMina_tipAvance, oper_mine.operacionMina_avanceMt, oper_mine.operacionMina_avanceMt3, oper_mine.operacionMina_intDisparo, oper_mine.operacionMina_Resuelto, oper_mine.operacionMina_manualCantidad, oper_mine.operacionMina_palaNombre, oper_mine.operacionMina_palaCantidad, oper_mine.operacionMina_wincheNombre, oper_mine.operacionMina_wincheCantidad, oper_mine.operacionMina_mineralCantidad, oper_mine.operacionMina_desmonCantidad FROM operacion_mina AS oper_mine";
        return $this->ConsultaSimple($query);
    }
    public function getSelect_unidadMinera(): array
    {
        $query = "SELECT und_mn.nombre_unidadMinera, und_mn.id_unidadMinera FROM unidad_mineras AS und_mn";
        return $this->ConsultaSimple($query);
    }
    public function getSelect_colaboradores(): array
    {
        $query = "SELECT crs.col_nombres, crs.col_apePaterno, crs.col_apeMaterno, crs.id_colaborador FROM colaboradores AS crs";
        return $this->ConsultaSimple($query);
    }
    public function getSelect_zona(): array
    {
        $query = "SELECT lb_zn.labZona_nombre, lb_zn.id_zona FROM lab_zonas AS lb_zn";
        return $this->ConsultaSimple($query);
    }
    public function getRecord($parament_id)
    {
        $query = "SELECT op_mn.operacionMina_registro, op_mn.operacionMina_turno, op_mn.operacionMina_guardia, op_mn.operacionMina_nVale FROM operacion_mina AS op_mn WHERE op_mn.id_operacionMina='{$parament_id}'";
        return $this->ConsultaSimple($query);
    }
    public function insert($dato1, $dato2, $dato3, $dato4, $dato5, $dato6, $dato7, $dato8, $dato9, $dato10, $dato11, $dato12, $dato13, $dato14, $dato15, $dato16, $dato17, $dato18, $dato19, $dato20, $dato21, $dato22, $dato23)
    {
        try 
        {
            $query = "INSERT INTO operacion_mina (
            operacionMina_registro, 
            operacionMina_turno, 
            operacionMina_guardia, 
            operacionMina_nVale, 
            operacionMina_actividad, 
            id_labor, 
            operacionMina_l, 
            operacionMina_lpv, 
            operacionMina_stto, 
            operacionMina_serv, 
            operacionMina_comentario, 
            operacionMina_tipAvance, 
            operacionMina_avanceMt, 
            operacionMina_avanceMt3, 
            operacionMina_intDisparo, 
            operacionMina_Resuelto, 
            operacionMina_manualCantidad, 
            operacionMina_palaNombre, 
            operacionMina_palaCantidad, 
            operacionMina_wincheNombre, 
            operacionMina_wincheCantidad, 
            operacionMina_mineralCantidad, 
            operacionMina_desmonCantidad) 
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
            :item11,
            :item12,
            :item13,
            :item14,
            :item15,
            :item16,
            :item17,
            :item18,
            :item19,
            :item20,
            :item21,
            :item22,
            :item23)";
            $insertValue = $this->db->prepare($query);
            $insertValue->bindParam(':item1', $dato1, PDO::PARAM_STR);
            $insertValue->bindParam(':item2', $dato2, PDO::PARAM_STR);
            $insertValue->bindParam(':item3', $dato3, PDO::PARAM_STR);
            $insertValue->bindParam(':item4', $dato4, PDO::PARAM_STR);
            $insertValue->bindParam(':item5', $dato5, PDO::PARAM_STR);
            $insertValue->bindParam(':item6', $dato6, PDO::PARAM_STR);
            $insertValue->bindParam(':item7', $dato7, PDO::PARAM_STR);
            $insertValue->bindParam(':item8', $dato8, PDO::PARAM_STR);
            $insertValue->bindParam(':item9', $dato9, PDO::PARAM_STR);
            $insertValue->bindParam(':item10', $dato10, PDO::PARAM_STR);
            $insertValue->bindParam(':item11', $dato11, PDO::PARAM_STR);
            $insertValue->bindParam(':item12', $dato12, PDO::PARAM_STR);
            $insertValue->bindParam(':item13', $dato13, PDO::PARAM_STR);
            $insertValue->bindParam(':item14', $dato14, PDO::PARAM_STR);
            $insertValue->bindParam(':item15', $dato15, PDO::PARAM_STR);
            $insertValue->bindParam(':item16', $dato16, PDO::PARAM_STR);
            $insertValue->bindParam(':item17', $dato17, PDO::PARAM_STR);
            $insertValue->bindParam(':item18', $dato18, PDO::PARAM_STR);
            $insertValue->bindParam(':item19', $dato19, PDO::PARAM_STR);
            $insertValue->bindParam(':item20', $dato20, PDO::PARAM_STR);
            $insertValue->bindParam(':item21', $dato21, PDO::PARAM_STR);
            $insertValue->bindParam(':item22', $dato22, PDO::PARAM_STR);
            $insertValue->bindParam(':item23', $dato23, PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente Operacion Mina",
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
/*
$columns = ['id_zona', 'nombre'];

$tableManager = new ValeExplosivos();
$result = $tableManager->getSelectNormal('zonas', $columns);
//print_r($result);
echo json_encode($result);
*/