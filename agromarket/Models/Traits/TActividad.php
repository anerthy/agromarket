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
                    LOWER(act_lugar) AS act_lugar,
                    act_categoria,
                    act_imagen
                FROM actividades
                WHERE act_estado = 'Activo'";
        $request = $this->con->select_all($sql);
        return $request;
    }
}
