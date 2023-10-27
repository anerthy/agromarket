<?php
require_once("Libraries/Core/Mysql.php");
trait TEspecie
{
    public $con;

    public function getEspeciesT()
    {
        $this->con = new Mysql();
        $sql = "SELECT  esp_id,
                        esp_nombre_cientifico,
                        esp_nombre_comun,
                        esp_descripcion,
                        esp_imagen 
                FROM especies 
                WHERE esp_estado = 2";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['esp_imagen'] = BASE_URL . '/Assets/images/uploads/especies/' . $request[$i]['esp_imagen'];
            }
        }
        return $request;
    }
}
