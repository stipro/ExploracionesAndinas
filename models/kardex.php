<?php
//declare (strict_types = 1);
require_once '../db/conexion.php';

class kardexGeneral extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }
    public function explosivos(int $idExplosivo)
    {
        try 
        {
            $this->db->setAttribute(pdo::ATTR_EMULATE_PREPARES, 0);
            $query = "
            SELECT T.valexplosivo_nvale, T.kardex_fechaRegistro, T.explosivo_codigo, T.explosivo_descripcion, T.kardex_tipo, T.kardex_cantidad,
T.Entrada, T.Salida, T.saldo, T.saldo
   FROM (
      SELECT ek.valeExplosivo_id, valexplosivo_nvale, ek.kardex_tipo, kardex_fechaRegistro, explosivo_id, 
		e.explosivo_codigo, e.explosivo_descripcion, e.explosivo_unidadMedida,
		kardex_cantidad, (SELECT @total:=0),
		@entrada := IF(ek.kardex_tipo = 'entrada',(ek.kardex_cantidad),(0)) AS Entrada,
		@salida := IF(ek.kardex_tipo = 'salida',(ek.kardex_cantidad),(0)) AS Salida,
		        CASE 
		            WHEN (@explosivo = '' OR @explosivo = ek.explosivo_id) AND ek.kardex_tipo = 'entrada' THEN @saldo:= @saldo + ek.kardex_cantidad
		            WHEN (@explosivo = '' OR @explosivo = ek.explosivo_id) AND ek.kardex_tipo = 'salida' THEN @saldo:= @saldo - ek.kardex_cantidad
		            WHEN @explosivo != ek.explosivo_id AND ek.kardex_tipo = 'entrada' THEN @saldo:= 0 + ek.kardex_cantidad
		            WHEN @explosivo != ek.explosivo_id AND ek.kardex_tipo = 'salida' THEN @saldo:= 0 - ek.kardex_cantidad
		        END AS Saldo,
		        @explosivo:= ek.explosivo_id
		        FROM (SELECT (SELECT @saldo:=0), (SELECT @explosivo:=0), tk.* FROM tvalexplosivos_kardex AS tk) AS ek 
				  LEFT JOIN tvalexplosivos AS vlES ON ek.valeExplosivo_id = vlES.id_valexplosivo
				  LEFT JOIN explosivos AS e ON ek.explosivo_id = e.id_explosivo
		        ORDER BY ek.explosivo_id, ek.kardex_fechaRegistro
        ) T WHERE T.explosivo_id = {$idExplosivo};";
            return $this->ConsultaSimple($query);
        }
        catch (PDOException $e) {
            return 'Se registro ERROR '. $e->getMessage();
        }
        
    }
    public function explosivos2(string $idExplosivo): array
    {
        $query = "
        SET @saldo:= 0;
        SELECT ve.valexplosivo_codigoRegistro, ve.valexplosivo_fecha, ve.valexplosivo_nvale,veK.*, @saldo := IF(veK.kardex_tipo = 'salida',
        (@saldo - veK.kardex_cantidad),(@saldo + veK.kardex_cantidad)
        ) AS saldo
        FROM tvalexplosivos_kardex AS veK
        LEFT JOIN tvalexplosivos AS ve ON veK.valeExplosivo_id = ve.id_valexplosivo
        WHERE veK.explosivo_id = {$idExplosivo} ORDER BY veK.kardex_fechaRegistro ASC;";
        return $this->ConsultaSimple($query);
    }
    public function explosivos3(): array
    {
        $query = "
        SELECT  T.kardex_fechaRegistro, T.explosivo_id, T.kardex_tipo, T.kardex_cantidad, T.saldo
        FROM (
        SELECT explosivo_id, kardex_fechaRegistro, kardex_tipo, kardex_cantidad,
        CASE 
            WHEN (@EXPLOSIVO = '' OR @EXPLOSIVO = vek.explosivo_id) AND kardex_tipo = 'entrada' THEN @SALDO:= @SALDO + veK.kardex_cantidad
            WHEN (@EXPLOSIVO = '' OR @EXPLOSIVO = vek.explosivo_id) AND kardex_tipo = 'salida' THEN @SALDO:= @SALDO - veK.kardex_cantidad
            WHEN @EXPLOSIVO != explosivo_id AND kardex_tipo = 'entrada' THEN @SALDO := 0 + kardex_cantidad
            WHEN @EXPLOSIVO != explosivo_id AND kardex_tipo = 'salida' THEN @SALDO := 0 - kardex_cantidad
        END AS saldo,
        @EXPLOSIVO:= explosivo_id
        FROM tvalexplosivos_kardex AS vek
        ORDER BY veK.explosivo_id, veK.kardex_fechaRegistro
        ) T;";
        return $this->ConsultaSimple($query);
    }
}