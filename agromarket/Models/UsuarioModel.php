<?php

class UsuarioModel extends Mysql
{
	private $intId;
	private $strEmail;
	private $strNombre;
	private $strContrasena;
	// private $strToken;
	private $intRol;
	private $strCedula;
	private $strEstado;

	public function __construct()
	{
		parent::__construct();
	}

	public function insertUsuario(
		string 	$email,
		string 	$nombre,
		string 	$contrasena,
		string 	$rol,
		string 	$cedula,
		string 	$estado
	) {

		$this->strEmail 		= $email;
		$this->strNombre 		= $nombre;
		$this->strContrasena 	= $contrasena;
		$this->intRol 			= $rol;
		$this->strCedula    	= $cedula;
		$this->strEstado    	= $estado;
		$return = 0;

		$sql = "SELECT	
					usr_nombre 
				FROM usuarios 
				WHERE usr_email 	= '{$this->strEmail}' 
				   OR usr_nombre	= '{$this->strNombre}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = 	"INSERT INTO usuarios(
									usr_email,
									usr_nombre,
									usr_contrasena,
									rol_id,
									per_cedula,
									usr_estado
								)
								VALUES(
									'?',
									'?',
									'?',
									'?',
									'?',
									'?'
								)";

			$arrData = array(
				$this->strEmail,
				$this->strNombre,
				$this->strContrasena,
				$this->intRol,
				$this->strCedula,
				$this->strEstado
			);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function getAll()
	{
		// $whereAdmin = "";
		// if ($_SESSION['idUser'] != 1) {
		// 	$whereAdmin = " WHERE u.id_usuario != 1 ";
		// }
		$sql = "SELECT 
					usr_id, 
					usr_nombre, 
					usr_email, 
					usr_estado, 
					rol_nombre, 
					per_cedula
				FROM usuarios u 
				INNER JOIN roles r
				ON u.rol_id = r.rol_id 
				WHERE usr_estado IN ('Activo', 'Inactivo')";
		$request = $this->select_all($sql);
		return $request;
	}

	public function getById(int $id)
	{
		$this->intId = $id;
		$sql = "SELECT 
					usr_id, 
					usr_nombre, 
					usr_email, 
					usr_estado, 
					rol_nombre, 
					per_cedula
				FROM usuarios u 
				INNER JOIN roles r
				ON u.rol_id = r.rol_id 
				WHERE usr_id = $this->intId
				  AND usr_estado IN ('Activo', 'Inactivo')";
		$request = $this->select($sql);
		return $request;
	}

	public function updateUsuario(
		int 	$id,
		string 	$email,
		string 	$nombre,
		string 	$contrasena,
		string 	$rol,
		string 	$cedula,
		string 	$estado
	) {

		$this->intId 			= $id;
		$this->strEmail 		= $email;
		$this->strNombre 		= $nombre;
		$this->strContrasena	= $contrasena;
		$this->intRol 			= $rol;
		$this->strCedula		= $cedula;
		$this->strEstado 		= $estado;

		$sql = "SELECT usr_nombre 
				FROM USUARIOS 
				WHERE (usr_email 	= '{$this->strEmail}' 	AND usr_id != $this->intId) 
				   OR (usr_nombre 	= '{$this->strNombre}' 	AND usr_id != $this->intId) ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			if ($this->strContrasena  != "") {
				$sql = "UPDATE usuarios 
						SET	usr_email		=	?,
							usr_nombre		=	?,  
							usr_contraseña	=	?, 
							rol_id			=	?, 
							cedula			=	?, 
							usr_estado		=	? 
						WHERE usr_id = $this->intId ";
				$arrData = array(
					$this->strEmail,
					$this->strNombre,
					$this->strContrasena,
					$this->intRol,
					$this->strCedula,
					$this->strEstado
				);
			} else {
				$sql = "UPDATE usuarios 
						SET	usr_email		=	?,
							usr_nombre		=	?,  
							rol_id			=	?, 
							cedula			=	?, 
							usr_estado		=	? 
						WHERE usr_id = $this->intId ";
				$arrData = array(
					$this->strEmail,
					$this->strNombre,
					$this->intRol,
					$this->strCedula,
					$this->strEstado
				);
			}
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}

	public function disable(int $intId)
	{
		$this->intId = $intId;
		$sql = "UPDATE usuarios
				SET usr_estado = 'Eliminado' 
				WHERE usr_id = $this->intId ";
		$request = $this->update($sql);
		return $request;
	}

	public function deleteUser(int $intId)
	{
		$this->intId = $intId;
		$sql = "DELETE FROM usuarios 
				WHERE usr_id = $this->intId ";
		$request = $this->delete($sql);
		return $request;
	}
}
