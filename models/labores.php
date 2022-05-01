<?php
//declare (strict_types = 1);
require_once '../db/conexion.php';

class Labores extends Conexion
{
    //Declaro tabla
    protected $table = 'labores';
    //Constructor
    public function __construct()
    {
        parent::__construct();
    }
    public function getDatalistAll_zonaNombre(){
        $query = "SELECT lb_zn.id_zona, lb_zn.labZona_nombre FROM lab_zonas AS lb_zn;";
        return $this->ConsultaSimple($query);
    }
    public function getDatalistAll_ccosto(){
        $query = "SELECT lb.id_labor, lb.lab_ccostos FROM labores AS lb;";
        return $this->ConsultaSimple($query);
    }

    public function getDt_labZonas_nombre(){
        $query = "SELECT lb_zn.id_zona, lb_zn.labZona_nombre FROM lab_zonas AS lb_zn";
        return $this->ConsultaSimple($query);
    }
    public function insertPrincipal($items){
        try {
            $query = "INSERT INTO labores (lab_ccostos, lab_tipo, lab_veta, lab_nivel, lab_metodoExplotacion, lab_seccion, lab_tipoEq, lab_tipoRoca, id_labNombre, id_zona, unidadMedica_id) 
                            VALUES (:item1, :item2, :item3, :item4, :item5, :item6, :item7, :item8, :item9, :item10, :item11)";
            $insertValue = $this->db->prepare($query);
            $insertValue->bindParam(':item1', $items['ccosto_labor'], PDO::PARAM_STR);
            $insertValue->bindParam(':item2', $items['tipo_labor'], PDO::PARAM_STR);
            $insertValue->bindParam(':item3', $items['veta_labor'], PDO::PARAM_STR);
            $insertValue->bindParam(':item4', $items['nivel_labor'], PDO::PARAM_STR);
            $insertValue->bindParam(':item5', $items['mexplotacion_labor'], PDO::PARAM_STR);
            $insertValue->bindParam(':item6', $items['seccion_labor'], PDO::PARAM_STR);
            $insertValue->bindParam(':item7', $items['tipoEq_labor'], PDO::PARAM_STR);
            $insertValue->bindParam(':item8', $items['tipRocca_labor'], PDO::PARAM_STR);
            $insertValue->bindParam(':item9', $items['id_laborName'], PDO::PARAM_STR);
            $insertValue->bindParam(':item10', $items['id_laborZone'], PDO::PARAM_STR);
            $insertValue->bindParam(':item11', $items['id_laborUnitMining'], PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente",
                    "id" => $lastcolIdsql
                ];
            }
            return $rptSql;
                
        } catch (PDOException $e) {
            
            if($e->getCode() == 23000){
                $messageUser = "Se duplico Centro de costos";
            }
            elseif ($e->getCode() == 22001) {
                $messageUser = "Tamaño excedido";
            }
            elseif ($e->getCode() == 'HY000') {
                $messageUser = "Tipo de valor incorrecto";
            }
            else{
                $messageUser = "";
            }
            $rptSql = [
                "estado" => 0,
                "messageDeveloper" => "Se encontro ERROR ".$e->getMessage(),
                "mensaje" => $messageUser,
                "messageUser" => $messageUser,
                "codigo" => $e->getCode(),
                "string" => $e->__toString(),
            ];
            return $rptSql;
        }
    }

    public function insert_selectUno($datonombreLabor, int $datoid_laborName, $datoprefijoLabor, $datotipoLabor){
        try {
            $query = "INSERT INTO lab_nombres (labNombre_nombre, labNombEtapas_id, labNombre_prefijo, labNombre_tipo) 
                            VALUES (:item1,:item2,:item3,:item4)";
            $insertValue = $this->db->prepare($query);
            $insertValue->bindParam(':item1', $datonombreLabor, PDO::PARAM_STR);
            $insertValue->bindParam(':item2', $datoid_laborName, PDO::PARAM_STR);
            $insertValue->bindParam(':item3', $datoprefijoLabor, PDO::PARAM_STR);
            $insertValue->bindParam(':item4', $datotipoLabor, PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente",
                    "id" => $lastcolIdsql
                ];
            }
            return $rptSql;
                
        } catch (PDOException $e) {
            
            if($e->getCode() == 23000){
                $messageUser = "Se duplico Centro de costos";
            }
            elseif ($e->getCode() == 22001) {
                $messageUser = "Tamaño excedido";
            }
            elseif ($e->getCode() == 'HY000') {
                $messageUser = "Tipo de valor incorrecto";
            }
            else{
                $messageUser = "";
            }
            $rptSql = [
                "estado" => 0,
                "messageDeveloper" => "Se encontro ERROR ".$e->getMessage(),
                "mensaje" => $messageUser,
                "messageUser" => $messageUser,
                "codigo" => $e->getCode(),
                "string" => $e->__toString(),
            ];
            return $rptSql;
        }
    }
    public function insert_selectUno_selectUno($items){
        try {
            $query = "INSERT INTO lab_nomb_etapas (nombre_etapa) 
                            VALUES (:item1)";
            $insertValue = $this->db->prepare($query);
            $insertValue->bindParam(':item1', $items['nombre_etapa'], PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente",
                    "id" => $lastcolIdsql
                ];
            }
            return $rptSql;
                
        } catch (PDOException $e) {
            
            if($e->getCode() == 23000){
                $messageUser = "Se duplico n° de Vale";
            }
            elseif ($e->getCode() == 22001) {
                $messageUser = "Tamaño excedido";
            }
            elseif ($e->getCode() == 'HY000') {
                $messageUser = "Tipo de valor incorrecto";
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
    }
    public function insert_selectdos($items){
        try {
            $query = "INSERT INTO unidad_mineras (nombre_unidad_mineras, abrev_unidad_mineras) 
                            VALUES (:item1,:item2)";
            $insertValue = $this->db->prepare($query);
            $insertValue->bindParam(':item1', $items['unidMinera_nombre'], PDO::PARAM_STR);
            $insertValue->bindParam(':item2', $items['unidMinera_abrev'], PDO::PARAM_STR);
            $sqlrpt = $insertValue->execute();
            $lastcolIdsql = $this->db->lastInsertId();
            if($sqlrpt){
                $rptSql = [
                    "estado" => 1,
                    "mensaje" => "Se registro correctamente",
                    "id" => $lastcolIdsql
                ];
            }
            return $rptSql;
                
        } catch (PDOException $e) {
            
            if($e->getCode() == 23000){
                $messageUser = "Se duplico n° de Vale";
            }
            elseif ($e->getCode() == 22001) {
                $messageUser = "Tamaño excedido";
            }
            elseif ($e->getCode() == 'HY000') {
                $messageUser = "Tipo de valor incorrecto";
            }
            else{
                $messageUser = "";
            }
            $rptSql = [
                "estado" => 0,
                "messageDeveloper" => "Se encontro ERROR ".$e->getMessage(),
                "mensaje" => $messageUser,
                "messageUser" => $messageUser,
                "codigo" => $e->getCode(),
                "string" => $e->__toString(),
            ];
            return $rptSql;
        }
    }
    // Obtiene Lista especifica
    public function getSelect(string $table, string $column, string $idTable)
    {
        $query = "SELECT {$idTable}, {$column}, id_labNombre FROM {$table} ORDER BY {$column} ASC ;";
        return $this->ConsultaSimple($query);
    }
    public function getLaborNombre(){
        $query = "SELECT lb_nb.id_labNombre, lb_nb.labNombre_nombre, lb_nb_ep.nombre_etapa, lb_nb.labNombre_prefijo, lb_nb.labNombre_tipo FROM lab_nombres AS lb_nb LEFT JOIN lab_nomb_etapas AS lb_nb_ep ON lb_nb.id_labNombre = lb_nb_ep.id_etapa;";
        return $this->ConsultaSimple($query);
    }
    public function getLaborZona($where)
    {
        $query = "SELECT lb.id_labor, lbnombre.labNombre_nombre, lbzonas.labZona_nombre FROM labores AS lb LEFT JOIN lab_nombres AS lbnombre ON lb.id_labNombre = lbnombre.id_labNombre LEFT JOIN lab_zonas AS lbzonas ON lb.id_zona = lbzonas.id_zona WHERE id_labor = {$where};";
        return $this->ConsultaSimple($query);
    
    }
    // Todo datos en select
    public function getAll_zona(){
        $query = "SELECT lb_zn.id_zona, lb_zn.labZona_nombre, lb_zn.labZona_letra FROM lab_zonas AS lb_zn";
        return $this->ConsultaSimple($query);
    }
    public function getLaborZona_detalle($where)
    {
        $query = "SELECT lb.id_labor, lbnombre.labNombre_nombre, lbzonas.labZona_nombre FROM labores AS lb LEFT JOIN lab_nombres AS lbnombre ON lb.id_labNombre = lbnombre.id_labNombre LEFT JOIN lab_zonas AS lbzonas ON lb.id_zona = lbzonas.id_zona WHERE id_labor = {$where};";
        return $this->ConsultaSimple($query);
    
    }
    # EJEMPLO OBTENER UNA LISTA SEGUN SOLICITADO
    public function getColumnsWhere(string $parament)
    {
        $query = "SELECT lbz.labZona_nombre, lbn.labNombre_nombre, lb.lab_nivel FROM labores AS lb LEFT JOIN lab_zonas AS lbz ON  lb.id_zona = lbz.id_zona LEFT JOIN lab_nombres AS lbn ON lb.id_labNombre = lbn.id_labNombre WHERE lb.id_labor = {$parament};";
        return $this->ConsultaSimple($query);
    }

    public function getSizeColumn(string $table)
    {
        $query = "SELECT COUNT(*) FROM {$table};";
        return  intval($this->db->query($query)->fetch(PDO::FETCH_BOTH)[0]);
    }
    // Obtiene Lista especifica
    public function getSelectWhere(string $table, string $column, string $parament, string $idTable, string $columnWhere)
    {
        $sizeRow = $this->getSizeColumn($table);
        $where = "WHERE {$columnWhere} = '{$parament}'";
        $query = "SELECT {$column}, {$idTable} FROM {$table} " .$where; 
        return $this->ConsultaSimple($query);
    }
    public function getCcosto(){
        $query = "SELECT lb.id_labor, lb.lab_ccostos FROM labores AS lb WHERE lb.id_labor;";
        return $this->ConsultaSimple($query);
    }
    public function getColumn_cCostos(){
        $query = "SELECT lb.id_labor, lb.lab_ccostos FROM labores AS lb;";
        return $this->ConsultaSimple($query);
    }
    public function getUnidMinera(){
        $query = "SELECT ud_me.id_unidadMinera, ud_me.nombre_unidadMinera, ud_me.abrev_unidadMinera FROM unidad_mineras AS ud_me;";
        return $this->ConsultaSimple($query);
    }
    public function getLaborNombre_etapa(){
        $query = "SELECT lbNomEtapas.id_etapa, lbNomEtapas.nombre_etapa FROM lab_nomb_etapas AS lbNomEtapas;";
        return $this->ConsultaSimple($query);
    }
    // DataTables
    // Obtener Tabla
    public function getAll(){
        $query = "SELECT lb.lab_ccostos, lb_nm.labNombre_nombre, lb_nm_ep.nombre_etapa, lb_nm.labNombre_prefijo, lb_nm.labNombre_tipo, lb_zn.labZona_nombre, lb_zn.labZona_letra, lb.lab_tipo, lb.lab_veta, lb.lab_nivel, lb.lab_metodoExplotacion, lb.lab_seccion, lb.lab_tipoEq, lb.lab_tipoRoca, ud_mn.nombre_unidadMinera FROM labores AS lb LEFT JOIN lab_nombres AS lb_nm ON lb.id_labNombre = lb_nm.id_labNombre LEFT JOIN lab_nomb_etapas AS lb_nm_ep ON lb_nm.labNombEtapas_id = lb_nm_ep.id_etapa LEFT JOIN lab_zonas AS lb_zn ON lb.id_zona = lb_zn.id_zona LEFT JOIN unidad_mineras AS ud_mn ON lb.unidadMedica_id = ud_mn.id_unidadMinera;";
        return $this->ConsultaSimple($query);
    }
}
