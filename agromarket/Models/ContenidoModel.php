<?php
class ContenidoModel extends Mysql
{
    public $intIdContenido;
    public $strTitulo;
    public $strContenido;
    public $strPagina;
    public $intPosicion;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectContenidos()
    {
        $sql = "SELECT  cont_id, 
                        cont_titulo, 
                        cont_contenido, 
                        cont_pagina,
                        cont_posicion 
                FROM contenidos_paginas";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectContenido(int $cont_id)
    {
        $this->intIdContenido = $cont_id;
        $sql = "SELECT  cont_id, 
                        cont_titulo, 
                        cont_contenido, 
                        cont_pagina,
                        cont_posicion  
                FROM contenidos_paginas 
                WHERE cont_id = $this->intIdContenido";
        $request = $this->select($sql);
        return $request;
    }

    public function insertContenido(string $titulo, string $contenido, string $pagina, int $posicion)
    {
        $return = "";
        $this->strTitulo = $titulo;
        $this->strContenido = $contenido;
        $this->strPagina = $pagina;
        $this->intPosicion = $posicion;

        $sql = "SELECT cont_id 
                FROM contenidos_paginas 
                WHERE cont_titulo = '{$this->strTitulo}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO contenidos_paginas (cont_titulo, 
                                                            cont_contenido, 
                                                            cont_pagina,
                                                            cont_posicion)
                                VALUES(?,?,?,?)";
            $arrData = array(
                $this->strTitulo,
                $this->strContenido,
                $this->strPagina,
                $this->intPosicion
            );
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateContenido(int $cont_id, string $titulo, string $contenido)
    {
        $this->intIdContenido = $cont_id;
        $this->strTitulo = $titulo;
        $this->strContenido = $contenido;
        // $this->strPagina = $pagina;
        // $this->intPosicion = $posicion;

        $sql = "SELECT cont_id 
                FROM contenidos_paginas 
                WHERE cont_titulo = '$this->strTitulo' 
                AND cont_id != $this->intIdContenido";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE contenidos_paginas 
                    SET cont_titulo = ?, 
                        cont_contenido = ?
                        WHERE cont_id = $this->intIdContenido ";
            $arrData = array(
                $this->strTitulo,
                $this->strContenido
            );
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }
}
