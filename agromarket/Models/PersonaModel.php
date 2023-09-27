<?php

class PersonaModel extends Mysql
{
	private $strCedula;
	private $strNombre;
	private $strApellido1;
	private $strApellido2;
	private $strDireccion;
	private $strTelefono;
	private $strEstado;

	public function __construct()
	{
		parent::__construct();
	}

	public function insertPersona(
		string $cedula,
		string $nombre,
		string $apellido1,
		string $apellido2,
		string $direccion,
		string $telefono
	) {
		$return = "";
		$this->strCedula 	= $cedula;
		$this->strNombre 	= $nombre;
		$this->strApellido1	= $apellido1;
		$this->strApellido2 = $apellido2;
		$this->strDireccion = $direccion;
		$this->strTelefono	= $telefono;
		$this->strEstado 	= 'Activo';

		$sql = "SELECT * 
				FROM personas 
				WHERE per_cedula = '{$this->strCedula}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = 	"INSERT INTO personas (
									per_cedula,
									per_nombre,
									per_apellido1,
									per_apellido2,
									per_direccion,
									per_telefono,
									per_estado
								) VALUES ('?','?','?','?','?','?','?')";
			$arrData = array(
				$this->strCedula,
				$this->strNombre,
				$this->strApellido1,
				$this->strApellido2,
				$this->strDireccion,
				$this->strTelefono,
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
