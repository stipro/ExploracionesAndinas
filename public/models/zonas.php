<?php
//declare (strict_types = 1);
require_once '../db/conexion.php';

class Zonas extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }
    //OBTIENE TODA LA TABLA
    public function getAllTable(int $empezarDesde, int $filasPage): array
    {
        $query = "SELECT * FROM lab_zonas LIMIT {$empezarDesde}, {$filasPage}";
        return $this->ConsultaSimple($query);
    }
    //OBTIENE TODA LA TABLA
    public function getAll()
    {
        $query = "SELECT * FROM lab_zonas";
        return $this->ConsultaSimple($query);
    }
    public function insert(string $dato1, string $dato2)
    {
        try 
        {
            $query  = "INSERT INTO lab_zonas VALUES (null, :dato1, :dato2);";
            $result = $this->db->prepare($query);
            $result->execute(array(':dato1' => $dato1,':dato2' => $dato2));
            return 'Se registro correctamente.';
        } catch (PDOException $e) {
            return 'Se registro ERROR. Probablemente ingreso en codigo mas de un texto, solo ingresar 1 Text';
        }
    }
    public function delete(int $id)
    {
        //error_reporting(0);
        try {
            $query  = "DELETE FROM zonas WHERE idzona=:id;";
            $result = $this->db->prepare($query);
            $result->execute(array(':id' => $id));
            return 'Se elimino correctamente.';
        } catch (PDOException $e) {
            return 'Ocurrio un ERROR al eliminar';
        }
    }
    public function edit(int $datoid, string $dato1, string $dato2)
    {
        //error_reporting(0);
        try {
            $query  = "UPDATE zonas SET codigo=:dato1, nombre=:dato2 WHERE idzona=:datoid;";
            $result = $this->db->prepare($query);
            $result->execute(array(':datoid' => $datoid, ':dato1' => $dato1, ':dato2' => $dato2));
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
        $where = "WHERE " . $termiCol . " LIKE :termino ORDER BY codigo ASC";
        $array = array(':termino' => '%' . $termino . '%');
        //$this->getPagination($where, $array);
        //return $array;
        //return $array;
        return $this->ConsultaCompleja($table, $where, $array);
    }

    public function getPaginationSearch(string $where, array $array): array
    {
        $query = "SELECT COUNT(*) FROM lab_zonas {$where}";
        $result = $this->db->prepare($query);
        $result->execute($array);
        return array(
            'filasTotal'  => intval($result->fetch(PDO::FETCH_BOTH)[0]),
            'filasPagina' => 3,
        );
    }

    public function getPaginationAll(): array
    {
        $query = "SELECT COUNT(*) FROM lab_zonas;";
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
