<?php
require_once("Libraries/Core/Mysql.php");
trait TAfiliado
{
    public $con;
    public function getDataAfiliation()
    {
        $this->con = new Mysql();
        $sql = "SELECT
                    afl.usr_id,
                    afl.per_cedula,
                    DATE_FORMAT(afl_fec_vencimiento, '%d/%m/%Y') afl_fec_vencimiento,
                    pdt_nombre,
                    pdt_imagen
                FROM afiliados AS afl, productores AS pdt
                WHERE afl.usr_id    = pdt.usr_id
                AND afl.per_cedula  = pdt.per_cedula
                AND afl.usr_id      = '{$_SESSION['userData']['usr_id']}' 
                AND afl.per_cedula  = '{$_SESSION['userData']['per_cedula']}';";
        $request = $this->con->select_all($sql);
        return $request;
    }

    public function existeAfiliado()
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
