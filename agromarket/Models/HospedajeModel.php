<?php

class HospedajeModel extends Mysql
{
	public $intIdHospedaje;
	public $strNombre;
	public $strDescripcion;
	public $strTipo;
	public $strDireccion;
	public $strTelefono;
	public $intPrecio;
	public $intEstado;
	public $strImagen;

	public function __construct()
	{
		parent::__construct();
	}

	public function selectHospedajes()
	{
		$isAdmin = " AND hosp_estado IN (2,3) 
        AND bit_usuario = {$_SESSION['idUser']}";
        
        $roles = array(2,3,4);// Administrador Desarrollador y Supervisor
		if (in_array($_SESSION['userData']['id_rol'], $roles)) {
			$isAdmin = " AND hosp_estado IN (1,2,3)";
        }

        if($_SESSION['userData']['id_rol'] == 1){
            $isAdmin = " ";
        }

		$sql = "SELECT	hosp_id, 
						hosp_nombre, 
						hosp_descripcion, 
						hosp_tipo, 
						hosp_direccion, 
						hosp_telefono, 
						hosp_precio, 
						hosp_imagen, 
						hosp_estado 
				FROM hospedajes
				INNER JOIN bitacoras 
                ON hosp_id = bit_registro
                WHERE bit_modulo = 8 " 
                . $isAdmin;
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectHospedaje(int $hosp_id)
	{
		$this->intIdHospedaje = $hosp_id;
		$sql = "SELECT	hosp_id, 
						hosp_nombre, 
						hosp_descripcion, 
						hosp_tipo, 
						hosp_direccion, 
						hosp_telefono, 
						hosp_precio, 
						hosp_imagen, 
						hosp_estado 
				FROM hospedajes 
				WHERE hosp_id = $this->intIdHospedaje";
		$request = $this->select($sql);
		return $request;
	}

	public function insertHospedaje(string $nombre, string $descripcion, string $tipo, string $direccion, string $telefono, int $precio, string $imagen)
	{
		$return = "";
		$this->strNombre = $nombre;
		$this->strDescripcion = $descripcion;
		$this->strTipo = $tipo;
		$this->strDireccion = $direccion;
		$this->strTelefono = $telefono;
		$this->intPrecio = $precio;
		$this->strImagen = $imagen;

		$sql = "SELECT	hosp_id 
				FROM hospedajes 
				WHERE hosp_nombre = '{$this->strNombre}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert 	=	"INSERT INTO hospedajes (hosp_nombre, 
														hosp_descripcion, 
														hosp_tipo, 
														hosp_direccion, 
														hosp_telefono, 
														hosp_precio, 
														hosp_imagen) 
								VALUES(?,?,?,?,?,?,?)";
			$arrData = array($this->strNombre, 
							$this->strDescripcion, 
							$this->strTipo, 
							$this->strDireccion, 
							$this->strTelefono, 
							$this->intPrecio,
							$this->strImagen);
			$request_insert = $this->insert($query_insert, $arrData);

			if ($request_insert != 0) {
                $query 	= 	"INSERT INTO bitacoras (bit_modulo, 
													bit_registro, 
													bit_usuario, 
													bit_rol) 
                        	VALUES(?,?,?,?)";
                $data = array(8, 
							$request_insert,
							$_SESSION['userData']['id_usuario'], 
							$_SESSION['userData']['id_rol']);
                $this->insert($query, $data);
            }

			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function updateHospedaje(int $hosp_id, string $nombre, string $descripcion, string $tipo, string $direccion, string $telefono, int $precio, string $imagen, int $estado)
	{
		$this->intIdHospedaje = $hosp_id;
		$this->strNombre = $nombre;
		$this->strDescripcion = $descripcion;
		$this->strTipo = $tipo;
		$this->strDireccion = $direccion;
		$this->strTelefono = $telefono;
		$this->intPrecio = $precio;
		$this->intEstado = $estado;
		$this->strImagen = $imagen;


		$sql = "SELECT	hosp_id,hosp_nombre 
				FROM hospedajes 
				WHERE hosp_nombre = '$this->strNombre' 
				AND hosp_id != $this->intIdHospedaje";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE hospedajes 
					SET hosp_nombre = ?, 
						hosp_descripcion = ?, 
						hosp_tipo = ?, 
						hosp_direccion = ?, 
						hosp_telefono = ?, 
						hosp_precio = ?, 
						hosp_imagen = ?, 
						hosp_estado = ? 
					WHERE hosp_id = $this->intIdHospedaje ";
			$arrData = array($this->strNombre, 
							$this->strDescripcion, 
							$this->strTipo, 
							$this->strDireccion, 
							$this->strTelefono, 
							$this->intPrecio,
							$this->strImagen, 
							$this->intEstado);
			$request = $this->update($sql, $arrData);

			if ($request != 0) {
                $query = "UPDATE bitacoras
                        SET bit_fecha_modificacion = NOW() 
                        WHERE bit_modulo = 8 
                        AND bit_registro = $this->intIdHospedaje";
                $this->update($query);
            }
		} else {
			$request = "exist";
		}
		return $request;
	}

    public function disableHospedaje(int $hosp_id)
    {
        $this->intIdHospedaje = $hosp_id;
        $sql = "UPDATE hospedajes 
                SET hosp_estado = 4 
                WHERE hosp_id = $this->intIdHospedaje";
        $request = $this->update($sql);

        if ($request != 0) {
            $query ="UPDATE bitacoras
                    SET bit_fecha_eliminacion = NOW() 
                    WHERE bit_modulo = 8 
                    AND bit_registro = $this->intIdHospedaje";
            $this->update($query);
        }

        return $request;
    }

	public function deleteHospedaje(int $hosp_id)
	{
		$this->intIdHospedaje = $hosp_id;
		$sql = "DELETE FROM hospedajes 
				WHERE hosp_id = $this->intIdHospedaje";
		$arrData = array(0);
		$request = $this->delete($sql,$arrData);
		return $request;
	}
}