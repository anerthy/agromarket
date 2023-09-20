<?php

class Permiso extends Controllers
{
	public function __construct()
	{
		// sessionStart();
		parent::__construct();
		// if (empty($_SESSION['login'])) {
		// 	header('Location: ' . base_url() . '/login');
		// }
	}

	public function getPermisosRol(int $idrol)
	{
		$rolid = intval($idrol);
		if ($rolid > 0) {
			$arrModulos = $this->model->getPages();
			$arrPermisosRol = $this->model->getPermisosByPagina($rolid);
			$arrPermisos = array('per_ver' => 0, 'per_agregar' => 0, 'per_actualizar' => 0, 'per_eliminar' => 0);
			$arrPermisoRol = array('rol_id' => $rolid);

			if (empty($arrPermisosRol)) {
				for ($i = 0; $i < count($arrModulos); $i++) {

					$arrModulos[$i]['permisos'] = $arrPermisos;
				}
			} else {
				for ($i = 0; $i < count($arrModulos); $i++) {
					$arrPermisos = array('per_ver' => 0, 'per_agregar' => 0, 'per_actualizar' => 0, 'per_eliminar' => 0);
					if (isset($arrPermisosRol[$i])) {
						$arrPermisos = array(
							'per_ver' => $arrPermisosRol[$i]['per_ver'],
							'per_agregar' => $arrPermisosRol[$i]['per_agregar'],
							'per_actualizar' => $arrPermisosRol[$i]['per_actualizar'],
							'per_eliminar' => $arrPermisosRol[$i]['per_eliminar']
						);
					}
					$arrModulos[$i]['permisos'] = $arrPermisos;
				}
			}
			$arrPermisoRol['modulos'] = $arrModulos;
			$html = getModal("modalPermiso", $arrPermisoRol);
		}
		die();
	}

	public function setPermisos()
	{
		if ($_POST) {
			$intIdrol = intval($_POST['rol_id']);
			$modulos = $_POST['modulos'];

			$this->model->deletePermisos($intIdrol);
			foreach ($modulos as $modulo) {
				$idModulo = $modulo['pag_id'];
				$ver = empty($modulo['per_ver']) ? 0 : 1;
				$agregar = empty($modulo['per_agregar']) ? 0 : 1;
				$actualizar = empty($modulo['per_actualizar']) ? 0 : 1;
				$eliminar = empty($modulo['per_eliminar']) ? 0 : 1;
				$requestPermiso = $this->model->insertPermisos(
					$intIdrol,
					$idModulo,
					$ver,
					$agregar,
					$actualizar,
					$eliminar
				);
			}
			if ($requestPermiso > 0) {
				$arrResponse = array('status' => true, 'msg' => 'Permisos asignados correctamente.');
			} else {
				$arrResponse = array("status" => false, "msg" => 'No es posible asignar los permisos.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
