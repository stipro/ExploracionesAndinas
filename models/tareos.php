<?php
//declare (strict_types = 1);
require_once '../db/conexion.php';

class Tareos extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }
    //OBTIENE TODA LA TABLA
    public function tbl_master(): array
    {
        //$query = "SELECT * FROM tareos LIMIT {$empezarDesde}, {$filasPage}";
        $query = "SELECT tr.id_tareo, tr.tareo_nTarjeta,
        clb.col_dni, CONCAT(clb.col_apePaterno, ' ', clb.col_apeMaterno, ' ', clb.col_nombres) AS fullName,
        cg.cargo_nombre, ae.area_nombre, tr.tareo_dia, tr.tareo_turno, tr.tareo_guardia, tr.tareo_actividad,
        lb.lab_ccostos, lb_zn.labZona_nombre, lb_nm.labNombre_nombre, lb.lab_nivel,
        tr.tareo_he, tr.tareo_ht_serv_ad, tr.tareo_he_ser_ad, tr.tareo_cc_ser_ad, tr.tareo_ccostos_he, tr.tareo_cod_actividad
        FROM tareos AS tr
        LEFT JOIN colaboradores AS clb ON tr.tareo_idcolaborador = clb.id_colaborador
        LEFT JOIN cargos AS cg ON clb.id_cargo = cg.id_cargo
        LEFT JOIN areas AS ae ON cg.id_area = ae.id_area
        LEFT JOIN labores AS lb ON tr.tareo_idlabor = lb.id_labor
        LEFT JOIN lab_zonas AS lb_zn ON lb.id_zona = lb_zn.id_zona
        LEFT JOIN lab_nombres AS lb_nm ON lb.id_labNombre = lb_nm.id_labNombre";
        return $this->ConsultaSimple($query);
    }
    //OBTIENE TODA LA TABLA
    public function getTable(): array
    {
        //$query = "SELECT * FROM tareos LIMIT {$empezarDesde}, {$filasPage}";
        $query = "SELECT * FROM tareos LEFT JOIN colaboradores ON tareos.id_colaborador = colaboradores.id_colaborador LEFT JOIN labores ON tareos.id_labor = labores.id_labor";
        return $this->ConsultaSimple($query);
    }
    public function insert(int $nTarjeta, int $idColaborador, $dia, $turno, $guardia, $nActividad, int $idLabor, string $he, string $htSeAd, string $heSeAd, string $ccSeAd, string $ccHe, $actTipo)
    {
        try 
        {
            $query  = "INSERT INTO tareos (tareo_nTarjeta, tareo_idcolaborador, tareo_dia, tareo_turno, tareo_guardia, tareo_actividad, tareo_idlabor, tareo_he, tareo_ht_serv_ad, tareo_he_ser_ad, tareo_cc_ser_ad, tareo_ccostos_he, tareo_cod_actividad) VALUES (:item1, :item2, :item3, :item4, :item5, :item6, :item7, :item8, :item9, :item10, :item11, :item12, :item13);";
            $insertValue = $this->db->prepare($query);
            $insertValue->bindValue(':item1', $nTarjeta, PDO::PARAM_STR);
            $insertValue->bindValue(':item2', $idColaborador, PDO::PARAM_STR);
            $insertValue->bindValue(':item3', $dia, PDO::PARAM_STR);
            $insertValue->bindValue(':item4', $turno, PDO::PARAM_STR);
            $insertValue->bindValue(':item5', $guardia, PDO::PARAM_STR);
            $insertValue->bindValue(':item6', $nActividad, PDO::PARAM_STR);
            $insertValue->bindValue(':item7', $idLabor, PDO::PARAM_STR);
            $insertValue->bindValue(':item8', $he, PDO::PARAM_STR);
            $insertValue->bindValue(':item9', $htSeAd, PDO::PARAM_STR);
            $insertValue->bindValue(':item10', $heSeAd, PDO::PARAM_STR);
            $insertValue->bindValue(':item11', $ccSeAd, PDO::PARAM_STR);
            $insertValue->bindValue(':item12', $ccHe, PDO::PARAM_STR);
            $insertValue->bindValue(':item13', $actTipo, PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => 'Se registro correctamente Tareo.',
                ];
            }
            else{
                $rptSql = [
                    "estado" => 0,
                    "mensaje" => 'Se encontro ERROR '.$insertValue->errorInfo(),
                    "mensaje2" => 'Se encontro ERROR '."\nPDO::errorInfo():\n",
                ];
            }
        } catch (PDOException $e) {
            //return 'Se registro ERROR '. $e->getMessage();
            if($e->getCode() == 23000){
                $messageUser = "De duplico dato";
            }
            elseif($e->getCode() == '21S01'){
                $messageUser = "Los parametros no coinciden";
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
        }
        finally {
            return $rptSql;
            //print_r($this->db->errorInfo());
        }
    }
    public function delete(int $id)
    {
        //error_reporting(0);
        try {
            $query  = "DELETE FROM tareos WHERE id_tareo=:id;";
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
        $where = "WHERE " . $termiCol . " LIKE :termino ORDER BY id_colaborador ASC";
        $array = array(':termino' => '%' . $termino . '%');
        //$this->getPagination($where, $array);
        //return $array;
        //return $array;
        return $this->ConsultaCompleja($table, $where, $array);
    }

    public function getSelectNormal(string $letra, string  $termiCol, string $table)
    {
        $query = "SELECT * FROM {$table} WHERE {$termiCol} = '{$letra}'";
        return $this->ConsultaSimple($query);
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

    public function showTable(array $array): string
    {
        $html = '';
        if (count($array)) {
            $html = '   <table class="table table-striped" id="table">
                        <thead>
                            <th class="d-none"></th>
                            <th>CODIGO</th>
                            <th>INGRESOS</th>
                            <th>EGRESOS</th>
                            <th>FECHA DE REGISTRO</th>
                            <th>N° DE FACTURA</th>
                            <th>NOMBRE</th>
                            <th>OBSERVACION</th>
                        </thead>

                        <tbody>
                     ';
            foreach ($array as $value) {
                $html .= '  <tr>
                        <td class="d-none">' . $value['nIdAlm'] . '</td>
                        <td>' . $value['nCodAlm'] . '</td>
                        <td>' . $value['nIngAlm'] . '</td>
                        <td>' . $value['nEgrAlm'] . '</td>
                        <td>' . $value['fRegAlm'] . '</td>
                        <td>' . $value['nNFacAlm'] . '</td>
                        <td>' . $value['cNomAlm'] . '</td>
                        <td>' . $value['cObsAlm'] . '</td>
                        </tr>
                         ';
            }
            $html .= '  </tbody>
                    </table>';
        } else {
            $html = '<h4 class="text-center">No hay datos...</h4>';
        }
        return $html;
    }
}
