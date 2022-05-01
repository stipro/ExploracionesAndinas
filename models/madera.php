<?php
//declare (strict_types = 1);
require_once '../db/conexion.php';

class Madera extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }
    //OBTIENE TODA LA TABLA
    public function read(): array
    {
        $query = "SELECT * FROM maderas";
        return $this->ConsultaSimple($query);
    }
    public function create(string $dato1, string $dato2, string $dato3)
    {
        try 
        {
            $query = "INSERT INTO maderas (madera_tipo, madera_codigo, madera_dimension, madera_fechaRegistro) 
                            VALUES (:item1, :item2, :item3, :item4)";
            $result = $this->db->prepare($query);
            $result->bindParam(':item1', $dato1, PDO::PARAM_STR);
            $result->bindParam(':item2', $dato2, PDO::PARAM_STR);
            $result->bindParam(':item3', $dato3, PDO::PARAM_STR);
            $result->bindParam(':item4', $dato4, PDO::PARAM_STR);
            $sqlrpt = $result->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente Madera",
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
                $messageUser = "Registro duplicado";
            }
            elseif($e->getCode() == '21S01'){
                $messageUser = "Los parametros no coinciden";
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
            $query  = "DELETE FROM maderas WHERE id_colaborador=:id;";
            $result = $this->db->prepare($query);
            $result->execute(array(':id' => $id));
            return 'Se elimino correctamente.';
        } catch (PDOException $e) {
            return 'Ocurrio un ERROR al eliminar';
        }
    }
    public function update(int $datoid, string $dato1, string $dato2, string $dato3)
    {
        //error_reporting(0);
        try {
            $query  = "UPDATE maderas SET madera_tipo=:dato1, madera_codigo=:dato2, madera_dimension=:dato3 WHERE id_madera = $datoid;";
            $result = $this->db->prepare($query);
            $result->execute(array(':datoid' => $datoid,
                                     ':dato1' => $dato1,
                                     ':dato2' => $dato2,
                                     ':dato3' => $dato3,));
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
        $where = "WHERE " . $termiCol . " LIKE :termino ORDER BY col_ccostos ASC";
        $array = array(':termino' => '%' . $termino . '%');
        //$this->getPagination($where, $array);
        //return $array;
        //return $array;
        return $this->ConsultaCompleja($table, $where, $array);
    }

    public function getPaginationSearch(string $where, array $array): array
    {
        $query = "SELECT COUNT(*) FROM colaboradores {$where}";
        $result = $this->db->prepare($query);
        $result->execute($array);
        return array(
            'filasTotal'  => intval($result->fetch(PDO::FETCH_BOTH)[0]),
            'filasPagina' => 3,
        );
    }

    public function getPaginationAll(): array
    {
        $query = "SELECT COUNT(*) FROM colaboradores;";
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
