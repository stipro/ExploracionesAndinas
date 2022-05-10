<?php
//declare (strict_types = 1);
require_once '../db/conexion.php';

class DocExplosivo extends Conexion
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
        $query = "SELECT vlEx_ing.id_explosivoIngreso, vlEx_ing.explosivoIngreso_nDocumento, vlEx_ing.explosivoIngreso_NombreRazon_remitente, vlEx_ing.explosivoIngreso_NombreRazon_destinatario FROM tvalexplosivos_ingreso AS vlEx_ing";
        return $this->ConsultaSimple($query);
    }

    
    public function create(string $data1, string $data2, string $data3, string $data4, string $data5, string $data6, string $data7, string $data8, string $data9, string $data10, string $data11,
    string $data12, string $data13, string $data14, string $data15, string $data16, string $data17, string $data18, string $data19, string $data20, string $data21)
    {
        try 
        {
            $query = "INSERT INTO tvalexplosivos_ingreso (explosivoIngreso_nDocumento,
            explosivoIngreso_viaTipo_direccionPartida,
            explosivoIngreso_viaNombre_direccionPartida,
            explosivoIngreso_n_direccionPartida,
            explosivoIngreso_interior_direccionPartida,
            explosivoIngreso_zona_direccionPartida,
            explosivoIngreso_distrito_direccionPartida,
            explosivoIngreso_provincia_direccionPartida,
            explosivoIngreso_departamento_direccionPartida,
            explosivoIngreso_NombreRazon_remitente,
            explosivoIngreso_ruc_remitente,
            explosivoIngreso_viaTipo_direccionLlegada,
            explosivoIngreso_viaNombre_direccionLlegada,
            explosivoIngreso_n_direccionLlegada,
            explosivoIngreso_interior_direccionLlegada,
            explosivoIngreso_zona_direccionLlegada,
            explosivoIngreso_distrito_direccionLlegada,
            explosivoIngreso_provincia_direccionLlegada,
            explosivoIngreso_departamento_direccionLlegada,
            explosivoIngreso_NombreRazon_destinatario,
            explosivoIngreso_ruc_destinatario
            ) 
            VALUES (:item1,
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
            :item21)";
            $result = $this->db->prepare($query);
            $result->bindParam(':item1', $data1, PDO::PARAM_STR);
            $result->bindParam(':item2', $data2, PDO::PARAM_STR);
            $result->bindParam(':item3', $data3, PDO::PARAM_STR);
            $result->bindParam(':item4', $data4, PDO::PARAM_STR);
            $result->bindParam(':item5', $data5, PDO::PARAM_STR);
            $result->bindParam(':item6', $data6, PDO::PARAM_STR);
            $result->bindParam(':item7', $data7, PDO::PARAM_STR);
            $result->bindParam(':item8', $data8, PDO::PARAM_STR);
            $result->bindParam(':item9', $data9, PDO::PARAM_STR);
            $result->bindParam(':item10', $data10, PDO::PARAM_STR);
            $result->bindParam(':item11', $data11, PDO::PARAM_STR);
            $result->bindParam(':item12', $data12, PDO::PARAM_STR);
            $result->bindParam(':item13', $data13, PDO::PARAM_STR);
            $result->bindParam(':item14', $data14, PDO::PARAM_STR);
            $result->bindParam(':item15', $data15, PDO::PARAM_STR);
            $result->bindParam(':item16', $data16, PDO::PARAM_STR);
            $result->bindParam(':item17', $data17, PDO::PARAM_STR);
            $result->bindParam(':item18', $data18, PDO::PARAM_STR);
            $result->bindParam(':item19', $data19, PDO::PARAM_STR);
            $result->bindParam(':item20', $data20, PDO::PARAM_STR);
            $result->bindParam(':item21', $data21, PDO::PARAM_STR);
            $sqlrpt = $result->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente Doc. Explosivo",
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

    public function createDetail(string $dato1, array $detalles)
    {
        try 
        {
            $query = "INSERT INTO tvalexplosivos_ingreso_detalle (explosivoIngreso_id, explosivo_id, explosivoIngreso_cantidad) 
                        VALUES (:item1, :item2, :item3)";
            $result = $this->db->prepare($query);
            foreach ($detalles as $clave) {
                $result->bindParam(':item1', $dato1, PDO::PARAM_STR);
                $result->bindParam(':item2', $clave['idExplosivo'], PDO::PARAM_STR);
                $result->bindParam(':item3', $clave['cantidad'], PDO::PARAM_STR);
                $sqlrpt = $result->execute();
                $lastcolIdsql = $this->db->lastInsertId();
            }
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente detalle de Doc. Explosivo",
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
            $query  = "DELETE FROM tvalexplosivos_ingreso WHERE id_explosivoIngreso=:id;";
            $result = $this->db->prepare($query);
            $result->execute(array(':id' => $id));
            return 'Se elimino correctamente.';
        } catch (PDOException $e) {
            return 'Ocurrio un ERROR al eliminar';
        }
    }

    //DELETE
    public function deleteDetail(int $id)
    {
        //error_reporting(0);
        try {
            $query  = "DELETE FROM tvalexplosivos_ingreso_detalle WHERE explosivoIngreso_id=:id;";
            $result = $this->db->prepare($query);
            $result->execute(array(':id' => $id));
            return 'Se elimino correctamente.';
        } catch (PDOException $e) {
            return 'Ocurrio un ERROR al eliminar';
        }
    }
    
    public function getRow($parament)
    {
        $query = "SELECT vl_ing.*, ex.*, vl_ing_det.explosivoIngreso_cantidad FROM tvalexplosivos_ingreso AS vl_ing LEFT JOIN tvalexplosivos_ingreso_detalle AS vl_ing_det ON vl_ing.id_explosivoIngreso = vl_ing_det.explosivoIngreso_id LEFT JOIN explosivos AS ex ON vl_ing_det.explosivo_id = ex.id_explosivo
        WHERE vl_ing.id_explosivoIngreso = {$parament};";
        return $this->ConsultaSimple($query);
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