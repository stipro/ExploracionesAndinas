<?php
header('Content-type: application/json; charset=utf-8');

//declare (strict_types = 1);
require_once '../db/conexion.php';

class ValeExplosivos extends Conexion
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
    public function getAll(int $empezarDesde, int $filasPage): array
    {
        //$query = "SELECT * FROM tareos LIMIT {$empezarDesde}, {$filasPage}";
        $query = "SELECT * FROM tvalexplosivos LEFT JOIN colaboradores ON tareos.id_colaborador = colaboradores.id_colaborador LEFT JOIN labores ON tareos.id_labor = labores.id_labor LIMIT {$empezarDesde}, {$filasPage}";
        return $this->ConsultaSimple($query);
    }
    public function insert(
        $idDigitador,
        $datoRegistro,
        $idZona,
        $datonVale,
        $datoTurno,
        $datopreImpreso,
        $idLabor,
        $datoTipDisparo,
        $idPerforista,
        $datotipEn,
        $datoBarra,
        $datoLgt,
        $datonTaladro,
        $datotalVacio,
        $datopiePerf,
        $datopieReal,
        $datonnMaquinas,
        $datoemulTresmil,
        $datoDinaSemi,
        $datocalDinaSemi,
        $datoDinaPulv,
        $datocalDinaPulv,
        $datosumSemiPulv,        
        $datCarmexsiete,
        $datCarmexocho,
        $datomechaRapida,
        $datomechaLenta,
        $datofulmOcho,
        $datoconecMecha,
        $datoBlockSegacion,
        $datoCarCortrece
        )
    {
        try 
        {
            $rptId = $this->getidTable('tvalexplosivos', 'id_valexplosivo');
            $id = $rptId[0]['id'];
            $id++;
            //echo $id;
            date_default_timezone_set('America/Lima');
            $converdatoRegistro = date($datoRegistro.' H:i:s');
            /* Iniciar una transacción, desactivando 'autocommit' */
            //$this->db->beginTransaction();
            $query = "INSERT INTO tvalexplosivos VALUES (:id_valexplosivo,
            :id_usuario, 
            :valexplosivo_fecha, 
            :id_zona, 
            :valexplosivo_nvale, 
            :valexplosivo_turno, 
            :valexplosivo_preimpresor, 
            :id_labor, 
            :valexplosivo_tipDisparo, 
            :id_colaborador,  
            :valexplosivo_tipEn, 
            :valexplosivo_barra,  
            :valexplosivo_lgt,  
            :valexplosivo_numTaladro,  
            :valexplosivo_talVacio,  
            :valexplosivo_piePerf,  
            :valexplosivo_pieReal,  
            :valexplosivo_numMaquina, 
            :valexplosivo_emultresmil, 
            :valexplosivo_dimSemigelatinosa,  
            :valexplosivo_dimSemigelatinosa_Result,  
            :valexplosivo_dimPulverulenta,  
            :valexplosivo_dimPulverulenta_Result,  
            :valexplosivo_sumaSemiPulv, 
            :valexplosivo_carmexsiete, 
            :valexplosivo_carmexocho,
            :valexplosivo_mecRapida,  
            :valexplosivo_mecLenta,  
            :valexplosivo_fulN,  
            :valexplosivo_conMecha, 
            :valexplosivo_BlockSugecion, 
            :valexplosivo_carcortrece);";
            $insertValue = $this->db->prepare($query);
            $insertValue->bindParam(':id_valexplosivo', $id, PDO::PARAM_INT);
            $insertValue->bindParam(':id_usuario', $idDigitador, PDO::PARAM_INT);
            $insertValue->bindParam(':valexplosivo_fecha', $converdatoRegistro, PDO::PARAM_STR);
            $insertValue->bindParam(':id_zona', $idZona, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_nvale', $datonVale, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_turno', $datoTurno, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_preimpresor', $datopreImpreso, PDO::PARAM_STR);
            $insertValue->bindParam(':id_labor', $idLabor, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_tipDisparo', $datoTipDisparo, PDO::PARAM_STR);
            $insertValue->bindParam(':id_colaborador', $idPerforista, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_tipEn', $datotipEn, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_barra', $datoBarra, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_lgt', $datoLgt, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_numTaladro', $datonTaladro, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_talVacio', $datotalVacio, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_piePerf', $datopiePerf, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_pieReal', $datopieReal, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_numMaquina', $datonnMaquinas, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_emultresmil', $datoemulTresmil, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimSemigelatinosa', $datoDinaSemi, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimSemigelatinosa_Result', $datocalDinaSemi, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimPulverulenta', $datoDinaPulv, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimPulverulenta_Result', $datocalDinaPulv, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_sumaSemiPulv', $datosumSemiPulv, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_carmexsiete', $datCarmexsiete, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_carmexocho', $datCarmexocho, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_mecRapida', $datomechaRapida, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_mecLenta', $datomechaLenta, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_fulN', $datofulmOcho, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_conMecha', $datoconecMecha, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_BlockSugecion', $datoBlockSegacion, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_carcortrece', $datoCarCortrece, PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            /*
            $result->execute(array(
            ':id_usuario' => $idDigitador,
            ':valexplosivo_fecha' => $converdatoRegistro,
            ':id_zona' => $idZona,
            ':valexplosivo_nvale' => $datonVale,
            ':valexplosivo_turno' => $datoTurno,
            ':valexplosivo_preimpresor' => $datopreImpreso,
            ':id_labor' => $idLabor,
            ':valexplosivo_tipDisparo' => $datoTipDisparo,
            ':id_colaborador' => $idPerforista,
            ':valexplosivo_tipEn' => $datotipEn,
            ':valexplosivo_barra' => $datoBarra,
            ':valexplosivo_lgt' => $datoLgt,
            ':valexplosivo_numTaladro' => $datonTaladro,
            ':valexplosivo_talVacio' => $datotalVacio,
            ':valexplosivo_piePerf' => $datopiePerf,
            ':valexplosivo_pieReal' => $datopieReal,
            ':valexplosivo_numMaquina' => $datonnMaquinas,
            ':valexplosivo_emultresmil' => $datoemulTresmil,
            ':valexplosivo_dimSemigelatinosa' => $datoDinaSemi,
            ':valexplosivo_dimSemigelatinosa_Result' => $datocalDinaSemi,
            ':valexplosivo_dimPulverulenta' => $datoDinaPulv,
            ':valexplosivo_dimPulverulenta_Result' => $datocalDinaPulv,
            ':valexplosivo_sumaSemiPulv' => $datosumSemiPulv,
            ':valexplosivo_carmexsiete' => $datCarmexsiete,
            ':valexplosivo_carmexocho' => $datCarmexocho,
            ':valexplosivo_mecRapida' => $datomechaRapida,
            ':valexplosivo_mecLenta' => $datomechaLenta,
            ':valexplosivo_fulN' => $datofulmOcho,
            ':valexplosivo_conMecha' => $datoconecMecha,
            ':valexplosivo_BlockSugecion' => $datoBlockSegacion,
            ':valexplosivo_carcortrece' => $datoCarCortrece,));*/
            /* Consignar los cambios */
            
            // Obtenemos el Id (Aun falta arreglar)
            //$idResult = $this->db->lastInsertId(); 
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente",
                    "coperacion" => $datopreImpreso,
                ];
            }
            else{
                echo "\nPDO::errorInfo():\n";
                //print_r($result->errorInfo());
            }
            

            
            return $rptSql;

        } catch (PDOException $e) {
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

    public function showTable(array $array): string
    {
        $html = '';
        if (count($array)) {
            $html ='<table class="table table-striped" id="table">
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
                        <tbody>';
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
/*
$columns = ['id_zona', 'nombre'];

$tableManager = new ValeExplosivos();
$result = $tableManager->getSelectNormal('zonas', $columns);
//print_r($result);
echo json_encode($result);
*/