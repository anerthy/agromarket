<?php

class Grupo extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(4);
	}

	public function Grupo()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 4;
		$data['page_tag'] = "Grupos Organizados";
		$data['page_name'] = "grupo";
		$data['page_title'] = "Grupos Organizados";
		$data['page_functions_js'] = "functions_grupo.js";
		$this->views->getView($this, "grupo", $data);
	}

	public function getGrupos()
	{
		$arrData = $this->model->selectGrupos();
		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['gpo_id'] . ')" title="Ver grupo"><i class="far fa-eye"></i></button>';
			}
			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditGrupo" onClick="fntEditGrupo(' . $arrData[$i]['gpo_id'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}
			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelGrupo" onClick="fntDelGrupo(' . $arrData[$i]['gpo_id'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
			}

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';

			($arrData[$i]['gpo_estado'] == 2) ? 
			$arrData[$i]['gpo_estado'] = '<span class="badge badge-info">Activo</span>':
			$arrData[$i]['gpo_estado'] = '<span class="badge badge-danger">Inactivo</span>';
		
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getGrupo(int $gpo_id)
	{
		$intIdGrupo = intval($gpo_id);
		if ($intIdGrupo > 0) {
			$arrData = $this->model->selectGrupo($intIdGrupo);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrData['url_logo'] = media() . '/images/uploads/grupos/' . $arrData['gpo_logo'];
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setGrupo()
	{
		$intIdGrupo = intval($_POST['gpo_id']);
		$strNombre = strClean($_POST['txtNombre']);
		$strRepresentante =  strClean($_POST['txtRepresentante']);
		$strDescripcion = strClean($_POST['txtDescripcion']);
		$strUbicacion = strClean($_POST['txtUbicacion']);
		$strCorreo = strClean($_POST['txtCorreo']);
		$intTelefono = strClean($_POST['txtTelefono']);
		$intNumeroIntegrantes = intval($_POST['txtNumeroIntegrantes']);
		$intComunidad = intval($_POST['listComunidad']);
		$intEstado = intval($_POST['listEstado']);

		$foto   	= $_FILES['foto'];
		$nombre_foto 	= $foto['name'];
		$type 		 	= $foto['type'];
		$url_temp    	= $foto['tmp_name'];
		$imgLogo 	= 'imageUnavailable.png';
		$request_grupo = "";
		if ($nombre_foto != '') {
			$imgLogo = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}

		if ($intIdGrupo == 0) {
			//Crear
			$request_grupo = $this->model->insertGrupo(	$strNombre,
														$strRepresentante,
														$strDescripcion,
														$strUbicacion,
														$strCorreo,
														$intTelefono,
														$intNumeroIntegrantes,
														$imgLogo,
														$intComunidad,
														$intEstado);
			$option = 1;
		} else {
			//Actualizar
			if ($nombre_foto == '') {
				if ($_POST['foto_actual'] != 'imageUnavailable.png' && $_POST['foto_remove'] == 0) {
					$imgLogo = $_POST['foto_actual'];
				}
			}
			$request_grupo = $this->model->updateGrupo(	$intIdGrupo,
														$strNombre,
														$strRepresentante,
														$strDescripcion,
														$strUbicacion,
														$strCorreo,
														$intTelefono,
														$intNumeroIntegrantes,
														$imgLogo,
														$intComunidad,
														$intEstado);
			$option = 2;
		}

		if ($request_grupo > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('grupos', $foto, $imgLogo);
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('grupos', $foto, $imgLogo);
				}

				if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'imageUnavailable.png')
					|| ($nombre_foto != '' && $_POST['foto_actual'] != 'imageUnavailable.png')
				) {
					deleteFile('grupos', $_POST['foto_actual']);
				}
			}
		} else if ($request_grupo == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Grupo ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delGrupo()
	{
		if ($_POST) {
			$intIdGrupo = intval($_POST['gpo_id']);
			$requestDelete = $this->model->deleteGrupo($intIdGrupo);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el grupo');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el grupo.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}