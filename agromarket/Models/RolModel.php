<?php

class RolModel extends Mysql
{
	public $intId;
	public $strNombre;
	public $strDescripcion;
	public $strEstado;

	public function __construct()
	{
		parent::__construct();
	}

	public function getAll()
	{
		// $whereAdmin = "";
		// if ($_SESSION['idUser'] != 1) {
		// 	$whereAdmin = " WHERE id_rol != 1 ";
		// }
		//EXTRAE ROLES
		$sql = "SELECT * 
				FROM ROLES ";
		$request = $this->select_all($sql);
		return $request;
	}

	public function getById(int $id)
	{
		$this->intId = $id;
		$sql = "SELECT * 
				FROM rol 
				WHERE id_rol = $this->intId";
		$request = $this->select($sql);
		return $request;
	}

	public function insertRol(string $rol, string $descripcion, int $estado)
	{

		$return = "";
		$this->strNombre 		= $rol;
		$this->strDescripcion 	= $descripcion;
		$this->strEstado 		= $estado;

		$sql = "SELECT * 
				FROM roles 
				WHERE rol_nombre = '{$this->strNombre}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = 	"INSERT INTO roles (
										rol_nombre, 
										rol_descripcion, 
										rol_estado
								) 
								VALUES(?,?,?)";
			$arrData = array(
				$this->strNombre,
				$this->strDescripcion,
				$this->strEstado
			);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function updateRol(int $id, string $rol, string $descripcion, int $estado)
	{
		$this->intId 			= $id;
		$this->strNombre 		= $rol;
		$this->strDescripcion 	= $descripcion;
		$this->strEstado 		= $estado;

		$sql = "SELECT * 
				FROM roles 
				WHERE	rol_nombre	=	'$this->strNombre' AND 
						id_rol		!=	$this->intId";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE roles 
					SET rol_nombre 		=	?, 
						rol_descripcion =	?, 
						rol_estado		=	? 
					WHERE rol_id = $this->intId ";
			$arrData = array(
				$this->strNombre,
				$this->strDescripcion,
				$this->strEstado
			);
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}

	public function deleteRol(int $id)
	{
		$this->intId = $id;
		$sql = "SELECT usr_id 
				FROM usuarios 
				WHERE rol_id = $this->intId";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "DELETE FROM roles 
					WHERE rol_id = $this->intId";
			$request = $this->delete($sql);
			if ($request) {
				$request = 'ok';
			} else {
				$request = 'error';
			}
		} else {
			$request = 'exist';
		}
		return $request;
	}
}
