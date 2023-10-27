<?php

class PermisoModel extends Mysql
{
	public $intId;
	public $intRol;
	public $intPagina;
	public $ver;
	public $agregar;
	public $actualizar;
	public $eliminar;

	public function __construct()
	{
		parent::__construct();
	}

	public function getPages()
	{
		$sql = "SELECT * 
				FROM paginas 
				WHERE pag_estado = 'Activo'";
		$request = $this->select_all($sql);
		return $request;
	}
	public function getAllByRol(int $id)
	{
		$this->intRol = $id;
		$sql = "SELECT * 
				FROM permisos 
				WHERE rol_id = $this->intRol";
		$request = $this->select_all($sql);
		return $request;
	}

	public function deletePermisos(int $id)
	{
		$this->intRol = $id;
		$sql = "DELETE FROM permisos 
				WHERE rol_id = $this->intRol";
		$request = $this->delete($sql);
		return $request;
	}

	public function insertPermisos(
		int $rol,
		int $pagina,
		int $ver,
		int $agregar,
		int $actualizar,
		int $eliminar
	) {
		$this->intRol 		= $rol;
		$this->intPagina 	= $pagina;
		$this->ver 			= $ver;
		$this->agregar 		= $agregar;
		$this->actualizar 	= $actualizar;
		$this->eliminar 	= $eliminar;
		$query_insert  = "INSERT INTO permisos (
							rol_id,
							pag_id,
							per_ver,
							per_agregar,
							per_actualizar,
							per_eliminar
						) VALUES(?,?,?,?,?,?)";
		$arrData = array(
			$this->intRol,
			$this->intPagina,
			$this->ver,
			$this->agregar,
			$this->actualizar,
			$this->eliminar
		);
		$request_insert = $this->insert($query_insert, $arrData);
		return $request_insert;
	}

	public function getPermisosByPagina(int $id)
	{
		$this->intRol = $id;
		$sql = "SELECT 
					p.rol_id,
					p.pag_id,
					pg.pag_nombre,
					p.per_ver,
					p.per_agregar,
					p.per_actualizar,
					p.per_eliminar 
				FROM permisos p 
				INNER JOIN paginas pg
				ON p.pag_id = pg.pag_id
				WHERE p.rol_id = $this->intRol";
		$request = $this->select_all($sql);
		$arrPermisos = array();
		for ($i = 0; $i < count($request); $i++) {
			$arrPermisos[$request[$i]['pag_id']] = $request[$i];
		}
		return $arrPermisos;
	}
}
