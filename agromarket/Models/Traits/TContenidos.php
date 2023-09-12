<?php
require_once("Libraries/Core/Mysql.php");
trait TContenidos
{
    public $con;

    public function getTextsInicio()
    {
        $this->con = new Mysql();
        $sql = "SELECT  cont_id,
                        cont_titulo,
                        cont_contenido,
                        cont_posicion
                FROM contenidos_paginas
                WHERE cont_pagina = 'Inicio'
                ORDER BY cont_posicion ASC";
        $request = $this->con->select_all($sql);
        return $request;
    }

    public function getTextsVoluntariado()
    {
        $this->con = new Mysql();
        $sql = "SELECT  cont_id,
                        cont_titulo,
                        cont_contenido,
                        cont_posicion
                FROM contenidos_paginas
                WHERE cont_pagina = 'Voluntariado'
                ORDER BY cont_posicion ASC";
        $request = $this->con->select_all($sql);
        return $request;
    }

    public function getTextsProyecto()
    {
        $this->con = new Mysql();
        $sql = "SELECT  cont_id,
                        cont_titulo,
                        cont_contenido,
                        cont_posicion
                FROM contenidos_paginas
                WHERE cont_pagina = 'Proyecto'
                ORDER BY cont_posicion ASC";
        $request = $this->con->select_all($sql);
        return $request;
    }

    public function getTextsEspecies()
    {
        $this->con = new Mysql();
        $sql = "SELECT  cont_id,
                        cont_titulo,
                        cont_contenido,
                        cont_posicion
                FROM contenidos_paginas
                WHERE cont_pagina = 'Especies'
                ORDER BY cont_posicion ASC";
        $request = $this->con->select_all($sql);
        return $request;
    }
}
