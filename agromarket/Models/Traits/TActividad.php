<?php
require_once("Libraries/Core/Mysql.php");
trait TActividad
{
    public $con;
    public function listadoActividades()
    {
        $this->con = new Mysql();
        $sql = "SELECT
                    act_id,
                    act_nombre,
                    act_descripcion,
                    act_fecha,
                    act_lugar,
                    act_categoria,
                    act_imagen,
                    act_estado,
                    act_fec_creacion,
                    act_fec_modificacion,
                    usr_id
                FROM actividades
                WHERE act_estado = 'Activo'";
        $request = $this->con->select_all($sql);
        return $request;
    }

    public function productosPremium()
    {
        $this->con = new Mysql();
        $sql = "WITH RankedProducts AS (
                    SELECT
                        pro_id,
                        pro_nombre,
                        pro_descripcion,
                        LOWER(pro_categoria) as pro_categoria,
                        pro_precio,
                        pro_imagen,
                        ROW_NUMBER() OVER (PARTITION BY per_cedula ORDER BY pro_id) AS row_num
                    FROM productos_premium
                )
                
                SELECT
                    pro_id,
                    pro_nombre,
                    pro_descripcion,
                    pro_categoria,
                    pro_precio,
                    pro_imagen
                FROM RankedProducts
        WHERE row_num <= 3;
                LIMIT";
        $request = $this->con->select_all($sql);
        return $request;
    }
}
