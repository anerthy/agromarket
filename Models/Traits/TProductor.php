<?php
require_once("Libraries/Core/Mysql.php");
trait TProductor
{
    public $con;

    public function existeProductor()
    {
        $this->con = new Mysql();
        $sql = "SELECT 
                    COUNT(*) AS EXISTE
                FROM productores
                WHERE usr_id        = '{$_SESSION['userData']['usr_id']}' 
                  AND per_cedula    = '{$_SESSION['userData']['per_cedula']}';";
        $request = $this->con->select_all($sql);
        return $request;
    }
}
