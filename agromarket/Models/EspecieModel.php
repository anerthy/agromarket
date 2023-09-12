<?php

class EspecieModel extends Mysql
{
    public $intIdEspecie;
    public $strNombreCientifico;
    public $strNombreComun;
    public $strDescripcion;
    public $intEstado;
    public $strImagen;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectEspecies()
    {
        $sql = "SELECT  esp_id,
                        esp_nombre_cientifico,
                        esp_nombre_comun,
                        esp_descripcion,
                        esp_estado,
                        esp_imagen
                FROM especies 
                WHERE esp_estado in (1,2,3)";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectEspecie(int $esp_id)
    {
        $this->intIdEspecie = $esp_id;
        $sql = "SELECT  esp_id,
                        esp_nombre_cientifico,
                        esp_nombre_comun,
                        esp_descripcion,
                        esp_estado,
                        esp_imagen 
                FROM especies 
                WHERE esp_id = $this->intIdEspecie";
        $request = $this->select($sql);
        return $request;
    }

    public function insertEspecie(string $nombre_cientifico, string $nombre_comun, string $descripcion, string $estado, string $imagen)
    {

        $return = "";
        $this->strNombreCientifico = $nombre_cientifico;
        $this->strNombreComun = $nombre_comun;
        $this->strDescripcion = $descripcion;
        $this->intEstado = $estado;
        $this->strImagen = $imagen;

        $sql = "SELECT  esp_id,
                        esp_nombre_cientifico,
                        esp_nombre_comun,
                        esp_descripcion,
                        esp_estado,
                        esp_imagen 
                FROM especies 
                WHERE esp_nombre_cientifico = '{$this->strNombreCientifico}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  =    "INSERT INTO especies   (esp_nombre_cientifico,
                                                        esp_nombre_comun,
                                                        esp_descripcion,
                                                        esp_estado,
                                                        esp_imagen) 
                                VALUES (?,?,?,?,?)";
            $arrData = array($this->strNombreCientifico,  $this->strNombreComun, $this->strDescripcion, $this->intEstado, $this->strImagen);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateEspecie(int $esp_id, string $nombre_cientifico, string $nombre_comun, string $descripcion, string $estado, string $imagen)
    {
        $this->intIdEspecie = $esp_id;
        $this->strNombreCientifico = $nombre_cientifico;;
        $this->strNombreComun = $nombre_comun;
        $this->strDescripcion = $descripcion;
        $this->intEstado = $estado;
        $this->strImagen = $imagen;

        $sql = "SELECT  esp_id,
                        esp_nombre_cientifico,
                        esp_nombre_comun,
                        esp_descripcion,
                        esp_estado,
                        esp_imagen 
                FROM especies 
                WHERE   esp_nombre_cientifico = '$this->strNombreCientifico' 
                AND     esp_id != $this->intIdEspecie";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE especies 
                    SET esp_nombre_cientifico = ?,
                        esp_nombre_comun = ?,
                        esp_descripcion = ?,
                        esp_estado = ?,
                        esp_imagen = ? 
                    WHERE esp_id = $this->intIdEspecie ";
            $arrData = array($this->strNombreCientifico,  $this->strNombreComun, $this->strDescripcion, $this->intEstado, $this->strImagen);
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }

    public function deleteEspecie(int $esp_id)
    {
        $this->intIdEspecie = $esp_id;
        $sql = "DELETE from especies 
                WHERE esp_id = $this->intIdEspecie";
        $arrData = array(0);
        $request = $this->delete($sql, $arrData);
        return $request;
    }
}
