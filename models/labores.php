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
    // DataTables
    // Obtener Tabla
    public function getAll(){
        $query = "SELECT lb.id_labor, lb.lab_codigo, lb.lab_ccostos, lb_nom.labNombre_nombre, lb_nom.labNombre_etapa, lb_nom.labNombre_prefijo, lb_nom.labNombre_tipo, lb_zn.labZona_nombre, lb_zn.labZona_letra, lb.lab_tipo, lb.lab_veta, lb.lab_nivel, lb.lab_metodoExplotacion, lb.lab_seccion, lb.lab_tipoEq, lb.lab_tipoRoca , sd.nombre_sede, sd.abrev_sede FROM {$this->table} AS lb LEFT JOIN lab_nombres AS lb_nom ON lb.id_labNombre = lb_nom.id_labNombre LEFT JOIN lab_zonas AS lb_zn ON lb.id_zona = lb_zn.id_zona LEFT JOIN sedes AS sd ON lb.sede_id = sd.id_sede";
        return $this->ConsultaSimple($query);
    }
}
