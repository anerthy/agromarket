<?php

class AnuncioModel extends Mysql
{
    public $intIdAnuncio;
    public $strDescripcion;
    public $strTipo;
    public $strImagen;
    public $strFechaVigencia;
    public $strEstado;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectAnuncios()
    {
        $sql = "SELECT  anu_id,
                        anu_descripcion,
                        anu_tipo,
                        anu_imagen,
                        anu_fec_vigencia,
                        anu_estado
                FROM anuncios
                ";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectAnuncio(int $anu_id)
    {
        $this->intIdAnuncio = $anu_id;
        $sql = "SELECT anu_id, 
                anu_descripcion, 
                anu_tipo, 
                anu_imagen, 
                anu_fec_vigencia, 
                anu_estado 
                FROM anuncios 
                WHERE anu_id = $this->intIdAnuncio";
        $request = $this->select($sql);
        return $request;
    }

    public function insertAnuncio(string $descripcion, string $tipo, string $imagen, string $fechaVigencia, string $estado)
    {
        $return = "";
        $this->strDescripcion = $descripcion;
        $this->strTipo = $tipo;
        $this->strImagen = $imagen;
        $this->strFechaVigencia = $fechaVigencia;
        $this->strEstado = $estado;

        $sql = "SELECT anu_descripcion 
                from anuncios 
                where anu_descripcion = '{$this->strDescripcion}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO anuncios
                            (anu_descripcion, 
                            anu_tipo, 
                            anu_imagen, 
                            anu_fec_vigencia, 
                            anu_estado) 
                            VALUES(?,?,?,?,?)";

            $arrData = array($this->strDescripcion, 
                            $this->strTipo, 
                            $this->strImagen, 
                            $this->strFechaVigencia, 
                            "Activo");
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateAnuncio(int $anu_id, string $descripcion, string $tipo, string $imagen, string $fechaVigencia, string $estado)
    {
        $this->intIdAnuncio = $anu_id;
        $this->strDescripcion = $descripcion;
        $this->strTipo = $tipo;
        $this->strImagen = $imagen;
        $this->strFechaVigencia = $fechaVigencia;
        $this->strEstado = $estado;

        $sql = "SELECT anu_id 
                FROM anuncios 
                WHERE anu_descripcion = '$this->strDescripcion' 
                AND anu_id != $this->intIdAnuncio";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE anuncios 
                    SET anu_descripcion = ?, 
                        anu_tipo = ?, 
                        anu_imagen = ?, 
                        anu_fec_vigencia = ?, 
                        anu_estado = ? 
                    WHERE anu_id = $this->intIdAnuncio ";
            $arrData = array($this->strDescripcion, $this->strTipo, $this->strImagen, $this->strFechaVigencia, $this->strEstado);
            $request = $this->update($sql, $arrData);

        } else {
            $request = "exist";
        }
        return $request;
    }

    public function disableAnuncio(int $anu_id)
    {
        $this->intIdAnuncio = $anu_id;
        $sql = "UPDATE anuncios 
                SET anu_estado = 'Eliminado' 
                WHERE anu_id = $this->intIdAnuncio";
        $request = $this->update($sql);
        return $request;
    }

    public function deleteAnuncio(int $anu_id)
    {
        $this->intIdAnuncio = $anu_id;
        $sql = "DELETE FROM anuncios 
                WHERE anu_id = $this->intIdAnuncio";
        $request = $this->delete($sql);
        return $request;
    }
}
