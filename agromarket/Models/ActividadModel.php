<?php

class ActividadModel extends Mysql
{
    public $intIdActividad;
    public $strNombre;
    public $strDescripcion;
    public $strFecha;
    public $strLugar;
    public $strCategoria;
    public $strImagen;
    public $strEstado;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectActividades()
    {
       
        $sql = "SELECT  act_id,
                        act_nombre,
                        act_descripcion,
                        act_fecha,
                        act_lugar,
                        act_categoria,
                        act_imagen,
                        act_estado
                FROM actividades
                WHERE act_estado IN ('Activo', 'Inactivo')";
        $request = $this->select_all($sql);
        return $request;
    }
    

    public function selectActividad(int $act_id)
    {
        $this->intIdActividad = $act_id;
        $sql = "SELECT act_id, 
                act_nombre, 
                act_descripcion, 
                act_fecha, 
                act_lugar, 
                act_categoria, 
                act_imagen, 
                act_estado 
                FROM actividades 
                WHERE act_id = $this->intIdActividad";
        $request = $this->select($sql);
        return $request;
    }

    public function insertActividad(string $nombre, string $descripcion, string $fecha, string $lugar, string $categoria, string $imagen)
    {
        $return = "";
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strFecha = $fecha;
        $this->strLugar = $lugar;
        $this->strCategoria = $categoria;
        $this->strImagen = $imagen;

        $sql = "SELECT act_nombre 
                FROM actividades 
                WHERE act_nombre = '{$this->strNombre}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO actividades
                            (act_nombre, 
                            act_descripcion, 
                            act_fecha, 
                            act_lugar, 
                            act_categoria, 
                            act_imagen) 
                            VALUES(?,?,?,?,?,?)";

            $arrData = array($this->strNombre, 
                            $this->strDescripcion, 
                            $this->strFecha, 
                            $this->strLugar, 
                            $this->strCategoria, 
                            $this->strImagen);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateActividad(int $act_id, string $nombre, string $descripcion, string $fecha, string $lugar, string $categoria, string $imagen, string $estado)
    {
        $this->intIdActividad = $act_id;
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strFecha = $fecha;
        $this->strLugar = $lugar;
        $this->strCategoria = $categoria;
        $this->strImagen = $imagen;
        $this->strEstado = $estado;

        $sql = "SELECT act_id 
                FROM actividades 
                WHERE act_nombre = '$this->strNombre' 
                AND act_id != $this->intIdActividad";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE actividades 
                    SET act_nombre = ?, 
                        act_descripcion = ?, 
                        act_fecha = ?, 
                        act_lugar = ?, 
                        act_categoria = ?, 
                        act_imagen = ?, 
                        act_estado = ? 
                    WHERE act_id = $this->intIdActividad ";
            $arrData = array($this->strNombre, $this->strDescripcion, $this->strFecha, $this->strLugar, $this->strCategoria, $this->strImagen, $this->strEstado);
            $request = $this->update($sql, $arrData);

        } else {
            $request = "exist";
        }
        return $request;
    }

    public function disableActividad(int $act_id)
    {
        $this->intIdActividad = $act_id;
        $sql = "UPDATE actividades 
                SET act_estado = 'Eliminado' 
                WHERE act_id = $this->intIdActividad";
        $request = $this->update($sql);
        return $request;
    }

    public function deleteActividad(int $act_id)
    {
        $this->intIdActividad = $act_id;
        $sql = "DELETE FROM actividades 
                WHERE act_id = $this->intIdActividad";
        $request = $this->delete($sql);
        return $request;
    }
}
