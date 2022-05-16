<?php
//declare (strict_types = 1);
require_once '../db/conexion.php';

class instalacionGenerales extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(string $data1, string $data2, string $data3)
    {
        try 
        {
            $query  = "INSERT INTO instalaciones_generales VALUES (null, :unidadMinera_id, :instalacionesGenerales_fecha, :instalacionesGenerales_nVale);";
            $result = $this->db->prepare($query);
            $sqlrpt = $result->execute(array(':unidadMinera_id' => $data1, ':instalacionesGenerales_fecha' => $data2,':instalacionesGenerales_nVale' => $data3));
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente Consumo Madera",
                    "id" => $lastcolIdsql
                ];
            }
            else{
                echo "\nPDO::errorInfo():\n";
                print_r($result->errorInfo());
            }
            return $rptSql;
        } catch (PDOException $e) {
            return 'Se registro ERROR '. $e->getMessage();
        }
    }
    public function insertDetails($data3_detalles, $id){
        
        try 
        {
            $query = "INSERT INTO instalaciones_generales_detalle (instalacionesGenerales_detalle_idLabor, instalacionesGenerales_detalle_idInstalacionesMina, instalacionesGenerales_cantidad, instalacionesGenerales_id) VALUES (
                :item1,
                :item2,
                :item3,
                :item4)";
            $insertValue = $this->db->prepare($query);
            foreach ($data3_detalles as $clave) {
                $insertValue->bindValue(':item1', $clave['id_labor'], PDO::PARAM_STR);
                $insertValue->bindValue(':item2', $clave['id_instalacionMina'], PDO::PARAM_STR);
                $insertValue->bindValue(':item3', $clave['cantidad'], PDO::PARAM_STR);
                $insertValue->bindValue(':item4', $id, PDO::PARAM_STR);
                $sqlrpt = $insertValue->execute();
                $lastcolIdsql = $this->db->lastInsertId();
            }
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente detalle de consumo madera",
                ];
            }
            else{
                echo "\nPDO::errorInfo():\n";
                print_r($insertValue->errorInfo());
            }
            return $rptSql;
            
        }
        catch (PDOException $e) {
            return 'Se registro ERROR '. $e->getMessage();
        }
    }
    public function table_master()
    {
        $query = "SELECT itl_g.id_instalacionesGenerales, itl_g.instalacionesGenerales_fecha, itl_g.instalacionesGenerales_nVale FROM instalaciones_generales AS itl_g;";
        return $this->ConsultaSimple($query);
    }
    public function delete(int $id)
    {
        //error_reporting(0);
        try {
            $query  = "DELETE FROM instalaciones_generales WHERE id_instalacionesGenerales=:id;";
            $result = $this->db->prepare($query);
            $result->execute(array(':id' => $id));
            return 'Se elimino correctamente.';
        } catch (PDOException $e) {
            return 'Ocurrio un ERROR al eliminar';
        }
    }
    public function edit(int $datoidLabor, string $datoZona, string $datoCCosto, int $datoNivel, string $datoLabor)
    {
        //error_reporting(0);
        try {
            $query  = "UPDATE labores SET lab_ccostos=:datoCCosto, lab_labor=:datoLabor, lab_nivel=:datoNivel, lab_zona=:datoZona WHERE id_labor=:datoidLabor;";
            $result = $this->db->prepare($query);
            $result->execute(array(':datoidLabor' => $datoidLabor, ':datoZona' => $datoZona, ':datoCCosto' => $datoCCosto, ':datoNivel' => $datoNivel, ':datoLabor' => $datoLabor));
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
        $where = "WHERE " . $termiCol . " LIKE :termino ORDER BY lab_ccostos ASC";
        $array = array(':termino' => '%' . $termino . '%');
        //$this->getPagination($where, $array);
        //return $array;
        //return $array;
        return $this->ConsultaCompleja($table, $where, $array);
    }


    public function getSelectLike(string $letra)
    {
        if($letra == 'Z'){
            $query = "SELECT lab_ccostos FROM labores WHERE lab_ccostos";
        }
        else{
            $query = "SELECT lab_ccostos FROM labores WHERE lab_ccostos LIKE '_{$letra}%'";
        }
        
        return $this->ConsultaSimple($query);
    }

    public function getSelectNormal(string $letra)
    {
        $query = "SELECT id_labor, lab_ccostos, lab_labor, lab_nivel, lab_tipo, lab_zona FROM labores WHERE lab_ccostos = '{$letra}'";
        return $this->ConsultaSimple($query);
    }

    public function getPaginationSearch(string $where, array $array): array
    {
        $query = "SELECT COUNT(*) FROM labores {$where}";
        $result = $this->db->prepare($query);
        $result->execute($array);
        return array(
            'filasTotal'  => intval($result->fetch(PDO::FETCH_BOTH)[0]),
            'filasPagina' => 3,
        );
    }

    public function getPaginationAll(): array
    {
        $query = "SELECT COUNT(*) FROM labores;";
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
