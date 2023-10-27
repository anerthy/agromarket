<?php
require_once("Libraries/Core/Mysql.php");
trait TAlimentacion
{
    public $con;

    public function getAlimentacionT()
    {
        $this->con = new Mysql();
        $sql = "SELECT  alim_id, 
                        alim_nombre, 
                        alim_descripcion, 
                        alim_direccion, 
                        CONCAT(DATE_FORMAT(alim_hora_apertura, '%h:%i %p'),' - ',DATE_FORMAT(alim_hora_cierre, '%h:%i %p')) AS alim_horario, 
                        alim_telefono, 
                        alim_imagen 
                FROM alimentaciones 
                WHERE alim_estado = 2;";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['alim_imagen'] = BASE_URL . '/Assets/images/uploads/alimentaciones/' . $request[$i]['alim_imagen'];
            }
        }
        return $request;
    }
}
