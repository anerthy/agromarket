<?php

class Rol extends Controllers
{
	public function __construct()
	{
		//	sessionStart();
		parent::__construct();

		// if (empty($_SESSION['login'])) {
		// 	header('Location: ' . base_url() . '/login');
		// }
		// getPermisos(2);
	}

	public function Rol()
	{
		// if (empty($_SESSION['permisosMod']['ver'])) {
		// 	header("Location:" . base_url() . '/access_denied');
		// }
		$data['page_id'] = 2;
		$data['page_tag'] = "Roles de Usuario";
		$data['page_name'] = "rol_usuario";
		$data['page_title'] = "Roles";
		$data['page_functions_js'] = "functions_rol.js";
		$this->views->getView($this, "rol", $data);
	}

	public function getAll()
	{
		//if ($_SESSION['permisosMod']['ver']) {
		$btnView = '';
		$btnEdit = '';
		$btnDelete = '';
		$arrData = $this->model->getAll();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView 	= '<button class="btn btn-primary btn-sm btnEditRol" onClick="fntEditRol(' . $arrData[$i]['rol_id'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			$btnEdit 	= '<button class="btn btn-secondary btn-sm btnPermisosRol" onClick="fntPermisos(' . $arrData[$i]['rol_id'] . ')" title="Permisos"><i class="fas fa-key"></i></button>';
			$btnDelete 	= '<button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol(' . $arrData[$i]['rol_id'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';

			if ($arrData[$i]['rol_id'] == 1) {
				$arrData[$i]['options'] = '<center><span class="badge">No hay acciones</span></center>';
			}

			if ($arrData[$i]['rol_estado'] == 'Activo') {
				$arrData[$i]['rol_estado'] = '<span class="badge badge-info">Activo</span>';
			} else {
				$arrData[$i]['rol_estado'] = '<span class="badge badge-danger">Inactivo</span>';
			}
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		//}
		die();
	}

	public function getList()
	{
		$htmlOptions = "";
		$arrData = $this->model->getAll();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				if ($arrData[$i]['rol_estado'] == 'Activo') {
					$htmlOptions .= '<option value="' . $arrData[$i]['rol_id'] . '">' . $arrData[$i]['rol_nombre'] . '</option>';
				}
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getById($id)
	{
		$intId = intval(strClean($id));
		if ($intId > 0) {
			$arrData = $this->model->getById($intId);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function upsertRol()
	{

		$intId 			= intval($_POST['rol_id']);
		$strNombre 		= strClean($_POST['txtNombre']);
		$strDescipcion 	= strClean($_POST['txtDescripcion']);
		$strEstado 		= intval($_POST['listEstado']);

		if ($intId == 0) {
			//Crear
			$request_rol = $this->model->insertRol($strNombre, $strDescipcion, $strEstado);
			$option = 1;
		} else {
			//Actualizar
			$request_rol = $this->model->updateRol($intId, $strNombre, $strDescipcion, $strEstado);
			$option = 2;
		}

		if ($request_rol > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
			}
		} else if ($request_rol == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delete()
	{
		if ($_POST) {
			$intId = intval($_POST['rol_id']);
			$requestDelete = $this->model->deleteRol($intId);
			if ($requestDelete == 'ok') {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Rol');
			} else if ($requestDelete == 'exist') {
				$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Rol asociado a usuarios.');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Rol.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
