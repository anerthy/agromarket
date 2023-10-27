<?php

class ProductorModel extends Mysql
{
	private $intIdUsuario;
	private $strCedula;
	private $strNombre;
	private $strUbicacion;
	private $strImage;
	private $strEstado;

	public function __construct()
	{
		parent::__construct();
	}

	public function getProductor(int $usuario, string $cedula)
	{
		$this->intIdUsuario = $usuario;
		$this->strCedula 	= $cedula;
		$sql = "SELECT
					usr_id, 
					per_cedula, 
					pdt_nombre, 
					pdt_ubicacion, 
					pdt_imagen, 
					pdt_estado
				FROM productores
				WHERE usr_id		= '{$this->intIdUsuario}'
				  AND per_cedula	= '{$this->strCedula}'";
		$request = $this->select_all($sql);
		return $request;
	}

	public function insertProductor(
		int $usuario,
		string $cedula,
		string $nombre,
		string $ubicacion,
		string $imagen
	) {
		$return = "";
		$this->intIdUsuario = $usuario;
		$this->strCedula 	= $cedula;
		$this->strNombre 	= $nombre;
		$this->strUbicacion = $ubicacion;
		$this->strImage 	= $imagen;


		$sql = "SELECT * 
				FROM productores 
				WHERE per_cedula = '{$this->strCedula}' ";

		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = 	"INSERT INTO productores(
									usr_id,
									per_cedula,
									pdt_nombre,
									pdt_ubicacion,
									pdt_imagen,
									pdt_estado
								) VALUES(?,?,?,?,?,'Activo')";

			$arrData = array(
				$this->intIdUsuario,
				$this->strCedula,
				$this->strNombre,
				$this->strUbicacion,
				$this->strImage
			);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function updateProductor(
		int $usuario,
		string $cedula,
		string $nombre,
		string $ubicacion,
		string $imagen,
		string $estado
	) {
		$this->intIdUsuario = $usuario;
		$this->strCedula 	= $cedula;
		$this->strNombre 	= $nombre;
		$this->strUbicacion = $ubicacion;
		$this->strImage 	= $imagen;
		$this->strEstado 	= $estado;

		$sql = "SELECT * 
				FROM productores 
				WHERE pdt_cedula = '{$this->strCedula}'";
		$request = $this->select_all($sql);

		if (empty($request)) {

			$sql = "UPDATE productores 
					SET pdt_nombre		= ?, 
						pdt_ubicacion 	= ?, 
						pdt_imagen 		= ?, 
						pdt_estado		= ? 
					WHERE per_cedula 	= $this->strCedula 
					  AND usr_id 		= $this->intIdUsuario";
			$arrData = array(
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


	public function selectProductores()
	{

		$sql = "SELECT
					usr_id, 
					per_cedula, 
					pdt_nombre, 
					pdt_ubicacion, 
					pdt_imagen, 
					pdt_estado
				FROM productores
                WHERE pdt_estado IN ('Activo', 'Inactivo')";
		$request = $this->select_all($sql);
		return $request;
	}




	public function getProductorInfo(int $id)
	{
		$this->intIdUsuario = $id;
		$sql = "SELECT
					usr_id, 
					per_cedula, 
					pdt_nombre, 
					pdt_ubicacion, 
					pdt_imagen, 
					pdt_estado
				FROM productores 
				WHERE usr_id = '{$this->intIdUsuario}'";
		$request = $this->select_all($sql);
		return $request;
	}

	public function getProductoInfo(int $id)
	{
		$this->intId = $id;
		$sql = "SELECT  
                    pro_id,
                    pro_nombre,
                    pro_descripcion,
                    pro_categoria,
                    pro_precio,
                    pro_imagen,
                    pro_estado,
                    usr_id
                FROM productos
				WHERE usr_id = '{$this->intId}'";
		$request = $this->select_all($sql);
		return $request;
	}
}
