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
    public $intIdUsuario;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        // $isAdmin = " AND alim_estado IN (2,3) 
        // AND bit_usuario = {$_SESSION['idUser']}";

        // $roles = array(2, 3, 4); // Administrador Desarrollador y Supervisor
        // if (in_array($_SESSION['userData']['id_rol'], $roles)) {
        //     $isAdmin = " AND alim_estado IN (1,2,3)";
        // }

        // if ($_SESSION['userData']['id_rol'] == 1) {
        //     $isAdmin = " ";
        // }

        $sql = "SELECT  
                    pro_id,
                    pro_nombre,
                    pro_descripcion,
                    pro_categoria,
                    pro_precio,
                    pro_imagen,
                    pdt_id,
                    pro_estado,
                    usr_id
                FROM productos
                WHERE pro_estado = 'Activo' 
                and pro_id = $this->intIdProducto";
        $request = $this->select_all($sql);
        return $request;
    }

    public function getByid(int $id)
    {
        $this->intIdProducto = $id;
        $sql = "SELECT 
                    pro_id,
                    pro_nombre,
                    pro_descripcion,
                    pro_categoria,
                    pro_precio,
                    pro_imagen,
                    pdt_id,
                    pro_estado,
                    usr_id
                FROM productos 
                WHERE pro_id = $this->intIdProducto";
        $request = $this->select($sql);
        return $request;
    }

    public function insertProducto(
        string $nombre,
        string $descripcion,
        string $categoria,
        int $precio,
        string $imagen,
        string $productor,
        string $estado,
        string $usuario
    ) {
        $return = "";
        $this->strNombre        = $nombre;
        $this->strDescripcion   = $descripcion;
        $this->strCategoria     = $categoria;
        $this->intPrecio        = $precio;
        $this->strImagen        = $imagen;
        $this->intIdProductor   = $productor;
        $this->strEstado        = $estado;
        $this->intIdUsuario     = $usuario;

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
                                pdt_id,
                                pro_estado,
                                usr_id 
                            ) 
                            VALUES(?,?,?,?,?,?,?,?)";

            $arrData = array(
                $this->strNombre,
                $this->strDescripcion,
                $this->strCategoria,
                $this->intPrecio,
                $this->strImagen,
                $this->intIdProductor,
                $this->strEstado,
                $this->intIdUsuario
            );
            $request_insert = $this->insert($query_insert, $arrData);
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateProducto(
        int     $id,
        string $nombre,
        string $descripcion,
        string $categoria,
        int $precio,
        string $imagen,
        string $productor,
        string $estado,
        string $usuario
    ) {
        $this->intIdProducto    = $id;
        $this->strNombre        = $nombre;
        $this->strDescripcion   = $descripcion;
        $this->strCategoria     = $categoria;
        $this->intPrecio        = $precio;
        $this->strImagen        = $imagen;
        $this->intIdProductor   = $productor;
        $this->strEstado        = $estado;
        $this->intIdUsuario     = $usuario;



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
                        pdt_id          = ?, 
                        pro_estado      = ?,
                        usr_id          = ?
                    WHERE pro_id = $this->intIdProducto ";
            $arrData = array(
                $this->strNombre,
                $this->strDescripcion,
                $this->strCategoria,
                $this->intPrecio,
                $this->strImagen,
                $this->intIdProductor,
                $this->strEstado,
                $this->intIdUsuario
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
