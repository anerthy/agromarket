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
    //public $strFechaCreacion;
   //public $strFechaModificacion;
    public $intIdUsuario;


    public function __construct()
    {
        parent::__construct();
    }

    /*public function selectProductos()
    {
        $isAdmin = " AND alim_estado IN (2,3) 
        AND bit_usuario = {$_SESSION['idUser']}";

        $roles = array(2, 3, 4); // Administrador Desarrollador y Supervisor
        if (in_array($_SESSION['userData']['id_rol'], $roles)) {
            $isAdmin = " AND alim_estado IN (1,2,3)";
        }

        if ($_SESSION['userData']['id_rol'] == 1) {
            $isAdmin = " ";
        }

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
                and pro_id = ";
        $request = $this->select_all($sql);
        return $request;
    }

    public function getByid(int $alim_id)
    {
        $this->intIdAlimentacion = $alim_id;
        $sql = "SELECT alim_id, 
                alim_nombre, 
                alim_descripcion, 
                alim_direccion, 
                DATE_FORMAT(alim_hora_apertura, '%h:%i') AS alim_hora_apertura, 
                DATE_FORMAT(alim_hora_cierre, '%h:%i') AS alim_hora_cierre, 
                alim_telefono, 
                alim_imagen, 
                alim_estado 
                FROM alimentaciones 
                WHERE alim_id = $this->intIdAlimentacion";
        $request = $this->select($sql);
        return $request;
    }*/

    public function insertProducto(
        //string $id,
        string $nombre,
        string $descripcion,
        string $categoria,
        string $precio,
        string $imagen,
        //string $id, 
        string $estado,
        //string $id, 
       
    ) {
        $return = "";
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strCategoria = $categoria;
        $this->strPrecio = $precio;
        $this->strImagen = $imagen;
        $this->strEstado = $estado;
    

        $sql = "SELECT pro_nombre 
                FROM productos 
                WHERE pro_nombre = '{$this->strNombre}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO productos
                            (pro_nombre, 
                            pro_descripcion, 
                            pro_categoria, 
                            pro_precio, 
                            pro_imagen, 
                            pro_estado, 
                            ) 
                            VALUES(?,?,?,?,?,?)";

            $arrData = array(
                $this->strNombre,
                $this->strDescripcion,
                $this->strCategoria,
                $this->strPrecio,
                $this->strImagen,
                $this->strEstado
            );
            $request_insert = $this->insert($query_insert, $arrData);
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateProducto(int $pro_id, string $nombre, string $descripcion, string $categoria, string $precio, string $imagen, string $ptd_id, string $estado, int $fec_creacion, int $fec_modificacion, int $usr_id)
    {
        $this->intIProducto = $pro_id;
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strCategoria = $categoria;
        $this->strPrecio = $precio;
        $this->strImagen = $imagen;
        $this->strIdProductor = $pdt_id;
        $this->intEstado = $estado;
        $this->strFechaCreacion = $fec_creacion;
        $this->strFechaModificacion = $fec_modificacion;
        $this->strIdUsuario = $usr_id;
      


        $sql = "SELECT pro_id 
                FROM productos
                WHERE pro_nombre = '$this->strNombre' 
                AND pro_id != $this->intIdProducto";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE productos 
                    SET pro_nombre = ?, 
                        pro_descripcion = ?, 
                        pro_categoria = ?, 
                        pro_precio = ?, 
                        pro_imagen = ?, 
                        pro_estado = ?
                
        
                    WHERE pro_id = $this->intIdProducto ";
            $arrData = array($this->strNombre, $this->strDescripcion, $this->strCategoria, $this->Precio, $this->strImagen, $this->intEstado);
            $request = $this->update($sql, $arrData);

        } else {
            $request = "exist";
        }
        return $request;
    }

    public function disableProducto(int $alim_id)
    {
        $this->intIdProducto = $pro_id;
        $sql = "UPDATE productos 
                SET pro_estado = 'Eliminado' 
                WHERE pro_id = $this->intIdProducto";
        $request = $this->update($sql);

        return $request;
    }

    public function deleteProducto(int $pro_id)
    {
        $this->intIdProducto = $pro_id;
        $sql = "DELETE FROM productos 
                WHERE pro_id = $this->intIdProducto";
        $request = $this->delete($sql);
        return $request;
    }
}
