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

			//convierte al usuario en productor
			// if ($request_insert  != 0) {
			$query_usr  = 	"UPDATE usuarios SET rol_id = 5 WHERE usr_id = ? AND per_cedula = ?";
			$arrDataPdt = array(
				$this->intIdUsuario,
				$this->strCedula
			);
			$this->insert($query_usr, $arrDataPdt);
			// }

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
				WHERE pdt_estado IN('Activo', 'Inactivo') 
				  AND per_cedula IN (	
										SELECT 
											DISTINCT per_cedula 
										FROM productos 
										WHERE pro_estado = 'Activo'
									);";
		$request = $this->select_all($sql);
		return $request;
	}




	public function getProductorInfo(int $id)
	{
		$this->intIdUsuario = $id;
		$sql = "SELECT
					productores.usr_id AS usr_id,
					productores.per_cedula AS per_cedula, 
					pdt_nombre, 
					pdt_ubicacion,
					personas.per_telefono AS per_telefono, 
					pdt_imagen, 
					pdt_estado
				FROM productores, personas
				WHERE usr_id				= '{$this->intIdUsuario}'
				AND personas.per_cedula = productores.per_cedula";
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
                    LOWER(pro_categoria) AS pro_categoria,
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
