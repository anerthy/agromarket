<?php
require_once("Libraries/Core/Mysql.php");
trait TGrupo
{
    public $con;

    public function getGruposT()
    {
        $this->con = new Mysql();
        $sql = "SELECT	gpo_id,
                        gpo_nombre,
                        gpo_representante,
                        gpo_descripcion,
                        gpo_ubicacion,
                        gpo_correo,
                        gpo_telefono,
                        gpo_numero_integrantes,
                        gpo_logo,
                        com_nombre
                FROM grupos_organizados 
                INNER JOIN comunidades
                ON gpo_comunidad = com_id
                WHERE gpo_estado = 2";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['gpo_logo'] = BASE_URL . '/Assets/images/uploads/grupos/' . $request[$i]['gpo_logo'];
            }
        }
        return $request;
    }
}
