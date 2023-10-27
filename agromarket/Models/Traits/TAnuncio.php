<?php
require_once("Libraries/Core/Mysql.php");
trait TAnuncio
{
    public $con;
    public function anuncio_principal()
    {
        $this->con = new Mysql();
        $sql = "SELECT
                    anu_descripcion,
                    anu_imagen
                FROM anuncios
                WHERE anu_estado = 'Activo'
                  AND anu_fec_vigencia > CURRENT_DATE()
                LIMIT 1";
        $request = $this->con->select_all($sql);
        return $request;
    }
}
