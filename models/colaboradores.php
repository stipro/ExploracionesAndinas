<?php
//declare (strict_types = 1);
require_once '../db/conexion.php';

class Colaboradores extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getColumn()
    {
        $query = "SELECT cols.id_colaborador, CONCAT(cols.col_apePaterno, ' ', cols.col_apeMaterno, ' ', cols.col_nombres) AS FullName FROM colaboradores AS cols;";
        return $this->ConsultaSimple($query);
    }
    
    public function getColaborador_all(){
        $query = "SELECT clb.id_colaborador, clb.col_nombres, clb.col_apePaterno, clb.col_apeMaterno FROM colaboradores AS clb";
        return $this->ConsultaSimple($query);
    }
    public function getData_dni(){
        $query = "SELECT clb.id_colaborador, clb.col_nombres, clb.col_apePaterno, clb.col_apeMaterno FROM colaboradores AS clb";
        return $this->ConsultaSimple($query);
    }
    // Obtiene Lista especifica
    public function getDatalistAll_nombres_perforista()
    {
        $query = "SELECT clb.id_colaborador, clb.col_nombres, clb.col_apePaterno, clb.col_apeMaterno FROM colaboradores AS clb";
        return $this->ConsultaSimple($query);
    }

    // Obtiene Lista especifica
    public function getSelec_dni_fullname(): array
    {

        $query = "SELECT col.id_colaborador, CONCAT(col.col_apePaterno,' ' , col.col_apeMaterno,' ', col.col_nombres) AS fullName , col.col_dni FROM colaboradores AS col;";
        return $this->ConsultaSimple($query);
    }

    public function getDni_colaboradorNombre($where): array
    {

        $query = "SELECT col.col_dni FROM colaboradores AS col WHERE id_colaborador = {$where};";
        return $this->ConsultaSimple($query);
    }   

    public function getNombre_colaboradorDni($where): array
    {

        $query = "SELECT CONCAT(col.col_apePaterno,' ' , col.col_apeMaterno,' ', col.col_nombres) AS fullName FROM colaboradores AS col WHERE id_colaborador = {$where};";
        return $this->ConsultaSimple($query);
    }

    //OBTIENE TODA LA TABLA
    public function table_master(): array
    {
        $query = "SELECT * FROM colaboradores";
        return $this->ConsultaSimple($query);
    }
    public function insert(string $dato1, string $dato2, string $dato3, string $dato4, int $dato5, string $dato6, string $dato7, string $dato8, int $dato9)
    {
        try 
        {
            $query = "INSERT INTO colaboradores (col_apePaterno, col_apeMaterno, col_nombres, col_estadoCivil, col_genero, col_fechaNacimiento, col_tipoDocumento, col_dni, id_cargo) 
                            VALUES (:item1, :item2, :item3, :item4, :item5, :item6, :item7, :item8, :item9)";
            $result = $this->db->prepare($query);
            $result->bindParam(':item1', $dato1, PDO::PARAM_STR);
            $result->bindParam(':item2', $dato2, PDO::PARAM_STR);
            $result->bindParam(':item3', $dato3, PDO::PARAM_STR);
            $result->bindParam(':item4', $dato4, PDO::PARAM_STR);
            $result->bindParam(':item5', $dato5, PDO::PARAM_STR);
            $result->bindParam(':item6', $dato6, PDO::PARAM_STR);
            $result->bindParam(':item7', $dato7, PDO::PARAM_STR);
            $result->bindParam(':item8', $dato8, PDO::PARAM_STR);
            $result->bindParam(':item9', $dato9, PDO::PARAM_STR);
            $sqlrpt = $result->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente Colaborador",
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
                $messageUser = "DNI ya registrado, Colaborador ya registrado";
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
            $query  = "DELETE FROM colaboradores WHERE id_colaborador=:id;";
            $result = $this->db->prepare($query);
            $result->execute(array(':id' => $id));
            return 'Se elimino correctamente.';
        } catch (PDOException $e) {
            return 'Ocurrio un ERROR al eliminar';
        }
    }
    public function edit(int $datoid, string $dato1, string $dato2, string $dato3, string $dato4, string $dato5, string $dato6, string $dato7)
    {
        //error_reporting(0);
        try {
            $query  = "UPDATE colaboradores SET col_ccostos=:dato1, col_dni=:dato2, col_nombre=:dato3, col_cargo_actual=:dato4, col_area=:dato5, col_guardia=:dato6, col_situacion=:dato7 WHERE id_colaborador=:datoid;";
            $result = $this->db->prepare($query);
            $result->execute(array(':datoid' => $datoid,
                                     ':dato1' => $dato1,
                                     ':dato2' => $dato2,
                                     ':dato3' => $dato3,
                                     ':dato4' => $dato4,
                                     ':dato5' => $dato5,
                                     ':dato6' => $dato6,
                                     ':dato7' => $dato7));
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
