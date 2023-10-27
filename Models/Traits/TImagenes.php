<?php
require_once("Libraries/Core/Mysql.php");
trait TImagenes
{
    public $con;

    public function getImagesInicio()
    {
        $this->con = new Mysql();
        $sql = "SELECT  gal_descripcion,
                        gal_url 
                FROM galeria
                WHERE gal_pagina = 'Inicio' 
                ORDER BY gal_posicion ASC";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['gal_url'] = BASE_URL . '/Assets/images/uploads/galeria/' . $request[$i]['gal_url'];
            }
        }
        return $request;
    }

    public function getImagesProyecto()
    {
        $this->con = new Mysql();
        $sql = "SELECT  gal_descripcion,
                        gal_url 
                FROM galeria
                WHERE gal_pagina = 'Proyecto' 
                ORDER BY gal_posicion ASC";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['gal_url'] = BASE_URL . '/Assets/images/uploads/galeria/' . $request[$i]['gal_url'];
            }
        }
        return $request;
    }

    public function getImagesVoluntariado()
    {
        $this->con = new Mysql();
        $sql = "SELECT  gal_descripcion,
                        gal_url 
                FROM galeria
                WHERE gal_pagina = 'Voluntariado' 
                ORDER BY gal_posicion ASC";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['gal_url'] = BASE_URL . '/Assets/images/uploads/galeria/' . $request[$i]['gal_url'];
            }
        }
        return $request;
    }
}
