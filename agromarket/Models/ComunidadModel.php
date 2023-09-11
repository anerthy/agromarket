<?php

class ComunidadModel extends Mysql
{
	public $intIdComunidad;
	public $strNombre;
	public $strDescripcion;
	public $strProvincia;
	public $strCanton;
	public $strDistrito;
	public $strImagen;

	public function __construct()
	{
		parent::__construct();
	}

	public function selectComunidades()
	{
		$sql = "SELECT 	com_id, 
						com_nombre, 
						com_descripcion, 
						com_provincia, 
						com_canton, 
						com_distrito, 
						com_imagen 
				FROM comunidades";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectComunidad(int $com_id)
	{
		$this->intIdComunidad = $com_id;
		$sql = "SELECT 	com_id, 
						com_nombre, 
						com_descripcion, 
						com_provincia, 
						com_canton, 
						com_distrito, 
						com_imagen 
				FROM comunidades 
				WHERE com_id = $this->intIdComunidad";
		$request = $this->select($sql);
		return $request;
	}

	public function insertComunidad (string $nombre, 
									string $descripcion, 
									string $provincia, 
									string $canton, 
									string $distrito, 
									string $imagen)
	{
		$return = "";
		$this->strNombre = $nombre;
		$this->strDescripcion = $descripcion;
		$this->strProvincia = $provincia;
		$this->strCanton = $canton;
		$this->strDistrito = $distrito;
		$this->strImagen = $imagen;

		$sql = "SELECT com_id 
				FROM comunidades 
				WHERE com_nombre = '{$this->strNombre}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO comunidades (com_nombre, 
														com_descripcion, 
														com_provincia, 
														com_canton, 
														com_distrito, 
														com_imagen) 
							VALUES(?,?,?,?,?,?)";
			$arrData = array($this->strNombre, 
							$this->strDescripcion, 
							$this->strProvincia, 
							$this->strCanton, 
							$this->strDistrito, 
							$this->strImagen);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function updateComunidad (int $com_id, 
									string $nombre, 
									string $descripcion, 
									string $provincia, 
									string $canton, 
									string $distrito, 
									string $imagen)
	{
		$this->intIdComunidad = $com_id;
		$this->strNombre = $nombre;
		$this->strDescripcion = $descripcion;
		$this->strProvincia = $provincia;
		$this->strCanton = $canton;
		$this->strDistrito = $distrito;
		$this->strImagen = $imagen;

		$sql = "SELECT com_id 
				FROM comunidades 
				WHERE com_nombre = '$this->strNombre' 
				AND	com_id != $this->intIdComunidad";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE comunidades 
					SET com_nombre = ?,
						com_descripcion = ?,
						com_provincia = ?,
						com_canton = ?,
						com_distrito = ?,
						com_imagen = ? 
					WHERE com_id = $this->intIdComunidad ";

			$arrData = array($this->strNombre, 
							$this->strDescripcion, 
							$this->strProvincia, 
							$this->strCanton, 
							$this->strDistrito, 
							$this->strImagen);
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}

	public function deleteComunidad(int $com_id)
	{
		$this->intIdComunidad = $com_id;

		$sql = "SELECT com_id 
				FROM comunidades 
				INNER JOIN grupos_organizados
				ON com_id = gpo_comunidad
				WHERE com_id = $this->intIdComunidad";
		$validar = $this->select_all($sql);

		if(empty($validar)){
			$sql = "DELETE FROM comunidades  
					WHERE com_id = $this->intIdComunidad";
			$request = $this->delete($sql);
		}else{
			$request = "exist";
		}
		return $request;

		die();
	}
}