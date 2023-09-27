<?php

class PersonaModel extends Mysql
{
	private $Cedula;
	private $Nombre;
	private $Apellido1;
	private $Apellido2;
	private $Direccion;
	private $Telefono;
	private $Estado;

	public function __construct()
	{
		parent::__construct();
	}

	// public function insertPersona(
	// 	string $cedula,
	// 	string $nombre,
	// 	string $apellido1,
	// 	string $apellido2,
	// 	string $direccion,
	// 	string $telefono,
	// 	string $estado
	// ) {
	// 	//implements method...
	// }

	public function getAll()
	{
		$sql = "SELECT
					per_cedula,
					per_nombre,
					CONCAT(per_apellido1,' ',per_apellido2) AS per_apellidos,
					per_direccion,
					per_telefono,
					per_estado
				FROM personas
				WHERE per_estado IN ('Activo','Inactivo')";
		$request = $this->select_all($sql);
		return $request;
	}

	public function getByCedula(int $cedula)
	{
		$this->Cedula = $cedula;
		$sql = "SELECT
					per_cedula,
					per_nombre,
					per_apellido1,
					per_apellido2,
					per_direccion,
					per_telefono,
					per_estado
				FROM personas
				WHERE per_cedula = $this->Cedula
				  AND per_estado IN ('Activo','Inactivo')";
		$request = $this->select($sql);
		return $request;
	}
}
