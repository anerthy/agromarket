<?php
require_once("Libraries/Core/Mysql.php");
trait TProducto
{
    public $con;
    public function getProducts()
    {
        $this->con = new Mysql();
        $sql = "SELECT
                    pro_id,
                    usr_id,
                    per_cedula,
                    pro_nombre,
                    pro_descripcion,
                    LOWER(pro_categoria) as pro_categoria,
                    pro_precio,
                    pro_imagen
                FROM
                    productos
                WHERE
                    pro_estado = 'Activo'";
        $request = $this->con->select_all($sql);
        return $request;
    }

    public function productosPremium()
    {
        $this->con = new Mysql();
        $sql = "SELECT COUNT(*) AS EXISTE
                FROM afiliados
                WHERE usr_id        = '{$_SESSION['userData']['usr_id']}' 
                  AND per_cedula    = '{$_SESSION['userData']['per_cedula']}';";
        $request = $this->con->select_all($sql);
        return $request;
    }
}
