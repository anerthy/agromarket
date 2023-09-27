<?php

class Persona extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		//  getPermisos(3);
	}

	public function Persona()
	{
		// if (empty($_SESSION['permisosMod']['ver'])) {
		// 	header("Location:" . base_url() . '/dashboard');
		// }
		$data['page_tag'] 			= "Personas";
		$data['page_title']	 		= "Persona";
		$data['page_name'] 			= "Personas";
		$data['page_functions_js'] 	= "functions_persona.js";
		$this->views->getView($this, "persona", $data);
	}

	public function getAll()
	{
		//if ($_SESSION['permisosMod']['ver']) {
		$arrData = $this->model->getAll();
		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			if ($arrData[$i]['per_estado'] == 'Activo') {
				$arrData[$i]['per_estado'] = '<span class="badge badge-info">Activo</span>';
			} else {
				$arrData[$i]['per_estado'] = '<span class="badge badge-danger">Inactivo</span>';
			}

			// $btnView = '<button class="btn btn-info btn-sm btnViewPersona" onClick="fntViewPersona(' . $arrData[$i]['per_cedula'] . ')" title="Ver Persona"><i class="far fa-eye"></i></button>';
			// $btnEdit = '<button class="btn btn-primary  btn-sm btnEditPersona" onClick="fntEditPersona(this,' . $arrData[$i]['per_cedula'] . ')" title="Editar Persona"><i class="fas fa-pencil-alt"></i></button>';
			// $btnDelete = '<button class="btn btn-danger btn-sm btnDelPersona" onClick="fntDelPersona(' . $arrData[$i]['per_cedula'] . ')" title="Eliminar Persona"><i class="far fa-trash-alt"></i></button>';

			$arrData[$i]['options'] = '<div class="text-center"> sin acciones... </div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		//}
		die();
	}

	public function getByCedula($cedula)
	{
		//if ($_SESSION['permisosMod']['ver']) {
		$cedula = intval($cedula);
		if ($cedula > 0) {
			$arrData = $this->model->getByCedula($cedula);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		//}
		die();
	}

	public function setActividad()
	{
		// $intIdActividad = intval($_POST['act_id']);
		// $strNombre = strClean($_POST['txtNombre']);
		// $strDescripcion = strClean($_POST['txtDescripcion']);
		// $strFecha = strClean($_POST['txtFecha']);
		// $strLugar = strClean($_POST['txtLugar']);
		// $strCategoria = strClean($_POST['txtCategoria']);
		// $strEstado = strClean($_POST['listEstado']);

		// if ($intIdActividad == 0) {
		// 	// Crear
		// 	$request_Actividad = $this->model->insertActividad(
		// 		$strNombre,
		// 		$strDescripcion,
		// 		$strFecha,
		// 		$strLugar,
		// 		$strCategoria,
		// 		$imgImagen
		// 	);
		// 	$option = 1;
		// } else {

		// 	// Actualizar
		// 	if ($nombre_foto == '') {
		// 		if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
		// 			$imgImagen = $_POST['foto_actual'];
		// 		}
		// 	}
		// 	$request_Actividad = $this->model->updateActividad($intIdActividad, $strNombre, $strDescripcion, $strFecha, $strLugar, $strCategoria, $imgImagen, $strEstado);
		// 	$option = 2;
		// }

		// if ($request_Actividad > 0) {
		// 	if ($option == 1) {
		// 		$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
		// 		if ($nombre_foto != '') {
		// 			uploadImage('actividades', $foto, $imgImagen);
		// 		}
		// 	} else {
		// 		$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
		// 		if ($nombre_foto != '') {
		// 			uploadImage('actividades', $foto, $imgImagen);
		// 		}
		// 		if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
		// 			|| ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
		// 		) {
		// 			deleteFile('actividades', $_POST['foto_actual']);
		// 		}
		// 	}
		// } else if ($request_Actividad == 'exist') {
		// 	$arrResponse = array('status' => false, 'msg' => '¡Atención! La actividad ya existe.');
		// } else {
		// 	$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		// }
		// echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
}
