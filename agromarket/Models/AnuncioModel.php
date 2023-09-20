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
                WHERE 1 ";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectAnuncio(int $ANU_ID)
    {
        $this->intIdAnuncio = $ANU_ID;
        $sql = "SELECT anu_id, 
                anu_descripcion, 
                anu_tipo, 
                anu_imagen, 
                anu_fec_vigencia, 
                anu_estado 
                FROM anuncios 
                WHERE ANU_ID = $this->intIdAnuncio";
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

        $sql = "SELECT ANU_DESCRIPCION 
                FROM anuncios 
                WHERE ANU_DESCRIPCION = '{$this->strDescripcion}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO anuncios
                            (ANU_DESCRIPCION, 
                            ANU_TIPO, 
                            ANU_IMAGEN, 
                            ANU_FEC_VIGENCIA, 
                            ANU_ESTADO) 
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

    public function updateAnuncio(int $ANU_ID, string $descripcion, string $tipo, string $imagen, string $fechaVigencia, string $estado)
    {
        $this->intIdAnuncio = $ANU_ID;
        $this->strDescripcion = $descripcion;
        $this->strTipo = $tipo;
        $this->strImagen = $imagen;
        $this->strFechaVigencia = $fechaVigencia;
        $this->strEstado = $estado;

        $sql = "SELECT ANU_ID 
                FROM anuncios 
                WHERE ANU_DESCRIPCION = '$this->strDescripcion' 
                AND ANU_ID != $this->intIdAnuncio";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE anuncios 
                    SET ANU_DESCRIPCION = ?, 
                        ANU_TIPO = ?, 
                        ANU_IMAGEN = ?, 
                        ANU_FEC_VIGENCIA = ?, 
                        ANU_ESTADO = ? 
                    WHERE ANU_ID = $this->intIdAnuncio ";
            $arrData = array($this->strDescripcion, $this->strTipo, $this->strImagen, $this->strFechaVigencia, $this->strEstado);
            $request = $this->update($sql, $arrData);

        } else {
            $request = "exist";
        }
        return $request;
    }

    public function disableAnuncio(int $ANU_ID)
    {
        $this->intIdAnuncio = $ANU_ID;
        $sql = "UPDATE anuncios 
                SET ANU_ESTADO = 'Eliminado' 
                WHERE ANU_ID = $this->intIdAnuncio";
        $request = $this->update($sql);
        return $request;
    }

    public function deleteAnuncio(int $ANU_ID)
    {
        $this->intIdAnuncio = $ANU_ID;
        $sql = "DELETE FROM anuncios 
                WHERE ANU_ID = $this->intIdAnuncio";
        $request = $this->delete($sql);
        return $request;
    }
}
