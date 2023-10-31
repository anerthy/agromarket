<?php
require_once("Libraries/Core/Mysql.php");
trait TProducto
{
    public $con;
    public function listadoProductos()
    {
        $this->con = new Mysql();
        $sql = "SELECT
                    pro_id,
                    pro_nombre,
                    pro_descripcion,
                    LOWER(pro_categoria) as pro_categoria,
                    pro_precio,
                    pro_imagen
                FROM productos
                WHERE pro_estado = 'Activo'";
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

    public function getProductById(int $id)
    {
        $this->con = new Mysql();
        $sql = "SELECT
                    pro_id,
                    pro.usr_id usr_id,
                    pro.per_cedula per_cedula,
                    pro_nombre,
                    pro_descripcion,
                    pro_categoria,
                    pro_precio,
                    pro_imagen,
                    pdt_nombre,
                    pdt_ubicacion,
                    pdt_imagen,
                    per_telefono
                FROM 
                    productos pro, 
                    productores pdt, 
                    personas per
                WHERE pro_id = $id
                  AND pro_estado = 'Activo'
                  AND pro.usr_id = pdt.usr_id
                  AND pro.per_cedula = pdt.per_cedula
                  AND per.per_cedula = pro.per_cedula";
        $request = $this->con->select_all($sql);
        return $request;
    }
}
