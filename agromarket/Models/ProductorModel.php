<?php

class ProductorModel extends Mysql
{
	private $intIdProductor;
	private $strCedula;
	private $strNombre;
	private $strUbicacion;
	private $strImage;
	private $strEstado;
	private $intIdUsuario;

	public function __construct()
	{
		parent::__construct();
	}


	public function insertProductor(string $nombre, string $ubicacion, string $imagen)
	{

		$return = "";
		$this->strNombre = $nombre;
		$this->strUbicacion = $ubicacion;
		$this->strImage = $imagen;


		$sql = "SELECT pdt_nombre 
					FROM productores 
					WHERE act_nombre = '{$this->strNombre}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO productores
								(pdt_nombre, 
								pdt_ubicacion, 
								pdt_imagen) 
								VALUES(?,?,?)";

			$arrData = array(
				$this->strNombre,
				$this->strUbicacion,
				$this->strImage,
			);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function getProductor(int $usuario, string $cedula)
	{
		$this->intIdUsuario = $usuario;
		$this->strCedula 	= $cedula;
		$sql = "SELECT
						per_cedula, 
						pdt_nombre, 
						pdt_ubicacion, 
						pdt_imagen, 
						usr_id, 
						pdt_estado
                    FROM productores
					WHERE usr_id 		= $this->intIdUsuario
					  AND per_cedula 	= $this->strCedula";
		$request = $this->select_all($sql);
		return $request;
	}

	public function updateProductor(int $idProductor, string $cedula, string $nombre, string $ubicacion, string $imagen, string $estado)
	{

		$this->intIdProductor = $idProductor;
		$this->strCedula = $cedula;
		$this->strNombre = $nombre;
		$this->strUbicacion = $ubicacion;
		$this->strImage = $imagen;
		$this->strEstado = $estado;

		$sql = "SELECT * FROM productores WHERE (pdt_cedula = '{$this->strCedula}' ) ";
		$request = $this->select_all($sql);

		if (empty($request)) {

			$sql = "UPDATE productores SET pdt_cedula=?, pdt_nombre=?, pdt_ubicacion=?, pdt_imagen=?, pdt_estado=? 
							WHERE pdt_id = $this->intIdProductor ";
			$arrData = array(
				$this->intIdProductor,
				$this->strCedula,
				$this->strNombre,
				$this->strUbicacion,
				$this->strImage,
				$this->strEstado
			);


			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}

	public function updatePerfil(int $idProductor, string $cedula, string $nombre, string $ubicacion, string $imagen, string $estado)
	{
		$this->intIdProductor = $idProductor;
		$this->strCedula = $cedula;
		$this->strNombre = $nombre;
		$this->strUbicacion = $ubicacion;
		$this->strImage = $imagen;
		$this->strEstado = $estado;



		$sql = "UPDATE productores SET pdt_cedula=?, pdt_nombre=?, pdt_ubicacion=?, pdt_imagen=?, pdt_estado=? 
				WHERE pdt_id = $this->intIdProductor ";
		$arrData = array(
			$this->intIdProductor,
			$this->strCedula,
			$this->strNombre,
			$this->strUbicacion,
			$this->strImage,
			$this->strEstado
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}
}
