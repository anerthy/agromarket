<?php

class ProductoModel extends Mysql
{
    public $intIdAlimentacion;
    public $strNombre;
    public $strDescripcion;
    public $strDireccion;
    public $strHoraApertura;
    public $strHoraCierre;
    public $strTelefono;
    public $strImagen;
    public $intEstado;
    public $intIdProductor;
    public $intIdUsuario;


    public function __construct()
    {
        parent::__construct();
    }

    public function selectAlimentaciones()
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
    }

    public function insertAlimentacion(
        string $nombre,
        string $descripcion,
        string $direccion,
        string $hora_apertura,
        string $hora_cierre,
        string $telefono,
        string $imagen
    ) {
        $return = "";
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strDireccion = $direccion;
        $this->strHoraApertura = $hora_apertura;
        $this->strHoraCierre = $hora_cierre;
        $this->strTelefono = $telefono;
        $this->strImagen = $imagen;

        $sql = "SELECT pro_nombre 
                FROM productos 
                WHERE pro_nombre = '{$this->strNombre}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO alimentaciones
                            (alim_nombre, 
                            alim_descripcion, 
                            alim_direccion, 
                            alim_hora_apertura, 
                            alim_hora_cierre, 
                            alim_telefono, 
                            alim_imagen) 
                            VALUES(?,?,?,?,?,?,?)";

            $arrData = array(
                $this->strNombre,
                $this->strDescripcion,
                $this->strDireccion,
                $this->strHoraApertura,
                $this->strHoraCierre,
                $this->strTelefono,
                $this->strImagen
            );
            $request_insert = $this->insert($query_insert, $arrData);
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateAlimentacion(int $alim_id, string $nombre, string $descripcion, string $direccion, string $hora_apertura, string $hora_cierre, string $telefono, string $imagen, int $estado)
    {
        $this->intIdAlimentacion = $alim_id;
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strDireccion = $direccion;
        $this->strHoraApertura = $hora_apertura;
        $this->strHoraCierre = $hora_cierre;
        $this->strTelefono = $telefono;
        $this->strImagen = $imagen;
        $this->intEstado = $estado;

        $sql = "SELECT alim_id 
                FROM alimentaciones 
                WHERE alim_nombre = '$this->strNombre' 
                AND alim_id != $this->intIdAlimentacion";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE alimentaciones 
                    SET alim_nombre = ?, 
                        alim_descripcion = ?, 
                        alim_direccion = ?, 
                        alim_hora_apertura = ?, 
                        alim_hora_cierre = ?, 
                        alim_telefono = ?, 
                        alim_imagen = ?,
                        alim_estado = ? 
                    WHERE alim_id = $this->intIdAlimentacion ";
            $arrData = array($this->strNombre, $this->strDescripcion, $this->strDireccion, $this->strHoraApertura, $this->strHoraCierre, $this->strTelefono, $this->strImagen, $this->intEstado);
            $request = $this->update($sql, $arrData);

        } else {
            $request = "exist";
        }
        return $request;
    }

    public function disableAlimentacion(int $alim_id)
    {
        $this->intIdAlimentacion = $alim_id;
        $sql = "UPDATE alimentaciones 
                SET alim_estado = 'Eliminado' 
                WHERE alim_id = $this->intIdAlimentacion";
        $request = $this->update($sql);

        return $request;
    }

    public function deleteAlimentacion(int $alim_id)
    {
        $this->intIdAlimentacion = $alim_id;
        $sql = "DELETE FROM alimentaciones 
                WHERE alim_id = $this->intIdAlimentacion";
        $request = $this->delete($sql);
        return $request;
    }
}
