<?php
require_once("Libraries/Core/Mysql.php");
trait TExistAfiliado
{
    public $con;

    public function existeAfiliado()
    {
        $this->con = new Mysql();
        $sql = "SELECT COUNT(*) AS EXISTE
                FROM afiliados
                WHERE usr_id = '{$_SESSION['userData']['usr_id']}' 
                  AND per_cedula = '{$_SESSION['userData']['per_cedula']}';";
        $request = $this->con->select_all($sql);
        return $request;
    }
}
