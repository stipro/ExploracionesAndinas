<?php
//declare (strict_types = 1);
require_once '../db/conexion.php';

class Cargos extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }
    //OBTIENE TODA LA TABLA
    public function getSelect_cargo($where): array
    {
        $query = "SELECT cargo.cargo_nombre, cargo.id_cargo FROM cargos AS cargo WHERE id_area = '{$where}';";
        return $this->ConsultaSimple($query);
    }
    // Obtiene Lista especifica
    public function getSelect(string $table, string $column, string $idTable)
    {
        $query = "SELECT {$column}, {$idTable}  FROM {$table}";
        return $this->ConsultaSimple($query);
    }

    // Obtiene Lista especifica
    public function getSelectWhere(string $column, string $parament)
    {
        $where = "WHERE lbN.id_labNombre = '{$parament}'";
        $query = "SELECT lbN.{$column}, lbN.id_labNombre FROM lab_nombres AS lbN " .$where; 
        return $this->ConsultaSimple($query);
    }

    # EJEMPLO OBTENER UNA LISTA SEGUN SOLICITADO
    public function getColumnWhere(string $table, string $column, string $parament, string $idTable, string $columnWhere)
    {
        $query = "SELECT {$idTable}, {$column} FROM {$table} WHERE {$columnWhere} = {$parament};";
        return $this->ConsultaSimple($query);
    }
    //OBTIENE TODA LA TABLA
    public function getAll(int $empezarDesde, int $filasPage): array
    {
        //$query = "SELECT * FROM tareo LIMIT {$desde},{$filas}";
        $query = "SELECT * FROM labores LIMIT {$empezarDesde}, {$filasPage}";
        return $this->ConsultaSimple($query);
    }
    public function insert(string $datoZona, string $datoCCosto, int $datoNivel, string $datoLabor)
    {
        try 
        {
            $query  = "INSERT INTO labores VALUES (null, :lab_ccostos, :lab_labor, :lab_nivel, null, null, :lab_zona);";
            $result = $this->db->prepare($query);
            $result->execute(array(':lab_ccostos' => $datoCCosto,':lab_labor' => $datoLabor, ':lab_nivel'=> $datoNivel, ':lab_zona' => $datoZona));
            return 'Se registro correctamente.';
        } catch (PDOException $e) {
            return 'Se registro ERROR '. $e->getMessage();
        }
    }
    public function delete(int $id)
    {
        //error_reporting(0);
        try {
            $query  = "DELETE FROM labores WHERE id_labor=:id;";
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
                            <th>N?? DE FACTURA</th>
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
