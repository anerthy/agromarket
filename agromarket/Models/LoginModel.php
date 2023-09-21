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
		$sql = "SELECT	
					usr_id, 
					usr_estado 
				FROM usuarios 
				WHERE usr_email = '$this->strUsuario' 
				  AND usr_contrasena = '$this->strPassword' 
				  AND usr_estado = 'Activo' ";
		$request = $this->select($sql);
		return $request;
	}

	public function sessionLogin(int $iduser)
	{
		$this->intIdUsuario = $iduser;
		$sql = "SELECT	usr_id, 
						usr_nombre, 
						usr_email, 
						u.rol_id, 
						rol_nombre, 
						usr_estado 
				FROM USUARIOS u
				INNER JOIN ROLES r
				ON u.rol_id = r.rol_id 
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
				FROM USUARIOS 
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
