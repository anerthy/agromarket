<?php
require_once("Libraries/Core/Mysql.php");
trait TComunidad
{
    public $con;

    public function getComunidadesT()
    {
        $this->con = new Mysql();
        $sql = "SELECT 	com_id, 
                        com_nombre, 
                        com_descripcion, 
                        com_provincia, 
                        com_canton, 
                        com_distrito, 
                        com_imagen 
                FROM comunidades;";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['com_imagen'] = BASE_URL . '/Assets/images/uploads/comunidades/' . $request[$i]['com_imagen'];
            }
        }
        return $request;
    }
}
