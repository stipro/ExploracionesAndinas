<?php
header('Content-type: application/json; charset=utf-8');

//declare (strict_types = 1);
require_once '../db/conexion.php';

class InstalacionMina extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    // Obtiene Lista especifica
    public function getSelect(string $table, string $column, string $idTable)
    {
        $query = "SELECT {$idTable}, {$column} FROM {$table} ORDER BY {$column} ASC ;";
        return $this->ConsultaSimple($query);
    }

    public function getSelectNormal(string $table, string $column):array
    {
        $query = "SELECT {$column} FROM {$table} limit 10";
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
        $idcCosto,
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
        $datoDinaSemi,
        $datocalDinaSemi,
        $datoDinaPulv,
        $datocalDinaPulv,
        $datosumSemiPulv,
        $datoemulMil,
        $datoemulTresmil,
        $datomechaRapida,
        $datoMecha,
        $datofulmOcho,
        $datoconecMecha
        )
    {
        try 
        {
            date_default_timezone_set('America/Lima');
            $converdatoRegistro = date($datoRegistro.' H:i:s');
            /* Iniciar una transacción, desactivando 'autocommit' */
            $this->db->beginTransaction();

            $query = "INSERT INTO tvalexplosivos VALUES (null,
            :ccosto_usuario, 
            :valexplosivo_fecha, 
            :id_zona, 
            :valexplosivo_nvale, 
            :valexplosivo_turno, 
            :valexplosivo_preimpresor, 
            :labExplosivo_ccostos, 
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
            :valexplosivo_dimSemigelatinosa65, 
            :valexplosivo_dimSemigelatinosa65_Result, 
            :valexplosivo_dimPulverulenta65_78, 
            :valexplosivo_dimPulverulenta65_78_Result, 
            :valexplosivo_sumaSemiPulv,
            :valexplosivo_emulmil,
            :valexplosivo_emultresmil,
            :valexplosivo_mecRapidaZ18, 
            :valexplosivo_mecha, 
            :valexplosivo_fullN8, 
            :valexplosivo_conMecha)";
            $result = $this->db->prepare($query);
            $result->execute(array(
            ':ccosto_usuario' => $idDigitador, 
            ':valexplosivo_fecha' => $converdatoRegistro,
            ':id_zona' => $idZona,
            ':valexplosivo_nvale' => $datonVale,
            ':valexplosivo_turno' => $datoTurno,
            ':valexplosivo_preimpresor' => $datopreImpreso,
            ':labExplosivo_ccostos' => $idcCosto,
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
            ':valexplosivo_dimSemigelatinosa65' => $datoDinaSemi,
            ':valexplosivo_dimSemigelatinosa65_Result' => $datocalDinaSemi,
            ':valexplosivo_dimPulverulenta65_78' => $datoDinaPulv,
            ':valexplosivo_dimPulverulenta65_78_Result' => $datocalDinaPulv,
            ':valexplosivo_sumaSemiPulv' => $datosumSemiPulv,
            ':valexplosivo_emulmil' => $datoemulMil,
            ':valexplosivo_emultresmil' => $datoemulTresmil,
            ':valexplosivo_mecRapidaZ18' => $datomechaRapida,
            ':valexplosivo_mecha' => $datoMecha,
            ':valexplosivo_fullN8' => $datofulmOcho,
            ':valexplosivo_conMecha' => $datoconecMecha));

            /* Consignar los cambios */
            $this->db->commit();

            // Obtenemos el Id (Aun falta arreglar)
            //$idResult = $this->db->lastInsertId(); 

            $rptSql = [
                "estado" => 1,
                "mensaje" => "Se registro correctamente",
                "coperacion" => $datopreImpreso,
            ];
            return $rptSql;

        } catch (PDOException $e) {
            //$this->db->rollback();
            $rptSql = [
                "estado" => 0,
                "mensaje" => "Se encontro ERROR ".$e->getMessage(),
            ];
            return $rptSql;
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