<?php

class ProductoModel extends Mysql
{
    public $intIdProducto;
    public $strNombre;
    public $strDescripcion;
    public $strCategoria;
    public $intPrecio;
    public $strImagen;
    public $intIdProductor;
    public $strEstado;

    public function __construct()
    {
        parent::__construct();
    }
    //corta aquí
    public function getAll()
    {
        $sql = "SELECT  
                    pro_id,
                    pro_nombre,
                    pro_descripcion,
                    pro_categoria,
                    pro_precio,
                    pro_imagen,
                    pro_estado,
                    usr_id
                FROM productos
                WHERE pro_estado IN ('Activo','Inactivo')";
        $request = $this->select_all($sql);
        return $request;
    }

    public function getById(int $id)
    {
        $this->intIdProducto = $id;
        $sql = "SELECT 
                    pro_id,
                    pro_nombre,
                    pro_descripcion,
                    pro_categoria,
                    pro_precio,
                    pro_imagen,
                    pro_estado,
                    usr_id
                FROM productos 
                WHERE pro_id = $this->intIdProducto";
        $request = $this->select($sql);
        return $request;
    }
    public function insertProducto(
        string  $nombre,
        string  $descripcion,
        string  $categoria,
        int     $precio,
        string  $imagen,
        string  $estado
    ) {
        $return = "";
        $this->strNombre        = $nombre;
        $this->strDescripcion   = $descripcion;
        $this->strCategoria     = $categoria;
        $this->intPrecio        = $precio;
        $this->strImagen        = $imagen;
        $this->strEstado        = $estado;

        $sql = "SELECT pro_nombre 
                FROM productos 
                WHERE pro_nombre = '{$this->strNombre}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO productos(
                                pro_nombre, 
                                pro_descripcion, 
                                pro_categoria, 
                                pro_precio, 
                                pro_imagen, 
                                pro_estado,
                                usr_id,
                                per_cedula 
                            ) 
                            VALUES(?,?,?,?,?,?,?,?)";

            $arrData = array(
                $this->strNombre,
                $this->strDescripcion,
                $this->strCategoria,
                $this->intPrecio,
                $this->strImagen,
                $this->strEstado,
                $_SESSION['userData']['usr_id'],
                $_SESSION['userData']['per_cedula']
            );
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }
    //Hasta aquí
    public function updateProducto(
        int     $id,
        string  $nombre,
        string  $descripcion,
        string  $categoria,
        int     $precio,
        string  $imagen,
        string  $estado
    ) {
        $this->intIdProducto    = $id;
        $this->strNombre        = $nombre;
        $this->strDescripcion   = $descripcion;
        $this->strCategoria     = $categoria;
        $this->intPrecio        = $precio;
        $this->strImagen        = $imagen;
        $this->strEstado        = $estado;

        $sql = "SELECT pro_id 
                FROM productos
                WHERE pro_nombre = '$this->strNombre' 
                AND pro_id != $this->intIdProducto";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE productos 
                    SET pro_nombre      = ?, 
                        pro_descripcion = ?, 
                        pro_categoria   = ?, 
                        pro_precio      = ?, 
                        pro_imagen      = ?,
                        pro_estado      = ?,
                        usr_id          = ?,
                        per_cedula      = ?
                    WHERE pro_id = $this->intIdProducto ";
            $arrData = array(
                $this->strNombre,
                $this->strDescripcion,
                $this->strCategoria,
                $this->intPrecio,
                $this->strImagen,
                $this->strEstado,
                $_SESSION['userData']['usr_id'],
                $_SESSION['userData']['per_cedula']
            );
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }

    public function disableProducto(int $id)
    {
        $this->intIdProducto = $id;
        $sql = "UPDATE productos 
                SET pro_estado = 'Eliminado' 
                WHERE pro_id = $this->intIdProducto";
        $request = $this->update($sql);

        return $request;
    }

    public function deleteProducto(int $id)
    {
        $this->intIdProducto = $id;
        $sql = "DELETE FROM productos 
                WHERE pro_id = $this->intIdProducto";
        $request = $this->delete($sql);
        return $request;
    }
}
