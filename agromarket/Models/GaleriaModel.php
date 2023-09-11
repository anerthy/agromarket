<?php

class GaleriaModel extends Mysql
{
	public $intIdGaleria;
	public $strTitulo;
	public $strDescripcion;
	public $strPagina;
	public $strSeccion;
	public $strUrl;

	public function __construct()
	{
		parent::__construct();
	}

	public function selectGalerias()
	{
		$sql = "SELECT	gal_id, 
						gal_titulo, 
						gal_descripcion,
						gal_pagina, 
						gal_seccion, 
						gal_url 
				FROM galeria
				ORDER BY	gal_pagina,
							gal_posicion ASC";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectGaleria(int $gal_id)
	{
		$this->intIdGaleria = $gal_id;
		$sql = "SELECT	gal_id, 
						gal_titulo, 
						gal_descripcion,
						gal_pagina, 
						gal_seccion, 
						gal_url 
				FROM galeria 
				WHERE gal_id = $this->intIdGaleria";
		$request = $this->select($sql);
		return $request;
	}
	public function updateGaleria(int $gal_id, string $titulo, string $descripcion, string $url)
	{
		$this->intIdGaleria = $gal_id;
		$this->strTitulo = $titulo;
		$this->strDescripcion = $descripcion;
		$this->strUrl = $url;

		$sql = "SELECT gal_id 
				FROM galeria 
				WHERE gal_titulo = '$this->strDescripcion' 
				AND gal_id != $this->intIdGaleria";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE galeria 
					SET gal_titulo = ?,
						gal_descripcion = ?,
						gal_url = ? 
					WHERE gal_id = $this->intIdGaleria ";
			$arrData = array(
				$this->strTitulo,
				$this->strDescripcion,
				$this->strUrl
			);
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}
}
