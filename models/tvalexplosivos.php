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
    public function getRow($parament)
    {
        $query = "SELECT *, cb_usuarios.col_nombres AS cbUsu_nombres, cb_usuarios.col_apePaterno AS cbUsu_apePaterno, cb_usuarios.col_apeMaterno AS cbUsu_apeMaterno, vl_xp.valexplosivo_preimpresor, vl_xp.valexplosivo_nvale  FROM tvalexplosivos AS vl_xp LEFT JOIN usuarios AS uao ON vl_xp.id_usuario = uao.id_usuario  LEFT JOIN colaboradores AS cb_usuarios ON uao.colaborador_id = cb_usuarios.id_colaborador LEFT JOIN lab_zonas AS lb_zn ON vl_xp.id_zona = lb_zn.id_zona LEFT JOIN labores AS lb ON vl_xp.id_labor = lb.id_labor LEFT JOIN lab_nombres AS lb_nm ON lb.id_labNombre = lb_nm.id_labNombre LEFT JOIN colaboradores AS cb ON vl_xp.id_colaborador = cb.id_colaborador WHERE vl_xp.valexplosivo_codigoRegistro = {$parament}";
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
    
    /* public function getAll(int $empezarDesde, int $filasPage): array
    {
        //$query = "SELECT * FROM tareos LIMIT {$empezarDesde}, {$filasPage}";
        $query = "SELECT * FROM tvalexplosivos LEFT JOIN colaboradores ON tareos.id_colaborador = colaboradores.id_colaborador LEFT JOIN labores ON tareos.id_labor = labores.id_labor LIMIT {$empezarDesde}, {$filasPage}";
        return $this->ConsultaSimple($query);
    } */

    public function getLast_record(){
        $query = "SELECT vl_xp.valexplosivo_nvale FROM tvalexplosivos AS vl_xp ORDER BY vl_xp.valexplosivo_nvale DESC LIMIT 1";
        return $this->ConsultaSimple($query);
    }
    //OBTIENE TODA LA TABLA
    public function getAll(): array
    {
        //$query = "SELECT * FROM tareos LIMIT {$empezarDesde}, {$filasPage}";
        $query = "SELECT vl_xp.valexplosivo_preimpresor, vl_xp.valexplosivo_fecha, vl_xp.valexplosivo_codigoRegistro, vl_xp.valexplosivo_nvale, vl_xp.valexplosivo_turno, lb_zn.labZona_nombre, lb.lab_ccostos, lb_nm.labNombre_nombre, lb.lab_nivel, vl_xp.valexplosivo_tipDisparo, vl_xp.valexplosivo_tipEn FROM tvalexplosivos AS vl_xp LEFT JOIN lab_zonas AS lb_zn ON vl_xp.id_zona = lb_zn.id_zona LEFT JOIN labores AS lb ON vl_xp.id_labor = lb.id_labor LEFT JOIN lab_nombres AS lb_nm ON lb.id_labNombre = lb_nm.id_labNombre;";
        return $this->ConsultaSimple($query);
    }
    public function insert(
        $id_unidadMinera,
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
        $datoemulMil,
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
        $datoCarCortrece,
        $datoDEmulnorMil,
        $datoDEmulnorTresmil
        )
    {
        try 
        {
            $rptId = $this->getidTable('tvalexplosivos', 'id_valexplosivo');
            $id = $rptId[0]['id'];
            $id++;
            $preImpreso_final= $datopreImpreso.$id;
            $codRegistro = str_pad(intval($id), 6, "0", STR_PAD_LEFT);
            //echo $id;
            date_default_timezone_set('America/Lima');
            $converdatoRegistro = date($datoRegistro.' H:i:s');
            /* Iniciar una transacción, desactivando 'autocommit' */
            //$this->db->beginTransaction();
            $query = "INSERT INTO tvalexplosivos (id_valexplosivo, unidadMinera_id, valexplosivo_codigoRegistro, id_usuario,
            valexplosivo_preimpresor,
            valexplosivo_nvale,
            id_zona,
            valexplosivo_turno,
            valexplosivo_fecha,
            id_labor,
            valexplosivo_tipDisparo,
            valexplosivo_tipEn,
            valexplosivo_barra,
            valexplosivo_lgt,
            valexplosivo_numTaladro,
            valexplosivo_talVacio,
            valexplosivo_piePerf,
            valexplosivo_pieReal,
            valexplosivo_numMaquina,
            id_colaborador,
            valexplosivo_emulmil,
            valexplosivo_emultresmil,
            valexplosivo_dimPulverulenta,
            valexplosivo_carmexsiete,
            valexplosivo_carmexocho,
            valexplosivo_mecRapida,
            valexplosivo_mecLenta,
            valexplosivo_fulN,
            valexplosivo_conMecha,
            valexplosivo_BlockSugecion,
            valexplosivo_carcortrece,
            valexplosivo_dimSemigelatinosa,
            valexplosivo_dimPulverulenta_Result,
            valexplosivo_dimSemigelatinosa_Result,
            valexplosivo_sumaSemiPulv,
            valexplosivo_totalKiloEmul1000,
            valexplosivo_totalKiloEmul3000
            )
            VALUES (:id_valexplosivo, 
            :unidadMinera_id,
            :valexplosivo_codigoRegistro,
            :id_usuario,
            :valexplosivo_preimpresor,  
            :valexplosivo_nvale,
            :id_zona, 
            :valexplosivo_turno,
            :valexplosivo_fecha, 
            :id_labor, 
            :valexplosivo_tipDisparo, 
            :valexplosivo_tipEn,
            :valexplosivo_barra,  
            :valexplosivo_lgt,  
            :valexplosivo_numTaladro,  
            :valexplosivo_talVacio,  
            :valexplosivo_piePerf,  
            :valexplosivo_pieReal, 
            :valexplosivo_numMaquina,
            :id_colaborador, 
            :valexplosivo_emulmil,
            :valexplosivo_emultresmil,
            :valexplosivo_dimPulverulenta, 
            :valexplosivo_carmexsiete, 
            :valexplosivo_carmexocho,
            :valexplosivo_mecRapida,  
            :valexplosivo_mecLenta,  
            :valexplosivo_fulN,  
            :valexplosivo_conMecha, 
            :valexplosivo_BlockSugecion, 
            :valexplosivo_carcortrece,
            :valexplosivo_dimSemigelatinosa,
            :valexplosivo_dimPulverulenta_Result, 
            :valexplosivo_dimSemigelatinosa_Result,
            :valexplosivo_sumaSemiPulv,
            :valexplosivo_totalKiloEmul1000,
            :valexplosivo_totalKiloEmul3000);";
            $insertValue = $this->db->prepare($query);
            $insertValue->bindParam(':id_valexplosivo', $id, PDO::PARAM_INT);
            $insertValue->bindParam(':unidadMinera_id', $id_unidadMinera, PDO::PARAM_INT);
            $insertValue->bindParam(':valexplosivo_codigoRegistro', $codRegistro, PDO::PARAM_STR);
            $insertValue->bindParam(':id_usuario', $idDigitador, PDO::PARAM_INT);
            $insertValue->bindParam(':valexplosivo_preimpresor', $preImpreso_final, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_nvale', $datonVale, PDO::PARAM_STR);
            $insertValue->bindParam(':id_zona', $idZona, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_fecha', $converdatoRegistro, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_turno', $datoTurno, PDO::PARAM_STR);
            $insertValue->bindParam(':id_labor', $idLabor, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_tipDisparo', $datoTipDisparo, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_tipEn', $datotipEn, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_barra', $datoBarra, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_lgt', $datoLgt, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_numTaladro', $datonTaladro, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_talVacio', $datotalVacio, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_piePerf', $datopiePerf, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_pieReal', $datopieReal, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_numMaquina', $datonnMaquinas, PDO::PARAM_STR);
            $insertValue->bindParam(':id_colaborador', $idPerforista, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_emulmil', $datoemulMil, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_emultresmil', $datoemulTresmil, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimPulverulenta', $datoDinaPulv, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_carmexsiete', $datCarmexsiete, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_carmexocho', $datCarmexocho, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_mecRapida', $datomechaRapida, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_mecLenta', $datomechaLenta, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_fulN', $datofulmOcho, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_conMecha', $datoconecMecha, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_BlockSugecion', $datoBlockSegacion, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_carcortrece', $datoCarCortrece, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimSemigelatinosa', $datoDinaSemi, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimPulverulenta_Result', $datocalDinaPulv, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimSemigelatinosa_Result', $datocalDinaSemi, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_sumaSemiPulv', $datosumSemiPulv, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_totalKiloEmul1000', $datoDEmulnorMil, PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_totalKiloEmul3000', $datoDEmulnorTresmil, PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            $lastcolIdsql = $this->db->lastInsertId();
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
             
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente",
                    "coperacion" => $preImpreso_final,
                    "id" => $lastcolIdsql
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
            elseif($e->getCode() == 42000){
                $messageUser = "La sintaxis esta mal";
            }
            elseif($e->getCode() == '42S22'){
                $messageUser = "Una columna no existe";
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

    //OBTIENE TODA LA TABLA
    public function createDetalle($id, $detail)
    {
        $query = "INSERT INTO tvalexplosivos_detalle (valexplosivo_id, explosivo_id, valeExplosivo_cantidad) VALUES (
            :item1,
            :item2,
            :item3);";
        $insertValue = $this->db->prepare($query);
        foreach ($detail as $clave) {
            $insertValue->bindParam(':item1', $id, PDO::PARAM_INT);
            $insertValue->bindParam(':item2', $clave['id'], PDO::PARAM_STR);
            $insertValue->bindParam(':item3', $clave['cantidad'], PDO::PARAM_INT);
            $sqlrpt = $insertValue->execute();
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
    
    public function edit($formRequest)
    {
        //error_reporting(0);
        try {
            $query = "UPDATE tvalexplosivos SET valexplosivo_nvale = :valexplosivo_nvale,
            id_zona = :id_zona,
            valexplosivo_fecha = :valexplosivo_fecha,
            valexplosivo_turno = :valexplosivo_turno,
            id_labor = :id_labor,
            valexplosivo_tipDisparo = :valexplosivo_tipDisparo,
            valexplosivo_tipEn = :valexplosivo_tipEn,
            valexplosivo_barra = :valexplosivo_barra,
            valexplosivo_lgt = :valexplosivo_lgt,
            valexplosivo_numTaladro = :valexplosivo_numTaladro,
            valexplosivo_talVacio = :valexplosivo_talVacio,
            valexplosivo_piePerf = :valexplosivo_piePerf,
            valexplosivo_pieReal = :valexplosivo_pieReal,
            valexplosivo_dimSemigelatinosa_Result = :valexplosivo_dimSemigelatinosa_Result,
            valexplosivo_dimPulverulenta_Result = :valexplosivo_dimPulverulenta_Result,
            valexplosivo_numMaquina = :valexplosivo_numMaquina,
            id_colaborador = :id_colaborador,
            valexplosivo_emulmil = :valexplosivo_emulmil,
            valexplosivo_emultresmil = :valexplosivo_emultresmil,
            valexplosivo_dimSemigelatinosa = :valexplosivo_dimSemigelatinosa,
            valexplosivo_dimPulverulenta = :valexplosivo_dimPulverulenta,
            valexplosivo_sumaSemiPulv = :valexplosivo_sumaSemiPulv,
            valexplosivo_carmexsiete = :valexplosivo_carmexsiete,
            valexplosivo_carmexocho = :valexplosivo_carmexocho,
            valexplosivo_mecRapida = :valexplosivo_mecRapida,
            valexplosivo_mecLenta = :valexplosivo_mecLenta,
            valexplosivo_fulN = :valexplosivo_fulN,
            valexplosivo_conMecha = :valexplosivo_conMecha,
            valexplosivo_BlockSugecion = :valexplosivo_BlockSugecion,
            valexplosivo_carcortrece = :valexplosivo_carcortrece,
            valexplosivo_totalKiloEmul1000 = :valexplosivo_totalKiloEmul1000,
            valexplosivo_totalKiloEmul3000 = :valexplosivo_totalKiloEmul3000
            WHERE valexplosivo_preimpresor = :preImpreso;";
            $insertValue = $this->db->prepare($query);
            $insertValue->bindParam(':valexplosivo_nvale', $formRequest['nVale'], PDO::PARAM_STR);
            $insertValue->bindParam(':id_zona', $formRequest['zonId'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_fecha', $formRequest['fecha'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_turno', $formRequest['turno'], PDO::PARAM_STR);
            $insertValue->bindParam(':id_labor', $formRequest['idLabor'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_tipDisparo', $formRequest['tipoDisparo'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_tipEn', $formRequest['tipoEn'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_barra', $formRequest['barra'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_lgt', $formRequest['lgt'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_numTaladro', $formRequest['nTaladros'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_talVacio', $formRequest['talVacio'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_piePerf', $formRequest['piesPerf'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_pieReal', $formRequest['piesReal'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimSemigelatinosa_Result', $formRequest['res_dinSemi'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimPulverulenta_Result', $formRequest['res_dinPulv'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_numMaquina', $formRequest['nMaquinas'], PDO::PARAM_STR);
            $insertValue->bindParam(':id_colaborador', $formRequest['idColaborador_perforista'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_emulmil', $formRequest['emulnorMil'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_emultresmil', $formRequest['emulnorTresmil'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimSemigelatinosa', $formRequest['val_dinamitaSemigelatinosa'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_dimPulverulenta', $formRequest['dinamitaPulverulenta'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_sumaSemiPulv', $formRequest['carmen7'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_carmexsiete', $formRequest['carmen7'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_carmexocho', $formRequest['carmen8'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_mecRapida', $formRequest['mechaRapida'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_mecLenta', $formRequest['mechaLenta'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_fulN', $formRequest['fulminante'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_conMecha', $formRequest['conectorMecha'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_BlockSugecion', $formRequest['blockSugeccion'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_carcortrece', $formRequest['carCortado13'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_totalKiloEmul1000', $formRequest['totalKilos_dinamitaEmulnorMil'], PDO::PARAM_STR);
            $insertValue->bindParam(':valexplosivo_totalKiloEmul3000', $formRequest['totalKilos_dinamitaEmulnorTresmil'], PDO::PARAM_STR);
            $insertValue->bindParam(':preImpreso', $formRequest['preImpreso'], PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            if($sqlrpt){
                //$this->db->commit();
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se actulizo correctamente",
                    "coperacion" => '...',
                ];
            }
            else{
                echo "\nPDO::errorInfo():\n";
                //print_r($result->errorInfo());
            }
            return $rptSql;
        } catch (PDOException $e) {
            if($e->getCode() == 23000){
                $messageUser = "Se duplico n° de Vale";
            }
            elseif($e->getCode() == 42000){
                $messageUser = "La sintaxis esta mal";
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

    public function delete(string $idEliminar)
    {
        //error_reporting(0);
        try {
            $query  = "DELETE FROM tvalexplosivos WHERE valexplosivo_codigoRegistro=:id;";
            $result = $this->db->prepare($query);
            $result->execute(array(':id' => $idEliminar));
            return 'Se elimino correctamente.';
        } catch (PDOException $e) {
            return 'Ocurrio un ERROR al eliminar a'. $e->getMessage();
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