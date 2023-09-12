<?php

class EstadoModel extends Mysql
{
	public $intIdEstado;
	public $strNombre;
	public $strDescripcion;

	public function __construct()
	{
		parent::__construct();
	}

	public function selectEstados()
	{
		$sql = "SELECT edo_id, 
						edo_nombre, 
						edo_descripcion 
				FROM estados 
				WHERE edo_id IN (2,3)";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectRol(int $edo_id)
	{
		$this->intIdEstado = $edo_id;
		$sql = "SELECT	edo_id, 
						edo_nombre, 
						edo_descripcion 
				FROM estados 
				WHERE edo_id = $this->intIdEstado";
		$request = $this->select($sql);
		return $request;
	}

}
