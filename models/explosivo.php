<?php
//declare (strict_types = 1);
require_once '../db/conexion.php';

class Explosivo extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_NombreCodigo(){
        $query = "SELECT ex.id_explosivo, ex.explosivo_descripcion, ex.explosivo_codigo FROM explosivos AS ex";
        return $this->ConsultaSimple($query);
    }
    // Obtiene Lista especifica
    public function getDatalistAll_nombres_perforista()
    {
        $query = "SELECT clb.id_colaborador, clb.col_nombres, clb.col_apePaterno, clb.col_apeMaterno FROM colaboradores AS clb";
        return $this->ConsultaSimple($query);
    }

    // Obtiene Lista especifica
    public function getSelect(string $table, string $column)
    {
        $query = "SELECT {$column}, col_apePaterno, col_apeMaterno, col_nombres, id_colaborador, id_cargo FROM {$table}";
        return $this->ConsultaSimple($query);
    }

    //OBTIENE TODA LA TABLA
    public function table_master(): array
    {
        $query = "SELECT expl.id_explosivo, expl.explosivo_codigo, expl.explosivo_descripcion, expl.explosivo_unidadMedida FROM explosivos AS expl";
        return $this->ConsultaSimple($query);
    }

    
    public function insert(string $dato1, string $dato2, string $dato3)
    {
        try 
        {
            $query = "INSERT INTO explosivos (explosivo_codigo, explosivo_descripcion, explosivo_unidadMedida) 
                        VALUES (:item1, :item2, :item3)";
            $result = $this->db->prepare($query);
            $result->bindParam(':item1', $dato1, PDO::PARAM_STR);
            $result->bindParam(':item2', $dato2, PDO::PARAM_STR);
            $result->bindParam(':item3', $dato3, PDO::PARAM_STR);
            $sqlrpt = $result->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente Explosivo",
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
                $messageUser = "Dato duplicado";
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

    // READ
    public function readRow($id): array
    {
        $query = "SELECT expl.id_explosivo, expl.explosivo_codigo, expl.explosivo_descripcion, expl.explosivo_unidadMedida FROM explosivos AS expl WHERE {$id};";
        return $this->ConsultaSimple($query);
    }

    public function getColumn($column): array
    {
        $query = "SELECT expl.id_explosivo, expl.{$column} FROM explosivos AS expl";
        return $this->ConsultaSimple($query);
    }
    public function getColumns($parament)
    {
        $query = "SELECT expl.explosivo_codigo, expl.explosivo_descripcion, expl.explosivo_unidadMedida FROM explosivos AS expl WHERE expl.id_explosivo = {$parament};";
        return $this->ConsultaSimple($query);
    }

    public function getColumnWhere($column, $where): array
    {
        $query = "SELECT ex.{$column}, ex.explosivo_unidadMedida FROM explosivos AS ex WHERE ex.id_explosivo= {$where};";
        return $this->ConsultaSimple($query);
    }

    // UPDATE
    public function edit(int $datoid, string $dato1, string $dato2, string $dato3)
    {
        //error_reporting(0);
        try {
            $query  = "UPDATE explosivos SET col_ccostos=:dato1, col_dni=:dato2, col_nombre=:dato3, col_cargo_actual=:dato4, col_area=:dato5, col_guardia=:dato6, col_situacion=:dato7 WHERE id_colaborador=:datoid;";
            $result = $this->db->prepare($query);
            $result->execute(array(':datoid' => $datoid,
                                    ':dato1' => $dato1,
                                    ':dato2' => $dato2,
                                    ':dato3' => $dato3));
            if ($result->rowCount()) {
                return 'Se edito correctamente.';
            } else {
                return 'IGUAL';
            }
        } catch (PDOException $e) {
            return 'ERROR';
        }

    }

    //DELETE
    public function delete(int $id)
    {
        //error_reporting(0);
        try {
            $query  = "DELETE FROM explosivos WHERE id_colaborador=:id;";
            $result = $this->db->prepare($query);
            $result->execute(array(':id' => $id));
            return 'Se elimino correctamente.';
        } catch (PDOException $e) {
            return 'Ocurrio un ERROR al eliminar';
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
?>