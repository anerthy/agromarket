<?php

class LoginModel extends Mysql
{
	private $intIdUsuario;
	private $strUsuario;
	private $strPassword;
	private $strToken;

	public function __construct()
	{
		parent::__construct();
	}

	public function loginUser(string $usuario, string $password)
	{
		$this->strUsuario = $usuario;
		$this->strPassword = $password;
		$sql = "SELECT	id_usuario, status 
				FROM usuario 
				WHERE correo = '$this->strUsuario' 
				AND contraseña = '$this->strPassword' 
				AND status != 0 ";
		$request = $this->select($sql);
		return $request;
	}

	public function sessionLogin(int $iduser)
	{
		$this->intIdUsuario = $iduser;
		//BUSCAR ROLE 
		$sql = "SELECT	usr_id, 
						usr_nombre, 
						usr_email, 
						rol_id, 
						rol_nombre, 
						usr_estado 
				FROM USUARIOS
				INNER JOIN ROLES
				ON USUARIOS.rol_id = ROLES.rol_id 
				WHERE usr_id = $this->intIdUsuario";
		$request = $this->select($sql);
		$_SESSION['userData'] = $request;
		return $request;
	}

	public function getUserEmail(string $strEmail)
	{
		$this->strUsuario = $strEmail;
		$sql = "SELECT
					usr_id,
					usr_nombre,
					usr_email,
					usr_estado
				FROM
					USUARIOS 
				WHERE usr_email = '$this->strUsuario' 
				  AND usr_estado = 'Activo' ";
		$request = $this->select($sql);
		return $request;
	}

	public function setTokenUser(int $id_usuario, string $token)
	{
		$this->intIdUsuario = $id_usuario;
		$this->strToken = $token;
		$sql = "UPDATE USUARIOS 
				SET usr_token = ? 
				WHERE usr_id = $this->intIdUsuario ";
		$arrData = array($this->strToken);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function getUsuario(string $email, string $token)
	{
		$this->strUsuario = $email;
		$this->strToken = $token;
		$sql = "SELECT usr_id 
				FROM USUARIOS 
				WHERE usr_email 	= '$this->strUsuario' 
				  AND usr_token		= '$this->strToken' 
				  AND usr_estado 	= 'Activo' ";
		$request = $this->select($sql);
		return $request;
	}

	public function insertPassword(int $idUsuario, string $password)
	{
		$this->intIdUsuario = $idUsuario;
		$this->strPassword = $password;
		$sql = "UPDATE usuarios 
				SET usr_contrasena 	= ?, 
					usr_token 		= ? 
				WHERE usr_id = $this->intIdUsuario ";
		$arrData = array($this->strPassword, "");
		$request = $this->update($sql, $arrData);
		return $request;
	}
}
